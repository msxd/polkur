<?php
class Comment extends DBObject {

	protected static $table = 'comments';

	protected $id;
	protected $post_id;
	protected $create_time;
	protected $user;
	protected $user_id;
	protected $comment;

	public function getVar($name){
		if(strpos($name,'(')!==false){
			return call_user_func(array($this, substr($name,0,-2)));
		}else
			return $this->$name;
	}
}
