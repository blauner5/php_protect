<?php
session_start();
if(!isset($_SESSION['user'])){
	echo "Pagina protetta, devi prima effettuare il login.<br/>";
	echo "<a href='index.php'>Home</a>";
}
else{
	if($_SESSION['privilegi']== 1){
		echo "<!DOCTYPE html>
	<html>
	<head>
		<link rel='stylesheet' type='text/css' href='css/style.css'>
		<title>Esplora File</title>
	</head>
	<body>
	<ul>
	  <li><a href='index.php'>Home</a></li>
	  <li><a href='carica.php'>Carica File</a></li>
	  <li><a href='esplora.php'>Esplora File</a></li>
	  <li><a href='logout.php'>Logout</a></li>
		<li><a style='color:#B22222; border:1px solid;' href='#'>Benvenuto: ".$_SESSION['user']."</a></li>
	</ul>
	</body>
	</html>";
		$dh = "upload/";
		if ($handle = opendir($dh)){
			echo "<h1>Directory Principale</h1>";
			while (false !== ($entry = readdir($handle))){
				if ($entry != "." && $entry != ".."){
					if($entry == "index.html" or $entry == ".htaccess" or $entry == ".htaccess.save"){
						echo "";
					}
					else{
						echo "Nome Cartella: <a style='text-decoration:none;' href='upload/$entry'>$entry <img src='/img/dir.png' width='15' height='12'></a><br/><br/>";
					}
				}
			}
		}
		echo "<br/>";
		echo "*Su <font style='color:#B22222;'>FireFox</font> si potrebbero verificare problemi sul Download del file.<br/><br/>";
		/*
		echo "<h1>Elimina File</h1>";
		echo "<form action='elimina.php' method='post'>
			<input type='text' name='nome_file'/>
			<input type='submit' name='elimina' value='Elimina File'/>
			</form>";*/
		closedir($handle);
	}
	else{
		echo "<!DOCTYPE html>
	<html>
	<head>
		<link rel='stylesheet' type='text/css' href='css/style.css'>
		<title>Esplora File</title>
	</head>
	<body>
	<ul>
	  <li><a href='index.php'>Home</a></li>
	  <li><a href='esplora.php'>Esplora File</a></li>
	  <li><a href='logout.php'>Logout</a></li>
		<li><a style='color:#B22222; border:1px solid;' href='#'>Benvenuto: ".$_SESSION['user']."</a></li>
	</ul>
	</body>
	</html>";
		$dh = "upload/";
		if ($handle = opendir($dh)){
			echo "<h1>Directory Principale</h1>";
			while (false !== ($entry = readdir($handle))){
				if ($entry != "." && $entry != ".."){
					if($entry == "index.html" or $entry == ".htaccess" or $entry == ".htaccess.save"){
						echo "";
					}
					else{
						echo "Nome Cartella: <a style='text-decoration:none;' href='upload/$entry'>$entry <img src='/img/dir.png' width='15' height='12'></a><br/><br/>";
					}
				}
			}
		}
		echo "<br/>";
		echo "*Su <font style='color:#B22222;'>FireFox</font> si potrebbero verificare problemi sul Download del file.<br/><br/>";
		/*
		echo "<h1>Elimina File</h1>";
		echo "<form action='elimina.php' method='post'>
			<input type='text' name='nome_file'/>
			<input type='submit' name='elimina' value='Elimina File'/>
			</form>";*/
		closedir($handle);
	}
}
?>
