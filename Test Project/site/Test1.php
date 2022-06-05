<?php include "bootstrap.php";
$order = new \Model\Order([]);
$order->setShippingMethod("ukrposhta");
$order->setPaymentMethod("pay_in_store");