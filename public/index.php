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
use Gravity\Core\Exceptions\BadMethodException;
use Gravity\Core\Exceptions\BadRequestException;
use Gravity\Core\Exceptions\NotFoundException;
use Gravity\Core\Exceptions\UnauthenticatedException;
use Gravity\Core\Exceptions\UnauthorizedException;
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
	(new BaseController())->sendError("Not found error", $e->getMessage());
} catch(BadRequestException $e) {
	(new BaseController())->sendError("Request error", $e->getMessage(), 400);
} catch(UnauthenticatedException $e) {
	(new BaseController())->sendError("Unauthorized", $e->getMessage(), 401);
} catch(UnauthorizedException $e) {
	(new BaseController())->sendError("Unauthorized", $e->getMessage(), 403);
} catch(BadMethodException $e) {
	(new BaseController())->sendError("Method not allowed", $e->getMessage(), 405);
}catch(\Exception $e) {
	(new BaseController())->sendError("Internal error", $e->getMessage(), 503);
}


?>
