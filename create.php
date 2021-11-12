<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Projekterstellung</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/grid/">

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
<<<<<<< HEAD
=======
    
  

 
>>>>>>> 342c7172fd4abbb3e3020f672d7b17c089311d2f
    <h1 align = "center">Projekterstellung</h1><br> <br>

<?php
<<<<<<< HEAD
   
    if(!empty($_POST)) {
=======
 
 require_once('search.php');
 $db = new DB();

    if($_SERVER["REQUEST_METHOD"] == "POST") {

>>>>>>> 342c7172fd4abbb3e3020f672d7b17c089311d2f
        $name                   = $_POST["name"];
echo $name;
        $beschreibung           = $_POST["beschreibung"];
        $kursleiter1            = $_POST["kursleiter1"];
        $kursleiter2            = $_POST["kursleiter2"];
        $kursleiter3            = $_POST["kursleiter3"];
        $teilnehmerbegrenzung   = $_POST["teilnehmerbegrenzung"];
<<<<<<< HEAD
        $beschraenkung          = $_POST["jahrgangsstufen_beschraenkung"];
=======
        $beschraenkung          = $_POST["j_b"];
>>>>>>> 342c7172fd4abbb3e3020f672d7b17c089311d2f
        $ort                    = $_POST["ort"];
        $zeitraum_von           = $_POST["zeitraum_von"];
        $zeitraum_bis           = $_POST["zeitraum_bis"];
        $kosten                 = $_POST["kosten"];

<<<<<<< HEAD
        echo $db->kursEinfuegen($name, $beschreibung, $kursleiter1, $kursleiter2, $kursleiter3, $teilnehmerbegrenzung, $beschraenkung, $ort, $zeitraum_von, $zeitraum_bis, $kosten);
=======
        $db->kursEinfuegen($name, $beschreibung, $kursleiter1, $kursleiter2, $kursleiter3, $teilnehmerbegrenzung, $beschraenkung, $ort, $zeitraum_von, $zeitraum_bis, $kosten);
>>>>>>> 342c7172fd4abbb3e3020f672d7b17c089311d2f
    }
    ?>
    

    <div class="row">
      <div class="col">
</div>
<div class="col">
   
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <div class="form-group">
    <label for="name">Name</label>
<<<<<<< HEAD
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
=======
    <input type="text" class="form-control" name="name" placeholder="">
  </div>

  <div class="form-group">
    <label for="name">Beschreibung</label>
    <textarea type="text"  class="form-control" name="beschreibung" placeholder="" rows="3"></textarea>
  </div>
  
  <div class="form-group">
    <label for="name">Kursleiter1</label>
    <input type="text"  class="form-control" name="kursleiter1" placeholder="">
  </div>

  <div class="form-group">
    <label for="name">Kursleiter2</label>
    <input type="text"  class="form-control" name="kursleiter2" placeholder="">
  </div>

  <div class="form-group">
    <label for="name">Kursleiter3</label>
    <input type="text"  class="form-control" name="kursleiter3" placeholder="">
  </div>

  <div class="form-group">
    <label for="name">Teilnehmerbegrenzung</label>
>>>>>>> 342c7172fd4abbb3e3020f672d7b17c089311d2f
    <input type="number" class="form-control" name="teilnehmerbegrenzung" min="1" max="30" step="1" value="10" >
  </div>

  <div class="form-group">
<<<<<<< HEAD
    <label for="jahrgangsstufen_beschraenkung">Jahrgangsstufen_Beschraenkung</label>
    <input class="form-control" name="jahrgangsstufen_beschraenkung" placeholder="">
  </div>

  <div class="form-group">
    <label for="ort">Ort</label>
    <input class="form-control" name="ort" placeholder="">
  </div>

  <div class="form-group">
    <label for="zeitraum_von">Zeitraum_von</label>
=======
    <label for="name">Jahrgangsstufen_Beschraenkung</label>
    <input  type="text"  class="form-control" name="j_b" placeholder="">
  </div>

  <div class="form-group">
    <label for="name">Ort</label>
    <input  type="text" class="form-control" name="ort" placeholder="">
  </div>

  <div class="form-group">
    <label for="name">Zeitraum_von</label>
>>>>>>> 342c7172fd4abbb3e3020f672d7b17c089311d2f
    <input type="datetime-local" class="form-control" name="zeitraum_von" placeholder="">
  </div>

  <div class="form-group">
<<<<<<< HEAD
    <label for="zeitraum_bis">Zeitraum_bis</label>
=======
    <label for="name">Zeitraum_bis</label>
>>>>>>> 342c7172fd4abbb3e3020f672d7b17c089311d2f
    <input type="datetime-local" class="form-control" name="zeitraum_bis" placeholder="">
  </div>

  <div class="form-group">
<<<<<<< HEAD
    <label for="kosten">Kosten</label>
    <input class="form-control" name="kosten" placeholder="">
=======
    <label for="name">Kosten</label>
    <input type="text"  class="form-control" name="kosten" placeholder="">
>>>>>>> 342c7172fd4abbb3e3020f672d7b17c089311d2f
  </div>

  <button type="submit" class="btn btn-primary">Senden</button>
  </form>

  
</div>
<div class="col">
</div>
</div> 

  


  </body>
</html>
