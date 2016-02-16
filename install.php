<?php
define('INDEX_DIR', __DIR__);

/** class autoloader */
function autoload($className) {
    $classFileName = INDEX_DIR."/library/$className.class.php";
    if (is_file($classFileName)) require_once($classFileName);
}
spl_autoload_register("autoload");


/** database connection */
include_once('config.php');
include_once('library/db.php');
$db = new DB();


/** install tables */

echo "Creates table 'comments'...";
$query = "
CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comment` (`create_time`, `user`, `comment`, `post_id`) VALUES
('2016-02-16 15:24:52', 'ja@com.pl', 'Первый нах', 1),
('2016-02-16 15:24:52', 'ty@com.pl', 'Выше долбаеб', 1),
('2016-02-16 15:24:52', 'ja@com.pl', 'Первый нах', 2),
('2016-02-16 15:24:52', 'ty@com.pl', 'Выше долбаеб', 2),
('2016-02-16 15:24:52', 'ja@com.pl', 'Первый нах', 3),
('2016-02-16 15:24:52', 'ty@com.pl', 'Выше долбаеб', 3),
('2016-02-16 15:24:52', 'ja@com.pl', 'Первый нах', 4),
('2016-02-16 15:24:52', 'ty@com.pl', 'Выше долбаеб', 4)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `post` (`text`, `date`, `title`) VALUES
('ывфвыф', '2016-02-16 18:55:34', 'ывфвыфыфв'),
('ывфвыф', '2016-02-16 18:55:34', 'ывфвыфыфв'),
('ывфвыф', '2016-02-16 18:55:34', 'ывфвыфыфв'),
('ывфвыф', '2016-02-16 18:55:34', 'ывфвыфыфв'),
('ывфвыф', '2016-02-16 18:55:34', 'ывфвыфыфв'),
('ывфвыф', '2016-02-16 18:55:34', 'ывфвыфыфв'),
('ывфвыф', '2016-02-16 18:55:34', 'ывфвыфыфв'),
('ывфвыф', '2016-02-16 18:55:34', 'ывфвыфыфв'),
('ывфвыф', '2016-02-16 18:55:34', 'ывфвыфыфв'),
('ывфвыф', '2016-02-16 18:55:34', 'ывфвыфыфв'),
('ывфвыф', '2016-02-16 18:55:34', 'ывфвыфыфв'),
('ывфвыф', '2016-02-16 18:55:34', 'ывфвыфыфв');
";
$db->query($query);
echo "ok<br>";
