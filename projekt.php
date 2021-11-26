<?php
require_once('search.php');
$db = new DB();
?>

<html lang='de'>
 
<head>
        
        <meta name ="viewport" content="width-device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Anmeldemaske</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
              
</head>
<body>



    <h1> Projekttage</h1>


    <?php

if(isset($_GET['id'])){
    echo $_GET['id'];
    $projektDaten = $db->zeigeKurs($_GET['id']);
    echo $projektDaten[0]["name"];
    ?>

   <img src= '<?php echo $projektDaten[0]['bild']?>' class='img-fluid' alt='Responsive image'>
   <?php
   echo $projektDaten[0]["beschreibung"];?>

   <div class="container-fluid">
   <table class="table">
  <thead>
    <tr>
      <th scope="col">Kursleiter 1</th>
      <th scope="col">Kursleiter 2</th>
      <th scope="col">Kursleiter 3</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>     <?php echo $projektDaten[0]["kursleiter1"] ?></td>
      <td>     <?php echo $projektDaten[0]["kursleiter2"] ?></td>
      <td>     <?php echo $projektDaten[0]["kursleiter3"] ?></td>
    </tr>
  </tbody>
</table>
</div>


<?php } ?>

 
 
    </body>