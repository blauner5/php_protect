<?php
session_start();
if(!isset($_SESSION['user'])){
	echo "Pagina protetta, devi prima effettuare il login.<br/>";
	echo "<a href='index.php'>Home</a>";
}
else{
	if(isset($_POST['submit'])){
		$target_dir = "upload/".$_POST['nome_cartella'];
		$target_file = $target_dir . basename($_FILES['nome_file']['name']);
		if (move_uploaded_file($_FILES['nome_file']['tmp_name'], $target_file)) {
    		echo "File valido, upload completato.<br/>";
				echo "<a href='index.php'>Home</a>";
		}
		else {
    		echo "Impossibile caricare il file.\n";
		}
	}
}
?>
