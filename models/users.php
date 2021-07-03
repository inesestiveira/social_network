<?php

require("base.php");

class Users extends Base {

    public function getDetail($username) {
        $query = $this->db->prepare("
        SELECT user_id, username, password, email, phone, full_name, gender
        FROM users
        WHERE username = ?
        ");

        $query->execute([ $username ]);
        
        return $query->fetch( PDO::FETCH_ASSOC );
    }

    public function create($user) {
        $userExists = $this->getDetail( $user["username"] );

        if(!empty($userExists)) {
            return 0;
        }
        
        $query = $this->db->prepare("
            INSERT INTO users
            (username, password, email, phone, full_name, gender)
            VALUES(?, ?, ?, ?, ?, ?)
        ");

        $query->execute([
            $user["username"],
            password_hash($user["password"], PASSWORD_DEFAULT),
            $user["email"],
            $user["phone"],
            $user["full_name"],
            $user["gender"]
        ]);

        return $this->db->lastInsertId();
    }
}