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
				$_SESSION['privilegi'] = 1;
				$_SESSION['user'] = trim(str_replace($str_cerca, $str_sostituisci, $username));
				$_SESSION['pass'] = trim(str_replace($str_cerca, $str_sostituisci, $password));
				$data = date("d/m/Y - H:i:s");
				/*$conn = mysqli_connect("host", "user", "password", "database");
				if(!$conn){
					echo "Errore di connessione al database.";
					mysqli_close($conn);
				}
				else {
					$query = "INSERT INTO log (id, utente, password, data, dispositivo, ip) VALUES ('', '".$_SESSION['user']."', '".$_SESSION['pass']."', '$data', '".$_SERVER['HTTP_USER_AGENT']."', '".$_SERVER['REMOTE_ADDR']."')";
					mysqli_query($conn, $query);
					mysqli_close($conn);
				}*/
				$myfile = fopen("log/log.txt", "a+") or die("Impossibile aprire il file.");
				$log = "E' loggato: ". $_SESSION['user'].". Alle ore: ".date("d/m/Y - H:i:s");
				fwrite($myfile, $log);
				fclose($myfile);
				if ($_SESSION['privilegi'] == 1){
					echo "<!DOCTYPE html>
					<html>
					<head>
						<link rel='stylesheet' type='text/css' href='css/style.css'>
						<title>Admin - Home</title>
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
					echo "<!DOCTYPE html>
					<html>
					<head>
						<link rel='stylesheet' type='text/css' href='css/style.css'>
						<title>User - Home</title>
					</head>
					<body>
					<ul>
				  	<li><a href='index.php'>Home</a></li>
				  	<li><a href='esplora.php'>Esplora File</a></li>
				  	<li><a href='logout.php'>Logout</a></li>
						<li><a style='color:#B22222; border:1px solid;' href='#'>Benvenuto: ".$_SESSION['user']."</a></li>
					</ul>
					<h1>Pannello User</h1>
					</body>
					</html>";
				}
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
					<head>
						<script src='js/index.js'></script>
						<link rel='stylesheet' type='text/css' href='css/style.css'>
						<title>Home</title>
					</head>
					<body>
					<div class='login'>
    				<form action='index.php' method='post'>
						<br/>
    				<p>Username:</p>
    				<input type='text' name='username' required/>
    				<br/>
						<p>Password:</p>
						<input type='password' name='pass' required/>
    				<br/>
						<br/>
    				<input type='submit' name='invia' class='btn btn-primary btn-block btn-large' value='Login'/>
						<p>Nuovo Utente? <a href='#'>Iscriviti</a></p>
						<p>Password Dimenticata? <a href='#'>Recupera Password</a></p>
    				</form>
					</div>
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
	if($_SESSION['privilegi'] == 1){
		echo "<!DOCTYPE html>
		<html>
		<head>
			<link rel='stylesheet' type='text/css' href='css/style.css'>
			<title>Admin - Home</title>
		</head>
		<body>
		<ul>
			<li><a href='index.php'>Home</a></li>
			<li><a href='carica.php'>Carica File</a></li>
			<li><a href='esplora.php'>Esplora File</a></li>
			<li><a href='logout.php'>Logout</a></li>
			<li><a style='color:#B22222; border:1px solid;' href='#'>Benvenuto: ".$_SESSION['user']."</a></li>
		</ul>
		<h1>Pannello Amministrazione</h1>
		</body>
		</html>";
	}
	else {
		echo "<!DOCTYPE html>
		<html>
		<head>
			<link rel='stylesheet' type='text/css' href='css/style.css'>
			<title>User - Home</title>
		</head>
		<body>
		<ul>
			<li><a href='index.php'>Home</a></li>
			<li><a href='esplora.php'>Esplora File</a></li>
			<li><a href='logout.php'>Logout</a></li>
			<li><a style='color:#B22222; border:1px solid;' href='#'>Benvenuto: ".$_SESSION['user']."</a></li>
		</ul>
		<h1>Pannello User</h1>
		</body>
		</html>";
	}
}
?>
