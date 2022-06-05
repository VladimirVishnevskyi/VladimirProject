<?php

class Controller_authoriz extends Controller
{
    //метод для форми авторизации
    function action_authoriz_form()
    {

        $this->view->generate('login_view.php', 'template_view.php');
    }

    //результат аутентификации
    function action_authoriz()
    {
        $person = $this->getPerson();
        // если запрос по получению человека ничего не видал, тогда предлагаем перейти обратно на форму авторизации
        if (empty($person)) {
            echo "Аунтефикация не пройдена <a href=\"/authoriz/authoriz_form\">Аутентификация</a>";
            echo '<a href="/authoriz/authoriz_form">Аутентификация</a>';
        } else {

            //2. Если нейм и пароль совпал - генерируем случайный токен (аналог пропускного билета)
            $token = rand(1000000, 9999999) . rand(1000000, 9999999);

            //3. Этот токен записываем в БД
            $this->setPerson($token, $person['id']);

            //4. "Отдаём" токен пользователю - через куки
            setcookie("token", $token, time()+3600, "/");

            $response = "Авторизация пройдена";

            $this->view->generate('message_view.php', 'template_view.php', ['message' => $response]);

        }
    }

    //получить человека
    public function getPerson()
    {
        return sql::selectOne('person', $_POST);
    }

    //изменить токен человека
    public function setPerson($token, $id)
    {
        return sql::update('person', ['token' => $token], $id);
    }
}
