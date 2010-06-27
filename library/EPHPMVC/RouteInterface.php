<?php
namespace EPHPMVC;

/**
 * Route interface is dense. Takes a request and returns a boolean if the current route matches against the current
 * request. It's possible to implement REST routing with this model, as well as all kind of protocol specific routing
 * for let's say an incoming mail via STDIN or an XML document or whatever. The route itself is responsible for
 * instantiating the action controller. We could delegate action controller creation to a Dependency Injection
 * controller here if we wish to. We could also have mixed setups where simple routes like /imprint or
 * /terms-of-services are implemented with a really fast route and the interesting domain stuff is done with the more
 * sophisticated route with dependency injection and all of that.
 */
interface RouteInterface
{
    public function matches(RequestInterface $request);
    public function createActionController();
}
