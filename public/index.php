<?php


//this code is to test if the file is available and its ok
//require_once __DIR__.'/../app/init.php';
//$test = new Test();
//this 
//var_dump(get_declared_classes())

// It’s like a traffic controller for the website, deciding where to send the user based on the URL they enter. If it doesn't know the URL, it gives a 404 error.

require_once __DIR__ . '/../app/init.php';
require_once __DIR__ . '/../routes/web.php';


// $request = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';

//This PHP code extracts the path from the current request URL.

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$method = $_SERVER['REQUEST_METHOD'];


 if(isset($routes[$method][$request])){


//  
list($controller, $action) = explode('@', $routes[$method] [$request]);
require_once __DIR__ . '/../app/controllers/' . $controller . '.php';

// Create a new controller object
$controllerInstance = new $controller;
// Call the function inside the controller
$controllerInstance ->$action();



 }







// }else {

// http_response_code(404);

// echo "404 Not found";
// }


// if(array_key_exists($request, $routes)){

// $route = explode('@', $routes[$request]);
// $controllerName = $route[0];
// $methodName = $route[1];
// $controller = new $controllerName();
// $controller->$methodName();

// } else {
// echo "404 it does not exist";

// }



?>