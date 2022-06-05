<?php

class CategoryController extends AbstractControllerA
{
    public function listAction(){}
    const MODEL_NAME = "Category";
    public function deleteAction()
    {
        parent::deleteAction();
        header("location: " . ADMIN_URL . "front.php?controller=category&action=list");
    }

//    public function createAction()
//    {
//        foreach ($_FILES as $file) {
//            if ($file['error'] == 1) continue;
//            if (getimagesize($file['tmp_name']) === falce) {
//            } else {
//                $fileName = uniqid() . ".png";
//                move_uploaded_file($file['tmp_name'], UPLOAD_DIR . $fileName);
//            }
//            $_POST['image'] = $fileName;
//            parent::createAction();
//            header("location: " . ADMIN_URL . "front.php?controller=category&action=list");
//        }
//    }
    public function updateAction(){
        return \Model\Сategory\Repository::getOne($_GET['id']);

    }
}
