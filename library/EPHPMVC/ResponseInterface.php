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
 * @version @@package_version@@
 */
namespace EPHPMVC;

/**
 * Response interface
 *
 * Protocol agnostic response object defining generic error handling
 * methods that need to be implemented in the concrete response.
 *
 * @package EPHPMVC
 * @version @@package_version@@
 */
interface ResponseInterface
{
    /**
     * Raise processing error
     *
     * @return void
     */
    public function raiseProcessingError();

    /**
     * Raise routing error
     *
     * @return void
     */
    public function raiseRoutingError();

    /**
     * Returns true if the response is errornous
     *
     * @return bool
     */
    public function isError();

    /**
     * Send response
     *
     * The view is passed to the response to render and send the response in
     * one step. The response tells the view to render itself.
     *
     * @param EPHPMVC\ViewInterface $view
     * @return void
     */
    public function send(ViewInterface $view);
}
