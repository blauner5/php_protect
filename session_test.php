<?php
session_start();
$_SESSION['username'] = "NULL";
$_SESSION['email'] = "";
?>
<html>
<body>
<form action="mysql.php" method="post">
<p>Username:</p>
<input type="text" name="username"/>
<p>Email:</p>
<input type="email" name="email"/>
<br/>
<br/>
<input type="submit" value="Invia" name="invia"/>
</form>
</body>
</html>
<?php
$con = mysqli_connect("192.168.1.138", "root", "lollomar", "blauner") or die("Connessione al database non riuscita.");

if(isset($_POST['invia'])){
	$username = $_POST['username'];
	$email = $_POST['email'];
	$_SESSION['username'] = $username;
	$_SESSION['email'] = $email;
}
if(!$con){
	echo "Connessione al database rifiutata.";
	mysqli_close($con);
}
else {
	$query = "SELECT name FROM user WHERE name ='".$_SESSION['username']."'";
	$risultato = mysqli_query($con, $query);
	$num_righe = mysqli_num_rows($risultato);
	if($num_righe == 0){
		echo "Database vuoto, nessun risultato trovato con nome: ".$_SESSION['username']."<br/><br/>";
		echo "Benvenuto ". $_SESSION['username'] ." la tua email è: ". $_SESSION['email'] ."<br/><br/>";
		echo "Attenzione: il risultato dei campi presenti nel database cambierà in base all'utente scelto sul campo <font style='color:red;'>Username</font>.<br/>";
	}
	else if($num_righe == 1){
		echo "C'è ". $num_righe ." riga presente nel database con nome: ".$_SESSION['username']."<br/><br/>";
		echo "Benvenuto ". $_SESSION['username'] ." la tua email è: ". $_SESSION['email'] ."<br/><br/>";
		echo "Attenzione: il risultato dei campi presenti nel database cambierà in base all'utente scelto sul campo <font style='color:red;'>Username</font>.<br/>";
	}
	else {
		echo "Ci sono ". $num_righe ." righe presenti nel database con nome: ".$_SESSION['username']."<br/><br/>";
		echo "Benvenuto ". $_SESSION['username'] ." la tua email è: ". $_SESSION['email'] ."<br/><br/>";
		echo "Attenzione: il risultato dei campi presenti nel database cambierà in base all'utente scelto sul campo <font style='color:red;'>Username</font>.<br/>";
	}
}
?>