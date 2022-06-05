<?php

//
// todo: сделать понятную ошибку об отсутствии прав на действие
// todo: регистрция не добавила пользователя
// todo: захешировать пароль
//
// todo: удалить папку .idea из репозитория yes
// todo: вывести слева проекта ссылки на разделы приложения. Должны быть видны постоянно. +-
// todo: добавить кнопку "создать продукт" в списке продукта yes
// todo: добавить кнопку "удалить продукт" в списке продукта yes
// todo: после изменения продукта перекидывать на его просмотр yes
// todo: при попытке удалить\просмотреть несуществующий продукт выдавать пользовательскую ошибку yes/no(не пользовательская ошибка а сообщение)
// todo: выводить ошибки валидации возле значений инпутов
// todo: удалить все echo которые вне вью и удалить все var_dump() из репозитория.
// todo: генерацию формы перенести во вьюху (класс) +
// todo:
//

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

define('DUMP_SQL', true);

require_once 'core/controller.php';
require_once 'core/model.php';
require_once 'core/views.php';
require_once 'core/sql.php';
require_once 'components/Db.php';
require_once 'core/router.php';

Route::start();

function de($var){
    echo '<pre>';
    var_dump($var);
    exit('интересно');
    echo '</pre>';
}

//function product($a=1,$b=3){
//    //conn_sql();
//    //$this->Connect->conn_sql();
//    //this->$conn_sql();
//    $server_name = "localhost";
//    $user_name = "Misha";
//    $password = "123";
//    $dbname = "test";
//
//    $conn = new mysqli($server_name, $user_name, $password, $dbname);
//    $query = "SELECT Product_id, title, price FROM products";
//    $result = $conn->query($query) or trigger_error(mysql_error()." in ". $query);
//
////    while ($row = mysqli_fetch_array($result)) {
////        print_r($row);
////    }
//
//    //$sql = "INSERT INTO products (Producte_id,title,price)
//    //        VALUES ('4', 'WDADSA', '12')";
//
//
//    $conn = new mysqli($server_name, $user_name, $password, $dbname);
//    $sql = "UPDATE products SET price='$a' WHERE Product_id=$b";
////
////    $sql = "INSERT INTO products (Producte_id,title,price)
////            VALUES ('4', 'WDADSA', '12')";
//    if ($conn->query($sql) === TRUE) {
//        echo "Record updated successfully";
//    } else {
//        echo "Error updating record: " . $conn->error;
//    }
//
////    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
////            VALUES ('John', 'Doe', 'john@example.com')";
//
//    //    $row2 = $result->fetch_array(MYSQLI_ASSOC);
////    print_r($row);
//}
//
//product();
?>



