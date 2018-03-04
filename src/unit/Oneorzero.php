<?php

namespace Baiz\Unit;

/**
 * *
 */
class Oneorzero extends Element{

    function __construct($left){
        $this->left = $left;
    }
    
    function match($string,$start=0){
        $ret = [];
        try{
                $left = $this->left->match($string,$start);
                $ret = array_merge($ret,$left);
        }
        catch(\Exception $e){
            
        }
        if(empty($this->_name)){
            return $ret;
        }
        else{
            if(sizeof($ret)==0){
                return [new \Baiz\Result\Result($this->_name,$string,$start,$start,$ret)];
            }else{
                return [new \Baiz\Result\Result($this->_name,$string,$start,$ret[sizeof($ret)-1]->end,$ret)];
            }
            
        }
    }
}
    