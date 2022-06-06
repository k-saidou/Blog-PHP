<?php

use App\Routes\Router;
use GuzzleHttp\Psr7\ServerRequest;

use function Http\Response\send;

require_once '../vendor/autoload.php';
require_once '../DataBase/config.php';
/*
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ .'../../templates');
$twig = new \Twig\Environment($loader, [
    'cache' => false //  '/path/to/compilation_cache',
]);

$router = new Router($_GET['url']);

$router->get('/', 'App\Controllers\Controller@index');
$router->get('/posts/:id', 'App\Controllers\Controller@show');

$router->run();
*/

$app = new App\FramApp\App([
    \App\Module\BlogModule::class
]);

$response = $app->run(ServerRequest::fromGlobals());
send($response);
