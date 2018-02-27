<?php

namespace Baiz\Unit;

class Cons extends Element{
    function __construct($s){
        $this->string = $s;
        $this->name= "cons";
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
        return new \Baiz\Result\Result($this->name,$string,$start,$start+strlen($this->string));
    }
}