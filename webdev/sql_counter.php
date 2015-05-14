<!DOCTYPE HTML>
<html>
	<head>
		<title>Visits</title>
	</head>
	<body>
	<?php
		$db = new SQLite3("../res/counter.db");
		$db -> exec('CREATE TABLE IF NOT EXISTS table (
			id INT(6) UNSIGNED AUTO_INCREMENT,
			date VARCHAR(30) NOT NULL,
			PRIMARY KEY (id)
		)');
		$db -> exec('INSERT INTO table
			VAlUES(' + date('m/d/Y H:i:s') + ')
		');
		$result = $db -> query('SELECT id FROM foo');
		while ($row = $result->fetchArray()) {
    		var_dump($row);
		}
	?>
	</body>
</html>