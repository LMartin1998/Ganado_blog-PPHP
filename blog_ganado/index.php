<?php 

include('config/config.php');

$url        = !empty($_GET['url']) ? $_GET['url'] : 'BlogC/BlogC';
$arr_url    = explode('/', $url);
$controller = $arr_url[0] ;
$metodo     = $arr_url[0] ;
$params     = '';

if(!empty($arr_url[1])){
    if($arr_url[1] != ""){
        $metodo = $arr_url[1];
    }
}
if(!empty($arr_url[2])){
    if($arr_url[2] != ""){
        for ($i=2; $i < count($arr_url); $i++) { 
            # code...
            $params = $arr_url[$i].',';

        }
    }
}


 
// Busca las clases dentro del controlador del que se trabaja
spl_autoload_register(function($class){
    if (file_exists('helpers/'.$class.'.php')) {
        # code...
        require_once('helpers/'.$class.'.php');
    }
});

// Buscará al controlador que se quiere acceder
$controller_file = 'controllers/'.$controller.'.php';

if (file_exists($controller_file)){
    require_once($controller_file);
    $controller = new $controller();
    if(method_exists($controller, $metodo)){
        $controller->{$metodo}($params);  
    } else {
        //Vista de error
        echo 'Error 404';
    }
}   else {
    echo 'Error 4046';
} 


?>