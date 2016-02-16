<?php
/**
 * Класс отвечает за обработку файлов видов и переданных им данным, так же отвечает за рендер
 */
class View {

	private $output = '';
	
	/*
	 * $templateFileName - имя файла с виьюхой
	 * $variables - массив данных (имя переменной => значение)
	 */
	function __construct($templateFileName, $variables = array()) {
		
		/* создание локальных переменных доступных для файла вида */
		extract($variables);

        ob_start();

        /* рендер */
        $filename = INDEX_DIR."/view/$templateFileName.tpl.php";
        include($filename);

        /* присвоение рендера в переменную */
        $this->output = ob_get_contents();

        /* восстановление нормальной работі скрипта */
        ob_end_clean();
	}
	
	public function __toString() {
		return $this->output;
	}
}
