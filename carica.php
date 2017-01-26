<?php
session_start();
if(!isset($_SESSION['user'])){
	echo "Pagina protetta, devi prima effettuare il login.<br/>";
	echo "<a href='index.php'>Home</a>";
}
else{
	if($_SESSION['privilegi'] == 1){
		echo "<!DOCTYPE html>
	<html>
	<head>
		<link rel='stylesheet' type='text/css' href='css/style.css'>
		<title>Carica File</title>
	</head>
	<body>
	<ul>
	  <li><a href='index.php'>Home</a></li>
	  <li><a href='carica.php'>Carica File</a></li>
	  <li><a href='esplora.php'>Esplora File</a></li>
	  <li><a href='logout.php'>Logout</a></li>
		<li><a style='color:#B22222; border:1px solid;' href='#'>Benvenuto: ".$_SESSION['user']."</a></li>
	</ul>
	<div class='carica'>
	<form action='server.php' method='POST' enctype='multipart/form-data'>
	<br/>
	<p>Seleziona Cartella:
	<select name='nome_cartella'>
	<option value='audio/'>AUDIO</option>
	<option value='documenti/'>DOCUMENTI</option>
	<option value='immagini/'>IMMAGINI</option>
	<option value='pdf/'>PDF</option>
	<option value='video/'>VIDEO</option>
	</select></p>
	<input type='file' name='nome_file'/>
	<br/>
	<br/>
	<input type='submit' value='Carica' class='btn btn-primary btn-block btn-large' name='submit'/>
	</form>
	</div>
	</body>
	</html>";
	}
	else{
		echo "<p>Non hai i privilegi per accedere alla pagina.</p>";
		echo "<a href='index.php'>Home</a>";
	}
}
?>
