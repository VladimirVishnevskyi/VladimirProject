<?php

class  AbstractControllerS
{
    public function listAction(){
        $model = get_called_class()::MODEL_NAME;
        $className = "\Model\$model\Repository";
        $className::getAll();
    }


    public function View(){}
    
    public function viewAction()
    {
    }
    public function updateAction()
    {

    }
    public function redirect($siteOrAdmin, $controller, $action, $params =[]){
        if($siteOrAdmin == "site") $location = "location: ".SITE_URL."front.php?controller=$controller&action=$action";
        else $location = "location: ".ADMIN_URL."front.php?controller=$controller&action=$action";
        if(count($params) != 0) {
            $data = [];
            foreach ($params as $key=>$value) {
                $data[] = $key.$value;
            }
            $params = join('&', $data);
            $location = $location."&".$params;
        }
        header($location);
    }
    public function deleteAction(){
        $files = explode(",",$this->image);
        foreach ($files as $file){
            unlink(UPLOAD_DIR.$file);
        }
        $model = get_called_class()::MODEL_NAME;
        $className = "\Model\\$model\Repository";
        $className::delete($_GET['id']);
    }

    public function addAction(){}
    public function createAction(){
        $model = get_called_class()::MODEL_NAME;
        $className = "\Model\\$model\Repository";
        $className::add($_POST);
    }

}