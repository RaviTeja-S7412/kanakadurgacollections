<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title>ICICI MS SALE STATUS API</title>
        <meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
        <script src="lib/jquery.min.js"></script> 
        <script src="lib/jquery.validate.min.js"></script> 
        <script src="lib/additional-methods.min.js"></script>
        <script src="lib/validation.js"></script>
        <link rel="stylesheet" type="text/css" href="lib/style.css" media="screen">
    </head>
    <body>
        <center><h1>SALE STATUS API</h1></center>
        <hr>
        <form action="./processSaleStatus.php" method="post" id="saleStatusApi">
            <table width="80%" align="center" border="0" cellpadding='0' cellspacing='0'>
                <tr>
                    <td colspan="2"><h3>SALE STATUS API FIELDS:</h3></td>
                </tr>
                <tr>
                    <td><strong><em>Merchant Txn. Ref. No*</em></strong></td>
                    <td><input type="text" name="TxnRefNo" value="" size="50" maxlength="50" required /></td>
                </tr>
                <tr>
                    <td><strong><em>Merchant Id: *</em></strong></td>
                    <td><input class="textbox"type="text"  name="MerchantId" id="MerchantId" value="" size="50" maxlength="50" required /></td>
                </tr>
                <tr>
                    <td><strong><em>Terminal Id: *</em></strong></td>
                    <td><input class="textbox"type="text"  name="TerminalId" id="TerminalId" value="" size="50" maxlength="50" required /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="SubButL" value="submit"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>
