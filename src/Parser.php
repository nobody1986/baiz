<?php
namespace Nobody1986\Baiz;

class Parser{
    protected $_string;
    /**
     * t= x|y
     * x="a"| "b"
     * y = "c" | "d"
     */
    public function parse($string){
        $this->_string = $string;

        
    }


}