<?php

namespace Model;
class Order extends \Model\AbstractModel
{

    public $order_id;
    public $customer_id;
    public $payment_method;
    public $shipping_method;
    public $date;
    private $_customer = null;
    private $_products = [];

    public function setShippingMethod($shipping_method)
    {
        if (array_key_exists($shipping_method, self::getAvailableShippingMethod()) === false) {
            throw new \Exception("Invalid shipping method");
            $this->shipping_method = $shipping_method;
        }
        $this->shipping_method = $shipping_method;
    }

    public function setPaymentMethod($payment_method)
    {
        if (array_key_exists($payment_method, self::getAvailablePaymentMethod()) === false) {
            throw new \Exception("Invalid payment method");

        }

        if ($payment_method == 'COD' && in_array($this->shipping_method, ['ukr_poshta', 'pickup'])) {
            throw new \Exception("Invalid payment method");

        }
        if ($payment_method == 'ccard' && $this->shipping_method == 'ukr_poshta') {
            throw new \Exception("Invalid payment method");

        }
        if ($payment_method == 'pay_in_store' && in_array($this->shipping_method, ['ukr_poshta', 'nova_poshta', 'justin'])) {
            throw new \Exception("Invalid payment method");

        }
        if ($payment_method == 'pay_in_store' && in_array($this->shipping_method, ['ukr_poshta', 'nova_poshta', 'justin'])) {
            throw new \Exception("Invalid payment method");

        }
        $this->payment_method = $payment_method;
    }

    public static function getAvailableShippingMethod()
    {
        return \Config::getInstance()->config['shop']['shipping_methods'];
    }

    public static function getAvailablePaymentMethod()
    {
        return \Config::getInstance()->config['shop']['payment_methods'];
    }

    public function addProduct($product)
    {
        $this->_product[] = $product;
    }

    public function addProducts($products)
    {
        $this->_products = $products;
    }

    public function addCustomer($customer)
    {
        $this->_customer = $customer;
    }

    public function save()
    {
        $this->date = date('Y-m-d h:i:s');
        $this->_customer->save();
        $this->customer_id = $this->_customer->customer_id;
        parent::save();
        foreach ($this->_products as $product) {
            var_dump( [
                'order_id' => $this->order_id,
                'product_id' => $product->product_id,
                'qty' => $product->qty,
                'price' => $product->price
            ]);
            $orderProduct = new \Model\Order_product(
                [
                    'order_id' => $this->order_id,
                    'product_id' => $product->product_id,
                    'qty' => $product->qty,
                    'price' => $product->price
                ]
            );
            $orderProduct->save();
        }
    }

    public function getUrl()
    {
        return "product.php?id=" . $this->order_id;
    }

}
