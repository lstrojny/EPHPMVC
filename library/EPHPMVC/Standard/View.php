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

use EPHPMVC\ViewInterface,
    EPHPMVC\ResponseInterface;

/**
 * Simple view
 *
 * The view allows passing some variables to be used in the template. This
 * specific view implementation just used PHP's include() function to do
 * the actual rendering.
 *
 * @package EPHPMVC
 * @subpackage EPHPMVC\Standard
 * @version @@package_version@@
 */
class View implements ViewInterface
{
    /**
     * Template values
     *
     * @var array
     */
    protected $_values = array();

    /**
     * Template name
     *
     * @var string
     */
    protected $_template;

    /**
     * Render the template
     *
     * @return void
     */
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

    /**
     * Set view template
     *
     * @param string $template
     * @return EPHPMVC\Standard\View
     */
    public function setTemplate($template)
    {
        $this->_template = $template;

        return $this;
    }
}
