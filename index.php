<?php require_once 'search.php';

$db = new DB();

session_start();
?>

<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Testseite</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/grid/">

    <!-- CSS von Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Grid-Design von Bootstrap -->
    <link href="https://getbootstrap.com/docs/4.0/examples/grid/grid.css" rel="stylesheet">
  </head>

  <body>
    <h1 align = "center">Testseite</h1><br> <br>
    
    <div class="container">

      <div class="row">
        <div class="col-md-4">
          <?php
            $kurse = $db->zeigeKurse();
            echo "<img src='". $kurse['0']['bild']. "' alt='Beispielbild' class='img-fluid'>";
        
        ?>
        </div>
        <div class="col-md-4"><img src="https://cdn.pixabay.com/photo/2020/03/06/15/08/escalator-4907329_1280.jpg" alt="Beispielbild" class="img-fluid"></div>
        <div class="col-md-4"><img src="https://cdn.pixabay.com/photo/2016/07/11/20/34/lost-places-1510592_1280.jpg" alt="Beispielbild" class="img-fluid"></div>
        <div class="col-md-4">inhalt</div>
        <div class="col-md-4">inhalt</div>
        <div class="col-md-4">inhalt</div>
        <div class="col-md-4"><img src="https://cdn.pixabay.com/photo/2015/11/28/17/55/paint-1067686_1280.jpg" alt="Beispielbild" class="img-fluid"></div>
        <div class="col-md-4"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Gzuz_und_Bonez_MC_-_Pusher_Apparel.jpg/405px-Gzuz_und_Bonez_MC_-_Pusher_Apparel.jpg" alt="Beispielbild" class="img-fluid"></div>
        <div class="col-md-4"><img src="https://cdn.pixabay.com/photo/2015/11/28/17/55/paint-1067686_1280.jpg" alt="Beispielbild" class="img-fluid"></div>
        <div class="col-md-4">inhalt</div>
        <div class="col-md-4">inhalt</div>
        <div class="col-md-4">inhalt</div>
        <div class="col-md-4">inhalt</div>
        <div class="col-md-4">inhalt</div>
        <div class="col-md-4">inhalt</div>
      </div>

     

    </div> 
  </body>
</html>