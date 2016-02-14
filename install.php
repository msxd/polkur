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


echo "<pre>";
/**********************************************************USERS START*************************************************/
echo "Creates table 'users'...";
$query = "
CREATE TABLE users (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	create_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	login VARCHAR(255) NOT NULL,
	password TEXT NOT NULL
);
";
$db->query($query);
echo "ok<br>";
echo "Create first user...";
$query = "INSERT INTO users (id,login, password) VALUES (1,'admin', '21232f297a57a5a743894a0e4a801fc3');";
$db->query($query);
echo "ok<br>";

echo "Create second user...";
$user2 = User::store($db, array(
	'login' => 'admin2',
	'password' => '21232f297a57a5a743894a0e4a801fc3'
));
echo "ok [$user2] <br>";
print_r(User::load($db, $user2));
/**********************************************************USERS FINISH************************************************/
/**********************************************************POSTS START*************************************************/
echo "Creates table 'posts'...";
$query = "
CREATE TABLE posts (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	user_id INT NOT NULL,
	create_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	title VARCHAR(255) NOT NULL,
	body TEXT NOT NULL
);
";
$db->query($query);
echo "ok<br>";

echo "Create first post...";
$query = "INSERT INTO posts (user_id, title, body) VALUES (1, 'Hello world','It is first post. Please leave comment :)');";
$db->query($query);
echo "ok<br>";

echo "Create second post...";
$post2 = Post::store($db, array(
	'user_id' => 2,
	'title' => 'Second post',
	'body' => 'Second Post is here'
));
echo "ok [$post2] <br>";
print_r(Post::load($db, $post2));
/**********************************************************POSTS FINISH************************************************/
/**********************************************************COMMENTS START**********************************************/

echo "Creates table 'comments'...";
$query = "
CREATE TABLE comments (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	post_id INT NOT NULL,
	create_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	user VARCHAR(255) NOT NULL,
	user_id INT,
	comment TEXT NOT NULL
);
";
$db->query($query);
echo "ok<br>";

echo "Inserts first comment...";
$query = "
INSERT INTO comments (post_id, user,user_id,comment) VALUES (1,'admin',1, 'Pierwszy komentarz');
";
$db->query($query);
echo "ok<br>";

echo "Inserts second comment...";
$id = Comment::store($db, array(
	'user' => 'ty@com.pl',
	'comment' => 'Drugi komentarz'
));
echo "ok [$id] <br>";
print_r(Comment::load($db, $id));
/**********************************************************COMMENTS FINIS**********************************************/
