<?php
session_start();
?>
<?php
if(!isset($_SESSION['user'])){
	if(isset($_POST['invia'])){
		$username = $_POST['username'];
		if($username == "Riccardo"){
			$_SESSION['user']=$username;
			echo "Benvenuto ".$_SESSION['user'].".<br/>";
			echo "<a href='pagina_protetta.php'>Carica File</a>";
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
    <p>Username:</p>
    <input type='text' name='username'/>
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
	echo "<a href='pagina_protetta.php'>Carica File</a>";
}
?>