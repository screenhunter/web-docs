<?php
    $letter = $_GET["letter"];
    $length = intval($_GET["length"]) - 1;
    $file = file_get_contents("../../res/enable1.txt");
    #echo $file;
    #$pattern = '/' . $letter . '[a-zA-Z]{' . $length . '}/';
    $pattern = '/' . $letter;	
    echo $pattern;
    preg_match_all($pattern, $file, $matches);
    echo $matches;
?>