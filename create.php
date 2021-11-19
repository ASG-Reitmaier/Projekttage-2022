<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Projekterstellung</title>
    <link rel="icon" href="https://yt3.ggpht.com/ytc/AKedOLR1otAb1XhsKGxT-hIgEcZmDQRHuCFFY6Bpt9Tq=s250-c-k-c0x00ffffff-no-rj" sizes="32x32" type="image/png">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/grid/">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/components/alerts/">

    <!-- CSS von Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Grid-Design von Bootstrap -->
    <link href="https://getbootstrap.com/docs/4.0/examples/grid/grid.css" rel="stylesheet">
<?php
    require_once('search.php');
    $db = new DB();
    ?>

  </head>

  <body>
    <h1 align = "center">Projekterstellung</h1><br> <br>

<?php
   
    if(isset($_POST["name"]) && isset($_POST["beschreibung"]) && isset($_POST["kursleiter1"]) && isset($_POST["kursleiter2"]) && isset($_POST["kursleiter3"]) && isset($_POST["teilnehmerbegrenzung"]) && isset($_POST["jahrgangsstufen_beschraenkung"]) && isset($_POST["ort"]) && isset($_POST["zeitraum_von"]) && isset($_POST["zeitraum_bis"]) && isset($_POST["kosten"])) {
      if($_POST["name"]!="" && $_POST["beschreibung"]!="" && $_POST["kursleiter1"]!="" && $_POST["kursleiter2"]!=""  && $_POST["teilnehmerbegrenzung"]!="" && $_POST["jahrgangsstufen_beschraenkung"]!="" && isset($_POST["ort"]) && $_POST["zeitraum_von"]!=="" && $_POST["zeitraum_bis"]!="" && $_POST["kosten"]!=""){ 
        $name                   = $_POST["name"];
        $beschreibung           = $_POST["beschreibung"];
        $kursleiter1            = $_POST["kursleiter1"];
        $kursleiter2            = $_POST["kursleiter2"];
        $kursleiter3            = $_POST["kursleiter3"];
        $teilnehmerbegrenzung   = $_POST["teilnehmerbegrenzung"];
        $beschraenkung          = $_POST["jahrgangsstufen_beschraenkung"];
        $ort                    = $_POST["ort"];
        $zeitraum_von           = $_POST["zeitraum_von"];
        $zeitraum_bis           = $_POST["zeitraum_bis"];
        $kosten                 = $_POST["kosten"];

        if($db->namePruefen($name))
        {
          echo $db->namePruefen($name);
          $db->kursEinfuegen($name, $beschreibung, $kursleiter1, $kursleiter2, $kursleiter3, $teilnehmerbegrenzung, $beschraenkung, $ort, $zeitraum_von, $zeitraum_bis, $kosten);
          echo "<div class='row'><div class='col'></div><div class='col'><div class='alert alert-success alert-dismissible fade show' role='alert'> Der Kurs wurde erfolgreich eingefügt!   </div></div><div class='col'></div></div>";
        }
        else
        {
          echo "<div class='row'><div class='col'></div><div class='col'><div class='alert alert-danger alert-dismissible fade show' role='alert'> Dieser Kursname existiert bereits! Bitte wählen Sie einen anderen!   </div></div><div class='col'></div></div>";
        }
         
      } else{
      echo "<div class='row'><div class='col'></div><div class='col'><div class='alert alert-danger alert-dismissible fade show' role='alert'> Fehler: Bitte füllen Sie das Formular vollständig aus!   </div></div><div class='col'></div></div>";

    }
  }
    
    ?>
    

    <div class="row">
      <div class="col">
</div>
<div class="col">
   
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <div class="form-group">
    <label for="name">Name</label>
    <input class="form-control" name="name" placeholder="">
  </div>

  <div class="form-group">
    <label for="beschreibung">Beschreibung</label>
    <textarea class="form-control" name="beschreibung" placeholder="" rows="3"></textarea>
  </div>
  
  <div class="form-group">
    <label for="kursleiter1">Kursleiter1</label>
    <input class="form-control" name="kursleiter1" placeholder="">
  </div>

  <div class="form-group">
    <label for="kursleiter2">Kursleiter2</label>
    <input class="form-control" name="kursleiter2" placeholder="">
  </div>

  <div class="form-group">
    <label for="kursleiter3">Kursleiter3</label>
    <input class="form-control" name="kursleiter3" placeholder="">
  </div>

  <div class="form-group">
    <label for="teilnehmerbegrenzung">Teilnehmerbegrenzung</label>
    <input type="number" class="form-control" name="teilnehmerbegrenzung" min="1" max="30" step="1" value="10" >
  </div>

  <div class="form-group">
    <label for="jahrgangsstufen_beschraenkung">Jahrgangsstufen_Beschraenkung</label>
    <input class="form-control" name="jahrgangsstufen_beschraenkung" placeholder="">
  </div>

  <div class="form-group">
    <label for="ort">Ort</label>
    <input class="form-control" name="ort" placeholder="">
  </div>

  <div class="form-group">
    <label for="zeitraum_von">Zeitraum_von - Muss so eingegeben werden: yyyy-mm-dd hh:mm:ss</label>
    <input type="datetime-local" class="form-control" name="zeitraum_von" placeholder="yyyy-mm-dd hh:mm:ss">
  </div>

  <div class="form-group">
    <label for="name">Zeitraum_bis - Muss so eingegeben werden: yyyy-mm-dd hh:mm:ss</label>
    <input type="datetime-local" class="form-control" name="zeitraum_bis" placeholder="yyyy-mm-dd hh:mm:ss">
  </div>

  <div class="form-group">
    <label for="kosten">Kosten</label>
    <input class="form-control" name="kosten" placeholder="">
  </div>

  <button type="submit" class="btn btn-primary">Senden</button>
  </form>

  
</div>
<div class="col">
</div>
</div> 

  


  </body>
</html>
