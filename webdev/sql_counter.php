<!DOCTYPE HTML>
<html>
	<head>
		<title>Visits</title>
	</head>
	<body>
	<?php
		$db = new SQLite3("../res/counter.db");
		$db -> exec('
			CREATE TABLE IF NOT EXISTS table(id INTEGER UNSIGNED AUTO_INCREMENT, date TEXT, PRIMARY KEY (id));
			INSERT INTO table VAlUES("'.date('m/d/Y H:i:s').'");
		');
		$result = $db -> query('SELECT id FROM table');
		while ($row = $result->fetchArray()) {
    		var_dump($row);
		}
	?>
	</body>
</html>