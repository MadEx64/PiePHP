<?php
namespace Core;

class ORM extends Database
{
    public function create($table, $fields) {
        $sql = "INSERT INTO " . $table;
        $fieldsKeys = "";
        $fieldsValues = "";
        $count = 1;
        foreach($fields as $key => $values) {
            if(count($fields) == $count) {
                $fieldsKeys .= $key;
                $fieldsValues .= '"' . $values . '"';

            }
            else {
                $count++;
                $fieldsKeys .= $key . ", ";
                $fieldsValues .= '"' . $values . '", ';
            }
        }
        $sql .= " (" . $fieldsKeys . ") VALUES (" . $fieldsValues . ")";
        //var_dump($sql);
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        return $this->getConnection()->lastInsertId();
    }

    public function read($table, $id) {
        $sql = "SELECT * FROM "  . $table . " WHERE id = " . $id;
        $stmt = $this->getConnection()->query($sql);
        $row = $stmt->fetchAll();
        return $row;
    }

    public function update($table, $id, $fields) {
        $sql = "UPDATE SET " . $table . " WHERE id = " . $id;
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
    }

    public function delete($table, $id) {
        $sql = "DELETE FROM " . $table . " WHERE id = " . $id;
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
    }

    public function find($table, $params = array(
        'WHERE' => '1',
        'ORDER BY' => 'id ASC',
        'LIMIT' => ''
    )) {
        $sql = "SELECT * FROM " . $table;
        foreach($params as $key => $value) {
            $sql .= " " . $key . " " . $value;
        }
        $stmt = $this->getconnection()->query($sql);
        $row = $stmt->fetchAll();
        return $row;
    }
}
