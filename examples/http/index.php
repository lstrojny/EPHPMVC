<?php
$includePath = __DIR__ . '/controllers'
             . PATH_SEPARATOR . __DIR__ . '/models'
             . PATH_SEPARATOR . __DIR__ . '/views';
set_include_path($includePath);
require_once __DIR__ . '/../autoload.php';
spl_autoload_register($autoloader);

use EPHPMVC\Standard\FrontController as StandardFrontController,
    EPHPMVC\Standard\FifoRouter as StandardFifoRouter,
    EPHPMVC\Standard\Dispatcher as StandardDispatcher,
    EPHPMVC\Standard\View as StandardView,
    EPHPMVC\Http\StaticPathRoute as HttpStaticPathRoute,
    EPHPMVC\Http\Request as HttpRequest,
    EPHPMVC\Http\Response as HttpResponse;

$router = new StandardFifoRouter();
$router->addRoute(new HttpStaticPathRoute('/hello-world', 'HelloWorld'));
$router->addRoute(new HttpStaticPathRoute('/start', 'StartGreeting'));
$dispatcher = new StandardDispatcher();
$request = new HttpRequest(
    #'/hello-world',
    '/start',
    array('get' => 'GET VALUE'),
    array('post' => 'POST VALUE'),
    array('session' => 'SESSION'),
    array('cookie' => 'COOKIE')
);
$response = new HttpResponse(HttpResponse::VERSION_11);
$view = new StandardView();
/** View helpers are just registered as template vars thanks to closures */
$view->pass('e', function($str) {
    return htmlentities($str, ENT_COMPAT, 'UTF-8');
});
$frontController = new StandardFrontController($router, $dispatcher);
$frontController->run($request, $response, $view);
