<?php
namespace EPHPMVC\Http;
use EPHPMVC\Standard\AbstractRequest;
class Request extends AbstractRequest
{
    protected $_requestUri;
    protected $_get = array();
    protected $_post = array();
    protected $_session = array();
    protected $_cookie = array();

    public function __construct($requestUri, array $get, array $post, array $session, array $cookie)
    {
        $this->_requestUri = $requestUri;
        $this->_get = $get;
        $this->_post = $post;
        $this->_session = $session;
        $this->_cookie = $cookie;
    }

    public function getRequestUri()
    {
        return $this->_requestUri;
    }

    public function getPost($key = null, $default = null)
    {
        return $this->_readVariable($this->_post, $key, $default);
    }

    public function getGet($key = null, $default = null)
    {
        return $this->_readVariable($this->_get, $key, $default);
    }

    public function getCookie($key = null, $default = null)
    {
        return $this->_readVariable($this->_cookie, $key, $default);
    }

    public function getSession($key = null, $default = null)
    {
        return $this->_readVariable($this->_session, $key, $default);
    }

    protected function _readVariable($array, $key, $default)
    {
        if ($key === null) {
            return $array;
        }

        if (!array_key_exists($key, $array)) {
            return $default;
        }

        return $array[$key];
    }
}

