<?php

class ProductController extends AbstractControllerA
{
    public function listAction(){}
    const MODEL_NAME = "Product";

    public function deleteAction(){
        $product = \Model\Product\Repository::getOnePdoStatement($_GET['id']);
        $product->delete();
        parent::redirect("products", "list");
    }
    public function createAction()
    {


        $image = [];
        $countImage = count($_FILES['image']['name']);
        for ($i = 0; $i < $countImage; $i++) {
            if ($_FILES['image']['error'][$i] == 1) continue;
//            if (getimagesize($_FILES['tmp_name']) === falce) {
//            } else {
                $fileName = uniqid() . ".png";
                if (move_uploaded_file($_FILES['image']['tmp_name'][$i], UPLOAD_DIR . $fileName)) ;
                $image[] = $fileName;
            }
            $image = join(', ', $image);
            $_POST['image'] = $image;
            parent::createAction();
            header("location: " . ADMIN_URL . "front.php?controller=product&action=list");
        }
    public function updateAction(){

        return \Model\User\Repository::getOne($_GET['id']);

    }
}