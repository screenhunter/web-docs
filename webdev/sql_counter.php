<!DOCTYPE HTML>
<html>
	<head>
		<title>Visits</title>
	</head>
	<body>
	<?php
		$db = new SQLite3("../res/counter.db");
		$db -> exec('CREATE TABLE IF NOT EXISTS data(id INTEGER, thing TEXT, PRIMARY KEY (id));
			INSERT INTO data(thing) VAlUES("hello");
		');
		$result = $db -> query('SELECT id FROM data');
		while ($row = $result->fetchArray()) {
    		var_dump($row);
		}
	?>
	</body>
</html>