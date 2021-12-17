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
    <div style="float: right; background-color:#fb4400; height: 170% ; width:4%" data-scroll>
        <input formmethod="post" type="image" id="logout" alt="logout" src="uploads\Test\Logout Logo v2.png" style="width: 100%;"> 
    </div>

    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light" style="height: 10ch;">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwzB-PnY6KPKMhQxP9mBPsWxX29ESb72pGgQ&usqp=CAU" class="rounded float-right mg-fluid" style="width: 5%;">
        <div class="container-fluid">
            <ul class="navbar-nav mr-auto" style="font-size: 2.5ch; padding">
                <li class="nav-item active">
                    <a class="nav-item nav-link" href="index.php">Übersicht</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link" href="create.php">Erstellen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link" href="login.php">Adminstration</a>
                </li>
            </ul>
            <a style="float: right;">
                <h1> Verwaltung </h1>
            </a>
        </div>

    </nav>

    <?php
    if(isset($_POST["import"])){
        $fileName = $_FILES["file"]["tmp_name"];
        $db->importiereBenutzer($fileName);

/*         if($_FILES["file"]["size"]>0){
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
/*         if(isset($_POST["export"])){
            $query = $db->con->prepare("SELECT * FROM benutzer"); 
 
            if($query->num_rows > 0){ 
                $delimiter = ","; 
                $filename = "schüler-data_" . date('d-m-Y') . ".csv"; 
                 
                // Create a file pointer 
                $f = fopen('php://memory', 'w'); 
                 
                // Set column headers 
                $fields = array('ID', 'NAME', 'KLASSE', 'ROLLE'); 
                fputcsv($f, $fields, $delimiter); 
                 
                // Output each row of the data, format line as csv and write to file pointer 
                while($row = $query->fetch_assoc()){  
                    $lineData = array($row['benutzer_id'], $row['name'], $row['klasse'], $row['rolle']); 
                    fputcsv($f, $lineData, $delimiter); 
                } 
                 
                // Move back to beginning of file 
                fseek($f, 0); 
                 
                // Set headers to download file rather than displayed 
                header('Content-Type: text/csv'); 
                header('Content-Disposition: attachment; filename="' . $filename . '";'); 
                 
                //output all remaining data on a file pointer 
                fpassthru($f); 
            }
       }   */

        if(isset($_POST["logout"])){
            
        }
    ?>
        <br>
        <form action="admin.php" method="post" name="uploadCsv" enctype="multipart/form-data" class="border shadow p-3" style="margin: auto; width: 92%">
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

    <?php
        $ergebnis = $db->zeigeBenutzer();
            echo "<table class='table border shadow p-3' style='width: 92%; margin: auto;'><tr><th>Benutzer ID</th><th>Name</th><th>Klasse</th><th>Rolle</th><th></th></tr>";
            // output data of each row
            foreach($ergebnis AS $row){
                echo "<tr><td>".$row["benutzer_id"]."</td><td>".$row["name"]." </td><td>".$row["klasse"]." </td><td>".$row["rolle"]." </td><td>
                <button type='submit' name ='import' class='btn btn-light' id='submit'>bearbeiten</button></td></tr>";
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
<!-- 
    <form class="btn btn-primary" method = "post" action="admin.php">
        <input type = "submit" name= "export" class ="button dropdown-item" value ="export"></button>
    </form> -->


</body>

</html>
 