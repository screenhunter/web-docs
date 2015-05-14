<!DOCTYPE HTML>
<html>
	<head>
		<title>Visits</title>
	</head>
	<body>
	<?php
		$db = new SQLite3("../res/counter.db");
		$db->exec('CREATE TABLE people (name COLLATE translit_ascii);
			INSERT INTO people VALUES ("Émilie");
			INSERT INTO people VALUES ("Zebra");
			INSERT INTO people VALUES ("Emile");
			INSERT INTO people VALUES ("Arthur");
		');

		$stmt = $db->prepare('SELECT name FROM people ORDER BY name;');
		$result = $stmt->execute();

		while ($row = $result->fetchArray())
		{
		    echo $row['name'] . PHP_EOL;
		}
	?>
	</body>
</html>