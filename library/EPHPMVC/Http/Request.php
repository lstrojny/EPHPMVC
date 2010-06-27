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
namespace EPHPMVC\HTTP;

use EPHPMVC\Standard\AbstractRequest;

/**
 * HTTP Request class
 *
 * @package EPHPMVC
 * @subpackage EPHPMVC\Standard
 * @version @@package_version@@
 */
class Request extends AbstractRequest
{
    protected $_uri;

    protected $_scheme;

    protected $_host;

    protected $_user;

    protected $_pass;

    protected $_path;

    protected $_query;


    public function __construct(array $params, $uri)
    {
        parent::__construct($params);
        $this->_uri = $uri;
        $this->_scheme = parse_url($uri, PHP_URL_SCHEME);
        $this->_host = parse_url($uri, PHP_URL_HOST);
        $this->_port = parse_url($uri, PHP_URL_PORT);
        $this->_user = parse_url($uri, PHP_URL_USER);
        $this->_pass = parse_url($uri, PHP_URL_PASS);
        $this->_path = parse_url($uri, PHP_URL_PATH);
        $this->_query = parse_url($uri, PHP_URL_QUERY);
    }

    public function getUri()
    {
        return $this->_uri;
    }

    public function getScheme()
    {
        return $this->_scheme;
    }

    public function getHost()
    {
        return $this->_host;
    }

    public function getPort()
    {
        return $this->_port;
    }

    public function getUser()
    {
        return $this->_user;
    }

    public function getPath()
    {
        return $this->_path;
    }

    public function getQuery()
    {
        return $this->_query;
    }

    public function isSecure()
    {
        return $this->getScheme() === 'https';
    }
}
