<?php

namespace Nobody1986\Baiz\Result;

class Result{
    private $name="";
    private $string="";
    private $start=0;
    private $end=0;
    private $value=null;
    
    function __construct($name,$string,$start,$end,$value=[]){
        $this->name = $name;
        $this->string = $string;
        $this->start = $start;
        $this->end = $end;
        $this->value = $value;
    }
}