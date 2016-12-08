<?php
session_start();
echo "<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>";
if(!isset($_SESSION['user'])){
	echo "Pagina protetta, devi prima effettuare il login.<br/>";
	echo "<a href='index.php'>Home</a>";
}
else{
	echo "Benvenuto ".$_SESSION['user'].".<br/>";
	$dh = "../pdf/";
	if ($handle = opendir($dh)){
		echo "<h1>File nella Directory $dh</h1>";
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
									<td><a style='text-decoration:none;' href='../pdf/$entry'><font style='color:red;'>$entry</font></a></td>
									<td><a style='text-decoration:none;' href='../pdf/$entry' download>Download - $entry</a></td>
								</tr>
								</table>";
				}
			}
		}
	}
	echo "<br/>";
	echo "*Su <font style='color:red;'>FireFox</font> si potrebbero verificare problemi sul Download del file.<br/><br/>";
	echo "<a href='../../esplora.php'>Indietro</a><br/>";
	echo "<a href='../../index.php'>Home</a>";
	echo "<h1>Elimina File</h1>";
	echo "<form action='elimina.php' method='post'>
		<input type='text' name='nome_file'/>
		<input type='submit' name='elimina' value='Elimina File'/>
		</form>";
	closedir($handle);
}
?>
