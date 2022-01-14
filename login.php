<!DOCTYPE html>
<html>
 
    <head>
        
        <meta name ="viewport" content="width-device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Anmeldung</title>
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
    <body>
    
    <?php include 'header.php' //problem lol?>
    <div style="margin: auto; width: 92%; padding-right: 5ch">
        <br>
        <br>
        <br>
        <br>
            
        <h1 style="text-align: center; font-family: sans-serif">Anmelden</h1>
        
       <div style= "background-color: white; width: 60%; height: auto; margin: auto; border-style: solid; border-color: #f2f2f2; border-width: 12px; border-radius: 8px">
                <br>
                <br>
            <div style=" padding-left: 3%; padding-right: 3%" class="mb-3">
                <label for="Benutzername" class="form-label" style="font-family:sans-serif">Benutzername</label>
                <input style="border-style:solid; border-color:#e9e9e9; border-width: 3px; ;background-color: #f2f2f2" type="text" class="form-control" id="Benutzername" placeholder="">
            </div>
            
            <div style=" padding-left: 3%; padding-right: 3%" class="mb-3">
                <label for="Passwort" class="form-label" style="font-family:sans-serif">Passwort</label>
                <input style="border-style:solid; border-color:#e9e9e9; border-width: 3px; ;background-color: #f2f2f2" type="password" class="form-control" id="Passwort" placeholder="">
            </div>
              
            <br>
              
            <a href="" style="text-align: center; margin: 42%;"> <button type="button" class="btn btn-light" style="background-color:#fb4400; color: white; font-size:21px;  width: 150px">Anmelden</button></a>
            <br>
           <br>
        </div>
        
    </div>
    </body>
    
</html>