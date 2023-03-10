<?php

namespace Nobody1986\Baiz\Unit;

abstract class Element
{
    protected $_name = "";


    public function setName($name)
    {
        $this->_name = $name;
    }
    function and($right)
    {
    }
    function or($right)
    {
    }
    function maybe()
    {
    }
    function any()
    {
    }
    function more()
    {
    }
    abstract function match($string, $start = 0);
}
