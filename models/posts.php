<?php

require("base.php");

class Posts extends Base {

    public function get() {

        $query = $this->db->prepare("
            SELECT post_id, username
            FROM posts
            WHERE reply_id IS NULL
        ");
        $query->execute();

        return $query->fetchAll( PDO::FETCH_ASSOC );
    }

    public function getDetail($post_id) {

        $query = $this->db->prepare("
            SELECT post_id, message, post_date, username, reply_id
            FROM posts
            WHERE post_id = ? OR reply_id = ?
        ");

        $query->execute([
            $post_id,
            $post_id
        ]);

        return $query->fetchAll( PDO::FETCH_ASSOC );
    }

    public function create($data) {

        $query = $this->db->prepare("
            INSERT INTO posts
            (message, username)
            VALUES(?, ?)
        ");

        $query->execute([
            strip_tags(trim($data["message"])),
            strip_tags(trim($data["username"])),
        ]);

        $redirect_id = $this->db->lastInsertId();
        if( !empty($data["reply_id"]) ) {
            $redirect_id = $data["reply_id"];
        }

        return $redirect_id;
    }
}
