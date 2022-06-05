<?php
namespace Model\Product;

class  Repository extends \Model\AbstractRepository{

    const TABLE_NAME = "product";
    const MODEL_NAME = "\Model\Product";
    const PRIMARY_KEY = "product_id";

    public static function getProductsByCategoryId($id){

        $sql = "SELECT product.*
            FROM `category_product`
            LEFT JOIN product ON category_product.product_id = product.product_id
            WHERE `category_id` = '$id'";
     return self::getAllBySql($sql);

    }
    public function searchIn($query){
        $query = "%".$query."%";
        $query = str_replace("","%",$query);

        $sql = "SELECT product.*
            FROM `product` 
            WHERE `name` like '{$query}' LIMIT 5";
        return self::getAllBySql($sql);
    }



}
