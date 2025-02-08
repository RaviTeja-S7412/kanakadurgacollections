<? require_once('lib/config.php'); ?>
<script src="./lib/jquery.min.js"></script> 
<script src="./lib/jquery.validate.min.js"></script> 
<script src="./lib/additional-methods.min.js"></script>
<script src="./lib/validation.js"></script>
<? 
    $cinfo = json_decode($odata->shipping_address);
?>
<hr>

    <form action="<? echo base_url('home/icicipayProcesssale') ?>" method="post" id="saleApi" name="saleApi" accept-charset="ISO-8859-1">
        <input class="textbox"type="hidden" name="TxnRefNo" id="TxnRefNo" value="<? echo strtotime(date("Y-m-d H:i:s")) ?>" required />
        <input class="textbox"type="hidden"  name="Amount" id="Amount" value="<? echo $odata->grand_total ?>" pattern="[1-9]\d*(\.\d+)?" title="Please enter a number greater than or equal to 1" size="40" maxlength="12" required />
        <input class="textbox"type="hidden"  name="Currency" id="Currency" value="356" size="50" maxlength="40" required />
        <input class="textbox"type="hidden"  name="MerchantId" id="MerchantId" value="<? echo MERCHANTID ?>" required />
        <input class="textbox"type="hidden"  name="TerminalId" id="TerminalId" value="<? echo TERMINALID ?>" required />
        <input class="textbox"type="hidden"  name="TxnType" id="TxnType" value="Pay"  readonly="readonly" required />
        <input class="textbox"type="hidden"  name="OrderInfo" id="OrderInfo" value="ORD00000<? echo $odata->sale_id ?>" />
        <input class="textbox"type="hidden"  name="Email" id="Email" value="<? echo $cinfo->email ?>"/>
        <input class="textbox" type="hidden"  name="FirstName" id="FirstName" value="<? echo $cinfo->firstname ?>"/>
        <input class="textbox" type="hidden"  name="LastName" id="LastName" value="<? echo $cinfo->lastname ?>"/>
        <input class="textbox" type="hidden"  name="Street" id="Street" value="<? echo $cinfo->address1 ?>"/>
        <input class="textbox" type="hidden"  name="City" id="City" value="<? echo $cinfo->address2 ?>"/>
        <input class="textbox" type="hidden"  name="State" id="State" value="Telangana"/>
        <input class="textbox" type="hidden"  name="ZIP" id="ZIP" value="<? echo $cinfo->zip ?>"/>
        <input class="textbox" type="hidden"  name="Phone" id="Phone" value="<? echo $cinfo->phone ?>" size="10" pattern="[0-9]{10}" maxlength="10"/>
        
        <input class="textbox"type="hidden"  name="UDF01" id="UDF01" value=""/>
        <input class="textbox"type="hidden"  name="UDF02" id="UDF02" value=""/>
        <input class="textbox"type="hidden"  name="UDF03" id="UDF03" value=""/>
        <input class="textbox"type="hidden"  name="UDF04" id="UDF04" value=""/>
        <input class="textbox"type="hidden"  name="UDF05" id="UDF05" value=""/>
        <input class="textbox"type="hidden"  name="UDF06" id="UDF06" value=""/>
        <input class="textbox"type="hidden"  name="UDF07" id="UDF07" value=""/>
        <input class="textbox"type="hidden"  name="UDF08" id="UDF08" value=""/>
        <input class="textbox"type="hidden"  name="UDF09" id="UDF09" value=""/>
        <input class="textbox"type="hidden"  name="UDF10" id="UDF10" value=""/>
        <input type="submit" name="saleApi" value="Submit"/>
    </form>

<script type="text/javascript">
	document.getElementById('saleApi').submit(); 
</script>
