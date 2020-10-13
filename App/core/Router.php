<?php  

namespace App\core;
use App\controllers\IndexController;
class Router {
	public $routes;

	public function __construct(){
		$routesPath = (require __DIR__.'/config.php')['routes'];

		$this->routes = $routesPath;
	}

	private function getURI(){
		if(!empty($_SERVER['REQUEST_URI'])){
			return trim($_SERVER['REQUEST_URI'], '/');
		}

	}
//принимает управление от front controller
	public function run(){
		$uri = $this->getURI();
		
		if($uri == ''){
			$obj = new IndexController;
			require $obj->main();

		}

		foreach($this->routes as $URIpattern => $path){
			 if(preg_match($URIpattern, $uri)){
							$internalRoute = preg_replace($URIpattern, $path, $uri);
				//$seg = explode('/', $path); // for controller and action
			
				$segments = explode('/', $internalRoute); // for params
				
				//echo $internalRoute;
				$controllerName = ucfirst(array_shift($segments).'Controller');
			 	$actionName = array_shift($segments);
			 
			 	$params = $segments;

			 	$controllerFullName = 'App\controllers\\'.$controllerName;
			 	
			 	$obj = new $controllerFullName;
			 	$obj->$actionName($segments);
			 	
			 
			 	
			 	if($result != null){
			 		break;
			 	}
			 }

	}
}
}