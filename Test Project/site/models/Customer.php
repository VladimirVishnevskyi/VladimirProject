<?php
namespace Model ;
class Customer extends \Model\AbstractModel{

    public $customer_id;
    public $last_name;
    public $first_name;
    public $email;
    public $phone;
    protected $_customer;
    

    public function getUrl(){
        return "product.php?id=".$this->customer_id;
    }
}


