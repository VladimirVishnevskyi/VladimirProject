<?php
namespace Model;
class Cart_product  extends \Model\AbstractModel
{


    public $cart_product_id;
    public $cart_id;
    public $product_id;



    public function getUrl(){
        return "category.php?id=".$this->cart_product_id;
    }
    public function addToCart(){

    }
}
