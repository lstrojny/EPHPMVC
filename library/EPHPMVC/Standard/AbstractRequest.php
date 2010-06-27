<?php
namespace EPHPMVC\Standard;
use EPHPMVC\RequestInterface;
/**
 * Abstract request base class implementing boiler plate code for dispatch state management. The rest of the
 * functionality needs to be implemented in the more concrete implementations for the specific contexts (like
 * HTTP, STDIN mail or whatever one wants to imagine).
 */
abstract class AbstractRequest implements RequestInterface
{
    protected $_dispatched = false;

    public function isDispatched()
    {
        return $this->_dispatched;
    }

    public function dispatchAgain()
    {
        $this->_dispatched = false;
        return $this;
    }

    public function stopDispatching()
    {
        $this->_dispatched = true;
        return $this;
    }
}
