<?php

/**
 *Le Controlleur frontal du site, c'est à travers ce
 *fichier que tout passe, on enregistre les différentes
 *routes supportées par le site afin d'afficher les
 *différentes vues qui leur sont associées
 */

require '../vendor/autoload.php';
require '../configs/configs.php';


use App\Controllers\BaseController;
use Gravity\Core\Exceptions\NotFoundException;
use Gravity\Core\Routing\Router;



$router = new Router($_REQUEST['route']);

########################################### Definissez vos routes ########################################### 

$router->get('/', function() {
	(new BaseController())->sendResponse('GRAVITY.welcome', 'GRAVITY.layout');
});


############################################################################################################## 

try {
	$router->run();
} catch(NotFoundException $e) {
	(new BaseController())->sendError($e);
} catch(Exception $e) {
	(new BaseController())->sendError($e, 500);
} 


?>
