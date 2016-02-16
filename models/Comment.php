<?php
class Comment extends model{
    public function getCommentsForPost($post_id){
        $sql = "SELECT * FROM `".DB_PREFIX."comment` WHERE post_id=$post_id";
        $result = $this->db->query($sql);
        $posts =  $result->fetchAll(PDO::FETCH_CLASS);

        return $posts;
    }
}