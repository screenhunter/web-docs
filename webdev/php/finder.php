<?php
    $letter = $_GET["letter"];
    $length = intval($_GET["length"]) - 1;
    $file = file_get_contents("../../res/enable1.txt");
    $pieces = explode(" ", $file);
    #echo $file;
    $pattern = '/' . $letter . '[a-zA-Z]{' . $length . '}/';
    #$pattern = '/' . $letter . '/';	
    echo $pattern;
    foreach ($pieces as $value) {
    	echo preg_match_all($pattern, $value);
	}
?>