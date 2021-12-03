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
    <div style="float: right; background-color:#fb4400; height: 100% ; width:4%" data-scroll>
        <img src="uploads\Test\Logout Logo.png" style="width: 100%;"> 
    </div>

    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light" style="height: 10ch;">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwzB-PnY6KPKMhQxP9mBPsWxX29ESb72pGgQ&usqp=CAU" class="rounded float-right mg-fluid" style="width: 5%;">
        <div class="container-fluid">
            <ul class="navbar-nav mr-auto" style="font-size: 2.5ch; padding">
                <li class="nav-item active">
                    <a class="nav-item nav-link" href="index.php"> Übersicht</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link" href="create.php">Erstellen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link" href="login.php">Adminstration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link" href="projekt.php">Kurse</a>
                </li>
                <li class="nav-item">
                    <form class = "d-flex" action = "index.php" method = "GET">
                        <input class = "form-control me-2" type="search" placeholder = "Suche..." aria-label="Search" name="search" value= <?php if (isset($_GET["search"])) {echo $_GET["search"];}?>>
                        <button class = "btn btn-outline-succes" type = "submit"> Search </button>
                    </form>
                </li>
            </ul>
            <a style="float: right;">
                <h1> Verwaltung </h1>
            </a>
        </div>

        </nav>

        <br>

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

    <?php
        $ergebnis = $db->zeigeBenutzer();

                echo "<table><tr><th>Benutzer ID</th><th>Name</th><th>Klasse</th><th>Rolle</th></tr>";
                // output data of each row
                foreach($ergebnis AS $row){
                  echo "<tr><td>".$row["benutzer_id"]."</td><td>".$row["name"]." </td><td>".$row["klasse"]." </td><td>".$row["rolle"]." </td></tr>";
                }
                echo "</table>";
    ?>

    <?php
        function zeigeDaten($suchDaten){
        ?>
    <div class = "container" data-scroll>
      <div class = "clearfix">
        <div class = "row">
          <?php foreach($suchDaten AS $row){?>
              <div class = 'col-lg-4 bg-transparent text-dark border-0' data-scroll>
              <a href="projekt.php/?id=<?php echo $row['benutzer_id'];?>" class="d-block mb-4 h-100">
                <h4> <?php echo $row['name'];?></h4>
              </a>
              </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <?php } ?>



</body>

</html>
 