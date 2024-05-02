<?php

/**
 *Le Controlleur frontal du site, c'est à travers ce
 *fichier que tout passe, on enregistre les différentes
 *routes supportées par le site afin d'afficher les
 *différentes vues qui leur sont associées
 */

require '../vendor/autoload.php';
require '../configs/configs.php';


use Gravity\Core\App\Controllers\Controller;
use Gravity\Core\Exceptions\NotFoundException;
use Gravity\Core\Routing\Router;



$router = new Router($_REQUEST['route']);

########################################### Definissez vos routes ########################################### 

$router->get('/', function() {
	(new Controller())->renderView('GRAVITY.welcome', 'GRAVITY.layout');
});


############################################################################################################## 

try {
	$router->run();
} catch(NotFoundException $e) {
	(new Controller())->renderView('GRAVITY.ERRORS.404', 'GRAVITY.layout', ['error'=>$e]);
} catch(Exception $e) {
	(new Controller())->renderView('GRAVITY.ERRORS.internal', 'GRAVITY.layout', ['error'=>$e]);
} 


?>