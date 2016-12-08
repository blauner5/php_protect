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
				$_SESSION['user'] = $username;
				$_SESSION['pass'] = $password;
				$data = date("d/m/Y - H:i:s");
				echo "Benvenuto ".$_SESSION['user'].".<br/>";
				$myfile = fopen("log/log.txt", "a+") or die("Impossibile aprire il file.");
				$log = "E' loggato: ". $_SESSION['user'].". Alle ore: ".date("d/m/Y - H:i:s");
				fwrite($myfile, $log);
				fclose($myfile);
				$conn = mysqli_connect("host", "user", "password", "database");
				if(!$conn){
					echo "Errore di connessione al database.";
					mysqli_close($conn);
				}
				else {
					$query = "INSERT INTO log (id, utente, password, data, dispositivo, ip) VALUES ('', '".$_SESSION['user']."', '".$_SESSION['pass']."', '$data', '".$_SERVER['HTTP_USER_AGENT']."', '".$_SERVER['REMOTE_ADDR']."')";
					mysqli_query($conn, $query);
				}
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
	/*$file = fopen("log/log.txt", "a+") or die("Impossibile aprire il file.");
	$log = "E' loggato: ". $_SESSION['user'].". Alle ore: ".date("d/m/Y - H:i:s");
	fwrite($file, $log);
	fclose($file);*/
	echo "<a href='pagina_protetta.php'>Carica File</a><br/>";
	echo "<a href='esplora.php'>Esplora File</a>";
}
?>
