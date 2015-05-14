<!DOCTYPE HTML>
<html>
	<head>
		<title>Visits</title>
	</head>
	<body>
	<?php
		$db = sqlite_open('../res/counter.db');
		sqlite_query($db, 'CREATE TABLE IF NOT EXISTS table (
			id INT(6) UNSIGNED AUTO_INCREMENT,
			date VARCHAR(30) NOT NULL,
			PRIMARY KEY (id)
		)');
		sqlite_query($db, 'INSERT INTO table
			VAlUES(' + date('m/d/Y H:i:s') + ')
		)');
		$result = sqlite_query($db, 'select 1 from foo');
		var_dump(sqlite_fetch_array($result)); 
	?>
	</body>
</html>



CREATE DATABASE IF NOT EXISTS countDB
USE countDB
CREATE TABLE IF NOT EXISTS table (
	id INT(6) UNSIGNED AUTO_INCREMENT,
	date VARCHAR(30) NOT NULL,
	PRIMARY KEY (id)
)
INSERT INTO table
	VAlUES()