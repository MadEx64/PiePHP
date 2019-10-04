<?php
namespace Model;

use Core\Database;
use Core\Entity;

class userModel extends Entity
{
    private $email;
    private $password;
    private static $relations;

    /*public function save($email, $password) {
        $query = "SELECT * FROM users WHERE id_user = $id_user";
        $pdo->query($query);
    }*/

    /*public function create($email, $password) {
        $query = $db->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $query->bindParam(1, $email);
        $query->bindParam(2, $password);
        $query->execute();
    }

    public function read($id_user) {
        $query = $db->prepare("SELECT email, password FROM users WHERE id_user = ?");
        $query->bindParam(1, $id_user);
        $query-execute();
    }

    public function update($id_user) {
        $query = $db->prepare("UPDATE users SET email = $email, password = $password WHERE id_user = ?");
        $query->bindParam(1, $id_user);
        $query->bindParam(2, $email);
        $query->bindParam(3, $password);
        $query-execute();
    }

    public function delete($id_user) {
        $query = $db->prepare("DELETE FROM users WHERE id_user = ?");
        $query->bindParam(1, $id_user);
        $query-execute();
    }

    public function read_all() {
        $query = $db->prepare("SELECT * FROM users");
        $query->bindParam(1, $id_user);
        $query-execute();
    }*/
}
