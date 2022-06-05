<?php

class OrderController extends AbstractControllerS
{
    const MODEL_NAME = "Order";
    public function listAction(){}
    public function sendAction(){
        $order = new \Model\Order([]);
        $order->setShippingMethod($_POST['shipping_method']);
        $order->setPaymentMethod($_POST['payment_method']);
        $customer = new \Model\Customer(['first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],
            'email'=>$_POST['email'],'phone'=>$_POST['phone']]);
        $order->addCustomer($customer);
        $cart = \Model\Cart\Repository::getCart();
        $order->addProducts($cart->getProducts());
        $order->save();
        parent::redirect("site", "order", "thankYou", ['id=' => $order->order_id]);
        \Model\Cart\Repository::delete($cart->cart_id);
        unset($_SESSION['cart_id']);
    }
}
