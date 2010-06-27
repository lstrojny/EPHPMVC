<?php
namespace EPHPMVC;
/**
 * Action controllers should use there own class hierarchy and should not be forced to extend a specific base class.
 * This is why we only have an interface here
 */
interface ActionControllerInterface
{
    public function execute(RequestInterface $request, ResponseInterface $reponse, ViewInterface $view);
}
