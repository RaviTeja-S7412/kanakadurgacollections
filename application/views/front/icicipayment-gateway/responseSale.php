<?php
require_once ('lib/Utility.php');
require_once('lib/config.php');
$utility = new Utility();
$logFilePath = 'sale_log.log';

$EncKey = ENC_KEY;
$SECURE_SECRET = SECURE_SECRET;

/* Get the response from url */
$paymentResponse = $_GET['paymentResponse'];

// URL decode the parameter
$decodedJson = urldecode($paymentResponse);

// Parse the JSON
$jsonData 	= json_decode($decodedJson, true);
$EncData 	= $jsonData['EncData']; 
$merchantId = $jsonData['MerchantId'];
$bankID  	= $jsonData['BankId'];
$terminalId = $jsonData['TerminalId'];

if($bankID == "" || $merchantId == "" || $terminalId == "" || $EncData == "")
{
	echo "Invalid data";
	exit;
}
if(empty($bankID) || empty($merchantId) || empty($terminalId) || empty($EncData) )
{
	echo "Invalid data";
	exit;
}

$fomattedEncData = str_replace(" ", "+", $EncData);
$data = $utility->decrypt($fomattedEncData, $EncKey); 

$dataArray = explode("::",$data);
foreach ($dataArray as $key => $value) 
{
	$valuesplit = explode("||",$value);
	$dataFromPostFromPG[$valuesplit[0]] = urldecode($valuesplit[1]);
}

/* SecureHash got in reply */
$SecureHash = $dataFromPostFromPG['SecureHash'];

/* Log the response */
$currentTime = date('d-m-Y H:i:s'); // Get current timestamp with date and time
$logRequest = 'Response:'."[$currentTime]"; // Include timestamp in the log message
$logRequest .= json_encode($dataFromPostFromPG);
$logFile = fopen($logFilePath, 'a');
fwrite($logFile, $logRequest . PHP_EOL.PHP_EOL);
fclose($logFile); 

/* remove SecureHash from data */	
unset($dataFromPostFromPG['SecureHash']);
/* remove null or empty data */
$resData = array_filter($dataFromPostFromPG);		

/* sort data array */
ksort($resData);

/* convert hash to uppercase becuase gateway needs it in uppercase  */
$SecureHash_final = strtoupper($utility->generateSecurehash($resData));

$hashValidated = 'Invalid Hash';
$hashValidated = 'CORRECT';

if( $SecureHash_final == $SecureHash )
{
	$hashValidated = 'CORRECT';
	// echo 'Correct Hash';
} else {
	$hashValidated = 'Invalid Hash';
	// echo 'Invalid Hash';
}

//$hashValidated = 'CORRECT'; //remove the comment from this if you are getting 'Invalid Hash' error. this will show you actual result.

if($hashValidated == 'CORRECT') {


	$carted  = $this->cart->contents();
	$sale_id = $this->session->userdata('sale_id');
	$guest_id = $this->crud_model->get_type_name_by_id('sale', $sale_id, 'guest_id');
	
	$sale_id = $this->session->userdata('sale_id');
	$data1['payment_timestamp'] = strtotime(date("m/d/Y"));
	$data1['payment_details']   = json_encode($resData);

	$this->db->where('sale_id', $sale_id);
	$this->db->update('sale', $data1);
	
	$vendors = $this->crud_model->vendors_in_sale($sale_id);
	$delivery_status = array();
	$payment_status = array();
	foreach ($vendors as $p) {
		$delivery_status[] = array('vendor'=>$p,'status'=>'pending','comment'=> '','delivery_time'=>'');
		$payment_status[] = array('vendor'=>$p,'status'=>'paid');
	}
	if($this->crud_model->is_admin_in_sale($sale_id)){
		$delivery_status[] = array('admin'=>'','status'=>'pending','comment'=> '','delivery_time'=>'');
		$payment_status[] = array('admin'=>'','status'=>'paid');
	}
	$data1['sale_code'] = date('Ym', $data1['sale_datetime']) . $sale_id;
	$data1['delivery_status'] = json_encode($delivery_status);
	$data1['payment_status'] = json_encode($payment_status);

	$this->db->where('sale_id', $sale_id);
	$this->db->update('sale', $data1);
	
	foreach ($carted as $value) {
		$this->crud_model->decrease_quantity($value['id'], $value['qty']);
		$data2['type']         = 'destroy';
		$data2['category']     = $this->db->get_where('product', array(
			'product_id' => $value['id']
		))->row()->category;
		$data2['sub_category'] = $this->db->get_where('product', array(
			'product_id' => $value['id']
		))->row()->sub_category;
		$data2['product']      = $value['id'];
		$data2['quantity']     = $value['qty'];
		$data2['total']        = 0;
		$data2['reason_note']  = 'sale';
		$data2['sale_id']      = $sale_id;
		$data2['datetime']     = time();
		$this->db->insert('stock', $data2);
	}
	$this->crud_model->digital_to_customer($sale_id);
	$this->cart->destroy();
	$this->session->set_userdata('couponer','');
	$this->email_model->email_invoice($sale_id);
	$this->session->set_userdata('sale_id', '');
	if ($this->session->userdata('user_login') == 'yes') {
		redirect(base_url() . 'home/invoice/' . $sale_id, 'refresh');
	}
	else {
		redirect(base_url() . 'home/guest_invoice/' . $guest_id, 'refresh');
	}

}

?>