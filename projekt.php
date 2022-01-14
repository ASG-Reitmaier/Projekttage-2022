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
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/components/alerts/">
    
</head>
<body>
<div style="float: right; background-color:#fb4400; height: 170% ; width:4%" data-scroll>
        <input formmethod="post" type="image" id="logout" alt="logout" src="../uploads\Test\Logout Logo v2.png" style="width: 100%;"> 
    </div>

    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light" style="height: 10ch;">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwzB-PnY6KPKMhQxP9mBPsWxX29ESb72pGgQ&usqp=CAU" class="rounded float-right mg-fluid" style="width: 5%;">
        <div class="container-fluid">
            <ul class="navbar-nav mr-auto" style="font-size: 2.5ch; padding">
                <li class="nav-item active">
                    <a class="nav-item nav-link" href="../index.php">Übersicht</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-item nav-link" href="../create.php">Erstellen</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-item nav-link" href="../login.php">Adminstration</a>
                <li class="nav-item active">
                    <a class="nav-item nav-link" href="../admin.php">Verwaltung</a>
                </li>
            </ul>
        </div>

    </nav>


  



    <?php

if(isset($_GET['id'])){
    
    $projektDaten = $db->zeigeKurs($_GET['id']);
    
    ?>
 
<h1 font-family="mono sans" align ="center"> <?php echo $projektDaten[0]["name"]; ?></h1>
<br>
   <div>
   <img src= '<?php echo "../".$projektDaten[0]['bild'];?>' class='rounded mx-auto d-block img-thumbnail' style='max-width:30%' alt='Responsive image'>
  
   <div>

  <div class="container-sm p-5 my-5 border">
   <h5 align ="center"> <?php echo $projektDaten[0]["beschreibung"];?> </h5>
  </div>
   <div class="container-md">
  <table class="table table-borderless table-active table-vcenter">

  <thead>
    <tr>
      <th class="text-center" scope="col">Kursleiter 1</th>
      <th class="text-center" scope="col">Kursleiter 2</th>
      <th class="text-center" scope="col">Kursleiter 3</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="width:33%" class="text-center">     <?php echo $projektDaten[0]["kursleiter1"] ?></td>
      <td style="width:33%" class="text-center">     <?php echo $projektDaten[0]["kursleiter2"] ?></td>
      <td style="width:33%" class="text-center">     <?php echo $projektDaten[0]["kursleiter3"] ?></td>
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
      <th class="text-center" scope="col">Zeitraum von</th>
      <th class="text-center" scope="col">Zeitraum bis</th>
      <th class="text-center" scope="col">Ort</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="width:33%" class="text-center">     <?php echo $projektDaten[0]["zeitraum_von"] ?></td>
      <td style="width:33%" class="text-center">     <?php echo $projektDaten[0]["zeitraum_bis"] ?></td>
      <td style="width:33%" class="text-center">     <?php echo $projektDaten[0]["ort"] ?></td>
    </tr>
  </tbody>
</table>

<table class="table table-borderless table-active table-vcenter">
 
  <thead>
    <tr>
      <th class="text-center" scope="col">Teilnehmerbegrenzung</th>
      <th class="text-center" scope="col">Jahrgangsstufenbeschränkung</th>
      <th class="text-center" scope="col">Kosten</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td style="width:33%" class="text-center">     <?php echo $projektDaten[0]["teilnehmerbegrenzung"] ?></td>
      <td style="width:33%" class="text-center">     <?php echo $projektDaten[0]["jahrgangsstufen_beschraenkung"] ?></td>
      <td style="width:33%" class="text-center">     <?php echo $projektDaten[0]["kosten"] ?></td>
    </tr>
  </tbody>
</table> 

</div>
<!--<div class="d-flex align-items-start bg-light mb-3" style="height: 25px;">
  <div class="col"><td>     <?php echo $projektDaten[0]["teilnehmerbegrenzung"] ?></td></div>
  <div class="col"><td>     <?php echo $projektDaten[0]["jahrgangsstufen_beschraenkung"] ?></td></div>
  <div class="col"><td>     <?php echo $projektDaten[0]["kosten"] ?></td></div>
</div>-->



<?php } ?>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">

  <button type="submit" class="btn btn-primary" value="anmelden" name="button">Anmelden</button>
  
  </form>

  <?php
  if(isset($_POST["button"]))
  {
    $db->pruefeUser_Zeit(3, 11);
  
  }
 
 ?>
    </body>