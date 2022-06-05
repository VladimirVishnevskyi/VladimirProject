<?php
session_start([
    'cookie_lifetime' => 50000,
]);
define('UPLOAD_DIR',getcwd()."/../site/uploads/product/");
define('SITE_URL',"/WebSite/");
define('ADMIN_URL',"http://dev8.php.mukovoz.com/WebSite/admin/");
define('IMJ_URL',"/WebSite/site/uploads/product/");

require_once "../site/controllers/AbstractControllerS.php";
require_once "../admin/controllers/AbstractControllerA.php";
require_once "models/AbstractModel.php";
require_once "models/AbstractRepository.php";
require_once "models/Category.php";
require_once "models/Category/Repository.php";
require_once "Config.php";
require_once "models/Product.php";
require_once "models/Product/Repository.php";
require_once "models/Cart.php";
require_once "models/Cart/Repository.php";
require_once "models/Customer.php";
require_once "models/Customer/Repository.php";
require_once "models/Order.php";
require_once "models/Order/Repository.php";
require_once "models/Order_product.php";
require_once "models/Order_product/Repository.php";
require_once "models/Cart_product.php";
require_once "models/Cart_product/Repository.php";
require_once "models/Category_product.php";
require_once "models/Category_product/Repository.php";
require_once "models/User/Repository.php";
require_once "models/User.php";

date_default_timezone_set('Europe/Kiev');

function class_loader($class){
    $class = str_replace("\\", '/', $class).".php";
    $fileName = str_replace("Model/", 'models/', $class);
    require_once $fileName;
}
spl_autoload_register('class_loader');

$config = [
    "db"=>include "configs/db.php",
    "shop"=>include "configs/shop.php"
];
Config::getInstance()->setConfig($config);
