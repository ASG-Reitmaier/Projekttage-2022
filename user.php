<!DOCTYPE html>
<?php 
    require_once('search.php');
    include 'header.php';
    $db = new DB();
?>

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
    <div>
<?php 
if(isset($_POST["ID"])){ 
    $ergebnis = $db->zeigeEinSchüler($_POST["ID"]);
    $benutzer = $ergebnis[0];
    echo "<br><br><br>
        <form = 'post' action = 'user.php' style='width: 50%; margin: auto'>
            <table class='table border shadow p-3' style='margin: auto;'>
                <tr><th>Benutzer ID</th><th>".$benutzer['benutzer_id']."</th><th>".$benutzer['benutzer_id']."</th>
                <tr><th>Name</th><td>".$benutzer['name']."</td><td><input name = 'name' type = 'text' placeholder = ".$benutzer["name"]."></td>
                <tr><th>Klasse</th><td>".$benutzer['klasse']."</td><td><input name = 'klasse' type = 'text' placeholder = ".$benutzer["klasse"]."></td>
                <tr><th>Rolle</th><td>".$benutzer['rolle']."</td><td><input name = 'rolle' type = 'text' placeholder = ".$benutzer["rolle"]."></td>
            </table>
            <br>
            <input type='hidden' name = 'ID' value=".$benutzer["benutzer_id"]."></input>
            <input formmethod='post' type='submit' class='btn btn-light' name='bestätigen' value='bestätigen'></input>
        </form>";
}
if (isset($_POST['bestätigen'])){
    $ergebnis = $db->zeigeEinSchüler($_POST["ID"]);
    $benutzer = $ergebnis[0];
    if (strlen($_POST['name'])){ $name = $_POST['name'];}
    else { $name = $benutzer['name'];}
    
    if (strlen($_POST['klasse'])){ $klasse = $_POST['klasse']; }
    else { $klasse = $benutzer['klasse']; }
    
    if (strlen($_POST['rolle'])){ $rolle = $_POST['rolle']; }
    else { $rolle = $benutzer['rolle']; }

    echo $_POST["ID"], $name, $klasse, $rolle;
    $db->updateBenutzer($_POST["ID"], $name, $klasse, $rolle);
}
?>
    </div>
</html>