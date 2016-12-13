<?php
session_start();
if(!isset($_SESSION['user'])){
	echo "Pagina protetta, devi prima effettuare il login.<br/>";
	echo "<a href='index.php'>Home</a>";
}
else{
	echo "<!DOCTYPE html>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
		color:red;
}

li a {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}
</style>
</head>
<body>
<ul>
  <li><a href='index.php'>Home</a></li>
  <li><a href='carica.php'>Carica File</a></li>
  <li><a href='esplora.php'>Esplora File</a></li>
  <li><a href='logout.php'>Logout</a></li>
	<li><a style='color:red; border:1px solid;' href='#'>Benvenuto: ".$_SESSION['user']."</a></li>
</ul>
</body>
</html>";
	$dh = "upload/";
	if ($handle = opendir($dh)){
		echo "<h1>Directory Principale</h1>";
		while (false !== ($entry = readdir($handle))){
			if ($entry != "." && $entry != ".."){
				if($entry == "index.html" or $entry == ".htaccess"){
					echo "";
				}
				else{
					echo "Nome Cartella: <a style='text-decoration:none;' href='upload/$entry'><font style='color:red;'>$entry</font> <img src='/img/dir.png' width='15' height='12'></a><br/><br/>";
				}
			}
		}
	}
	echo "<br/>";
	echo "*Su <font style='color:red;'>FireFox</font> si potrebbero verificare problemi sul Download del file.<br/><br/>";
	/*
	echo "<h1>Elimina File</h1>";
	echo "<form action='elimina.php' method='post'>
		<input type='text' name='nome_file'/>
		<input type='submit' name='elimina' value='Elimina File'/>
		</form>";*/
	closedir($handle);
}
?>
