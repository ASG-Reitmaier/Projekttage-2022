<?php require_once 'search.php';

$db = new DB();

session_start();
@$_SESSION['ExportAbfrage'];
$table = "Kurs";
//ob_start immer nach session_start(). Zum exportieren
ob_start();
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

    <link rel="stylesheet" href="/path/to/cdn/bootstrap.min.css" />
        <script src="/path/to/cdn/bootstrap.min.js"></script>
    <link href="bootstrap5-dropdown-ml-hack-hover.css" rel="stylesheet" />
        <script src="bootstrap5-dropdown-ml-hack.js"></script>
</head>

<body class="body">
    <?php include 'header.php'?>

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

    <div class="dropdown" style="margin: auto;">
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" style="float: left; width: 20%; margin: auto;">Zeigen</button>
        <form class="dropdown-menu"  method = "get" action="admin.php" style="width: 20%; margin: auto;">
            <input type = "submit" name= "Tabelle" class ="button dropdown-item"  value ="Schüler"></input>
            <!-- <input type = "submit" name= "KlassenTabelle" class ="button dropdown-item" value ="Klasse"></input> -->
            <input type = "submit" name= "Tabelle" class ="button dropdown-item" value ="Kurse"></input>
        </form>
        
        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" style="float: left; width: 20%; margin: auto;">Klasse</button>
        <form class="dropdown-menu"  method = "get" action="admin.php" style="float: left; width: 20%; margin: auto;">
            <input type = "hidden" name= "Tabelle" value ="Klasse"></input>
            <input type = "submit" name= "Klasse" class ="button dropdown-item"  value ="5"></input>
            <input type = "submit" name= "Klasse" class ="button dropdown-item" value ="6"></input>
            <input type = "submit" name= "Klasse" class ="button dropdown-item" value ="7"></input>
            <input type = "submit" name= "Klasse" class ="button dropdown-item"  value ="8"></input>
            <input type = "submit" name= "Klasse" class ="button dropdown-item" value ="9"></input>
            <input type = "submit" name= "Klasse" class ="button dropdown-item" value ="10"></input>
            <input type = "submit" name= "Klasse" class ="button dropdown-item"  value ="11"></input>
            <input type = "submit" name= "Klasse" class ="button dropdown-item" value ="12"></input>
        </form>

        <form class="button"  method = "post" action="admin.php" style="float: right; width: 20%; margin: auto;">
            <input type = "submit" name= "TabelleExportieren" class="btn btn-primary" value ="Tabelle Exportieren"></input>
        </form>

    </div>

    <br>
    <br>
    
    <?php
    if(isset($_GET['Tabelle']) && $_GET['Tabelle'] == "Schüler"){
        $ergebnis = $db->zeigeSchüler();
        echo "<table class='table border shadow p-3' style='margin: auto;'><tr><th>Benutzer ID</th><th>Name</th><th>Klasse</th><th>Rolle</th><th></th></tr>";
        // output data of each row
        foreach($ergebnis AS $row){
            echo "<tr><td>".$row["benutzer_id"].
            "</td><td>".$row["name"].
            "</td><td>".$row["klasse"].
            "</td><td>".$row["rolle"]."</td><td>
            <form method = 'post' action='user.php'>
            <input type='hidden' name = 'ID' value=".$row["benutzer_id"].">
            <button type='submit' class='btn btn-light' formmethod='post' id='bearbeiten'>bearbeiten</button></td></tr>
            </form>
            ";
        }
        echo "</table>";
        $_SESSION['ExportAbfrage'] =
            "SELECT * 
            FROM benutzer 
            WHERE rolle = 'schueler' 
            ORDER BY upper(name)";
    } 

    if(isset($_GET['Tabelle']) && $_GET['Tabelle'] == "Klasse"){
        $klasse = $_GET['Klasse'];
        $ergebnis = $db->zeigeKlasse($klasse);
        echo "<table class='table border shadow p-3' style='margin: auto;'><tr><th>Benutzer ID</th><th>Name</th><th>Klasse</th><th>Rolle</th><th></th></tr>";
        
        foreach($ergebnis AS $row){
            echo "<tr><td>".$row["benutzer_id"].
            "</td><td>".$row["name"].
            "</td><td>".$row["klasse"].
            "</td><td>".$row["rolle"]."</td><td>
            <form method = 'post' action='user.php'>
            <input type='hidden' name = 'ID' value=".$row["benutzer_id"].">
            <button type='submit' class='btn btn-light' formmethod='post' id='bearbeiten'>bearbeiten</button></td></tr>
            </form>
            ";
        }
        echo "</table>";
        $_SESSION['ExportAbfrage'] =
            "SELECT * 
            FROM benutzer 
            WHERE rolle = 'schueler' 
            AND klasse = ".$klasse."
            ORDER BY lower(name)";
    }

    if (isset($_GET['Tabelle']) && $_GET['Tabelle'] == "Kurse"){
        $ergebnis = $db->zeigeKurse_zu_Benutzer();
        echo "<table class='table border shadow p-3' style='margin: auto;'><tr><th>Kurs ID</th><th>Name</th>
        <th>Kursleiter</th><th>Teilnehmer</th><th>Benutzer ID</th><th>Name</th><th>Klasse</th></tr>";
        
        $letzteID = "";
        foreach($ergebnis AS $row){
            if($row["kurs_id"] == $letzteID){
                echo "<tr><td>".
                "</td><td>".
                "</td><td>".
                "</td><td>".
                "</td><td>".$row["benutzer_id"].
                "</td><td>".$row[5].
                "</td><td>".$row["klasse"]."<tr>";
            } else {
                echo "<tr><td>".$row["kurs_id"].
                "</td><td>".$row[1].
                "</td><td>".$row["kursleiter1"]."<br>".$row["kursleiter2"]."<br>".$row["kursleiter3"].
                "</td><td>".$row["teilnehmerbegrenzung"].
                "</td><td>".$row["benutzer_id"].
                "</td><td>".$row[5].
                "</td><td>".$row["klasse"]."<tr>";
            }
            $letzteID = $row["kurs_id"];
        }
        echo "</table>";
        $_SESSION['ExportAbfrage'] =
            "SELECT *
            FROM benutzer, kurse,  benutzer_zu_kurse
            WHERE benutzer.benutzer_id = benutzer_zu_kurse.b_id
            AND kurse.kurs_id = benutzer_zu_kurse.kurs_id
            ORDER BY lower(kurse.name)";
    }
    
    if(isset($_POST["TabelleExportieren"])){
        $db->exportieren($_SESSION['ExportAbfrage']);
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
    }
?>
