<?php
    $letter = $_GET["letter"];
    $length = intval($_GET["length"]) - 1;
    $file = file_get_contents("../../res/enable1.txt");
    $pieces = explode("\n", $file);
    #echo $file;
    $pattern = "/^[a-zA-Z]{0,}" . $letter . "[a-zA-Z]{" . $length . "}[a-zA-Z]{0,}$/";
    #$pattern = '/' . $letter . '/';	
    #echo $pattern;
    foreach ($pieces as $value) {
        if (preg_match($pattern, $value) == 1)
            echo nl2br($value . "\n");
	}
?>