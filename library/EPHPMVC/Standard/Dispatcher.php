<?php
namespace EPHPMVC\Standard;
use EPHPMVC\RouteInterface,
    EPHPMVC\RequestInterface,
    EPHPMVC\ResponseInterface,
    EPHPMVC\ViewInterface,
    EPHPMVC\DispatcherInterface;
/**
 * The standard dispatcher implements the simplest way to execute a controller action. There could be more like invoking
 * specific hooks in the respective action controller.
 */
class Dispatcher implements DispatcherInterface
{
    public function dispatch(
            RouteInterface $route,
            RequestInterface $request,
            ResponseInterface $response,
            ViewInterface $view
    )
    {
        $controllerAction = $route->createActionController();
        if ($controllerAction->execute($request, $response, $view)) {
            $request->stopDispatching();
        }
    }
}
