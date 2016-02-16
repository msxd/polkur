<?php
class Comment extends DBObject {

	protected static $table = 'comments';

	protected $create_time;
	protected $user;
	protected $comment;
}
