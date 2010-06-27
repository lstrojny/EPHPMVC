<?php
namespace EPHPMVC\Http;

use EPHPMVC\ResponseInterface,
    EPHPMVC\ViewInterface;

class Response implements ResponseInterface
{
    const VERSION_11 = '1.1';
    const VERSION_10 = '1.0';

    protected $_version;

    protected $_headers = array();

    protected $_error = false;

    public function __construct($version = self::VERSION_11)
    {
        $this->_version = $version;
    }

    public function raiseRoutingError()
    {
        $this->_headers[] = sprintf('HTTP/%s 404 Not Found', $this->_version);
        $this->_error = true;
        return $this;
    }

    public function raiseProcessingError()
    {
        $this->_headers[] = sprintf('HTTP/%s 503 Service Unavailable', $this->_version);
        $this->_error = true;
        return $this;
    }

    public function isError()
    {
        return $this->_error;
    }

    public function send(ViewInterface $view)
    {
        array_walk($this->_headers, function($header) {
            header($header, true);
        });
        echo $view->render();
    }
}

