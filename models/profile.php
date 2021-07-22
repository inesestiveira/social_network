<?php


require("base.php");

class Users extends Base {

//get specific user's details
    public function getDetail($user) {
        $query = $this->db->prepare("
        SELECT user_id, username, password, email, phone, full_name
        FROM users
        WHERE email = ? AND user_id = ?
        ");

        $query->execute([ $user, $user ]);
        
        return $query->fetchAll( PDO::FETCH_ASSOC );
    }
//get all users
    public function get() {
        $query = $this->db->prepare("
        SELECT user_id, username, password, email, phone, full_name
        FROM users
        ");

        $query->execute([]);
        
        return $query->fetchAll( PDO::FETCH_ASSOC );
    }

//create user
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


    public function getDetail($post_id) {

        $query = $this->db->prepare("
            SELECT post_id, user_id, message, post_date
            FROM posts
                INNER JOIN users USING (user_id)
            WHERE posts.user_id = users.user_id
            ORDER BY post_date DESC
        ");

        $query->execute([]);

        return $query->fetchAll( PDO::FETCH_ASSOC );
    }

    public function getAll($post_id){
        $query = $this->db->prepare("
        SELECT post_id, user_id, message, post_date
        FROM posts
        WHERE post_id = ?
        ORDER BY post_date DESC
    ");

    $query->execute([
        $post_id
    ]);

    return $query->fetchAll( PDO::FETCH_ASSOC );
    }

    public function create($data) {

        $query = $this->db->prepare("
            INSERT INTO posts
            (message, user_id)
            VALUES(?, ?)
        ");

        $query->execute([
            strip_tags(trim($data["message"])),
            //strip_tags(trim($data["username"])),
            $data["user_id"]
        ]);

        $redirect_id = $this->db->lastInsertId();
        if( !empty($data["reply_id"]) ) {
            $redirect_id = $data["reply_id"];
        }

        return $redirect_id;
    }
}
