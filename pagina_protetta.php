<?php
session_start();
if(!isset($_SESSION['user'])){
	echo "Pagina protetta, devi prima effettuare il login.<br/>";
	echo "<a href='index.php'>Home</a>";
}
else{
	echo "Benvenuto ".$_SESSION['user'].".";
	echo "<!doctype html>
		<html>
			<head>
				<meta charset='utf-8'>
				<title>Upload file</title>
			</head>
			<body>
				<form action='server.php' method='POST' enctype='multipart/form-data'>
				<input type='file' name='nome_file'/>
				<br/>
				<br/>
				<input type='submit' value='Carica' name='submit'/>
				</form>
			</body>
		</html>";
		echo "<a href='index.php'>Home</a><br/><br/>";
}
?>