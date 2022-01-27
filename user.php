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

<?php 
if(isset($_POST["ID"])){ 
    $ergebnis = $db->zeigeEinSchüler($_POST["ID"]);
    $benutzer = $ergebnis[0];
    echo $benutzer['name'];
    echo "<form = 'post' action = 'user.php'>".
            "<input name = 'name' type = 'text' placeholder = ".$benutzer["name"]." >".
            "<input name = 'name' type = 'text' placeholder = ".$benutzer["klasse"]." >".
            "<input name = 'name' type = 'text' placeholder = ".$benutzer["rolle"]." >".
            "</form>";
    echo "<br><br>
        <table class='table border shadow p-3' style='margin: auto;'><tr><th>Benutzer ID</th><th>Name</th><th>Klasse</th><th>Rolle</th><th></th></tr>";
    echo "<tr><td>".$benutzer["benutzer_id"].
        "</td><td>".$benutzer["name"].
        "</td><td>".$benutzer["klasse"].
        "</td><td>".$benutzer["rolle"]."</td><td>";
    echo "</table></form>";
}
?>
    <body>
        
    </body>
</html>