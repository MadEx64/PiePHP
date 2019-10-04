<?php
namespace Core;

use Core\ORM;
use Core\Database;

class Entity
{
    public $ORM;
    public $table;
    public $params;
    public $pdo;

    public function __construct($params, $id = null) {
        $this->ORM = new ORM();
        $this->table = strtolower(substr(str_replace('Model', '', get_class($this)),1)) . 's';
        var_dump($this->table);
        $this->params = $params;
        $this->id = $id;
        $db = new Database();
        $this->pdo = $db->getConnection();
    }

    public function save() {
        if (!isset($this->id)) {
            return $this->ORM->create($this->table, $this->params);
        }
        else {
            $this->ORM->update($this->table, $id, $this->params);
        }
    }

    public function read() {
        return $this->ORM->read($this->table, $id);
    }

    public function delete() {
        $this->ORM->delete($this->table, $id);
    }

    public function find($option) {
        return $this->ORM->find($this->table, $option);
    }
}
