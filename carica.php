<?php
session_start();
if(!isset($_SESSION['user'])){
	echo "Pagina protetta, devi prima effettuare il login.<br/>";
	echo "<a href='index.php'>Home</a>";
}
else{
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
<form action='server.php' method='POST' enctype='multipart/form-data'>
<br/>
<p>Seleziona Cartella:
<select name='nome_cartella'>
<option value='audio/'>AUDIO</option>
<option value='immagini/'>IMMAGINI</option>
<option value='pdf/'>PDF</option>
<option value='video/'>VIDEO</option>
</select></p>
<input type='file' name='nome_file'/>
<br/>
<br/>
<input type='submit' value='Carica' name='submit'/>
</form>
</body>
</html>";
}
?>
