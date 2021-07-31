<?php

require_once("base.php");

class Users extends Base {

    public function getUser($user) {
        $query = $this->db->prepare("
        SELECT user_id, user_type, username, password, email, phone, full_name
        FROM users
        WHERE email = ?
        ");

        $query->execute([ $user ]);
        
        return $query->fetch( PDO::FETCH_ASSOC );
    }

    //gets admin
    public function getAdmin(){
        $query = $this->db->prepare("
        SELECT user_id, user_type, username, password, email, phone, full_name
        FROM users
        WHERE user_type = 'admin'
        ");

        $query->execute([]);
        
        return $query->fetch( PDO::FETCH_ASSOC );
    }

    //get all users
    public function getAllUsers() {
        $query = $this->db->prepare("
        SELECT user_id, username, password, email, phone, full_name
        FROM users
        WHERE user_id > 1
        ");

        $query->execute([]);
        
        return $query->fetchAll( PDO::FETCH_ASSOC );
    }

    public function createUser($user) {
        
        $query = $this->db->prepare("
            INSERT INTO users
            (user_type, username, password, email, phone, full_name)
            VALUES('user', ?, ?, ?, ?, ?)
        ");

        $query->execute([
            $user["username"],
            password_hash($user["password"], PASSWORD_DEFAULT),
            $user["email"],
            $user["phone"],
            $user["full_name"]
            //$user["gender"]
        ]);

        return $this->db->lastInsertId();
    }
}