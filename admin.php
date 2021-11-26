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
    <link rel="shortcut icon" href="img/asg-logo.jpg" type="image/x-icon" />

    <title>Verwaltung</title>

    <!-- CSS von Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <!-- Header-->
    <div style="float: right; background-color:#fb4400; height: 100% ; width:4%" data-scroll></div>

    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
        <div class="container-fluid">
            <img src="http://asg-passau.de/wp-content/uploads/2014/07/Logo-Desktop.png" class="rounded float-left mg-fluid" style="width: 25%; height: 80">
            <a class="navbar-brand">
                <h1> Verwaltung</h1>
            </a>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-item nav-link" href="#"> Übersicht <span class="sr-only">:)</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-item nav-link" href="#">ok</a>
      </li>
      <li class="nav-item">
      <a class="nav-item nav-link" href="#">pech</a>
      </li>
      <li class="nav-item">
      <a class="nav-item nav-link disabled" href="#">tschüss</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

  </div>
</nav>


    <br>




<!-- Hochladen der Benutzer -->
    <div class="container">
        <form action="import_query.php" method="post" name="uploadcsv" enctype="multipart/form-data" class="border shadow p-3">
            <div style=" padding-left: 3%; padding-right: 3%" class="mb-3">
                <label class="col-sm-2 col-form-label">Schülerdaten hochladen</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" multiple name="filename" id="filename" accept=".csv">
                </div>
                <div style="text-align: center;">
                    <button type="button" class="btn btn-light" style="background-color:#fb4400; color: white; font-size:21px;  width: 10%" type="submit" id="submit" data-loading-text="Loading...">Upload</button>
                </div>
            </div>
        </form>
    </div>





</body>

</html>
