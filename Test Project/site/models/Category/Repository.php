<?php
namespace Model\Category;

class  Repository extends \Model\AbstractRepository{

    const TABLE_NAME = "category";
    const MODEL_NAME = "\Model\Category";
    const PRIMARY_KEY = "category_id";


    public function addCategory($name, $files = false){
        if(!$files){
            $sql = "INSERT INTO `category` (`category_name`)
              VALUES ('{$name}');";
            self::db()->query($sql);
        }else{
            if($files['image']['error']==1) exit;
            move_uploaded_file($files['image']['tmp_name'], UPLOAD_DIR.$files['image']['name']);
            $sql = "INSERT INTO `category` (`category_name`, `category_img`)
                VALUES ('{$name}', '{$files["image"]["name"]}');";
            self::db()->query($sql);
        }
    }
  

}
