<?php
namespace Model;
class Category_product  extends \Model\AbstractModel{


    public $category_product_id;
    public $product_id;
    public $category_id;



    public function getUrl(){
        return "category.php?id=".$this->category_product_id;
    }
}
