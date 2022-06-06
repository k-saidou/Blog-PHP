<?php

namespace App\Router;

use App\Router\Route;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Expressive\Router\FastRouteRouter;
use Zend\Expressive\Router\Route as ZendRoute;
use Psr\Http\Server\MiddlewareInterface;

/*
class Router {

    public $url;
    public $routes = [];

    public function __construct($url)
    {
        $this->url = trim($url, '/');
    }
*/
    /**
     * Get the value of url
     */
 /*   public function get(string $path, string $action)
    {
        $this->routes['GET'][] = new route($path, $action);
    }

    public function run()
    {
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches($this->url)) {
                $route->execute();
            }
        }

        return header('HTTP/1.0 404 Not Found');
    }
}*/

/**
 * Register and match routes
 */
class Router
{

    /**
     * @var FastRouteRouter
     */
    private $router;

    public function __construct()
    {
        $this->router = new FastRouteRouter();
    }


    /**
     * @param string $path
     * @param callable $callable
     * @param string $name
     */
    public function get(string $path, callable $callable, string $name)
    {
        $this->router->addRoute(new ZendRoute($path, $callable, ['GET'], $name));
    }

    /**
     * @param ServerRequestInterface $request
     * @return Route|null
     */
    public function match(ServerRequestInterface $request): ?Route
    {

        $result = $this->router->match($request);
        if ($result->isSuccess()) {
                    return new Route(
                        $result->getMatchedRouteName(),
                        $result->getMatchedMiddleware(),
                        $result->getMatchedParams()
                    );
        }
        return null;
    }

    public function generateUri(string $name, array $params): ?string
    {
        return $this->router->generateUri($name, $params);
    }
}
