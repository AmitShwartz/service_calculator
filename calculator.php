<?php
	class Calculator{
		protected $numArray=[];
		protected $result;

		public function __construct(){
			$this->result=0;
		}

		public function __set($temp, $Array){
			$this->numArray=$Array;
		}

		public function __get($temp){
			return $this->result;
		}

		public function __destruct(){}
	}

	class Mult extends Calculator{
		public function run(){
			$this->result=1;
        	foreach ($this->numArray as $numItem) {
        		$this->result*=$numItem;
        	}
   		}
	}

	class Add extends Calculator{
	public function run(){
    	foreach ($this->numArray as $numItem)
    		$this->result+=$numItem;
		}
	}

	class Avg extends Calculator{
	public function run(){
		$sum=0;
    	foreach ($this->numArray as $numItem) {
    		$sum+=$numItem;
    		}
    		$this->result=$sum/count($this->numArray);
		}
	}
?>


