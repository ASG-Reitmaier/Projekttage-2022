<?php
require_once('search.php');
$db = new DB();
?>

<html lang='de'>

<!DOCTYPE html> 
<html> 
 
<head>
        
        <meta name ="viewport" content="width-device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <meta name="description" content="">
        <title>Anmeldemaske</title>
        <meta name="author" content="">
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       <link rel="shortcut icon" href="img/asg-logo.jpg" type="image/x-icon" />

       <!-- CSS von Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>


<img src="img/asg-logo.jpg" class="img-fluid" alt="Responsive image">
  



    <?php

if(isset($_GET['id'])){
    
    $projektDaten = $db->zeigeKurs($_GET['id']);
    
    ?>
    

<<<<<<< HEAD
<h1 align ="center"> <?php echo $projektDaten[0]["name"]; ?></h1>
=======
   <div>
   <img src= '<?php echo "../".$projektDaten[0]['bild'];?>' class='img-thumbnail' style='max-width:25%' alt='Responsive image'>
   <?php
   echo $projektDaten[0]["beschreibung"];?>
   <div>
>>>>>>> 953e63610f21f6806d36de323e6b301cffa2915a

<div class="container-md">
  <img src= '<?php echo $projektDaten[0]['bild']?>' class=' rounded mx-auto d-block' style='max-width:50%' alt='Responsive image'> 
</div>

  <div class="container-sm p-5 my-5 border">
   <h5 align ="center"> <?php echo $projektDaten[0]["beschreibung"];?> </h5>
  </div>
   <div class="container-md">
  <table class="table table-borderless table-active table-vcenter">
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

<!-- <div class="d-flex align-items-start bg-light mb-3" style="height: 25px;">
  <div class="col"><td>     <?php echo $projektDaten[0]["kursleiter1"] ?></td></div>
  <div class="col"><td>     <?php echo $projektDaten[0]["kursleiter2"] ?></td></div>
  <div class="col"><td>     <?php echo $projektDaten[0]["kursleiter3"] ?></td></div>
</div> -->


  <table class="table table-borderless table-active table-vcenter">
  <thead>
    <tr>
      <th scope="col">Zeitraum von</th>
      <th scope="col">Zeitraum bis</th>
      <th scope="col">Ort</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>     <?php echo $projektDaten[0]["zeitraum_von"] ?></td>
      <td>     <?php echo $projektDaten[0]["zeitraum_bis"] ?></td>
      <td>     <?php echo $projektDaten[0]["ort"] ?></td>
    </tr>
  </tbody>
</table>
</div>
<!--<div class="d-flex align-items-start bg-light mb-3" style="height: 25px;">
  <div class="col"><td>     <?php echo $projektDaten[0]["zeitraum_von"] ?></td></div>
  <div class="col"><td>     <?php echo $projektDaten[0]["zeitraum_bis"] ?></td></div>
</div>-->



<?php } ?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

  <button type="submit" class="btn btn-primary">Senden</button>
  
  </form>
 
 
    </body>