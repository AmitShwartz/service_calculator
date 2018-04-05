<?php
	include 'calculator.php';

	$tempArray=[];
	$newArray=[];
	if(isset($_GET['a']))
		$tempArray=$_GET['a'];
	else if(isset($_POST['a']))
		$tempArray=$_POST['a'];
	else if ($_SERVER['REQUEST_METHOD'] == 'PUT')
		parse_str(file_get_contents('php://input'), $tempArray);
	else
		$tempArray = array('func'=>"sum",'num1'=>0,'num2'=>0,'num3'=>0);

	foreach ($tempArray as $key => $numItem) {
		if($key == "func"){
			if($numItem == "sum")
				$calculator=new Add();
			else if($numItem == "mult")
				$calculator=new Mult();
			else if($numItem == "avg")
				$calculator=new Avg();
			else
				echo $numItem." is not part of the calculator operations";
		}
		else
			$newArray[]=(int)$numItem;
	}

	$calculator->numArray=$newArray;

	$calculator->run();
	$res = array('retVal'=>$calculator->result);

	header('Content-Type: application/json');
	echo json_encode($res);
?>