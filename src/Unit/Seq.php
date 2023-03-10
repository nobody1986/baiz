<?php

namespace Nobody1986\Baiz\Unit;

class Seq extends Element{
    private $left = null;
    private $right = null;
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
                return [new \Nobody1986\Baiz\Result\Result($this->_name,$string,$start,$start,$ret)];
            }else{
                return [new \Nobody1986\Baiz\Result\Result($this->_name,$string,$start,$right[sizeof($right)-1]->end,$ret)];
            }
        }
    }
}