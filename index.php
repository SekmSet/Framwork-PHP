<?php
session_start();
$_SESSION['user_id'] = 2;
define('BASE_URI', str_replace('\\', '/', substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']))));
require_once implode(DIRECTORY_SEPARATOR, ['Core','autoload.php']);
//echo 'toto '. BASE_URI;
$app = new Core\Core();
$app->run();
?>

