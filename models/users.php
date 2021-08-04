<?php

require_once("base.php");

class Users extends Base {

    //get specific user's details
    public function getUserLogin($user) {
        $query = $this->db->prepare("
        SELECT user_id, user_type, username, password, email, phone, full_name, gender
        FROM users
        WHERE email = ?
        ");

        $query->execute([ $user]);
        
        return $query->fetch( PDO::FETCH_ASSOC );
    }

    public function getUserRegister($user) {
        $query = $this->db->prepare("
        SELECT user_id, user_type, username, password, email, phone, full_name, gender
        FROM users
        WHERE username = ?
        ");

        $query->execute([ $user]);
        
        return $query->fetch( PDO::FETCH_ASSOC );
    }

    //gets admin
    public function getAdmin(){
        $query = $this->db->prepare("
        SELECT user_id, user_type, username, password, email, full_name
        FROM users
        WHERE user_type = 'admin'
        ");

        $query->execute([]);
        
        return $query->fetch( PDO::FETCH_ASSOC );
    }

    //get all users
    public function getAllUsers() {
        $query = $this->db->prepare("
        SELECT user_id, username, email
        FROM users
        WHERE user_id > 1
        ");

        $query->execute([]);
        
        return $query->fetchAll( PDO::FETCH_ASSOC );
    }

    public function createUser($user) {
        
        $query = $this->db->prepare("
            INSERT INTO users
            (user_type, username, password, email, phone, full_name, gender)
            VALUES('user', ?, ?, ?, ?, ?, ?)
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

    public function deleteUser($id)
    {
        $query = $this->db->prepare("
            DELETE FROM users
            WHERE user_id = ?
        ");
        $query->execute([
            $id
        ]);

        return $query->fetch(PDO:: FETCH_ASSOC);
    }
}