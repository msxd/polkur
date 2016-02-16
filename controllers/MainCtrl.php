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

	public function posts(){
		var_dump($this->db->query("SELECT FROM `comments`"));
		$this->loadModel('post');
//		var_dump($this->post->getPosts());
	}
}
