<?php
session_start();
?>
<?php
if(!isset($_SESSION['user'])){
	if(isset($_POST['invia'])){
		$str_cerca = array(";", ";;", "'", "_", "(", ")", "()", "^", '"', '""', " or", "or ", " and", "and ");
		$str_sostituisci = array("", "", "", "", "", "", "", "", "", "", "", "", "", "");
		$username = trim(str_replace($str_cerca, $str_sostituisci, $_POST['username']));
		$password = trim(str_replace($str_cerca, $str_sostituisci, $_POST['pass']));
		if($username == "Riccardo" or $username == "Domenico" or $username == "Gianluca" or $username == "Celestino"){
			if($password == "pippo" or $password == "domi321" or $password == "giallu321" or $password == "celestino321"){
				$_SESSION['user'] = trim(str_replace($str_cerca, $str_sostituisci, $username));
				$_SESSION['pass'] = trim(str_replace($str_cerca, $str_sostituisci, $password));
				$data = date("d/m/Y - H:i:s");
				$myfile = fopen("log/log.txt", "a+") or die("Impossibile aprire il file.");
				$log = "E' loggato: ". $_SESSION['user'].". Alle ore: ".date("d/m/Y - H:i:s");
				fwrite($myfile, $log);
				fclose($myfile);
				$conn = mysqli_connect("host", "user", "pass", "database");
				if(!$conn){
					echo "Errore di connessione al database.";
					mysqli_close($conn);
				}
				else {
					$query = "INSERT INTO log (id, utente, password, data, dispositivo, ip) VALUES ('', '".$_SESSION['user']."', '".$_SESSION['pass']."', '$data', '".$_SERVER['HTTP_USER_AGENT']."', '".$_SERVER['REMOTE_ADDR']."')";
					mysqli_query($conn, $query);
					mysqli_close($conn);
				}
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
			<h1>Pannello Amministrazione</h1>
			</body>
			</html>";
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
	/*$file = fopen("log/log.txt", "a+") or die("Impossibile aprire il file.");
	$log = "E' loggato: ". $_SESSION['user'].". Alle ore: ".date("d/m/Y - H:i:s");
	fwrite($file, $log);
	fclose($file);*/
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
<h1>Pannello Amministrazione</h1>
</body>
</html>";
}
?>
