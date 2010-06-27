<?php
namespace EPHPMVC;
/**
 * To allow rendering abitrary output formats (like JSON, (X)HTML, PDF, Console output) the basic view is pretty simple.
 * Only passing variables and rendering them is defined.
 */
interface ViewInterface
{
    /**
     * @return string
     */
    public function render();
    public function pass($name, $value = null);
    public function setTemplate($template);
}
