<?php

class Controller_404 extends Controller{

    public function wrongPage(){
        $this->view->generate("404_view.php", "template_view.php",
            ['message' => "Такой страници не существует"]);
    }

    public function forAuthorizedUsers(){
        $this->view->generate("404_view.php", "template_view.php",
            ['message' => "Доступ только для авторизованних пользователей"]);
    }
}

?>