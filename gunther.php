<?php
$pdo = new PDO ('mysql:host=localhost; dbname=projekttage', 'root', '');
$sql_01 = "INSERT INTO benutzer (Benutzer_ID, Name, Jahrgangsstufe, Rolle) VALUES (1, 'Hans Meier', 5, 'Schueler')";
$pdo->query($sql_01)
$sql_02 = "INSERT INTO benutzer (Benutzer_ID, Name, Jahrgangsstufe, Rolle) VALUES (2, 'Clara Bauer', 7, 'Schueler')";
$pdo->query($sql_02)
$sql_03 = "UPDATE benutzer SET Benutzer_ID = 3, Jahrgangsstufe = 7 WHERE Name = 'Clara Bauer'";
$pdo->query($sql_03)
?>