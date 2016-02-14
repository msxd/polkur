<?php

class Post extends DBObject {

	protected static $table = 'posts';

	protected $id;
	protected $user_id;
	protected $create_time;
	protected $title;
	protected $body;

	private $db;
	protected $comments;
	protected $comments_count;



	public function getCommentsCnt($db)
	{

		$this->db = $db;
		if(!isset($this->comments))
			$this->comments = Comment::get($db,array('post_id'=>$this->id));

		$this->comments_count = count($this->comments);
		return $this->comments_count;
	}

	public function getVar($name){
		if(strpos($name,'(')!==false){
			return call_user_func(array($this, substr($name,0,-2)));
		}else
			return $this->$name;
	}

	public function getUserName()
	{
		$user = User::load($this->db,$this->id);
		return ($user->getVar('login'));
	}
}
