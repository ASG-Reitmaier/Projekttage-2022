<?php require_once 'search.php';

$db = new DB();

session_start();
$_SESSION['Tabelle'] = "KursenTabelle";
$table = "Kurs";
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

     <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> 
</head>

<body>
    <div style="float: right; background-color:#fb4400; height: 300%; width: 5ch" data-scroll>
        <input formmethod="post" type="image" id="logout" alt="logout" src="uploads\Test\Logout Logo v2.png" style="width: 100%;"> 
    </div>
    
    <!-- Header-->
    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light" style="height: 10ch;">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwzB-PnY6KPKMhQxP9mBPsWxX29ESb72pGgQ&usqp=CAU" class="rounded float-right mg-fluid" style="width: 5%;">
        <div class="container-fluid">
            <ul class="navbar-nav mr-auto" style="font-size: 2.5ch; padding">
                <li class="nav-item active">
                    <a class="nav-item nav-link" href="index.php"> Übersicht </a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link" href="create.php"> Erstellen </a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link" href="login.php"> Adminstration </a>
                </li>
            </ul>
            <a style="float: right">
                <h1> Verwaltung </h1>
            </a>
        </div>

    </nav>

<div style="margin: auto; width: 92%; padding-right: 5ch">
    <br>
    <form action="admin.php" method="post" name="uploadCsv" enctype="multipart/form-data" class="border shadow p-3">
        <div style="padding-left: 3%; padding-right: 3%;" class="mb-3">
            <label class="col-sm-2 col-form-label">Schülerdaten hochladen</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" multiple name="file" id="filename" accept=".csv">
            </div>
            <div style="text-align: center;">
                <button type="submit" name ="import" class="btn btn-light" style="background-color:#fb4400; color: white; font-size:21px;  width: 10%" 
                    id="submit" data-loading-text="Loading...">Upload</button>
            </div>
        </div>
    </form>
    <br>

    <div class="dropdown" style="margin: auto; ">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" style="float: left; width: 50%; margin: auto; display: inline-block;">Zeigen</button>
        <form class="dropdown-menu"  method = "post" action="admin.php" style="width: 50%; margin: auto;">
            <input type = "submit" name= "BenutzerTabelle" class ="button dropdown-item"  value ="Schüler"></input>
            <input type = "submit" name= "KlassenTabelle" class ="button dropdown-item" value ="Klasse"></input>
            <input type = "submit" name= "KursenTabelle" class ="button dropdown-item" value ="Kurse"></input>
        </form>
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" style="float right; width: 50%; margin: auto;display: inline-block;">Exportieren</button>
        <form class="dropdown-menu"  method = "post" action="admin.php" style="width: 50%; margin: auto;">
            <input type = "submit" name= "ExportSchüler" class ="button dropdown-item"  value ="Schüler"></input>
            <input type = "submit" name= "ExportKlasse" class ="button dropdown-item" value ="Klasse"></input>
            <input type = "submit" name= "ExportKurse" class ="button dropdown-item" value ="Kurse"></input>
        </form>
    </div>
    <br>
    <?php
    if(isset($_POST["BenutzerTabelle"])){
        $ergebnis = $db->zeigeBenutzer();
        echo "<table class='table border shadow p-3' style='margin: auto;'><tr><th>Benutzer ID</th><th>Name</th><th>Klasse</th><th>Rolle</th><th></th></tr>";
        // output data of each row
        foreach($ergebnis AS $row){
            echo "<tr><td>".$row["benutzer_id"].
            "</td><td>".$row["name"].
            "</td><td>".$row["klasse"].
            "</td><td>".$row["rolle"]."</td><td>
            <button type='submit' name ='import' class='btn btn-light' id='submit'>bearbeiten</button></td></tr>";
        }
        echo "</table>";
    } 
    if(isset($_POST["ExportKurse"])){

    } 
    if(isset($_POST["KursenTabelle"])){
        $ergebnis = $db->zeigeAlleKurse();
        echo "<table class='table border shadow p-3' style='margin: auto;'><tr><th>ID</th><th>Name</th><th>Kursleiter</th><th>Teilnehmer</th><th>Jahrgangsstufen</th><th>Ort</th>
        <th>Tage</th><th>Zeitraum</th><th>Kosten</th></tr>";
        // output data of each row
        foreach($ergebnis AS $row){
            echo "<tr><td>".$row["kurs_id"].
            "</td><td>".$row["name"].
            "</td><td>".$row["kursleiter1"]."<br>".$row["kursleiter2"]."<br>".$row["kursleiter3"].
            "</td><td>".$row["teilnehmerbegrenzung"].
            "</td><td>".$row["jahrgangsstufen_beschraenkung"].
            "</td><td>".$row["ort"].
            "</td><td>".$row["Tag_1"].$row["Tag_2"].$row["Tag_3"].
            "</td><td>".$row["zeitraum_von"]."<br>- ".$row["zeitraum_bis"].
            "</td><td>".$row["kosten"]."</td><tr>";
        }
        echo "</table>";
    }
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
</div>
</body>
<br>

</html>
 
<?php
    if(isset($_POST["import"])){
        $fileName = $_FILES["file"]["tmp_name"];
        try{
            $db->importiereBenutzer($fileName);
        } catch(ValueError $e) {
            echo "Keine Dateien ausgewählt";
        }
            /*if($_FILES["file"]["size"]>0){
            $file = fopen($fileName, "r");
            while(($column = fgetcsv($file, 10000, ";"))!== FALSE){
               $query = "Insert into benutzer (user_id, name, klasse, rolle) values ('". $column[0] ."', '". $column[1] ."', '". $column[2] ."', '". $column[3] ."')";
                $statement = $con->prepare($query);
                $statement->execute();
                $data = $statement->fetchAll(PDO::FETCH_ASSOC);

                if(!empty($data)){
                    echo "CSV-Datei wurde erfolgreich hochgeladen";
                }else{
                    echo "CSV-Datei konnte nicht hochgeladen werden";
                }

           }*/
    
    }

    if(isset($_POST["ExportSchüler"])){
        $db->exportieren("SELECT * FROM benutzer WHERE rolle = 'Schüler' ORDER BY upper(name)");
    } 

    if(isset($_POST["ExportKlasse"])){
        $db->exportieren("SELECT * FROM benutzer WHERE rolle = 'Schüler' ORDER BY upper(name)");
    } 

    if(isset($_POST["ExportKurse"])){
        $db->exportieren(
            "SELECT kurs_id, name, kursleiter1, kursleiter2, kursleiter3,
            teilnehmerbegrenzung, jahrgangsstufen_beschraenkung, ort,
            Tag_1, Tag_2, Tag_3, zeitraum_von, zeitraum_bis, kosten 
            FROM kurse 
            ORDER BY upper(name) ASC");
    } 

    if(isset($_POST["logout"])){     
    }
?>