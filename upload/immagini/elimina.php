<?php
session_start();
if(!isset($_SESSION['user'])){
	echo "Pagina protetta, devi prima effettuare il login.<br/>";
	echo "<a href='../../index.php'>Home</a>";
}
else {
	if($_SESSION['privilegi']==1){
		if(isset($_POST['elimina'])){
			$nome_file = $_POST['nome_file'];
			if(file_exists('../immagini/'.$nome_file)){
				if($nome_file == "elimina.php" or $nome_file == "index.php"){
					echo "Impossibile eliminare il seguente file.<br/>";
					echo "<a href='../../esplora.php'>Esplora File</a>";
				}
				else {
					unlink('../immagini/'.$_POST['nome_file']);
					echo "File eliminato<br/>";
					echo "<a href='../../esplora.php'>Esplora File</a>";
				}
			}
			else {
				echo "<font style='color:red;'>File non trovato</font><br/>";
				echo "<a href='../../esplora.php'>Esplora File</a>";
			}
		}
	}
	else{
		echo "<p>Non hai i privilegi per accedere alla pagina.</p>";
		echo "<a href='index.php'>Home</a>";
	}
}
?>
