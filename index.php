<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
require_once "config/db.php";
require_once "config/routes.php";
require_once "vendor/autoload.php";

use Models\Database;
use Routes\Router;

$dt = new Database();

$router = Router::fromGlobals();

$router->add($routes);

if ($router->isFound()) {

	$router->executeHandler(
		$router->getRequestHandler(),
		$router->getParams()
	);
} else {

	$router->executeHandler(function () {
		http_response_code(404);
		echo '404 Not found';
	});
}
