<?php

namespace Baiz\Unit;


class Select extends Element{
	
	function __construct($left,$right){
		$this->left = $left;
		$this->right = $right;
	}
	
	function match($string,$start=0){
		try{
			$left = $this->left->match($string,$start);
			if(empty($this->_name)){
				return $left;
			}
			else{
				return [new \Baiz\Result\Result($this->_name,$string,$start,$left[sizeof($left)-1]->end)];
			}
		}
		catch(Exception $e){
			$right = $this->right->match($string,$start);
			if(empty($this->_name)){
				return $right;
			}
			else{
				return [new \Baiz\Result\Result($this->_name,$string,$start,$right[sizeof($right)-1]->end)];
			}
		}
	}
}
