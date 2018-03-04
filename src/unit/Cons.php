<?php

namespace Baiz\Unit;

class Cons extends Element{
    function __construct($left,$right){
        $this->left = $left;
        $this->right = $right;
    }
    function match($string,$start=0){
        $left = $this->left->match($string,$start);
        
        if(sizeof($left)==0){
            $right = $this->right->match($string,$start);
        }else{
            $right = $this->right->match($string,$left[sizeof($left)-1]->end);
        }
        $ret = array_merge($left,$right);
        if(empty($this->_name)){
            return $ret;
        } else{
            if(sizeof($ret)==0){
                return [new \Baiz\Result\Result($this->_name,$string,$start,$start,$ret)];
            }else{
                return [new \Baiz\Result\Result($this->_name,$string,$start,$right[sizeof($right)-1]->end,$ret)];
            }
        }
    }
}