<?php
/**
 * Класс отвечает за рендер страницы а так же конкретных ее елементов
 */
class Page {

	public $template;
	private $views = array();

	public function __construct() {
		if(isset($_SESSION['template'])){
			$this->template = $_SESSION['template'];
		}else{
			$_SESSION['template'] = DEFAULT_TEMPLATE;
			$this->template = DEFAULT_TEMPLATE;
		}
	}

	public function addView(View $view) {
		$this->views[$view->file] = $view;
	}

	
//	public function __toString() {
//
//		$views = $this->views;
//		$filename = INDEX_DIR."/view/". $this->template . ".tpl.php";
//
//		ob_start();
//        include($filename);
//        $output = ob_get_contents();
//        ob_end_clean();
//
//        return $output;
//	}

	public function render(){
		$views = $this->views;
		$filename = INDEX_DIR."/view/$this->template/index.tpl.php";

		ob_start();
        include($filename);
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
	}

	public function setTemplate($template){
		$this->template = $template;
	}
}
