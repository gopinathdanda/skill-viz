<?php

if(isset($_POST['fname']) && $_POST['paodnwpaks'] == 872934){
	$myFile = "data/".$_POST["fname"].".json";
	$fh = fopen($myFile, 'r') or die("can't open file");
	echo fread($fh, filesize($myFile));
	fclose($fh);
}

?>