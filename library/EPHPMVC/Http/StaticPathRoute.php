<?php
namespace EPHPMVC\Http;

use EPHPMVC\RequestInterface,
    EPHPMVC\RouteInterface;

class StaticPathRoute implements RouteInterface
{
    protected $_path;
    protected $_actionControllerClass;

    public function __construct($path, $actionControllerClass)
    {
        $this->_path = $path;
        $this->_actionControllerClass = $actionControllerClass;
    }

    public function matches(RequestInterface $request)
    {
        if (!$request instanceof Request) {
            return false;
        }

        return $this->_path === $request->getRequestUri();
    }

    public function createActionController()
    {
        $class = $this->_actionControllerClass;
        return new $class;
    }
}
