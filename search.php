<?php

if(count(get_included_files()) ==1) exit("Direct access not permitted.");

class DB
{
    // Connection to MySQL database. Trying connection. Exception on Failure
    private $con;
    private $host;
    private $dbname;
    private $user;
    private $password;

    public function __construct()
    {

     $this->host = 'vmd48086.contaboserver.net';
     $this->dbname = 'projekttage';
     $this->user = 'Protage';
     $this->password = 'protage2020';
     $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname . ";charset=utf8";

        try {
            $this->con = new PDO($dsn, $this->user, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Failure" . $e->getMessage();
        }
    }

    // Gibt Alles von Benutzer aus via MySQL query (+ Prevention of SQL Injection)
    public function zeigeBenutzer()
    {
        $query = "SELECT * FROM benutzer ORDER BY name";
        $statement = $this->con->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // Gibt Alles von Veranstaltungen aus via MySQL query (+ Prevention of SQL Injection)
    public function zeigeVeranstaltungen()
    {
        $query = "SELECT * FROM veranstaltungen ORDER BY name";
        $statement = $this->con->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // Gibt Alles von Raeume aus via MySQL query (+ Prevention of SQL Injection)
    public function zeigeRaeume()
    {
        $query = "SELECT * FROM raeume ORDER BY raumnummer";
        $statement = $this->con->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // Gibt Alles von Kurse aus via MySQL query (+ Prevention of SQL Injection)
    public function zeigeKurse()
    {
        $query = "SELECT * FROM kurse ORDER BY name";
        $statement = $this->con->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //Benutzer zu Kurse
    public function zeigeBenutzer_zu_Kurse()
    {
        $query = "SELECT * 
                  FROM benutzer, kurse,  benutzer_zu_kurse
                  WHERE benutzer.benutzer_id = benutzer_zu_kurse.b_id
                  AND kurse.kurs_id = benutzer_zu_kurse.kurs_id
                  ORDER BY benutzer.name";

        $statement = $this->con->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //Methode zum einfuegen von neuen Kursen
    public function kursEinfuegen($name, $beschreibung, $kursleiter1, $kursleiter2, $kursleiter3, $teilnehmerbegrenzung, $beschraenkung, $ort, $zeitraum_von, $zeitraum_bis, $kosten)
    {
       /* if(!empty($_POST)) {
        $name                   = $_POST["name"];
        $beschreibung           = $_POST["beschreibung"];
        $kursleiter1            = $_POST["kursleiter1"];
        $kursleiter2            = $_POST["kursleiter2"];
        $kursleiter3            = $_POST["kursleiter3"];
        $teilnehmerbegrenzung   = $_POST["teilnehmerbegrenzung"];
        $beschraenkung          = $_POST["jahrgangsstufenbeschraenkung"];
        $ort                    = $_POST["ort"];
        $zeitraum_von           = $_POST["zeitraum_von"];
        $zeitraum_bis           = $_POST["zeitraum_bis"];
        $kosten                 = $_POST["kosten"]; */

        $eintrag = "INSERT INTO 'kurse'
        ('name', 'beschreibung', 'kursleiter1', 'kursleiter2', 'kursleiter3', 'teilnehmerbegrenzung', 'jahrgangsstufen_beschraenkung', 'ort', 'zeitraum_von', 'zeitraum_bis', 'kosten')

        VALUES
        ('$name', '$beschreibung', '$kursleiter1', '$kursleiter2', '$kursleiter3', '$teilnehmerbegrenzung', '$beschraenkung', '$ort', '$zeitraum_von', '$zeitraum_bis', '$kosten')";

        $eintragen = mysql_query($eintrag);

        if($eintragen == true) {

            return ("Kurs erfolgreich eingetragen!");
        } else {
            return("Fehler beim Eintragen des Kurses!");
        }

    }


    public function suche($suchbegriff){
        $query = "  SELECT DISTINCT kurse.name, kurse.bild
                    FROM kurse
                    WHERE (LOWER(kurse.beschreibung) LIKE LOWER(:begriff) OR LOWER(kurse.name) LIKE LOWER(:begriff))";
        $statement = $this->con->prepare($query);
        $statement->execute(["begriff"=>"%".$suchbegriff."%"]);
        $date = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $date;

    }

    /*Kurs zu Raumnummer
    public function zeigeKurse_zu_Raeume()
    {
        $query = "SELECT * 
                  FROM kurse, raeume, kurs_zu_raumnummer
                  WHERE kurse.kurs_id = kurs_zu_raumnummer.kurs_id
                  AND raeume.raumnummer = kurs_zu_raumnummer.r_nummer
                  ORDER BY kurse.name";
        $statement = $this->con->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    */
}
?>
