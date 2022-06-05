<?php

class CartController extends AbstractControllerS
{
    public function listAction()
    {
    }

    const MODEL_NAME = "Cart";

    public function addCartAction()
    {
        $cart = \Model\Cart\Repository::getCart();
        $product = \Model\Product\Repository::getOne($_POST['id']);
        $cart->addProductcart($product, $_POST['qty']);
        header('Location: front.php?controller=cart&action=list');
    }

    public function AjaxAction()
    {
        sleep(1);
        $cart = \Model\Cart\Repository::getCart();
        if (array_key_exists('id', $_GET)) {
            $product = \Model\Product\Repository::getOne($_GET['id']);
            $cart->addProduct($product, $_GET['qty']);
            die($cart->getTotal() . "|" . $cart->getCount());
        }

    }
}