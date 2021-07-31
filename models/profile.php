<?php


require_once("base.php");

class Users extends Base {

//get specific user's details
    public function getUser($user) {
        $query = $this->db->prepare("
        SELECT user_id, username, password, email, phone, full_name
        FROM users
        WHERE email = ? AND user_id = ?
        ");

        $query->execute([ $user, $user ]);
        
        return $query->fetchAll( PDO::FETCH_ASSOC );
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

//create user
    public function createUser($user) {
        
        
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
        ]);

        return $this->db->lastInsertId();
    }
}

class Posts extends Base {

//get all posts
    public function get() {

        $query = $this->db->prepare("
            SELECT post_id, user_id
            FROM posts
            WHERE reply_id IS NULL
        ");
        $query->execute();

        return $query->fetchAll( PDO::FETCH_ASSOC );
    }


    public function getPost($data) {

        $query = $this->db->prepare("
        SELECT post_id, user_id, message, post_date
        FROM posts
        WHERE post_id = ?
            ORDER BY post_date DESC
        ");

        $query->execute([$data["post_id"]]);

        return $query->fetchAll( PDO::FETCH_ASSOC );
    }

    public function showUserPost($data) {

        $query = $this->db->prepare("
        SELECT message, post_date
        FROM posts
        WHERE user_id = ?
        ORDER BY post_date DESC
        ");

        $query->execute([$data]);

        return $query->fetchAll( PDO::FETCH_ASSOC );
    }

    public function getAllPosts(){
        $query = $this->db->prepare("
        SELECT post_id, user_id, message, post_date, username
        FROM posts
        ORDER BY post_date DESC
    ");

    $query->execute([
    ]);

    return $query->fetchAll( PDO::FETCH_ASSOC );
    }

    public function createPost($data) {

        $query = $this->db->prepare("
            INSERT INTO posts
            (message, user_id, username)
            VALUES(?, ?, ?)
        ");

        $query->execute([
            strip_tags(trim($data["message"])),
            $data["user_id"],
            strip_tags(trim($data["username"]))
        ]);

        $redirect_id = $this->db->lastInsertId();
        if( !empty($data["reply_id"]) ) {
            $redirect_id = $data["reply_id"];
        }

        return $redirect_id;
    }
}
