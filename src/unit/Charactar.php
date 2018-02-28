<?php

namespace Baiz\Unit;

class Charactar extends Element{
    function __construct($s){
        $this->string = $s;
    }
    function match($string,$start=0){
        $length = strlen($string);
        if($length-$start<strlen($this->string)){
            throw new Exception();
        }
        for($start=0;$i<$length;++$i){
            if($string[$start+$i]!=$this->string[$i]){
                throw new Exception();
            }
        }
        return [new \Baiz\Result\Result($this->_name,$string,$start,$start+strlen($this->string))];
    }
}