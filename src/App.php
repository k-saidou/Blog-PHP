<?php

namespace App;

use App\Controllers\HomeController;
use App\controllers\PostsController;
use App\controllers\CommentsController;
use App\Router\Route;
use App\Router\Router;
use Exception;

class App
{
    private Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function run(): ?string
    {
        $homeRoute = new Route(
            '/',
            '/home',
            HomeController::class,
            'index'
        );
        $this->router->addRoute($homeRoute);
        $postsRoute = new Route(
            '/posts/index',
            'index',
            PostsController::class,
            'index',
        );
        $this->router->addRoute($postsRoute);        
        $postsRoute = new Route(
            '/posts/new',
            'new',
            PostsController::class,
            'new',
        );
        $this->router->addRoute($postsRoute);
        $postsRoute = new Route(
            "/posts/show/id",
            'show',
            PostsController::class,
            'show',
        );
        $this->router->addRoute($postsRoute);
        $postsRoute = new Route(
            '/posts/read',
            'read',
            PostsController::class,
            'read',
        );
       /* $this->router->addRoute($postsRoute);
        $postsRoute = new Route(
            '/posts/update',
            'update',
            PostsController::class,
            'update',
        );*/
        $this->router->addRoute($postsRoute);
        $postsRoute = new Route(
            '/posts/delete/(\d+)',
            'delete',
            PostsController::class,
            'delete',
        );
        /*$commentsRoute = new Route(
            '/comment/index',
            'index',
            CommentsController::class,
            'index',
        );
        $this->router->addRoute($commentsRoute);
        $commentsRoute = new Route(
            '/comment/new',
            'new',
            CommentsController::class,
            'new',
        );
        $this->router->addRoute($commentsRoute);
        $commentsRoute = new Route(
            '/comment/read',
            'read',
            CommentsController::class,
            'read',
        );
        $this->router->addRoute($commentsRoute);
        $commentsRoute = new Route(
            '/comment/update',
            'update',
            CommentsController::class,
            'update',
        );
        $this->router->addRoute($commentsRoute);*/
        try {
            $route = $this->router->findRoute(); // On demande au routeur de trouver une route
            if ($route instanceof Route) {
                // Si $route est une instance de Route, il y a une correspondance
                $controller = new $route->controller; // On instancie le controller de la route
                $method = $route->method; // On enregistre la méthode pour pouvoir l'appeler sur le controller
                return $controller->$method(); // On exécute la méthode
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return "404";
    }
}