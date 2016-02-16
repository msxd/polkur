<?php
class Post extends model{
    public function getPosts(){
        $sql = "SELECT * FROM `".DB_PREFIX."post`";
        $result = $this->db->query($sql);
        $posts =  $result->fetchAll(PDO::FETCH_CLASS);

        return $posts;
    }

    public function getPost($post_id){
        $sql = "SELECT * FROM `".DB_PREFIX."post` WHERE post_id = $post_id";
        $result = $this->db->query($sql);
        $posts =  $result->fetch(PDO::FETCH_OBJ);
        return $posts;
    }
}