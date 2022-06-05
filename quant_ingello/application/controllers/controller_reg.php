<?php
include $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "application" . DIRECTORY_SEPARATOR . "models" . DIRECTORY_SEPARATOR . "model_person.php";

class Controller_reg extends Controller {

    //метод для вивода всех людей в базе
    function action_index()
    {
        $persones = sql::select('person');
        if ($persones === false) {

        }
        //рендерим все обьекти персон
        $this->view->renderObjects(
            ['title' => 'Персоны', 'objects' => $persones]
        );
    }

    //метод для форми которая добавляет
    function action_add_pers_form()
    {
        if (empty($_POST))
        $person = new Model_person();
        $this->view->generate('login_view.php', 'template_view.php');
    }

    //метод добавления человека в форму
    function action_add_pers(){
        $person = new Model_person();
        $person->load($_POST);
        $newPerson = $person->newSave();
        //если регистрация прошла успешно - отображаем соответсвующее сообщение, иначе даем еще раз ввести значения в форму
        if($newPerson) echo "Регистрация прошла успешно!";
        else {
            echo "Не смогли зарегать пользователя! Try again";
            $htmlForm = $person->generateForm();
            $this->view->generate('reg_view.php', 'template_view.php', $htmlForm);
        }
    }
}