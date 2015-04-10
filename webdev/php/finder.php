<?php
    $letter = $_GET["letter"];
    $length = intval($_GET["length"]) - 1;
    $file = file_get_contents("../../res/enable1.txt");
    echo preg_match($pattern, $file);
    $pattern = '/' . $letter . '[a-zA-Z]{' . $length . '}/';
    preg_match_all($pattern, $file, $matches);
    foreach ($matches as $value) {
    	echo $value;
    }
?>