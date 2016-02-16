<?php
/**
 * Класс отвечает за рендер страницы а так же конкретных ее елементов
 */
class PageView {

	private $template;
	private $views = array();

	public function __construct($templateFileName) {
		$this->template = $templateFileName;
	}

	public function addView(View $view) {
		$this->views[] = $view;
	}

	
	public function __toString() {
		
		$views = $this->views;
		$filename = INDEX_DIR."/view/". $this->template . ".tpl.php";

		ob_start();
        include($filename);
        $output = ob_get_contents();
        ob_end_clean();

        return $output;
	}
}
