<html>
<head>
	<title>Sample Merchant client</title>
	<script src="js/countdown.min.js" type="application/javascript"></script>
	<script src="js/script.js" type="application/javascript"></script>
</head>
<body>
<?php
include_once('constants.php');
include_once('SCMerchantClient/SCMerchantClient.php');

$orderId = null;// "Order005";
$payAmount = 0.00025; // Customer would pay in BTC
$receiveAmount = null;//1; // Merchant would receive in BTC/EUR
$description = "Order 'Order001' at www.merchant.com";
$culture = "en";

$scMerchantClient = new SCMerchantClient(SC_API_URL, SC_MERCHANT_ID, SC_MERCHANT_API_ID, false);
$createOrderRequest = new CreateOrderRequest($orderId, $payAmount, $receiveAmount, $description, $culture, SC_MERCHANT_ORDER_CALLBACK_URL, SC_MERCHANT_ORDER_SUCCESS_URL, SC_MERCHANT_ORDER_FAILURE_URL);
$createOrderResponse = $scMerchantClient->createOrder($createOrderRequest);

if ($createOrderResponse instanceof ApiError) {
	echo 'Error occurred. ' . $createOrderResponse->getCode() . ': ' . $createOrderResponse->getMessage();
} else if ($createOrderResponse instanceof CreateOrderResponse) {
	echo 'Order Id: '.$createOrderResponse->getOrderId().'<br/>';
	echo 'Order request Id: '.$createOrderResponse->getOrderRequestId().'<br/>';
	echo 'Deposit address: '.$createOrderResponse->getDepositAddress().'<br/>';
	echo 'Pay: '.$createOrderResponse->getPayAmount().' '.$createOrderResponse->getPayCurrency().'<br/>';
	echo '<img src="//chart.googleapis.com/chart?chs=160x160&chld=M|0&cht=qr&chl=bitcoin:'.$createOrderResponse->getDepositAddress().'?amount='.$createOrderResponse->getPayAmount().'" alt="Bitcoin qr"/><br/>';
	echo 'Receive: '.$createOrderResponse->getReceiveAmount().' '.$createOrderResponse->getReceiveCurrency().'<br/>';
	echo 'Valid for: <span id="pageTimer"></span><script type="application/javascript">clockdown('.$createOrderResponse->getValidUntil().')</script><br/>';
} else {
	echo 'error';
}

?>

</body>
</html>
