<!DOCTYPE html>
<?php
// Start the session
session_start();
?>
<link href="../css/mb.css" rel="stylesheet">
<html>
<head>
	<title>Register</title>
</head>
<body>
	<h1>Register for Message Board</h1>
	<form action="reg.php" method="POST">
		Username:
		<input type="text" name="user"><br>
		Password:
		<input type="password" name="pass"><br>
		Confirm Password:
		<input type="password" name="conf"><br>
		<button type="submit" name="log">Register</button>
	</form>
	<?php

		$user = rtrim($_POST['user'], '%09%09');
		$pass = rtrim($_POST['pass'], '%09%09');
		$conf = rtrim($_POST['conf'], '%09%09');
		if (strlen($user) == 0 || strlen($pass) == 0 || strlen($conf) == 0)
			exit();

		$db = new SQLite3("../res/login.db");
		$db -> exec('CREATE TABLE IF NOT EXISTS data(user TEXT, pass TEXT, PRIMARY KEY (user));');
		$result = $db->query('SELECT * FROM data where user="' . $user . '"');
			while ($row = $result->fetchArray())
				if ($row["user"] == $user) {
					echo $user . " is Taken!";
					exit();
				}

		if ($pass == $conf) {
			$db -> exec('INSERT OR REPLACE INTO data (user, pass) VAlUES("' . $user . '", "' . $pass . '");');
			header("Location: auth.php");
		} else
			echo "Passwords did not match!";

	?>

</body>
</html>