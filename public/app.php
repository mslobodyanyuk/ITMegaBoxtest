<?php
require __DIR__ . '/../vendor/autoload.php';
use \app\Kernel\Kernel;
use \app\Controllers;

/*
 * Loading design classes
 */
spl_autoload_register(
    function($class){
        $path = realpath (__DIR__ . '/../'.str_replace("\\","/",$class.".php"));
		if(!file_exists($path)){
            echo  'Path abnormal: ',$path;
            echo  '<br/>class name: ',$class;
            echo  '<br/>__DIR__ : ', __DIR__;
            echo  '<br/>/../.str_replace("\\","/",$class.".php"): '.'/../'.str_replace("\\","/",$class.".php");
		}
		else{
			require_once $path;
		}
    }
);

/*
 * Loaded configuration is transmitted to the router receives data from the controller,
 * performed the desired controller method gets the result of this in the init().
 * reads route.yml convert it into an array and passed to the constructor of the router,
 * proofreading is performed in Kernel - method readRouteConfig($file).
 */
$kernel = Kernel::getInstance();
$file = __DIR__ . '/../config/route.yml';
$kernel->init($file);


// getRoute() method returns the Route object.
$route = $kernel->getRoute();
$url = $_SERVER['REQUEST_URI'];
/*
 * Method match($url) (match - case pick up a pair, match)
 * goes through $this -> routeParams and is an option.
 * return the desired settings - returns array( 'controller' => 'controller', 'action' => 'method' ).
 */
$routeParams = $route->match($url);
/*
 * Method process($param), it fulfills in the controller
 * separate class (app\Controllers\Controller()) and method (indexAction)
 * and creates a $controller = new app\Controllers\Controller(), returns the data to render().
 * it is necessary to perform a controller method and obtain the data and return from it.
 * $param = [ '/', 'app\Controllers\Controller.indexAction' ];
 */
$controllerParams = $kernel->process($routeParams);

/*
 * The method render($routeParams, $controllerParams) performs mapping result of the work
 */
$kernel->render($routeParams, $controllerParams); 

?>

