<?php

/**
 * Plik kontorlera, tutaj będą wykonywane wszystkie operacje na otrzymanych danych
 */
class Controller
{

	protected $page;
	protected $db;

	public function __construct(PageView $page, DB $db = null)
	{
		$this->page = $page;
		$this->db = $db;
	}

	public function comments()
	{

		$data = array(
			'title' => 'Tu będą komentarze',
			'info' => 'Komentarze te będzie można edytować.'
		);

		$view = new View('Comments', $data);
		$this->page->addView($view);
	}


	public function main($page = 0)
	{
		if($page!==0)
			$page -=1;
		else
			$page = 0;


			$limit = 4;
		$offset = $page * $limit;
		$data = Post::get($this->db,array(), $limit, $offset);
		foreach($data as $d){
			$d->getCommentsCnt($this->db);
		}
		$view = new View('Post', $data);
		$this->page->addView($view);


		$cnt = Post::getPagesCnt($this->db,array(),$limit,'posts');
		$data = array('cnt'=>$cnt, 'cur'=>$page);
		$view = new View('Pagination', $data);
		$this->page->addView($view);
	}


	public function readPost($id)
	{
		$post = Post::load($this->db,$id);
		$post->getCommentsCnt($this->db);
		$data = array(
			'id' => $post->getVar('id'),
			'user' => $post->getUserName(),
			'time' => $post->getVar('create_time'),
			'title' => $post->getVar('title'),
			'body' => $post->getVar('body')
		);

		$v = new View('Single',$data);
		$this->page->addView($v);

		foreach($post->getVar('comments') as $comment){
			$ar = array(
				'text'=>$comment->getVar('comment'),
				'author' => $comment->getVar('user'),
				'time' => $comment->getVar('create_time')
			);
			$vw = new View('Comments',$ar);
			$this->page->addView($vw);

		}
	}


}
