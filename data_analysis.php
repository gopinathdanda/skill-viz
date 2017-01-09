<?php

if(isset($_POST['paodnwpaks']) && $_POST['paodnwpaks'] == 872934){
	if(strcmp($_POST['fnc'], 'get_list') == 0){
		$dir = $_POST['dir'];
		$files = scandir($dir, 1);
		$arr = array();
		foreach($files as $value){
			if(preg_match('/(.json)/', $value)){
				array_push($arr, substr($value, 0, -5));
			}
		}
		print_r(json_encode($arr));
	}elseif(strcmp($_POST['fnc'], 'save') == 0){
		$myFile = $_POST["dir"]."/".$_POST["fname"].".json";
		print($myFile);
		$fh = fopen($myFile, 'w') or die("can't open file");
		$stringData = $_POST["data"];
		fwrite($fh, $stringData);
		fclose($fh);
	}elseif(strcmp($_POST['fnc'], 'get') == 0){
		$myFile = $_POST['dir']."/".$_POST["fname"].".json";
		$fh = fopen($myFile, 'r') or die("can't open file");
		echo fread($fh, filesize($myFile));
		fclose($fh);
	}elseif(strcmp($_POST['fnc'], 'delete') == 0){
		$dir = $_POST['dir'];
		$files = glob($dir."/*"); // get all file names
		foreach($files as $file){ // iterate files
		  if(is_file($file))
		    unlink($file); // delete file
		}
	}else{
		header('location:index.php');
	}
	
}else{
	header('location:index.php');
}

?>