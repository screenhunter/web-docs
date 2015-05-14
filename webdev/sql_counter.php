<!DOCTYPE HTML>
<html>
	<head>
		<title>Visits</title>
	</head>
	<body>
	<?php
		$db = new SQLite3("../res/counter.db");
		$time = date('m/d/Y H:i:s');
		$mod = intval(date('i')) % 2;
		$table = "";
		if ($mod == 1)
			$table = "odd";
		else
			$table = "even";

		$db -> exec('CREATE TABLE IF NOT EXISTS ' . $table . '(id INTEGER, time TEXT, PRIMARY KEY (id));
			INSERT INTO ' . $table . '(time) VAlUES("' . $time . '");
		');

		$count = $db->lastInsertRowID;
		$count -= 1;

		$result = $db->query('SELECT time FROM ' . $table . ' WHERE id = ' . $count);
		while ($row = $result->fetchArray()) {
			print_r($row);
		}
	?>
	</body>
</html>