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
				<br/>
				<p>Seleziona Cartella:
				<select name='nome_cartella'>
  			<option value='audio/'>Audio</option>
  			<option value='immagini/'>Immagini</option>
  			<option value='pdf/'>PDF</option>
  			<option value='video/'>Video</option>
				</select></p>
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
