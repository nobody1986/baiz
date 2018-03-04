<?php

namespace Baiz\Unit;

class Regex extends Element{
    function __construct($s){
        $this->string = $s;
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
        $ret = \preg_match($this->string,$string,$match,PREG_OFFSET_CAPTURE,$start);
        if($ret==0){
            throw new \Exception();
        }
        return [new \Baiz\Result\Result($this->_name,$string,$start,$start+strlen($match[0][0]))];
    }
}