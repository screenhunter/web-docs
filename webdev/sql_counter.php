<!DOCTYPE HTML>
<html>
	<head>
		<title>Visits</title>
	</head>
	<body>
	<?php
		$db = new SQLite3("../res/counter.db");
		$db->exec('CREATE TABLE table (id INTEGER, thing TEXT);');

while ($row = $result->fetchArray())
{
    echo $row['name'] . PHP_EOL;
}
	?>
	</body>
</html>