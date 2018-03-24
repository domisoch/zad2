<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CRAWLER</title>
		<link rel="stylesheet" type="text/css" href="crawler-style.css">
	</head>
	<body>
		<div id = "search_box">
			<h1>Crawler</h1>
			<form action = "crawler.php" method = "GET">
				<input type = "text" value="<?php if(isset($_GET['name'])){echo $_GET['name'];} ?>" name = "name" id="input"><br><br>
				<button type = "submit" class = "button">Crawl!</button>
			</form>
		

		<?php
			if (isset($_GET["name"])){
				$url = $_GET["name"];
				if (filter_var($url, FILTER_VALIDATE_URL)){}
				else {
		    	echo("$url is not a valid URL");
				}
			}
			echo "</div>"; 
			error_reporting(E_ERROR | E_PARSE);
			get_links($url);
			function get_links($url) {
		    	$xml = new DOMDocument();
		    	$xml->loadHTMLFile($url);
		    	foreach($xml->getElementsByTagName('a') as $link) {
		        	$link->getAttribute('href'); 
		    		echo '<div id = "result_box">' .$link->getAttribute('href'). '</div>';		  
		    	}
			} 
		?>
		
	</body>
</html>