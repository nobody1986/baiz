<?php

namespace Nobody1986\Baiz\Unit;

class Oneormany extends Element{

    private $left  =null;
    function __construct($left){
        $this->left = $left;
    }
    
    function match($string,$start=0){
        $ret = [];
        $s = $start;
        try{
            do{
                $left = $this->left->match($string,$s);
                if(sizeof($left)==0){
                    break;
                }else{
                    $s= $left[sizeof($left)-1]->end;
                }
                $ret = array_merge($ret,$left);
            }while(true);
        }
        catch(\Exception $e){
            
        }
        if(sizeof($ret)==0){
            throw new \Exception();
        }
        if(empty($this->_name)){
            return $ret;
        }
        else{
            return [new \Baiz\Result\Result($this->_name,$string,$start,$ret[sizeof($ret)-1]->end,$ret)];
        }
    }
}