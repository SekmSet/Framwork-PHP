<!--<h1>Un autre titre</h1>-->
<!---->
<!--<pre>-->
<?php
////print_r($_GET);
////print_r($_POST);
////print_r($_SERVER);
////?>
<!--</pre>-->

<?php
define('BASE_URI',str_replace('\\', '/',substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']))));
require_once implode(DIRECTORY_SEPARATOR, ['Core','autoload.php']);
echo BASE_URI;

$app = new Core\Core();
$app->run();
