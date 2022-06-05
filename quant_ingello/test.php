<?php
set_time_limit(60);
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

class Car
{
    public $model = 'ZAZ';
    public $year;
    public $engine;
    public $speed;
    public $distance;

    function __construct($model, $year, $engine, $speed, $distance)
    {
        $this->model = $model;
        $this->year = $year;
        $this->engine = $engine;
        $this->speed = $speed;
        $this->distance = $distance;
    }

    public function Driving()
    {
        $time = $this->distance / $this->speed;
        echo $time;
    }

    static function say($car)
    {
        echo '</br>'. $car->model;
    }
}

class Tesla extends Car
{

}

class BMW extends Car
{
    public $drive;
    public $power;

    function __construct($model, $year, $engine, $speed, $distance, $drive)
    {
        $this->drive = $drive;

        parent::__construct($model, $year, $engine, $speed, $distance);
    }
}

class Audi extends Car
{


}

$tesla = new Tesla('Tesla', '2020', 'diesel', '222', '222');
var_dump($tesla);
$bmw = new BMW('BMW', '2015', 'elec', '100', '400', 'full');
var_dump($bmw);

$audi = new Audi('A4', '2016', 'hybrid', '220', '1400');
var_dump($audi);
$audi->Driving();

Car::say($audi);