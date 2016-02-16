<?php
/**
 * Класс отвечает за обработку файлов видов и переданных им данным, так же отвечает за рендер
 */
class View {

	private $output;
	private $template;
	public $file;

	/*
	 * $templateFileName - имя файла с виьюхой
	 * $variables - массив данных (имя переменной => значение)
	 */
	function __construct() {
		if(isset($_SESSION['template']))
			$this->template = $_SESSION['template'];
		else
			$this->template = DEFAULT_TEMPLATE;
	}

	public function load($templateView, $variables = array(), $template = null)
	{
		$this->file = $templateView;
		if(!$template){
			$template = $_SESSION['template'];
		}
		/* создание локальных переменных доступных для файла вида */

		extract($variables);
		unset($variables);
		ob_start();

		/* рендер */
		$filename = INDEX_DIR."/".TEMPLATE_FOLDER."/$template/".TEMPLATE_VIEW_FOLDER."/$templateView.tpl.php";
		include($filename);

		/* присвоение рендера в переменную */
		$this->output = ob_get_contents();

		/* восстановление нормальной работі скрипта */
		ob_end_clean();

		return $this;
	}
	
	public function __toString() {
		return $this->output;
	}
}
