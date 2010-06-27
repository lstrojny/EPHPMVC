<?php
namespace EPHPMVC;
/**
 * The router implements the strategy how a request is matched against the bunch of configured routes. There could be a
 * priorized router, a router that does A/B split testing right here (looks up a cookie and decides between alternate
 * action controllers.
 */
interface RouterInterface
{
    public function addRoute(RouteInterface $route);
    public function route(RequestInterface $request, ResponseInterface $response);
}
