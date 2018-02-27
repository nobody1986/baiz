<?php

namespace Baiz\Unit;

class Regex extends Element{
    function __construct($s){
        $this->string = $s;
        $this->name= "regex";
    }
    function match($string,$start=0){
        $ret = \preg_match($this->string,$string,$match,PREG_OFFSET_CAPTURE,$start);
        if($ret==0){
            throw new Exception();
        }
        return new \Baiz\Result\Result($this->name,$string,$start,$start+strlen($match[0][0]));
    }
}