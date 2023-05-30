<?php

/**
 *Le Controlleur frontal du site, c'est à travers ce
 *fichier que tout passe, on enregistre les différentes
 *routes supportées par le site afin d'afficher les
 *différentes vues qui leur sont associées
 */

require '../vendor/autoload.php';
require '../config/configs.php';

use Gravity\Core\App\Controllers\Controller;
use Gravity\Core\Routing\Exceptions\NoRouteException;
use Gravity\Core\Routing\Exceptions\ControllerException;
use Gravity\Core\Routing\Router;

$router = new Router($_REQUEST['route']);

//Page d'accueil
$router->get('/', 'Gravity\Core\App\Controllers\HomeController@index');

/** 
 *  Ou bien
 * $router->get('/', function () {
 *	return (new Controller())->renderView('Home.index','layout');
 *});
 *
 */
$router->get('/details/:id', 'Gravity\Core\App\Controllers\HomeController@details');


try {
	$router->run();
} catch(NoRouteException $e) {
	(new Controller())->renderView('Errors.404', 'layout', ['error'=>$e]);
} catch(ControllerException $e) {
	(new Controller())->renderView('Errors.internal', 'layout', ['error'=>$e]);
} 


?>