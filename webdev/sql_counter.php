<!DOCTYPE HTML>
<html>
	<head>
		<title>Visits</title>
	</head>
	<body>
	<?php
		$db = new SQLite3("../res/counter.db");
		$db -> exec('CREATE TABLE table(id INTEGER AUTO_INCREMENT PRIMARY KEY, date TEXT);');
		$result = $db -> query('SELECT id FROM table');
		while ($row = $result->fetchArray()) {
    		var_dump($row);
		}
	?>
	</body>
</html>