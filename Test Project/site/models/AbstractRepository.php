<?php

namespace Model;
abstract class AbstractRepository
{


    public static function db()
    {
        $config = \Config::getInstance()->config;

        $db = new \PDO(
            "mysql:host={$config['db']['host']};dbname={$config['db']['database']};charset=utf8",
            $config['db']['username'],
            $config['db']['password']
        );
        return $db;
    }

    public static function getAllBySql($sql)
    {

        $table = get_called_class()::TABLE_NAME;
        $model = get_called_class()::MODEL_NAME;


        $result = self::db()->query($sql);
        $records = $result->fetchAll(\PDO::FETCH_ASSOC);
        $result = [];

        foreach ($records as $record) {
            $result[] = new $model($record);
        }
        return $result;
    }

    public static function getAll()
    {
        $table = get_called_class()::TABLE_NAME;
        $sql = "SELECT * FROM `{$table}`";
        return self::getAllBySql($sql);
    }


    public static function getOne($id)
    {
        $model = get_called_class()::MODEL_NAME;
        $table = get_called_class()::TABLE_NAME;
        $primaryKey = get_called_class()::PRIMARY_KEY;
        $binds = [
            ':id' => $id,
        ];
        $sql = "SELECT * FROM `{$table}` where {$primaryKey} = :id";
        $db = self::db();
        $stmt = $db->prepare($sql);
        $stmt->execute($binds);
        $records = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $result = [];
        foreach ($records as $record) {
            $result[] = new $model($record);
        }
        if (count($result) > 0) {
            return $result[0];
        }
        return false;

    }


    public static function getOneBySql($sql)
    {
        $return = self::getAllBySql($sql);
        if (count($return) > 0) {
            return $return[0];
        }
    }

    public static function delete($id)
    {
        $table = get_called_class()::TABLE_NAME;
        $model = get_called_class()::MODEL_NAME;
        $primaryKey = get_called_class()::PRIMARY_KEY;
        $sql = "DELETE FROM  {$table} where {$primaryKey} = {$id}";
        self::db()->query($sql);
    }

    public static function add($params)
    {

//        $modelClass = get_called_class();
//        $modelClass = str_replace('\Repository', "", $modelClass);
//        $primaryKeyField = get_called_class()::PRIMARY_KEY;
//        $data = [];
//        $reflect = new \ReflectionClass($modelClass);
//        $props = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC);
//        foreach ($props as $property) {
//            $name = $property->name;
//            $value = @$params[$name];
//            if (is_null($value)) {
//                continue;
//            }
//            $data[$name] = $value;
//        }
//        $params = $data;
        $table = get_called_class()::TABLE_NAME;
        $fields = [];
        $values = [];
        $binds = [];
        foreach ($params as $key => $value) {
            $fields[] = "`{$key}`";
            $values[] = ":$key";
            $binds[":$key"] = $value;
        }
        $fields = join(', ', $fields);
        $values = join(', ', $values);
        $sql = "INSERT INTO `{$table}` ($fields) VALUES ($values)";

        $db = self::db();
        $statement = $db->prepare($sql);
        $result = $statement->execute($binds);
        if ($result === false) {
            var_dump($binds);
            var_dump($sql);
            var_dump($statement->errorInfo());
            exit('ERROR in SQL');
        } else {
            return $db->lastInsertId();
        }

    }


    public static function update($params)
    {

        $table = get_called_class()::TABLE_NAME;
        $primaryKeyField = get_called_class()::PRIMARY_KEY;
        $primaryKeyValue = $params[$primaryKeyField];
        $fields = [];
        $values = [];
        $binds = [];
        foreach ($params as $key => $value) {
            if ($key == $primaryKeyField) {
                continue;
            }
            $fields[] = "`{$key}` = :$key";
            $values[] = ":$key";
            $binds[":$key"] = $value;
        }
        $fields = join(', ', $fields);
        $values = join(', ', $values);
        $sql = "UPDATE `{$table}` SET  $fields WHERE $primaryKeyField = $primaryKeyValue";

        $db = self::db();
        $statement = $db->prepare($sql);
        $result = $statement->execute($binds);
        if ($result === false) {
            var_dump($statement->errorInfo());
            exit('ERROR in SQL');
        } else {
            return $db->lastInsertId();
        }

    }
}
