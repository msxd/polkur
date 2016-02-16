<?php
session_start();
define('INDEX_DIR', __DIR__);
error_reporting(E_ALL);
ini_set('display_errors', 1);

function autoload($className) {
    $classFileName = INDEX_DIR."/class/$className.class.php";
    if (is_file($classFileName)) require_once($classFileName);
}

// including system files such as model & controller
$system_files = scandir('system/');
if(count($system_files) > 2){
    unset($system_files[0]);
    unset($system_files[1]);
    foreach($system_files as $key => $file){
        require_once('system/'.$file);
    }
}


// including library files such as db
$system_files = scandir('library/');
if(count($system_files) > 2){
    unset($system_files[0]);
    unset($system_files[1]);
    foreach($system_files as $key => $file){
        require_once('library/'.$file);
    }
}

// including library files such as db
$system_files = scandir('controllers/');
if(count($system_files) > 2){
    unset($system_files[0]);
    unset($system_files[1]);
    foreach($system_files as $key => $file){
        require_once('controllers/'.$file);
    }
}

/*делаем автозагрузку классов*/
spl_autoload_register("autoload");

include_once('config.php');


$page = new Page();

if ( isset($_GET['controller']) ) {
    $controller = $_GET['controller'];

    if (isset($_GET['action']) ) {
        $controller = new $controller();
        $action = $_GET['action'];
        $controller->$action();
    }else{
        $controller = new $controller();
        $controller->index();
    }
}else {

    $controller = new MainCtrl();
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        $controller->$action();
    }else{
        $controller->index();
    }
}





