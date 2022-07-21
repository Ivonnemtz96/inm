<?php
include_once('database_conf/database.php');
define('SS_DB_NAME', 'arketll6_inmobiliaria');
define('SS_DB_USER', 'arketll6_inmobiliaria');
define('SS_DB_PASSWORD', '3b;0?]WUZ_)o');
define('SS_DB_HOST', 'localhost');

$dsn	= 	"mysql:dbname=".SS_DB_NAME.";host=".SS_DB_HOST."";
$pdo	=	"";
try {
	$pdo = new PDO($dsn, SS_DB_USER, SS_DB_PASSWORD);
}catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
$db = new Database($pdo);

?>
