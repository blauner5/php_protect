<?php
session_start();
?>
<?php
if(!isset($_SESSION['user'])){
	if(isset($_POST['invia'])){
		$username = $_POST['username'];
		$password = $_POST['pass'];
		if($username == "Riccardo" or $username == "Domenico" or $username == "Gianluca" or $username == "Celestino"){
			if($password == "pippo" or $password == "domidomi" or $password == "giallugiallu" or $password == "celestino321"){
				$_SESSION['user']=$username;
				echo "Benvenuto ".$_SESSION['user'].".<br/>";
				$myfile = fopen("log/log.txt", "w") or die("Impossibile aprire il file.");
				$log = "E' loggato: ". $username .". Alle ore: ".date("d/m/Y")."\n";
				fwrite($myfile, $log);
				fclose($myfile);
				echo "<a href='pagina_protetta.php'>Carica File</a><br/>";
				echo "<a href='esplora.php'>Esplora File</a>";
			}
			else {
				echo "Password non valida.<br/>";
				echo "<a href='index.php'>Home</a>";
			}
		}
		else {
			echo "Username non valido, riprova. <br/>";
			echo "<a href='index.php'>Home</a>";
		}
	}
	else {
		echo "<html>
					<body>
    			<form action='index.php' method='post'>
					<br/>
    			<p>Username:</p>
    			<input type='text' name='username'/>
    			<br/>
					<p>Password:</p>
					<input type='password' name='pass'/>
    			<br/>
					<br/>
    			<input type='submit' name='invia' value='Invia'/>
    			</form>
    			<br/>
    			</body>
					</html>";
	}
}
else {
	echo "Benvenuto ".$_SESSION['user'].".<br/>";
	$file = fopen("log/log.txt", "w") or die("Impossibile aprire il file.");
	$log = "E' loggato: ". $_SESSION['user'].". Alle ore: ".date("d/m/Y")."\n";
	fwrite($file, $log);
	fclose($file);
	echo "<a href='pagina_protetta.php'>Carica File</a><br/>";
	echo "<a href='esplora.php'>Esplora File</a>";
}
?>
