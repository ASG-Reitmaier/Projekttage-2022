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
  </head>

  <body>
    
    

 
    <h1 align = "center">Projekterstellung</h1><br> <br>

    <div class="row">
      <div class="col">
</div>
<div class="col">
   
<form action="search.php" method="post">
  <div class="form-group">
    <label for="name">Name</label>
    <input class="form-control" id="name" placeholder="">
  </div>

  <div class="form-group">
    <label for="name">Beschreibung</label>
    <textarea class="form-control" id="beschreibung" placeholder="" rows="3"></textarea>
  </div>
  
  <div class="form-group">
    <label for="name">Kursleiter1</label>
    <input class="form-control" id="kursleiter1" placeholder="">
  </div>

  <div class="form-group">
    <label for="name">Kursleiter2</label>
    <input class="form-control" id="kursleiter2" placeholder="">
  </div>

  <div class="form-group">
    <label for="name">Kursleiter3</label>
    <input class="form-control" id="kursleiter3" placeholder="">
  </div>

  <div class="form-group">
    <label for="name">Teilnehmerbegrenzung</label>
    <input type="number" class="form-control" id="teilnehmerbegrenzung" min="1" max="30" step="1" value="10" >
  </div>

  <div class="form-group">
    <label for="name">Jahrgangsstufen_Beschraenkung</label>
    <input class="form-control" id="jahrgangsstufen_beschraenkung" placeholder="">
  </div>

  <div class="form-group">
    <label for="name">Ort</label>
    <input class="form-control" id="ort" placeholder="">
  </div>

  <div class="form-group">
    <label for="name">Zeitraum_von</label>
    <input type="datetime-local" class="form-control" id="zeitraum_von" placeholder="">
  </div>

  <div class="form-group">
    <label for="name">Zeitraum_bis</label>
    <input type="datetime-local" class="form-control" id="zeitraum_bis" placeholder="">
  </div>

  <div class="form-group">
    <label for="name">Kosten</label>
    <input class="form-control" id="kosten" placeholder="">
  </div>

  <button type="submit" class="btn btn-primary">Senden</button>
  </form>

  
</div>
<div class="col">
</div>
</div> 

  


  </body>
</html>
