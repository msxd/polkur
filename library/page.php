<?php
/**
 * Класс отвечает за рендер страницы а так же конкретных ее елементов
 */
class Page {

	public $template;
	private $views = array();
	private $title = 'Title';
	private $styles = array();
	private $scripts = array();

	public function __construct() {
		if(isset($_SESSION['template'])){
			$this->template = $_SESSION['template'];
		}else{
			$_SESSION['template'] = DEFAULT_TEMPLATE;
			$this->template = DEFAULT_TEMPLATE;
		}
	}

	public function addView($templateView, $variables = array(),$placeholder, $template = null) {

		$view = new View();
		$view = $view->load($templateView,$variables,$template);

		if(!isset($this->views[$placeholder]))
			$this->views[$placeholder] = array();
		$this->views[$placeholder][] = $view;
	}

	public function addStyle($style) {
		$this->styles[] = $filename = TEMPLATE_FOLDER."/$this->template/".TEMPLATE_CSS_FOLDER."/$style";
	}

	public function addScript($script) {
		$this->scripts[] = $filename = TEMPLATE_FOLDER."/$this->template/".TEMPLATE_JS_FOLDER."/$script";
	}

	
	public function render(){
		$views = $this->views;
		$title = $this->title;
		$styles = $this->styles;
		$scripts = $this->scripts;
		$filename = INDEX_DIR."/".TEMPLATE_FOLDER."/$this->template/".TEMPLATE_VIEW_FOLDER."/index.tpl.php";

		ob_start();
        include($filename);
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
	}

	public function setTemplate($template){
		$this->template = $template;
	}

	public function setTitle($title){
		$this->title = $title;
	}
}
