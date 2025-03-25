<?php
    include 'konfiguracja.php';

	$haslo = hash("sha256", $_GET["pwd"]);

	$sql2 = "INSERT INTO uzytkownicy (login, haslo) VALUES ('". $_GET["lgn"] ."', '". $haslo ."')";
	$connect = mysqli_connect('artkoc7548.mysql.dhosting.pl', 'jei4ae_novikov', '@weF4+Jz5Q', 'kiku9o_novikov');
	$sql1 = "SELECT id FROM uzytkownicy WHERE login = '".$_GET["lgn"]."'";
	$rezultat = mysqli_query($connect,$sql1);


	if (mysqli_num_rows($rezultat) == 0) {
		mysqli_query($connect,$sql2);
		mysqli_close($connect);
		header("Location: rejestracja4.php");
		die();
	}
	mysqli_close($connect);
	header("Location: rejestracja3.php");
	die();
	?>