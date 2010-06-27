<?php
namespace EPHPMVC;
/**
 * Dispatcher is responsible for executing the defined action controller for the request coming in
 */
interface DispatcherInterface
{
    public function dispatch(
        RouteInterface $route,
        RequestInterface $request,
        ResponseInterface $response,
        ViewInterface $view
    );
}

