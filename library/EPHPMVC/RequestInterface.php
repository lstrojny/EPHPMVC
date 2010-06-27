<?php
namespace EPHPMVC;
/**
 * Request interface defining minimal contract of a request
 */
interface RequestInterface
{
    /**
     * @return bool
     */
    public function isDispatched();
    public function dispatchAgain();
    public function stopDispatching();
}
