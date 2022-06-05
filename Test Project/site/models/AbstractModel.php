<?php

namespace Model;
abstract class AbstractModel
{

    protected $_tableName;

    public function __construct($data)
    {
        foreach ($data as $field => $value) {
            $this->$field = $value;
        }
    }

    public function db()
    {
        $config = \Config::getInstance()->config;
        $db = new \PDO(
            "mysql:host={$config['db']['host']};dbname={$config['db']['database']}",
            $config['db']['username'],
            $config['db']['password']
        );
        return $db;
    }

    public function save()
    {
        $repositoryClass = get_called_class() . "\Repository";
        $primaryKeyField = $repositoryClass::PRIMARY_KEY;
        $data = [];
        $reflect = new \ReflectionClass($this);
        $props = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);
        foreach ($props as $property) {
            $name = $property->name;
            $value = $this->$name;
            if (is_null($value)) {
                continue;
            }
            $data[$name] = $value;
        }
        if ($this->$primaryKeyField) {
            $this->$primaryKeyField = $repositoryClass::update($data);
        } else {
            $this->$primaryKeyField = $repositoryClass::add($data);
        }


    }
}
