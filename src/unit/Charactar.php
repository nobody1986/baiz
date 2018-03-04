<?php

namespace Baiz\Unit;

class Charactar extends Element{
    function __construct($s){
        $this->string = $s;
        $this->length = strlen($s);
    }
    function match($string,$start=0){
        $length = strlen($string);
        
        for($i=$start;$i<$length;++$i){
            if(ctype_space($string[$i])){
                $start++;
            }else{
                break;
            }
        }
        if($length-$start<$this->length){
            throw new \Exception();
        }
        for($i=$start;$i<$this->length;++$i){
            if($string[$start+$i]!=$this->string[$i]){
                throw new \Exception();
            }
        }
        return [new \Baiz\Result\Result($this->_name,$string,$start,$start+strlen($this->string))];
    }
}