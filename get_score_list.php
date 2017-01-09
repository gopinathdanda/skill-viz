<?php

if(isset($_POST['paodnwpaks']) && $_POST['paodnwpaks'] == 872934){
	$dir = 'scores';
	$files = scandir($dir, 1);
	$arr = array();
	foreach($files as $value){
		if(preg_match('/(.json)/', $value)){
			array_push($arr, substr($value, 0, -5));
		}
	}
	print_r(json_encode($arr));
}else{
	header('location:index.php');
}

?>