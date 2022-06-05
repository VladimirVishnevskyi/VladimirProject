<?php
namespace Model\Cart;
class  Repository extends \Model\AbstractRepository{

    const TABLE_NAME = "cart";
    const PRIMARY_KEY = "cart_id";
    const MODEL_NAME = "\Model\Cart";

    public static function create(){
        

        $sql = "INSERT INTO `cart` () VALUES ()";
        $db = self::db();

        $db->query($sql);
        $_SESSION['cart_id'] = $db->lastInsertId();
    }

    public static function getCart(){
        if (array_key_exists('cart_id',$_SESSION)){
            $cart = \Model\Cart\Repository::getOne($_SESSION['cart_id'] );
        }else {
            $cart  = \Model\Cart\Repository::create();
        }
        return $cart;
    }
}
