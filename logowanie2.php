<?php
	include 'konfiguracja.php';
	
	$haslo = hash("sha256",$_GET["pwd"]);
	$connect = mysqli_connect('artkoc7548.mysql.dhosting.pl', 'jei4ae_novikov', '@weF4+Jz5Q', 'kiku9o_novikov');

	$sql = "SELECT id FROM uzytkownicy WHERE login='".$_GET["lgn"]."' AND haslo = '".$haslo."'";
	
	$rezultat = mysqli_query($connect,$sql);
	if(mysqli_num_rows($rezultat) == 1) {
		mysqli_close($connect);
		setcookie('login', $_GET["lgn"], time()+3600*24);
		setcookie('haslo', $haslo, time()+3600*24);
		header("Location: menu.php");
		die();
	}
	mysqli_close($connect);
	header("Location: logowanie.php");
	die();
?>