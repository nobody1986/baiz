<?php

namespace Baiz\Unit;

/**
 * *
 */
class Zeroormany extends Element{

    function __construct($left){
        $this->left = $left;
    }
    
    function match($string,$start=0){
        $ret = [];
        $s = $start;
        try{
            while(true){
                $left = $this->left->match($string,$s);
                if(sizeof($left)==0){
                    break;
                }else{
                    $s= $left[sizeof($left)-1]->end;
                }
                $ret = array_merge($ret,$left);
            }
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
    