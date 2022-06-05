<?php

class UsersController extends AbstractControllerA
{
    const MODEL_NAME = "User";

    public function listAction()
    {
    }

    public function deleteAction()
    {
        parent::deleteAction();
        parent::redirect("users", "list");
    }

    public function createAction()
    {
        unset($_POST['password_confirm']);
        parent::createAction();
        header("location: " . ADMIN_URL . "front.php?controller=users&action=list");
    }

    public function updateAction()
    {

        return \Model\User\Repository::getOne($_GET['id']);

    }
}