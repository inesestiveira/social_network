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

    
}