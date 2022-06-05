<?php
namespace Model;
class Order_product  extends \Model\AbstractModel
{


    public $order_product_id;
    public $order_id;
    public $product_id;
    public $qty;
    public $price;


    public function getUrl(){
        return "category.php?id=".$this->order_product_id;
    }
}
