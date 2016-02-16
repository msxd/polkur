<?php
class Post extends model{
    public function getPosts(){
        $sql = "SELECT p.*,c.* FROM `".DB_PREFIX."post` as p LEFT JOIN `".DB_PREFIX."comment` as c ON p.post_id = c.comment_id";
        $result = $this->db->query($sql);
        $posts =  $result->fetchAll(PDO::FETCH_CLASS);

        return $posts;
    }
}