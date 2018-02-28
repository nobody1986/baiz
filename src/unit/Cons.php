<?php

namespace Baiz\Unit;

class Cons extends Element{
    function __construct($left,$right){
        $this->left = $left;
        $this->right = $right;
        $this->name= "cons";
    }
    function match($string,$start=0){
        $left = $this->left->match($string,$start);
        $right = $this->right->match($string,$left[sizeof($left)-1]->end);
        if(empty($this->_name)){
            return array_merge($left,$right);
        } else{
            return [new \Baiz\Result\Result($this->_name,$string,$start,$right[sizeof($right)-1]->end)];
        }
    }
}