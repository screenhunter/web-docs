<?php
    $letter = $_GET["letter"];
    $length = intval($_GET["length"]) - 1;
    $file = file_get_contents("../../res/enable1.txt");
    $pieces = explode(" ", $file);
    print_r($pieces);
    #echo $file;
    $pattern = '/' . $letter . '[a-zA-Z]{' . $length . '}/';
    #$pattern = '/' . $letter . '/';	
    #echo $pattern;
    foreach ($pieces as $value) {
        if preg_match($pattern, $value) == 1
            echo $value;
	}
?>