<?php
session_start();
if(!isset($_SESSION['user'])){
	echo "Pagina protetta, devi prima effettuare il login.<br/>";
	echo "<a href='index.php'>Home</a>";
}
else{
	echo "Benvenuto ".$_SESSION['user'].".<br/>";
	$dh = "upload/";
	if ($handle = opendir($dh)){
		echo "<h1>File nella Directory</h1>";
		while (false !== ($entry = readdir($handle))){
			if ($entry != "." && $entry != ".."){
				if($entry == "index.html"){
					echo "";
				}
				else{
					echo "Nome File: <a style='text-decoration:none;' href='upload/$entry'><font style='color:red;'>$entry</font></a><br/>";
				}
			}
		}
	}
	echo "<br/>";
	echo "<a href='index.php'>Home</a>";
	echo "<h1>Elimina File</h1>";
	echo "<form action='elimina.php' method='post'>
		<input type='text' name='nome_file'/>
		<input type='submit' name='elimina' value='Elimina File'/>
		</form>";
	closedir($handle);
}
?>