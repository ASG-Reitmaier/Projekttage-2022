<?php
require_once('search.php');
$db = new DB();
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

    <!-- js für das Dropdown-Menü -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>  

  <body>
    <nav class = "navbar navbar-light bg-light">
      <div class = "container-fluid">
        <form class = "d-flex" action = "index.php" method = "POST">
            <input class = "form-control me-2" type="search" placeholder = "Suche..." aria-label="Search" name="search">
            <button class = "btn btn-outline-succes" type = "submit"> Search </button>
        </form>
        <!-- das Dropdown-Menü -->
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
          Sortieren nach</button>
          <div class="dropdown-menu dropdown-menu-right" >
            <button class="dropdown-item" formmethod="post" type="button">Alphabetisch</button>
            <button class="dropdown-item" formmethod="post" type="button">Klasse</button>
          </div>
        </div>
      </div>
    </nav>
    
    <?php 
      if(isset($_POST["search"])){
        $suchbegriff = $_POST["search"];
        $suchDaten = $db->suche($suchbegriff);
        ?>


    <div class = "container" data-scroll>
      <div class = "clearfix">
        <div class = "row">
          <?php foreach($suchDaten AS $row){?>
              <div class = 'col-lg-4 bg-transparent text-dark border-0' data-scroll>
              <a href="projekt.php/?id=<?php echo $row['kurs_id'];?>" class="d-block mb-4 h-100">
                <img src='<?php echo $row['bild'];?>' alt ='Beispielbild' class='img-fluid w-100 shadow-1-strong rounded mb-4 img-thumbnail'>
                <h4> <?php echo $row['name'];?> </h4>
              </a>
              </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <?php } ?>


  </body>

</html>




