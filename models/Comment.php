<?php
class Comment extends model{
    public function getCommentsForPost($post_id){
        $sql = "SELECT * FROM `".DB_PREFIX."comment` WHERE post_id=$post_id";
        $result = $this->db->query($sql);
        $posts =  $result->fetchAll(PDO::FETCH_CLASS);

        return $posts;
    }

    public function addComment($comment,$post_id){
        $sql = "INSERT INTO `".DB_PREFIX."comment` (user,comment,post_id) VALUES('".$comment['user']."','".$comment['comment']."','".$post_id."')";

        $this->db->query($sql);
        return $this->db->lastInsertId('comment_id');
    }

    public function editComment($comment){
        $sql = "UPDATE `".DB_PREFIX."comment` SET user='".$comment['user']."',comment='".$comment['comment']."' WHERE comment_id=".$_POST['comment_id'];
        $this->db->query($sql);
        return $this->db->lastInsertId('comment_id');
    }
}