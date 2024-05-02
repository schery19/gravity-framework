<?php

/**
 *Le Controlleur frontal du site, c'est à travers ce
 *fichier que tout passe, on enregistre les différentes
 *routes supportées par le site afin d'afficher les
 *différentes vues qui leur sont associées
 */

require '../vendor/autoload.php';
require '../config/configs.php';

use App\Http\Resources\ArticleResource;
use Gravity\Core\App\Controllers\ArticleController;
use Gravity\Core\App\Controllers\Controller;
use Gravity\Core\App\Controllers\HomeController;
use Gravity\Core\App\Repository\ArticleRepository;
use Gravity\Core\Routing\Exceptions\ControllerException;
use Gravity\Core\Routing\Exceptions\NotFoundException;
use Gravity\Core\Routing\Router;

$router = new Router($_REQUEST['route']);

########################################### Definissez vos routes ########################################### 

$router->get('/', [HomeController::class,'index']);

$router->get('/details/:id', 'Gravity\Core\App\Controllers\HomeController@details');

$router->get('/callable', function () {
	return (new Controller())->renderJson(['name'=>"Hello"]);
});

$router->get('/article', [ArticleController::class, 'index']);
$router->get('/article/:id', [ArticleController::class, 'show']);
$router->get('/article/user/:id', [ArticleController::class, 'showByUser']);

############################################################################################################## 

try {
	$router->run();
} catch(NotFoundException $e) {
	(new Controller())->renderView('Errors.404', 'layout', ['error'=>$e]);
} catch(ControllerException $e) {
	(new Controller())->renderView('Errors.internal', 'layout', ['error'=>$e]);
} 


?>