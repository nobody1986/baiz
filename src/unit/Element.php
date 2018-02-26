<?php

namespace Baiz\Unit;

abstract class Element{
    function and($right){
        
    }
    function or($right){
        
    }
    function maybe(){
        
    }
    function any(){
        
    }
    function more(){
        
    }
    abstract function parse($string,$start=0);
}