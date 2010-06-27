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
        $view->pass('get', $request->getGet('get'));
        $view->pass('post', $request->getPost());
        $view->setTemplate('hello-world.php');
        return true;
    }
}
