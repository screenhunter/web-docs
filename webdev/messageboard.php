<!DOCTYPE html>
<html>
<head>
	<title>Rajat's Personal Message Board</title>
</head>
<body>
	<div id="insert">
		<form action="messageboard.php" method="POST">
			Reminder:
			<input type="text" id="rem" name="rem"><br>
			Month:
			<select  name="month">
  				<option value="0">January</option>
				<option value="31">February</option>
				<option value="59">March</option>
				<option value="90">April</option>
				<option value="120">May</option>
				<option value="151">June</option>
				<option value="181">July</option>
				<option value="212">August</option>
				<option value="243">Spetember</option>
				<option value="273">October</option>
				<option value="314">November</option>
				<option value="334">December</option>
			</select><br>
			Day:
			<input type="number" name="day"><br>
			Year:
			<input type="number" name="year"><br>
			<button type="submit" id="btn">Add</button>
		</form>
	</div>
	<div id="Old">
		<?php
			$message = rtrim($_POST['rem'], '%09%09');
			$day = intval(rtrim($_POST['day'], '%09%09'));
			$year = intval(rtrim($_POST['year'], '%09%09'));
			$month = intval(rtrim($_POST['month'], '%09%09'));
			$pri = $year*1000 + $month + $day;

			$db = new SQLite3("../res/message.db");
			$db -> exec('CREATE TABLE IF NOT EXISTS data(pri INTEGER, mess TEXT, PRIMARY KEY (pri));
				INSERT OR REPLACE INTO data (pri, mess) VAlUES(' . $pri . ', "' . $message . '");
			');

			$result = $db->query('SELECT * FROM data ORDER BY pri');
			while ($row = $result->fetchArray())
				print_r($row);

		?>



	</div>
</body>
</html>