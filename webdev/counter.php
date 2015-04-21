<!DOCTYPE HTML>
<html>
	<head>
		<title>Visits</title>
	</head>
	<body>
	<?php
		$file = fopen("../res/count.txt", "r");
		$count = intval(fread($file,filesize("../res/count.txt"))) + 1;
		echo "You are visitor #" . $count;
		fclose($file);
		$file = fopen("../res/count.txt", "w");
		fwrite($file, $count);
		fclose($file);
	?>
	</body>
</html>
