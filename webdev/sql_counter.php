<!DOCTYPE HTML>
<html>
	<head>
		<title>Visits</title>
	</head>
	<body>
	<?php
		$db = mysqli_open('../res/counter.db');
		mysqli_query($db, 'CREATE TABLE IF NOT EXISTS table (
			id INT(6) UNSIGNED AUTO_INCREMENT,
			date VARCHAR(30) NOT NULL,
			PRIMARY KEY (id)
		)');
		mysqli_query($db, 'INSERT INTO table
			VAlUES(' + date('m/d/Y H:i:s') + ')
		)');
		$result = mysqli_query($db, 'select 1 from foo');
		var_dump(mysqli_fetch_array($result)); 
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