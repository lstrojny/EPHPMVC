<?php
namespace EPHPMVC\Standard;
use EPHPMVC\RouterInterface,
    EPHPMVC\DispatcherInterface,
    EPHPMVC\RequestInterface,
    EPHPMVC\ResponseInterface,
    EPHPMVC\ViewInterface;
/**
 * Pretty simple front controller. Should be easily replaced or not used at all. Can be tested just by mocking all it's
 * dependencies away from concrete implementations
 */
class FrontController
{
    protected $_router;

    public function __construct(RouterInterface $router, DispatcherInterface $dispatcher)
    {
        $this->_router = $router;
        $this->_dispatcher = $dispatcher;
    }

    public function run(RequestInterface $request, ResponseInterface $response, ViewInterface $view)
    {
        $route = $this->_router->route($request, $response);
        while (!$response->isError() and !$request->isDispatched()) {
            $this->_dispatcher->dispatch($route, $request, $response, $view);
        }
        $response->send($view);
    }
}

