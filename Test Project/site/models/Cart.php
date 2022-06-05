<?php
namespace Model;
class Cart extends \Model\AbstractModel
{


    public $cart_id;

    public function addProductcart($product, $qty){
        if ($qty > $product->qty ){
            throw new \Exception('Qty too much');
        }

        $sql = "INSERT INTO `cart_product` (`cart_id`, `product_id`,`qty`,`price`)
                VALUES ($this->cart_id, $product->product_id,$qty,$product->price) ON DUPLICATE KEY
                UPDATE qty = qty + $qty";

        if ($this->db()->query($sql)===false){
            throw new \Exception("Product has not been added");
        }

        return true;
    }

    public function getProducts()
    {
        $sql = "select product.*  FROM cart_product
            JOIN product on cart_product.product_id = product.product_id
            WHERE cart_id = {$this->cart_id}";
        return \Model\Product\Repository::getAllBySql($sql);
    }


    public function deleteProduct($product_id){
        $sql  = "DELETE from cart_product where product_id = $product_id AND cart_id = {$this->cart_id}";
        if ($this->db()->query($sql)===false){
            throw new \Exception("Item deleted");
        }
    }



    public function getTotal(){
        $total = 0;
        foreach($this->getProducts() as $product){
            $total += $product->qty*$product->price;
        }
        return number_format($total,2);
    }

    public function getCount(){
        $count = 0;
        foreach($this->getProducts() as $product){
            $count ++;
        }
        return $count;
    }

    public function plusQty(){
        $sql = "INSERT INTO `cart_product` (`cart_id`, `product_id`,`qty`,`price`)
                VALUES ($this->cart_id, $product->product_id,$qty,$product->price) ON DUPLICATE KEY
                UPDATE qty = $qty+1";

    }
    public function minusQty(){

    }
}