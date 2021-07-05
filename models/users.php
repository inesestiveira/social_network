<?php

require("base.php");

class Users extends Base {

    public function getDetail($username) {
        $query = $this->db->prepare("
        SELECT user_id, username, password, email, phone, full_name
        FROM users
        WHERE username = ?
        ");

        $query->execute([ $username ]);
        
        return $query->fetch( PDO::FETCH_ASSOC );
    }

    public function create($user) {
        
        
        $query = $this->db->prepare("
            INSERT INTO users
            (username, password, email, phone, full_name)
            VALUES(?, ?, ?, ?, ?)
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