<?php
use EPHPMVC\ActionControllerInterface,
    EPHPMVC\RequestInterface,
    EPHPMVC\ResponseInterface,
    EPHPMVC\ViewInterface;

class HelloWorld implements ActionControllerInterface
{
    public function execute(RequestInterface $request, ResponseInterface $reponse, ViewInterface $view)
    {
        $view->pass('customer', new Customer());
        $view->pass('get', $request->getParam('GET', 'getKey'));
        $view->pass('post', $request->getParam('POST'));
        $view->setTemplate('hello-world.php');
        return true;
    }
}
