<?php
namespace Core ;

class Core
{

//    private $params=[];

    public function run()
    {
        include('src/routes.php');

        $uri = $_SERVER['REQUEST_URI'];
        $uri_array = explode('?',$uri);


        Router::get($uri_array[0]);

        //echo __CLASS__ . ' [ OK ]' . PHP_EOL ;

        /* $uri = $_SERVER['REQUEST_URI'];
         $array_uri=explode('/',$uri);
         print_r($array_uri);

         $method = strtolower(array_pop($array_uri));
         $class_name = ucfirst(array_pop($array_uri));
         $controller_name = 'Controller\\'.$class_name.'Controller';

         if(empty($method) && $class_name === 'MVC_PiePHP') {
             $new_controller_name = 'Controller\\'.'App'.'Controller';

             $controller =  new $new_controller_name();
             call_user_func_array([$controller, 'index'], $this->params );
             die;
         }

         if (class_exists($controller_name)){
             $controller =  new $controller_name();

             if(method_exists($controller,$method)){
                 call_user_func_array([$controller, $method], $this->params );
             } else {
                 echo '404';
             }
         } else{
             echo '404';
         }*/
    }
}
