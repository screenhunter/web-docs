<!DOCTYPE HTML>
<html>
	<head>
		<title>Form Intro</title>
	</head>
	<body onload="intialize()">
		<form action="finder.php" method="get">
			Initial Letter:
			<input type="text" name="letter" id="letter" oninput="check();"><br>
			Length:
			<input type="text" name="length" id="length" oninput="check();"><br>
			<button type="submit" id="btn" disabled="true">Find</button>
		</form>
		<div id="Result">
			<?php
			    $letter = $_GET["letter"];
			    $length = intval($_GET["length"]) - 1;
			    $file = file_get_contents("../../res/enable1.txt");
			    $pieces = explode("\n", $file);
			    #echo $file;
			    $pattern = "/^(" . $letter . "[a-zA-Z]{" . $length . "})$/";
			    #$pattern = '/' . $letter . '/';	
			    #echo $pattern;
			    foreach ($pieces as $value) {
			        if (preg_match($pattern, $value) == 1)
			            echo nl2br($value . "\n");
				}
			?>
		</div>
	</body>

	<script type="text/javascript">
		function check() {

			a = document.getElementById("letter").value;
			b = document.getElementById("length").value;
			p1 = new RegExp("^[a-zA-z]{1}$");
			p2 = new RegExp("[0-9]{1,}");
			if (p1.test(a) && p2.test(b))
				document.getElementById("btn").disabled = false;
			else
				document.getElementById("btn").disabled = true;
		}
	</script>

</html>
