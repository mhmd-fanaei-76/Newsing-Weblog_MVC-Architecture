<?php
namespace App\DataBase\MySql;

use App\DataBase\DatabaseConnectionInterface;
use App\DataBase\DatabaseOperationInterface;

class MySQLConnection implements DatabaseConnectionInterface, DatabaseOperationInterface
{
    protected static $database;
    protected $connection;
    protected $table;
    public $where ='';
    public $wherePlaceholder = [];

    private function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=newsing_weblog";
        $dbConnect = new \PDO($dsn, "root", '');
        $dbConnect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->connection = $dbConnect;
    }

 
    public static function getInstance(): MySQLConnection
    {
        if (!empty(self::$database))
            return self::$database;
        self::$database = new self;

        return self::$database;
    }

    public function connection(): \PDO
    {
        return $this->connection;
    }



    public function setTable($table): MySQLConnection
    {
        $this->table = $table;
        return $this;
    }

    public function where(array $where = [], string $operator = "AND"): MySQLConnection
    {
        $sql = empty($this->where) ? " WHERE " : " AND ";

        $whereSql = [];
        $wherePlaceHolders = [];
        foreach ($where as $column => $value) {
            $whereSql[] = "$column=:$column";
            $wherePlaceHolders[":$column"] = $value;
        }
        $whereSql = implode(" $operator ", $whereSql);

        $sql .= $whereSql;
        $this->where .= $sql;
        $this->wherePlaceholder = array_merge($this->wherePlaceholder,$wherePlaceHolders);
        return $this;
    }

    public function insert(array $data): bool
    {

        $columns = array_keys($data);
        $valuesPlaceHolders = [];
        foreach ($data as $column => $value) {
            $valuesPlaceHolders[":$column"] = $value;
        }
        $columns = implode(',', $columns);
        $values = implode(',', array_keys($valuesPlaceHolders));

        $sql = "insert into $this->table ($columns) VALUES($values)";
        $preparedStmt = $this->connection->prepare($sql);
        // bind params of insert statement
        try{
            return $preparedStmt->execute($valuesPlaceHolders);
        }catch (\Exception $e){
            return false;
        }
    }

    public function update(array $data): bool
    {
        $sql = "UPDATE $this->table SET ";
        $valuesPlaceholder = [];
        $bindParamsOfSetQuery = [];
        foreach ($data as $column => $value) {
            // prefix it with 'setUpdate' to avoid conflicts with placeholders of where part
            $valuesPlaceholder[] = "$column=:setUpdate_$column";
            //create the array to pass to execute method containing bind parameters values
            $bindParamsOfSetQuery[":setUpdate_$column"] = $value;
        }
        $valuesPlaceholder = implode(",", $valuesPlaceholder);
        $sql .= $valuesPlaceholder;
        if (!empty($this->where))
            $sql .= $this->where;
        $prepareStmt = $this->connection->prepare($sql);
        /* here we have both : 1 where clause bind params and : 2 update set clause bind params
         so we have to merge them
        */
        // myVardump($prepareStmt);
        $mergeParams = array_merge($bindParamsOfSetQuery, $this->wherePlaceholder);
        try{
            return $prepareStmt->execute($mergeParams);
        }catch (\Exception $e){
            return false;
        }
    }

    public function delete(): bool
    {
        $sql = "DELETE FROM $this->table";
        if (!empty($this->where))
            $sql .= $this->where;
        $prepareStmt = $this->connection->prepare($sql);
        // bind params of where clause (if there is no where constraint it is an empty array and no problem will occur)
        return $prepareStmt->execute($this->wherePlaceholder);
    }

    public function select(array $columns = ['*'])
    {
        $sql = "SELECT " . implode(", ", $columns) . " FROM " . $this->table;
        if (!empty($this->where))
            $sql .= $this->where;
        $prepareStmt = $this->connection->prepare($sql);
        // bind params of where clause (if there is no where constraint it is an empty array and no problem will occur)
        $prepareStmt->execute($this->wherePlaceholder);
// myVardump($sql);
        try{
            return $prepareStmt->fetchAll();
        }catch (\Exception $e){
            return false;
        }
        
    }
}




?>