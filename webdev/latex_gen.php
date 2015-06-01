<?php
	function get_client_ip() {
		$ipaddress = ''; 
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP'); 
		else if(getenv('HTTP_X_FORWARDED_FOR')) 
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR'); 
		else if(getenv('HTTP_X_FORWARDED')) 
			$ipaddress = getenv('HTTP_X_FORWARDED'); 
		else if(getenv('HTTP_FORWARDED_FOR')) 
			$ipaddress = getenv('HTTP_FORWARDED_FOR'); 
		else if(getenv('HTTP_FORWARDED')) 
			$ipaddress = getenv('HTTP_FORWARDED'); 
		else if(getenv('REMOTE_ADDR')) 
			$ipaddress = getenv('REMOTE_ADDR'); 
		else 
			$ipaddress = 'UNKNOWN'; 
		return $ipaddress; 
	}
	$text  = "\documentclass{article} \r\n \r\n";
	$text = $text . "\begin{document} \r\n \r\n";
	$title = rtrim($_GET['title'], '%09%09');
	$text = $text . '\title{' . $title . "} \r\n";
	$author = rtrim($_GET['author'], '%09%09');
	$text = $text . '\author{' . $author . "} \r\n \r\n";
	$text = $text . '\maketitle' . "\r\n \r\n";
	$text = $text . '\end{document}' . "\r\n";

	$key = md5(get_client_ip());
	$fileName = $key . ".tex";
	$fh = fopen($fileName, 'w');
	fwrite($fh, $text);
	fclose($fh);
	shell_exec("pdflatex ". $fileName);

	$db = new SQLite3("../res/tex.db");
	$db -> exec('CREATE TABLE IF NOT EXISTS data(id TEXT, file TEXT, PRIMARY KEY (id));
			INSERT OR REPLACE INTO data (id, file) VAlUES("' . $key . '", "' . $key . '.pdf");
		');

	$result = $db->query('SELECT file FROM data WHERE id = "' . $key . '"');
	while ($row = $result->fetchArray())
		echo '<form action = "' . $row["file"] . '">';
	$db -> exec('DELETE FROM data where id = "' . $key . '"');
	echo '<button type = "submit"> Download Your Latex File! </button>';
	echo '</form>';

?>