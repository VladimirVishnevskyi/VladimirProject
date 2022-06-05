<?php

include $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "application" . DIRECTORY_SEPARATOR . "models" . DIRECTORY_SEPARATOR . "model_dove.php";

class Controller_Dove extends Controller
{
    //!!!!!!!!!!!!!!!!
    //любой метод виполняется здесь только при условии, что существует токен авторизации
    //!!!!!!!!!!!!!!!!

    //метод для показа всех обьектов
    public function action_index()
    {
        $dove = new Model_Dove();
        $allPages = 0;
        $activePage = 0;
        $doves_limit = 0;

        $doves = [];
        if(isset($_GET['page'], $_GET['doves']) && $_GET['page'] > 0 && $_GET['doves'] > 0){
            $doves_limit = $_GET['doves'];
            $offset = ($_GET['page']-1)*$doves_limit;

            //узнаем сколько обьектов в таблице
            $allPages = $dove->countRows('id');
            $allPages = $allPages->fetch_assoc()["count(id)"];
            $allPages = ceil($allPages/$doves_limit);

            $doves = $dove->findWithLimit($doves_limit, $offset);
        }
        else {
            $doves = $dove->findAll();
        }

        if ($doves === false) {
            echo 'Голубить нечего!';
        }
        else {
            $this->view->generate(
                'dove_list_view.php',
                'template_view.php',
                ['title' => 'Голуби', 'doves' => $doves, 'pages' => $allPages, 'dovesOnPage' => $doves_limit
                , 'activePage' => $activePage]
            );
        }
    }

    //показивем обьект, id получаем из GET массива
    public function action_dove_show(){
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $dove_id = $_GET['id'];
            $dove = new Model_Dove();
            $dove_template = $dove->findOne(['id' => $dove_id]);
            if($dove_template === false) {
                $response = "Данного голубя не существует";
                $this->view->generate(
                    'message_view.php',
                    'template_view.php',
                    ['message' => $response]
                );
            }
            else
                $this->view->generate(
                'dove_view.php',
                'template_view.php',
                ['dove' => $dove_template]
                );
        }
        else {
            $response = "Не вибран соответствующий продукт";
            $this->view->generate(
                'message_view.php',
                'template_view.php',
                ['message' => $response]
            );
        }
    }

    public function search(){
        $dove = new Model_Dove();
        $dove ->findAll($_POST);
    }

    public function action_add_dove_form()//insert
    {
        $dove = new Model_Dove();
        $htmlForm = $this->view->generateForm($dove);
        $this->view->generate('addrecord_view.php', 'template_view.php',
            ['htmlForm' => $htmlForm, 'path' => '/dove/add_dove']);
    }

    public function action_add_dove()//insert
    {
        $dove = new Model_Dove();// {title: null, price: null}
        $dove->load($_POST);// {title: qweqwe, price: 120}
        $added = $dove->newSave();
        if($added){
            $response = "Добавили голубя!";
            $this->view->generate('message_view.php', 'template_view.php', ['message' => $response]);
        }
        else {
            $htmlForm = $htmlForm = $this->view->generateForm($dove, true);
            $this->view->generate('addrecord_view.php', 'template_view.php',
                ['htmlForm' => $htmlForm, 'path' => '/dove/add_dove']);
        }
    }

    public function action_update_dove_form()
    {
        $dove = new Model_Dove();
        $dove_template = $dove->findOne(['id' => $_GET['id']]);
        $dove->map($dove_template);
        //$htmlForm = "<input type='hidden' name='id' value='".$_GET['id']."'>";
        $htmlForm = $this->view->generateForm($dove, true);
        $this->view->generate('update_view.php',
            'template_view.php', ['htmlForm' => $htmlForm, 'path' => '/dove/update_dove']);
    }

    public function action_update_dove()
    {
        $dove = new Model_Dove();// {title: null, price: null}
        $dove->load($_POST);
        $updated = $dove->newSave();
        if($updated) header("Location: /dove/dove_show?id={$_POST['id']}");
        else {
            $htmlForm = $this->view->generateForm($dove, true);
            $this->view->generate('update_view.php',
                'template_view.php', ['htmlForm' => $htmlForm, 'path' => '/dove/update_dove']);
        }
    }

    public function action_delete_dove(){
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $dove_id = $_GET['id'];
            $dove = new Model_Dove();
            $dove_template = $dove->findOne(['id' => $dove_id]);
            if($dove_template === false){
                $response = "Вибран не существующий голубь";
                $this->view->generate('message_view.php', 'template_view.php',
                ['message' => $response]);
            }
            else {
                $dove->load($dove_template);
                $dove->delete();
                $response = "Dovik удален!";
                $this->view->generate('message_view.php', 'template_view.php',
                    ['message' => $response]);
                //header("Location: /dove/index");
            }
        }
        else {
            $response = "Не вибран соотвествующий голубок!";
            $this->view->generate('message_view.php', 'template_view.php',
                ['message' => $response]);
        }
    }
}
