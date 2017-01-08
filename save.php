<?php

if(isset($_POST['data']) && $_POST['paodnwpaks'] == 872934){
	$myFile = "data/".$_POST["fname"].".json";
	print($myFile);
	$fh = fopen($myFile, 'w') or die("can't open file");
	$stringData = $_POST["data"];
	fwrite($fh, $stringData);
	fclose($fh);
}

?>