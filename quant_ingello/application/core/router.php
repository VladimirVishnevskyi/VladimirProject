<?php

/**
 * Class Route цель - http://localhost/controller/action -> Controller::action()
 */
class Route
{

    static function start()
    {
        // по умолчанию
        $controller_name = 'reg';
        $action_name = 'add_pers_form';

        /// '/controller/action' => ['', 'controller', 'action']
        $routers = explode('/', parse_url($_SERVER['REQUEST_URI'])['path']); // РАЗДЕЛИЛИ ЮРЛЬ

        //если после разделения урли у нас есть несколько елементов для маршрута, то подставляем єти значения
        //в контроллер и екшн соответсвенно
        if (!empty($routers[1])) {
            $controller_name = $routers[1];
        }

        if (!empty($routers[2])) {
            $action_name = $routers[2];
        }

        $controller_name = 'Controller_' . $controller_name;
        $action_name = 'action_' . $action_name;
        $model_name = 'Model_' . $controller_name;

        //подцепил модель
        //todo: это вообще используется?
        $model_file = strtolower($model_name) . '.php';
        $model_path = "application/models/" . $model_file;
        if (file_exists($model_path)) {
            include "application/models/" . $model_file;
        }

        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = $_SERVER['DOCUMENT_ROOT'] . "/application/controllers/" . $controller_file;

        //если существует файл контроллера, подключаем, иначе кидаем исключение что не существует контроллера
        if (file_exists($controller_path)) {
            include $controller_path;
        } else {
            include $_SERVER['DOCUMENT_ROOT'] . '/application/controllers/controller_404.php';
            $controller = new Controller_404();
            $controller->wrongPage();
            return;
            //throw new Exception('[ERROR! Controller ' . $controller_file . '. IS NOT EXSIST! ]<hr/>');
        }

        // создаем контроллер

        //$controller = new $controller_name;
        //$controller = new 'Controller_dove';
        //$controller = new Controller_dove;
        $controller = new $controller_name;

        $action = $action_name;

        //если существует метод контроллера - используем его
        //также если визивается один из разрешенних в if имен контроллера он также визовется, к остальним доступ дается
        //при наличии токена

        if (method_exists($controller, $action)) {
            if (self::checkAuth() == true || $controller_name == 'Controller_authoriz' || $controller_name == 'Controller_reg') {
                // вызываем действие контроллера
                //$controller->{'action_delete'}();
                //$controller->action_delete();

                ###################################################
                ####################################################
                #####################################################

                        $controller->$action();

                #####################################################
                ####################################################
                ###################################################

            } else {
                // здесь также разумнее было бы кинуть исключение
                include $_SERVER['DOCUMENT_ROOT'] . '/application/controllers/controller_404.php';
                $controller = new Controller_404();
                $controller->forAuthorizedUsers();

                //throw new Exception('[ERROR! Action ' . $controller_file . ' ' . $action . ' IS NOT EXSIST! ]<hr/>');
            }

        }
    }

    ////5. Перед любым действием (action) кроме логина и обработчика формы логина - нужно проверить есть ли у пользователя доступ.
    /// проверка доступа проверяется следующим образом
    /// 1 - проверка на то, что существует в куки вообще какой то токен, куки расчитани на час.
    /// 2 - если ето так, тогда идем в бд и ищем запись с похожим токеном, и получаем его
    /// 3 - получив значение токена проверяем с кукой если все норм доступ откривается
    static function checkAuth()
    {
        //de($_COOKIE['token']);
        //$_COOKIE['token'];
        // self::checkInDb
        //de($_COOKIE['token']);
        if (isset($_COOKIE['token'])) {
            //de($_COOKIE['token']);
            $access = self::checkInDb($_COOKIE['token']);
            if ($access == $_COOKIE['token']) {
                return true;
            }
        } else {
//            de('kewqeop');
            //echo 'токента нет';
            return false;
        }
    }

    //проверить соотвествующий токен в БД
    static function checkInDb($token)
    {
        $access = sql::selectOne('person', ['token' => $token]);
        if ($access) {
            return $access['token'];
        } else {
            return false;
        }
    }

    //совсем неиспользующаяся функция по странице 404
    function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        //header("Status: 404 Not Found");
        //header('Location:' . $host . '404');
    }
}