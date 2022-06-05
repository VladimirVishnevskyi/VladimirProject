<?php

class  AbstractControllerA
{
    public function listAction(){}
    public function viewAction()
    {
    }
    public function updateAction()
    {

    }
    public function redirect( $controller, $action, $params =[]){
        $location = "location: ".ADMIN_URL."front.php?controller=$controller&action=$action";
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
        $model = get_called_class();
        $model = str_replace("sController", '', $model);
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
