<?php

namespace Routing;


use App\Controllers\UserController;
use Gravity\Core\Routing\ResourceRoutes;
use Gravity\Core\Routing\Route;


class UsersRoutes extends ResourceRoutes {

    function __construct() {

        $this->get = [
            new Route('/users', [UserController::class, 'index'], 'users.all'),
            new Route('/users/:id', [UserController::class, 'search'], 'users.search'),
        ];
    
        $this->post = [
            new Route('/users', [UserController::class, 'store'], 'users.store'),
            new Route('/users/login', [UserController::class, 'login'], 'users.login'),
            new Route('/users/activate', [UserController::class, 'activate'], 'users.activate'),
            new Route('/users/block/:id', [UserController::class, 'block'], 'users.block'),
            new Route('/reset', [UserController::class, 'reset'],'reset.password'),
            new Route('/change', [UserController::class, 'change_password'], 'password.reset'),
            new Route('/users/unblock/:id', [UserController::class, 'unblock'], 'users.unblock'),
            new Route('/users/:id', [UserController::class, 'update'], 'users.update'),
           new Route('/users/validate/:id', [UserController::class, 'validate'], 'users.validate'),//To validate an user request
            new Route('/users/archived/:id', [UserController::class, 'archivate'], 'users.validate')//To archivate a customer request
        ];

    }

}

?>