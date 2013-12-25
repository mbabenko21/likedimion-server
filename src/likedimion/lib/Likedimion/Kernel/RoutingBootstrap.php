<?php
/**
 * Created by PhpStorm.
 * User: Maksim
 * Date: 26.12.13
 * Time: 1:28
 */

namespace Likedimion\Kernel;


use Exception;
use Likedimion\Common\StringCommon;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Router;
use Symfony\Component\Routing\RouterInterface;

class RoutingBootstrap
{
    /** @var array */
    protected $_config;

    public function __construct(array $config)
    {
        $this->_config = $config;
        $this->routing();
    }

    protected function routing()
    {
        $routesDir = StringCommon::replaceKeyWords($this->_config["router"]["routes_dir"]);
        $routesFile = $this->_config["router"]["routes_file"];

        $loader = new YamlFileLoader(new FileLocator($routesDir));
        $loader->load($routesFile);

        $context = new RequestContext();
        $context->fromRequest(Request::createFromGlobals());

        //$matcher = new UrlMatcher($collection, $context);

        $router = new Router($loader, $routesFile);
        $this->action($router, $context);
    }

    public function action(RouterInterface $router, RequestContext $context)
    {
        $request = Request::createFromGlobals();

        $bPath = $context->getPathInfo();
        try {
            $parameters = $router->match($bPath);
            var_dump($parameters);
            $_controller = $parameters["_controller"];
            $_controller = explode(":", $_controller);
            $class = $_controller[0];
            $action = strtolower($_controller[1])."Action";
            $class = new $class();
            ob_start();
            if(method_exists($class, $action)){
                $class->$action($request, new JsonResponse());
                $response = new Response(ob_get_clean());
            } else {
                $response = new Response('Not Found', 404);
            }
        } catch (ResourceNotFoundException $e) {
            $response = new Response('Not Found', 404);
        } catch (Exception $e) {
            $response = new Response('An error occurred', 500);
        }
        $response->send();
    }
} 