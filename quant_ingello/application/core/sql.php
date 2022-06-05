<?php

class sql
{
    //todo nibkjnok
    //nkjnoijknmlk

    /**
     * @param $table
     * @param $fieldValue массив ['title'=>'батарея для телефона', 'price'] батарея для телефона
     */

    //не использующаяся функция each
    static function each($columnValue)
    {
        $condition = [];
        foreach ($columnValue as $key => $value) {
            if (is_numeric($value)) {
                $condition[] = " AND " . $key . " = " . $value;
            } else {
                $condition[] = " AND " . $key . " = '" . $value . "'";
            }
        }
        $condition = implode(" , ", $condition);
    }

    public static function insert($table, $fieldValue)
    {
        $db = Db::getConnection();
        //из переданного массива
        $values = [];
        $fields = [];

        //собираем поля и их значения для запроса insert из переданного в параметре массива
        foreach ($fieldValue as $key => $value) {
            if (is_numeric($value)) {
                $values[] = $value;
            } else {
                $values[] = "'" . $value . "'";
            }
            $fields[] = $key;

        }
        $values1 = implode(" , ", $values);
        $fields1 = implode(" , ", $fields);
        //строим запрос и виполняем его
        $sql = "INSERT INTO $table (" . $fields1 . ") VALUES (" . $values1 . ")";
        echo $sql;
        $query = $db->query($sql);
        //если запрос виполнен успешно - возвращаем последний id ( insert_id - встроенное свойство класса mysqli)
        if ($query) {
            $db->insert_id;
            return $db->insert_id;
        } else {
            return false;
        }
    }

    //метод для виборки единой записи
    public static function selectOne($table, $columnValue = [])
    {
        //если виборка одной записи успешна - возвращаем запись
        $result = self::select($table, $columnValue, true);
        if (!empty($result)) {
            return $result[0];
        } else {
            return false;
        }
    }

    private static function whereBuild($columnValue = []){
        $condition = [];
        //построение запроса в инструкции where
        foreach ($columnValue as $key => $value) {
            if (is_numeric($value)) {
                $condition[] = " AND " . $key . " = " . $value;
            } else {
                $condition[] = " AND " . $key . " = '" . $value . "'";
            }
        }
        $condition = implode(" ", $condition);
        //составление окончательного запроса
        return "WHERE 1=1 " . $condition;
    }

    private static function buildResultRows($result){
        //составляем массив из полученних данних
        $rows = [];
        if ($result == false) {
            $rows = false;
        } else {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $rows[] = $row;
            }
        }
        //если в bootstrap прописан DUMP_SQL = true
        if (DUMP_SQL) {
            echo '<hr>';
        }
        //возвращаем результат
        return $rows;
    }

    public static function selectWithLimit($table, $columnValue = [], $quantity = []){
        $db = Db::getConnection();
        $sql = "SELECT * FROM $table ";
        $sql .= self::whereBuild($columnValue);
        //если массив с лимитами передан в нормальних размерах 1 или 2 єлемента, тогда составляем лимит условие
        if(count($quantity) > 2 || count($quantity) < 1){
        }
        else {
            $sql .= ' LIMIT ';
            for($i = 0; $i < count($quantity); $i++){
                if($i == count($quantity)-1) $sql .= $quantity[$i];
                else $sql .= $quantity[$i].', ';
            }
        }
        echo $sql;
        $result = $db->query($sql);
        return self::buildResultRows($result);
    }

    public static function select($table, $columnValue = [], $one = false)
    {
        //подключение к БД
        $db = Db::getConnection();
        $sql = "SELECT * FROM $table ";
        $sql .= self::whereBuild($columnValue);
        //проверка на то, что нужно витащить либо одну запись из таблици либо все
        if ($one) {
            $sql .= ' LIMIT 1';
        }
        if (DUMP_SQL) {
            //de($sql);
            echo $sql . '<br>';
        }
        //получаем результат запроса
        $result = $db->query($sql);
        return self::buildResultRows($result);
    }

    public static function update($table, $fieldValue = [], $columnValue = [])//, $columnValue = null
    {
        $db = Db::getConnection();
        //формируем поля и значения, которие будем менять в запросе
        $values = [];
        foreach ($fieldValue as $key => $value) {
            if(is_null($value)) $value = '0';
            if (is_numeric($value)) {
                $values[] = $key . " = " . $value;
            } else {
                $values[] = $key . " = '" . $value . "'";
            }
        }
        $values = implode(" , ", $values);
        //формирование строки для запроса в блоке where
        if (is_array($columnValue)) {
            $condition = [];
            foreach ($columnValue as $key => $value) {

                if (is_numeric($value)) {
                    $condition[] = " AND " . $key . " = " . $value;
                } else {
                    $condition[] = " AND " . $key . " = '" . $value . "'";
                }
            }
            $condition = implode(" ", $condition);

        } elseif (is_string($columnValue)){
            $condition = "AND id = " . $columnValue  ;
        }
            //виполнение запроса и возврат true в случае успеха иначе false
            $sql = "UPDATE $table SET " . $values . "  WHERE 1=1 " . $condition;
            $result = $db->query($sql);
            //de($sql);
            if ($result == false) {
                return false;
            } else {
                return true;
            }
        }

        public static function delete($table, $columnValue = null)
        {
            $db = Db::getConnection();

            foreach ($columnValue as $key => $value) {
                if (is_numeric($value)) {
                    $condition[] = " AND " . $key . " = " . $value;
                } else {
                    $condition[] = " AND " . $key . " = '" . $value . "'";
                }
            }
            $condition = implode(" , ", $condition);

            $sql = "DELETE FROM $table WHERE 1 = 1 " . $condition;
            $result = $db->query($sql);

        }

        public static function count($table, $field){
            $db = Db::getConnection();

            $sql = "select count($field) from $table";
            $result = $db->query($sql);
            return $result;
        }
    }