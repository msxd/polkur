<?php
define('INDEX_DIR', __DIR__);

/** class autoloader */
function autoload($className) {
    $classFileName = INDEX_DIR."/class/$className.class.php";
    if (is_file($classFileName)) require_once($classFileName);
}
spl_autoload_register("autoload");


/** database connection */
include_once('config.php');
$db = new DB($dbtype, $dbhost, $dbname, $dbuser, $dbpass);


/** install tables */

echo "Creates table 'comments'...";
$query = "
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `create_time`, `user`, `comment`, `post_id`) VALUES
(1, '2016-02-16 15:24:52', 'ja@com.pl', 'Первый нах', 0),
(2, '2016-02-16 15:24:52', 'ty@com.pl', 'Выше долбаеб', 0);
";
$db->query($query);

echo "Creates table 'posts'...";
$query = "
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(255) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
";
$db->query($query);
echo "ok<br>";
