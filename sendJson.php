<?php 

function date_sort($b, $c) {
    return strtotime($b["end date"]) - strtotime($c["end date"]);
}

  // Array
 $var = $_POST['key'];

$testJSON = json_decode($var,true);
$vari =count($testJSON);

usort($testJSON, "date_sort");
//var_dump($testJSON);
$a=array();
$variable1=$testJSON[0]['end date'];
$count=0;
for($y=0;$y<count($testJSON);$y++){
	$variable2=strtotime($testJSON[$y]['start date']);
	$variable3=strtotime($testJSON[$y]['end date']);
	if($variable2>$variable1){
		$count++;
		array_push($a,$testJSON[$y]['Movie name']);		
		$variable1= $variable3;
	}
	
}
$response = array();
array_push($response, array("Total Amount(in crores)"=>$count));
array_push($response, array("movies" => $a));
echo json_encode($response, JSON_PRETTY_PRINT);  
?>