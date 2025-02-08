<?php
/*
* PHP Kit for Icici Merchant Solutions
* Version: 1.0.5
*/

/*Enter UAT kit parameters */
define('ENC_KEY', '421B17328685EF45150C280157F51A39'); 
define('SECURE_SECRET', '3BA668EA9F1E5A94EDC2DC2D67E41A2B'); 
define('VERSION', '1'); 
define('PASSCODE', 'QOEU3632'); //Must be 8 digit only. No special characters allowed
define('MERCHANTID', '100000000090479'); //This is not being used in kit but for your reference in case of use it as global
define('TERMINALID', 'EG002339'); //This is not being used in kit but for your reference in case of use it as global
define('BANKID', '24520'); //Must be 6 digit only. No special characters allowed
define('MCC', '5691'); //Must be 4 digit only. No special characters allowed
define('GATEWAYURL', 'https://paypg.icicibank.com/accesspoint/angularBackEnd/requestproxypass'); 
define('REFUNDURL', 'https://paypg.icicibank.com/accesspoint/v1/24520/createRefundFromMerchantKit'); 
define('STATUSURL', 'https://paypg.icicibank.com/accesspoint/v1/24520/checkStatusMerchantKit');
define('RETURNURL', base_url().'home/icici_pay_response'); // define('RETURNURL', 'YOUR_DOMAIN/ICICI_MS/responseSale.
// Return url's length must not be more then 500 character
?>