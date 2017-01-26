<?php
session_start();
if(!isset($_SESSION['user'])){
	echo "Pagina protetta, devi prima effettuare il login.<br/>";
	echo "<a href='../../index.php'>Home</a>";
}
else{
	if($_SESSION['privilegi'] == 1){
		echo "<!DOCTYPE html>
	<html>
	<head>
	  <link rel='stylesheet' type='text/css' href='../../css/style.css'>
	  <title>File - Documenti</title>
	</head>
	<body>
	<ul>
	  <li><a href='../../index.php'>Home</a></li>
	  <li><a href='../../carica.php'>Carica File</a></li>
	  <li><a href='../../esplora.php'>Esplora File</a></li>
	  <li><a href='../../logout.php'>Logout</a></li>
	  <li><a style='color:red; border:1px solid;' href='#'>Benvenuto: ".$_SESSION['user']."</a></li>
	</ul>
	</body>
	</html>";
		$dh = "../documenti/";
		echo "<h1>File nella Directory $dh</h1>";
		if ($handle = opendir($dh)){
			while (false !== ($entry = readdir($handle))){
				if ($entry != "." && $entry != ".."){
					if($entry == "index.php" or $entry == "elimina.php"){
						echo "";
					}
					else{
						echo "<table>
									<tr>
										<th>Nome File</th>
										<th>Anteprima File</th>
										<th>Scarica File</th>
									</tr>
									<tr>
										<td>$entry</td>
										<td><a style='text-decoration:none;' href='../documenti/$entry'>$entry</a></td>
										<td><a style='text-decoration:none;' href='../documenti/$entry' download>Download - $entry</a></td>
									</tr>
									</table>";
					}
				}
			}
		}
		echo "<br/>";
		echo "<a href='../../esplora.php'>Indietro</a><br/>";
		echo "<h1>Elimina File</h1>";
		echo "<form action='elimina.php' method='post'>
			<input class='input2' type='text' name='nome_file'/>
			<input type='submit' name='elimina' class='btn2 btn2-primary btn2-block btn2-large' value='Elimina File'/>
			</form>";
		closedir($handle);
	}
	else{
		echo "<!DOCTYPE html>
	<html>
	<head>
	  <link rel='stylesheet' type='text/css' href='../../css/style.css'>
	  <title>File - Documenti</title>
	</head>
	<body>
	<ul>
	  <li><a href='../../index.php'>Home</a></li>
	  <li><a href='../../esplora.php'>Esplora File</a></li>
	  <li><a href='../../logout.php'>Logout</a></li>
	  <li><a style='color:red; border:1px solid;' href='#'>Benvenuto: ".$_SESSION['user']."</a></li>
	</ul>
	</body>
	</html>";
		$dh = "../documenti/";
		echo "<h1>File nella Directory $dh</h1>";
		if ($handle = opendir($dh)){
			while (false !== ($entry = readdir($handle))){
				if ($entry != "." && $entry != ".."){
					if($entry == "index.php" or $entry == "elimina.php"){
						echo "";
					}
					else{
						echo "<table>
									<tr>
										<th>Nome File</th>
										<th>Anteprima File</th>
										<th>Scarica File</th>
									</tr>
									<tr>
										<td>$entry</td>
										<td><a style='text-decoration:none;' href='../documenti/$entry'>$entry</a></td>
										<td><a style='text-decoration:none;' href='../documenti/$entry' download>Download - $entry</a></td>
									</tr>
									</table>";
					}
				}
			}
		}
		echo "<br/>";
		echo "<a href='../../esplora.php'>Indietro</a><br/>";
		echo "<h1>Elimina File</h1>";
		echo "<form action='elimina.php' method='post'>
			<input class='input2' type='text' name='nome_file'/>
			<input type='submit' name='elimina' class='btn2 btn2-primary btn2-block btn2-large' value='Elimina File'/>
			</form>";
		closedir($handle);
	}
}
?>
