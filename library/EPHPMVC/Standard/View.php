<?php
namespace EPHPMVC\Standard;
use EPHPMVC\ViewInterface,
    EPHPMVC\ResponseInterface,
    Closure;
class View implements ViewInterface
{
    protected $_values = array();
    protected $_template;

    public function render()
    {
        $this->_render($this->_template);
    }

    protected function _render()
    {
        /**
         * To keep templates dense, we use the variable-variable trick to make helpers and template values available in
         * the template
         */
        foreach ($this->_values as $name => $value) {
            $$name = $value;
        }
        include func_get_arg(0);
    }

    public function pass($nameOrValue, $value = null)
    {
        if (is_array($nameOrValue)) {
            array_walk($nameOrValue, array($this, 'pass'));
        }

        $this->_values[$nameOrValue] = $value;
        return $this;
    }

    public function setTemplate($template)
    {
        $this->_template = $template;
        return $this;
    }
}
