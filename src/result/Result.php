<?php

namespace Baiz\Result;

class Result{
    function __construct($name,$string,$start,$end){
        $this->name = $name;
        $this->string = $string;
        $this->start = $start;
        $this->end = $end;
    }
}