<?php

require("base.php");

class Posts extends Base {

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

        $query->execute([
            
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
