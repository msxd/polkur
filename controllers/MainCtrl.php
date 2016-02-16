<?php
/**
 * use
 * Plik kontorlera, tutaj będą wykonywane wszystkie operacje na otrzymanych danych
 */

class MainCtrl extends Controller{

	public $erros = array();

	public function comments() {

		$data = array(
			'title' => 'Tu będą komentarze',
			'info' => 'Komentarze te będzie można edytować.'
		);

		$view = new View('Comments', $data);
		$this->page->addView($view);

	}

	public function index(){

		$this->page->setTitle('Post list');
		$this->page->addStyle('stylesheet.css');


		$this->loadModel('post');
		$posts = $this->post->getPosts();

		foreach($posts as $key => $post){
			$posts[$key]->view_link = $this->url->link('MainCtrl/view',"post_id=$post->post_id");
		}

		$data['posts'] = $posts;


		$this->page->addView('post/list',$data,'column_right');
		echo $this->page->render();
	}

	public function view(){
		if(isset($_GET['post_id'])){

			$this->page->setTitle('Post info');
			$this->page->addStyle('stylesheet.css');
			$this->page->addscript('js.js');

			$this->loadModel('post');
			$this->loadModel('comment');

			$post_info = $this->post->getPost($_GET['post_id']);

			if(!empty($_POST)){
				if(empty($_POST['user']))
					$this->erros['user'] = "Please enter your name";
				if(empty($_POST['comment']))
					$this->erros['comment'] = "Please enter your comment";
				if(!empty($_POST['comment_id']) && !$this->user->hasComment($_POST['comment_id']))
					$this->erros['comment'] = "Please Fuck yourself";

				if(empty($this->erros)){
					if(isset($_POST['comment_id']) && !empty($_POST['comment_id']))
						$this->comment->editComment($_POST);
					else{
						$comment_id = $this->comment->addComment($_POST,$post_info->post_id);
						array_push($_SESSION['comments'],$comment_id);
					}
				}else
					$data2['errors'] = $this->erros;

			}

			$comments = $this->comment->getCommentsForPost($post_info->post_id);
			$data = array();

			foreach($comments as $key => $comment){
				$comments[$key]->editable = false;
				if($this->user->hasComment($comment->comment_id))
					$comments[$key]->editable = true;
			}

			$data['post'] = $post_info;
			$data['comments'] = $comments;

			$data2['action'] = $this->url->link('MainCtrl/view',"post_id=$post_info->post_id");


			$this->page->addView('post/view',$data,'column_right');
			$this->page->addView('comment/create',$data2,'column_right');

			echo $this->page->render();

		}
	}

}
