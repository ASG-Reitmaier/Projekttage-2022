

<html lang='de'>
 
<head>
        
        <meta name ="viewport" content="width-device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Anmeldemaske</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
              
</head>
<body>



    <h1> Projekttage - Die Identifikationsnummer des ausgewählten Kurses ist <?php echo $_GET['id']?></h1>


    <?php

    echo $_GET['id'];
    
    //Besser folgendes verwenden:
    //require_once('search.php');
    //$db = new DB();

       
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
   

    $sqlBefehl = "SELECT * FROM kurse";
    $abfrage = $con->prepare($sqlBefehl);
    $abfrage->execute();
    $ergebnismenge = $abfrage -> fetchAll(PDO::FETCH_ASSOC);
 
    echo "<table>";
    echo "<thead><tr>";
    echo "<td>Name</td><td>Kursleiter1</td><td>Kursleiter2</td><td>Kursleiter3</td>
    <td>Teilnehmerbegrenzung</td><td>Beschränkung</td><td>Ort</td><td>Zeitraum von</td>
    <td>Zeitraum bis</td><td>Kosten</td>";
 

    foreach($ergebnismenge AS $zeile) {
        echo "<tr>";
        echo "<td>". $zeile ["name"] . "</td>";      
        echo "<td>". $zeile ["kursleiter1"] . "</td>";  
        echo "<td>". $zeile ["kursleiter2"] . "</td>" ; 
        echo "<td>". $zeile ["kursleiter3"] . "</td>";
        echo "<td>". $zeile ["teilnehmerbegrenzung"] . "</td>" ;           
        echo "<td>". $zeile ["jahrgangsstufen_beschraenkung"] . "</td>" ;
        echo "<td>". $zeile ["ort"] . "</td>" ;
        echo "<td>". $zeile ["zeitraum_von"] . "</td>" ;
        echo "<td>". $zeile ["zeitraum_bis"] . "</td>"  ;
        echo "<td>". $zeile ["kosten"] . "</td>" ;
        echo "</tr>" ;
                     
    }
    echo "</table>";  
    ?>

 
 
    </body>