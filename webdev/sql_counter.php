<!DOCTYPE HTML>
<html>
	<head>
		<title>Visits</title>
	</head>
	<body>
	<?php
		$db = new SQLite3("../res/counter.db");
		$db->exec('CREATE TABLE data (id INTEGER, thing TEXT);');

while ($row = $result->fetchArray())
{
    echo $row['name'] . PHP_EOL;
}
	?>
	</body>
</html>