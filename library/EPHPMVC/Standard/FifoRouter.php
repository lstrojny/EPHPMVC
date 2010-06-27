<?php
namespace EPHPMVC\Standard;
use EPHPMVC\RouterInterface,
    EPHPMVC\RouteInterface,
    EPHPMVC\RequestInterface,
    EPHPMVC\ResponseInterface;
/**
 * Simple FIFO based router
 */
class FifoRouter implements RouterInterface
{
    protected $_routes = array();

    public function addRoute(RouteInterface $route)
    {
        $this->_routes[] = $route;
        return $this;
    }

    public function route(RequestInterface $request, ResponseInterface $response)
    {
        $matchingRoute = null;

        foreach ($this->_routes as $route) {
            if ($route->matches($request)) {
                $matchingRoute = $route;
                break;
            }
        }

        if (!$matchingRoute) {
            $response->raiseRoutingError();
        }

        return $matchingRoute;
    }
}
