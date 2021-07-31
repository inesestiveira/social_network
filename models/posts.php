<?php

require_once("base.php");

class Posts extends Base {

    
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

    public function deletePost($id)
    {
        $query = $this->db->prepare("
            DELETE FROM posts
            WHERE post_id = ?
        ");
        $query->execute([
            $id
        ]);

        return $query->fetch(PDO:: FETCH_ASSOC);
    }
}
    