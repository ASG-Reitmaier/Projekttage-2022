<?php 

$host = 'vmd48086.contaboserver.net';
$dbname = 'projekttage';
$user = 'Protage';
$password = 'protage2020';
$dsn = "mysql:host=" . $host . ";dbname=" . $dbname . ";charset=utf8";

   try {
       $con = new PDO($dsn, $user, $password);
       $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   } catch (PDOException $e) {
       echo "Connection Failure" . $e->getMessage();
   }


   $query = "SELECT * FROM benutzer ORDER BY name";
   $statement = $con->prepare($query);
   $statement->execute();
   $data = $statement->fetchAll(PDO::FETCH_ASSOC);
   echo $data ['0']['name'];

?>