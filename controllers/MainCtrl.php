<?php
/**
 * use
 * Plik kontorlera, tutaj będą wykonywane wszystkie operacje na otrzymanych danych
 */

class MainCtrl extends Controller{

	private function loadModel($modelClassName){
		if(file_exists('models/'.$modelClassName.'.php')){
			include_once('models/'.$modelClassName.'.php');
			@$this->$modelClassName  = new $modelClassName();
		}
	}

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

		$view = $this->view->load('post/list',$data);
		$this->page->addView($view,'column_right');
		echo $this->page->render();
	}

	public function view(){
		if(isset($_GET['post_id'])){

			$this->page->setTitle('Post info');
			$this->page->addStyle('stylesheet.css');

			$this->loadModel('post');
			$this->loadModel('comment');

			$post_info = $this->post->getPost($_GET['post_id']);
			$comments = $this->comment->getCommentsForPost($post_info->post_id);
//				foreach($comments as $key => $comment){
//					if($comment->user_id !== 0 && $comment->user_id == $this->user->getId()){

//					}
//				}
			$data = array();
			$data['post'] = $post_info;
			$data['comments'] = $comments;

			$this->page->addView('post/view',$data,'column_right');
			$this->page->addView('comment/create',$data,'column_right');

			echo $this->page->render();

		}
	}

}
