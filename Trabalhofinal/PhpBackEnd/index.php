<?php

header("Access-Control-Allow-Origin: *");
//define('PASTAPROJETO', 'jumper');
define('PASTAPROJETO', 'PHPBACKEND');

/* Função criada para retornar o tipo de requisição */
function checkRequest() {
	$method = $_SERVER['REQUEST_METHOD'];
	switch ($method) {
	  case 'PUT':
	  	$answer = "update";
	    break;
	  case 'POST':	  
	  	$answer = "post";
	    break;
	  case 'GET':
	  	$answer = "get";
	    break;
	  case 'DELETE':
	  	$answer = "delete";
	    break;	
	  default:
	    handle_error($method);  
	    break;
	}
	return $answer;
}

$answer = checkRequest();

$request = $_SERVER['REQUEST_URI']; 

// IDENTIFICA A URI DA REQUISIÇÃO


$args = explode('/', rtrim($request, '/'));
$endpoint = array_shift($args);
if (array_key_exists(0, $args) && !is_numeric($args[0])) {
    $verb = array_shift($args);
}

if ($args) {
	$request = '/'.PASTAPROJETO.'/'.$args[0];
}

switch ($request) {
    case '/'.PASTAPROJETO:
      require __DIR__ . '/api/api.php';
        break;
    case '/'.PASTAPROJETO.'/' :
        require __DIR__ . '/api/api.php';
        break;
    case '' :
        require __DIR__ . '/api/api.php';
        break;
    case '/'.PASTAPROJETO.'/carga' :
        require __DIR__ . '/api/'.$answer.'_carga.php';
        break;
    default:
        //require __DIR__ . '/api/404.php';
        break;
}
