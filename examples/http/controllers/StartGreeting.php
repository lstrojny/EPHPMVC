<?php
use EPHPMVC\ActionControllerInterface,
    EPHPMVC\RequestInterface,
    EPHPMVC\ResponseInterface,
    EPHPMVC\ViewInterface;

class StartGreeting implements ActionControllerInterface
{
    public function execute(RequestInterface $request, ResponseInterface $reponse, ViewInterface $view)
    {
        $view->pass('greeting', array_rand(array('Hello', 'Guten Tag', 'Добрый день')));
        $view->pass('customer', new Customer());
        $view->setTemplate('start.php');
        return true;
    }
}
