<?php
namespace Model;
class Product extends \Model\AbstractModel{

      public $product_id;
      public $name;
      public $sku;
      public $type;
      public $brand;
      public $description;
      public $image;
      public $price;
      public $qty;
      public function getUrl(){
          return "front.php?controller=product&action=list&id=".$this->product_id;
      }
      public function getImage(){
          return "uploads/product/".$this->image;
      }
    public function getPrice(){
        return $this->price;
    }
    public function getPriceDiscount(){
        return $this->price/0.8;
    }
    public function getPriceSumm(){
          return $this->price*$this->qty;
    }

}
