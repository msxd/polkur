<?php
class user {
    public $comments = array();

    public function __construct(){
        if(empty($_SESSION['comments']))
            $_SESSION['comments'] = array();

        $this->comments = $_SESSION['comments'];
    }

    public function hasComment($comment_id){
        if(empty($_SESSION['comments']))
            $_SESSION['comments'] = array();

        $this->comments = $_SESSION['comments'];

        if(in_array($comment_id,$this->comments))
            return true;
        else
            return false;
    }

}