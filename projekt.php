<html lang='de'>
 
<?php
  require_once("search.php");
  $db = new DB();
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
</head>
<body>
    <div class="container">
    <h1> Projekttage </h1>
    <?php
    
    $sqlBefehl = 'SELECT * FROM projekttage';
    $abfrage = $con->prepare($sqlbefehl);
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
        echo "<td>". $zeile ["beschraenkung"] . "</td>" ;
        echo "<td>". $zeile ["ort"] . "</td>" ;
        echo "<td>". $zeile ["zeitraum_von"] . "</td>" ;
        echo "<td>". $zeile ["zeitraum_bis"] . "</td>"  ;
        echo "<td>". $zeile ["kosten"] . "</td>" ;
        echo "</tr>" ;
                     
    }
    echo "</table>";  
    ?>
 
    </body>