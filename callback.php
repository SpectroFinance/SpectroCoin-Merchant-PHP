<?php

include_once('constants.php');
include_once('SCMerchantClient/SCMerchantClient.php');

$scMerchantClient = new SCMerchantClient(SC_API_URL, SC_MERCHANT_ID, SC_MERCHANT_API_ID);
$callback = $scMerchantClient->parseCreateOrderCallback($_REQUEST);

if ($callback != null && $scMerchantClient->validateCreateOrderCallback($callback)){

	switch ($callback->getStatus()) {
		case OrderStatusEnum::$Test:
			processTestCallback($callback);
			break;
		case OrderStatusEnum::$New:
			processNewCallback($callback);
			break;
		case OrderStatusEnum::$Pending:
			processPendingCallback($callback);
			break;
		case OrderStatusEnum::$Expired:
			processExpiredCallback($callback);
			break;
		case OrderStatusEnum::$Failed:
			processFailedCallback($callback);
			break;
		case OrderStatusEnum::$Paid:
			processPaidCallback($callback);
			break;
		default:
			echo 'Unknown order status: '.$callback->getStatus();
			break;
	}

//	exit(print_r($callback, true));
	echo '*ok*';

} else {
	echo 'Invalid callback!';
}

function processTestCallback(OrderCallback $callback) {
	// process
}
function processNewCallback(OrderCallback $callback) {
	// process
}
function processPendingCallback(OrderCallback $callback) {
	// process
}
function processExpiredCallback(OrderCallback $callback) {
	// process
}
function processFailedCallback(OrderCallback $callback) {
	// process
}
function processPaidCallback(OrderCallback $callback) {
	// process
}