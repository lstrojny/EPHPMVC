<?php
/**
 * EPHPMVC - A simple, yet extendable MVC implementation for PHP 5.3
 *
 * Copyright (c) 2010, Lars Strojny <lars@strojny.net>
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Lars Strojny nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package EPHPMVC
 * @subpackage EPHPMVC\Standard
 * @version @@package_version@@
 */
namespace EPHPMVC\Standard;

use EPHPMVC\RequestInterface;

/**
 * Abstract request
 *
 * Abstract request base class implementing boiler plate code for dispatch
 * state management. The rest of the functionality needs to be implemented
 * in the more concrete implementations for the specific protocols.
 *
 * @package EPHPMVC
 * @subpackage EPHPMVC\Standard
 * @version @@package_version@@
 */
abstract class AbstractRequest implements RequestInterface
{
    protected $_params = array();

    /**
     * Construct new request object
     *
     * @param struct $params Struct of request parameter
     */
    public function __construct(array $params = array())
    {
        $this->_params = $params;
    }

    /**
     * Is the request dispatched?
     *
     * @var bool
     */
    protected $_dispatched = false;

    /**
     * Returns true if the request is dispatched
     *
     * @return bool
     */
    public function isDispatched()
    {
        return $this->_dispatched;
    }

    /**
     * Dispatch the request again
     *
     * @return EPHPMVC\Standard\AbstractRequest
     */
    public function dispatchAgain()
    {
        $this->_dispatched = false;

        return $this;
    }

    /**
     * Stop the request dispatching
     *
     * @return EPHPMVC\Standard\AbstractRequest
     */
    public function stopDispatching()
    {
        $this->_dispatched = true;

        return $this;
    }

    /**
     * Get request parameter
     *
     * Returns a value of the request parameters struct
     *
     * @param string $namespace Namespace name
     * @param string $key Key name
     * @param mixed $default Default value if key or namespace not found
     */
    public function getParam($namespace = null, $key = null, $default = null)
    {
        if ($namespace === null) {
            return $this->_params;
        }

        if (!isset($this->_params[$namespace])) {
            return $default;
        }

        if ($key === null) {
            return $this->_params[$namespace];
        }

        if (!isset($this->_params[$namespace][$key])) {
            return $default;
        }

        return $this->_params[$namespace][$key];
    }
}
