<?php
require_once('search.php');
$db = new DB();
// mit session kann man Variablen speichern, bis der Benutzer die Seite verlässt
// Undefined beim ersten Mal, Exceptions sollten ignoriert werden.
session_start();
@$_SESSION['suchBegriff'];
@$_SESSION['sortierung'];
if (@!$_SESSION['sortierung'])
  $_SESSION['sortierung'] = "Alphabetisch";
?>


<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Testseite</title>

    <!-- CSS von Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

     <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 

    <link rel="stylesheet" href="/path/to/cdn/bootstrap.min.css" />
        <script src="/path/to/cdn/bootstrap.min.js"></script>
    <link href="bootstrap5-dropdown-ml-hack-hover.css" rel="stylesheet" />
        <script src="bootstrap5-dropdown-ml-hack.js"></script>

    <!-- js für das Dropdown-Menü -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>  

  <body>
  <?php include 'header.php'
  ?>
    <nav class = "navbar navbar-light bg-light">
      <div class = "container-fluid">
        <form class = "d-flex" action = "index.php" method = "GET">
            <input class = "form-control me-2" type="search" placeholder = "Suche..." aria-label="Search" name="search" value= <?php if (isset($_GET["search"])) {echo $_GET["search"];}?>>
            <button class = "btn btn-outline-succes" type = "submit"> Search </button>
        </form>
        <!-- das Dropdown-Menü -->
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Sortieren nach</button>
          <form class="dropdown-menu dropdown-menu-right" method = "post">
            <input type = "submit" name= "sortname" class ="button dropdown-item" value ="Alphabetisch"></input>
            <input type = "submit" name= "sortklasse" class ="button dropdown-item" value ="Klasse"></input>
          </form>
        </div>
      </div>
    </nav>

    <?php 
      if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['sortname']))
      {
        $_SESSION['sortierung'] = "name";
        $suchDaten = $db->suche($_SESSION['suchBegriff'], $_SESSION['sortierung']);
      } 
      else if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['sortklasse']))
      {
        $_SESSION['sortierung'] = "nameRev";
        $suchDaten = $db->suche($_SESSION['suchBegriff'], $_SESSION['sortierung']);
      }
      

      if(isset($_GET["search"]))
      {
        $_SESSION['suchBegriff'] = $_GET["search"];
        $suchDaten = $db->suche($_SESSION['suchBegriff'], $_SESSION['sortierung']);
        zeigeDaten($suchDaten);
      }
      function zeigeDaten($suchDaten){
        ?>


    <div class = "container" data-scroll>
      <div class = "clearfix">
        <div class = "row">
          <?php foreach($suchDaten AS $row){?>
              <div class = 'col-lg-4 bg-transparent text-dark border-0' data-scroll>
              <a href="projekt.php/?id=<?php echo $row['kurs_id'];?>" class="d-block mb-4 h-100">
                <img src='<?php echo $row['bild'];?>' alt ='Beispielbild' class='img-fluid w-100 shadow-1-strong rounded mb-4 img-thumbnail'style = 'height: 300'>
                <h4> <?php echo $row['name'];?> </h4>
              </a>
              </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <?php } ?>



</body>


  </body>

</html>




