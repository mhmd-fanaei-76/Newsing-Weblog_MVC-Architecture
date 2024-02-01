<?php
namespace App\Models;
use App\DataBase\MySql\MySQLConnection;
class Model {
    protected $connection;
    protected $table;
    public function __construct()
    {
        $this->connection = MySQLConnection::getInstance();
        $this->connection->setTable($this->table);
        $this->connection->where = "";
        $this->connection->wherePlaceholder = [];
    }

    public function delete(): bool
    {
        return $this->connection->delete();
    }

    public function create(array $data): bool
    {
        return $this->connection->insert($data);
    }

    public function update(array $data): bool
    {
        return $this->connection->update($data);
    }

    public function get(array $columns = ['*'])
    {
        return $this->connection->select($columns);
    }

    public function where(string $column, $value): Model
    {
        $this->connection->where([$column => $value]);
        return $this;
    }

    public function orWhere(string $column, $value): Model
    {
        $this->connection->where([$column => $value],"OR");
        return $this;
    }
}






?>