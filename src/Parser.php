<?php
namespace Baiz;

class Parser{
    protected $_string;
    /**
     * t= x|y
     * x="a"| "b"
     * y = "c" | "d"
     */
    public function parse($string){
        $this->_string = $string;
        $name= new \Baiz\Unit\Regex('/\\w[\\w\\d]*/i');
        $name->setName('name');
        $equal= new \Baiz\Unit\Charactar('=');


        $string = new \Baiz\Unit\Regex('/"[^"]+?"/');
        $string->setName('string');
        $regex = new \Baiz\Unit\Regex('#/[^/]+?/#i');
        $regex->setName('regex');
        $item = new \Baiz\Unit\Select($string,new \Baiz\Unit\Select($name,$regex));
        $item->setName('item');

        $line = new \Baiz\Unit\Cons(new \Baiz\Unit\Cons($name,$equal),$item);
        $line->setName('line');

        $lines = new \Baiz\Unit\Oneormany($line);
        $lines->setName('lines');

        $string = "integer=/\\d+/  double=/\\d+\\.\\d+/";
        $r = $lines->match($string);

        
    }


}