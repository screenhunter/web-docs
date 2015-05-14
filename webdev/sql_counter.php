<!DOCTYPE HTML>
<html>
	<head>
		<title>Visits</title>
	</head>
	<body>
	<?php
		$db = new SQLite3("../res/counter.db");
		$db -> exec('CREATE TABLE IF NOT EXISTS data(id INTEGER, time TEXT, PRIMARY KEY (id));
			INSERT INTO data VAlUES("'.date('m/d/Y H:i:s').'");
		');
		$result = $db -> query('SELECT id FROM data');
		while ($row = $result->fetchArray()) {
    		var_dump($row);
		}
	?>
	</body>
</html>