<!DOCTYPE HTML>
<html>
	<head>
		<title>Visits</title>
	</head>
	<body>
	<?php
		$file = "../res/counter.json"
		$array = json_decode(file_get_contents($file), true);
		array["count"] += 1;
		echo "You are visitor #" . array["count"];
		echo "Last visit at: " . array["date"];
		fclose($file);
		array["date"] = date('m/d/Y H:i:s');
		file_put_contents($file, json_encode($json));
	?>
	</body>
</html>
