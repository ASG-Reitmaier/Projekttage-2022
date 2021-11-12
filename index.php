<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/search.php');
$con = new DB();
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
    
    <form action="" method="get">
        Suche:
        <input type="text" name="search">
        <input type="submit" value="OK">
    </form>



<?php
  if (isset($_GET["search"])){
    $query = "SELECT * FROM kurse WHERE 'name' LIKE \"%". $_GET["search"] ."%\" OR WHERE 'beschreibung' LIKE \"%". $_GET["search"] ."%\"";
    $statement = $this -> con -> prepare($query);
  } else {
    $query = "SELECT * FROM kurse";
    $statement = $this -> con -> prepare($query);
  }
  $statement -> execute();
  $data = $statement -> fetchAll(PDO::FETCH_ASSOC);
  return $data;
?>