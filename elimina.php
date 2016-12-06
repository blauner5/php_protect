<?php
session_start();
if(!isset($_SESSION['user'])){
	echo "Pagina protetta, devi prima effettuare il login.<br/>";
	echo "<a href='index.php'>Home</a>";
}
else {
	if(isset($_POST['elimina'])){
		$nome_file = $_POST['nome_file'];
		if(file_exists('upload/'.$nome_file)){
			unlink('upload/'.$_POST['nome_file']);
			echo "File eliminato<br/>";
			echo "<a href='esplora.php'>Esplora File</a>";
		}
		else {
			echo "File non trovato<br/>";
			echo "<a href='esplora.php'>Esplora File</a>";
		}
	}
}
?>