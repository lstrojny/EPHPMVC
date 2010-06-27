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

use EPHPMVC\RouterInterface,
    EPHPMVC\DispatcherInterface,
    EPHPMVC\RequestInterface,
    EPHPMVC\ResponseInterface,
    EPHPMVC\ViewInterface;
/**
 * Simple front controller implementation
 *
 * This simple front controller implementation ties together the classes
 *
 * @package EPHPMVC
 * @subpackage EPHPMVC\Standard
 * @version @@package_version@@
 */
class FrontController
{
    /**
     * Router object
     *
     * @var EPHPMVC\DispatcherInterface
     */
    protected $_router;

    /**
     * Dispatcher object
     *
     * @var EPHPMVC\DispatcherInterface
     */
    protected $_dispatcher;

    /**
     * Create a new front controller object
     *
     * @param EPHPMVC\RouterInterface $router
     * @param EPHPMVC\DispatcherInterface $dispatcher
     */
    public function __construct(RouterInterface $router, DispatcherInterface $dispatcher)
    {
        $this->_router = $router;
        $this->_dispatcher = $dispatcher;
    }

    /**
     * Run the front controller
     *
     * @param EPHPMVC\RequestInterface $request
     * @param EPHPMVC\ResponseInterface $response
     * @param EPHPMVC\ViewInterface $view
     * @return void
     */
    public function run(RequestInterface $request, ResponseInterface $response, ViewInterface $view)
    {
        $route = $this->_router->route($request, $response);

        while (!$response->isError() and !$request->isDispatched()) {
            $this->_dispatcher->dispatch($route, $request, $response, $view);
        }

        $response->send($view);
    }
}
