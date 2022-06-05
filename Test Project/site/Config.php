<?php
final class Config
{

    private static  $instance = null;

    public $config = null;


    private function __construct()
    {
        
    }

    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function setConfig($data){
        $this->config = $data;
    }
}