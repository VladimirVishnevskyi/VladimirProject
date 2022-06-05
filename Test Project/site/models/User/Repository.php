<?php
namespace Model\User;

class  Repository extends \Model\AbstractRepository{

    const TABLE_NAME = "user";
    const LOGIN_NAME = "login";
    const MODEL_NAME = "\Model\User";
    const PRIMARY_KEY = "user_id";
    const SALT = "salt";
    public static function getByLogin($login){
        $sql = "SELECT * from user where login = '{$login}'";
        $return =  self::getAllBySql($sql);
        if(count ($return)>0)
            return $return[0];
    }
    public static function getLoggedUser(){
        $token = $_COOKIE['token'];
        $sql = "select * from user where sha1(CONCAT(login,password, '".self::SALT."')) = '{$token}'";
        return self::getOneBySql($sql);
    }
    public static function addUser($params){

       $sql = "INSERT INTO `user` (`login`, `password`, `mail`, `full_name`)
        VALUES ('{$params['login']}',sha1('{$params['password']}'),'{$params['mail']}','{$params['full_name']}')";

       self::db()->query($sql);
        }
    
}