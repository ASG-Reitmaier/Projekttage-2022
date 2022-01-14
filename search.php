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

    public function exportieren($query)
    {
        $result = $this->con->prepare($query);
        $result->execute();

        //kann man ändern
        $filename = 'Tabelle.csv';
        
        //entleert den Outputstream und erstellt eine CSV-Datei
        ob_clean();
        header( "Content-Type: text/csv; charset: utf-8");
        header( "Content-Disposition: attachment; filename=\"$filename\"" );
        $fp = fopen('php://output', 'w');


        // utf-8 Unterstützung in csv
        $arr = array();
        fputs($fp, $bom = ( chr(0xEF) . chr(0xBB) . chr(0xBF) ));
        // Spaltennamen aus der SQL-Tabelle einfügen
        for ($i = 0; $i < $result->columnCount(); $i++){
            $arr = array_merge($arr, array($result->getColumnMeta($i)["name"]));
        }
        fputcsv($fp, $arr, ";");

        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            fputcsv($fp, $row, ";");
        }
        
        //schließt die Datei
        fclose($fp);
        exit();
    }

    public function importiereBenutzer($fileName)
    {
        $file = fopen($fileName, 'r');
        //1000 entspricht der maximalen Zeichenlänge und ; dem Trennzeichen der csv-Datei. In Deutschland üblicherweise ; statt ,
        while($row = fgetcsv($file, 1000, ';')){#
            //implode verknüpft alle Arrayelemente zu einem String.
            $value = "'" . implode("','",$row)."'";
            $query ="INSERT INTO benutzer (name, klasse, rolle) VALUES (".$value.")";
            $statement = $this->con->prepare($query);
            $statement->execute();
        }
    }

    // Gibt Alles von Benutzer aus via MySQL query (+ Prevention of SQL Injection)
    public function zeigeBenutzer()
    {
        $query = "SELECT * FROM benutzer ORDER BY lower(name)";
        $statement = $this->con->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // Gibt Alle Schüler aus via MySQL query (+ Prevention of SQL Injection)
    public function zeigeSchüler()
    {
        $query = "SELECT * FROM benutzer WHERE rolle = 'Schüler' ORDER BY lower(name)";
        $statement = $this->con->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // Gibt Alle Schüler aus via MySQL query (+ Prevention of SQL Injection)
    public function zeigeKlasse($klasse)
    {
        $query = "SELECT * FROM benutzer WHERE rolle = 'Schüler' AND klasse = " . $klasse. " ORDER BY lower(name)";
        $statement = $this->con->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // Gibt Alles von Veranstaltungen aus via MySQL query (+ Prevention of SQL Injection)
    public function zeigeVeranstaltungen()
    {
        $query = "SELECT * FROM veranstaltungen ORDER BY lower(name)";
        $statement = $this->con->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_BOTH);
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
    public function zeigeAlleKurse()
    {
        $query = "SELECT * FROM kurse ORDER BY lower(name)";
        $statement = $this->con->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    // Gibt alles von einem Kurs mit einer bestimmten id aus via MySQL query (+ Prevention of SQL Injection)
    public function zeigeKurs($id)
    {
        $query = "SELECT * FROM kurse WHERE kurs_id = $id";
        $statement = $this->con->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function zeigeKursNamen()
    {
        $query = "SELECT name FROM kurse ORDER BY lower(name)";
        $statement = $this->con->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //Benutzer zu Kurse
    public function zeigeBenutzer_zu_Kurse()
    {
        $query = 
            "SELECT benutzer.benutzer_id, benutzer.name, kurse.kurs_id, kurse.name, klasse, rolle,
            kursleiter1, kursleiter2, kursleiter3, teilnehmerbegrenzung, jahrgangsstufen_beschraenkung,
            ort, Tag_1, Tag_2, Tag_3, zeitraum_von, zeitraum_bis, kosten 
            FROM benutzer, kurse,  benutzer_zu_kurse
            WHERE benutzer.benutzer_id = benutzer_zu_kurse.b_id
            AND kurse.kurs_id = benutzer_zu_kurse.kurs_id
            ORDER BY lower(benutzer.name)";

        $statement = $this->con->prepare($query);
        $statement->execute();
        // //Spaltennamen überprüfen
        // $arr = array();
        // for ($i = 0; $i < $statement->columnCount(); $i++){
        //     $arr = array_merge($arr, array($statement->getColumnMeta($i)["name"]), array(" ");
        // }
        // echo implode($arr);

        //Identisch Spaltenname!! -> PDO::FETCH_BOTH um ein index oder name zu verwenden
        $data = $statement->fetchAll(PDO::FETCH_BOTH);
        return $data;
    }

    public function zeigeKurse_zu_Benutzer()
    {
        $query = 
            "SELECT kurse.kurs_id, kurse.name, klasse, rolle, benutzer.benutzer_id, benutzer.name, 
            kursleiter1, kursleiter2, kursleiter3, teilnehmerbegrenzung, jahrgangsstufen_beschraenkung,
            ort, Tag_1, Tag_2, Tag_3, zeitraum_von, zeitraum_bis, kosten 
            FROM benutzer, kurse,  benutzer_zu_kurse
            WHERE benutzer.benutzer_id = benutzer_zu_kurse.b_id
            AND kurse.kurs_id = benutzer_zu_kurse.kurs_id
            ORDER BY lower(kurse.name)";

        $statement = $this->con->prepare($query);
        $statement->execute();
        // //Spaltennamen überprüfen
        // $arr = array();
        // for ($i = 0; $i < $statement->columnCount(); $i++){
        //     $arr = array_merge($arr, array($statement->getColumnMeta($i)["name"]), array(" ");
        // }
        // echo implode($arr);

        //Identisch Spaltenname!! -> PDO::FETCH_BOTH um ein index oder name zu verwenden
        $data = $statement->fetchAll(PDO::FETCH_BOTH);
        return $data;
    }

    //Methode zum einfuegen von neuen Kursen
    public function kursEinfuegen($name, $beschreibung, $kursleiter1, $kursleiter2, $kursleiter3, $teilnehmerbegrenzung, $beschraenkung, $ort, $tag1, $tag2, $tag3, $zeitraum_von, $zeitraum_bis, $kosten, $bild)
    {
        $zeitraum_von=mb_substr($zeitraum_von, 0, 10) ." ".mb_substr($zeitraum_von, 11)."-00";
        $zeitraum_von=mb_substr($zeitraum_von, 0, 13)."-".mb_substr($zeitraum_von, 14);

        $zeitraum_bis=mb_substr($zeitraum_bis, 0, 10) ." ".mb_substr($zeitraum_bis, 11)."-00";
        $zeitraum_bis=mb_substr($zeitraum_bis, 0, 13)."-".mb_substr($zeitraum_bis, 14);

        $query = "SELECT MAX(kurs_id) FROM kurse";

        $statement = $this->con->prepare($query);
        $statement->execute();  
        $id = $statement->fetch(PDO::FETCH_BOTH);


        $num = intval($id[0]);

        $num = $num +1;

        $eintrag = "INSERT INTO `kurse` (`kurs_id`, `name`, `bild`, `beschreibung`, `kursleiter1`, `kursleiter2`, `kursleiter3`, `teilnehmerbegrenzung`, `jahrgangsstufen_beschraenkung`, `ort`, `Tag_1`, `Tag_2`, `Tag_3`, `zeitraum_von`, `zeitraum_bis`, `kosten`) VALUES ('$num', '$name', '$bild', '$beschreibung', '$kursleiter1', '$kursleiter2', '$kursleiter3', '$teilnehmerbegrenzung', '$beschraenkung', '$ort' , '$tag1', '$tag2', '$tag3', '$zeitraum_von', '$zeitraum_bis', '$kosten');";

        $statement = $this->con->prepare($eintrag);
        $statement->execute();

/*
        if($date == true) {

            return ("Kurs erfolgreich eingetragen!");
        } else {
            return("Fehler beim Eintragen des Kurses!");
        }
*/
    }

    public function namePruefen($name)
    {
        $query = "SELECT * FROM kurse WHERE name='$name' ORDER BY name";
        $statement = $this->con->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        if( empty($data))
        {
            return true;
        }
        return false;
    }

    public function console_log($data)
    {
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }


    public function suche($suchbegriff, $sortierung)
    {
        $query = "  SELECT DISTINCT kurse.kurs_id, kurse.name, kurse.bild
                    FROM kurse
                    WHERE (LOWER(kurse.beschreibung) LIKE LOWER(:begriff) OR LOWER(kurse.name) LIKE LOWER(:begriff))";
        if ($sortierung == "name")
            $query = $query. " ORDER BY kurse.name";
        else
            $query = $query. " ORDER BY kurse.name DESC";
        $statement = $this->con->prepare($query);
        $statement->execute(["begriff"=>"%".$suchbegriff."%"]);
        $date = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $date;
    }

    public function benutzerZuKurse($kursId, $Id)
    {
        $query = "INSERT INTO 'benutzer_zu_kurse' ('b_id','kurs_id') VALUES ('$kursId','$Id');";
        $statement = $this->con->prepare($query);
        $statement->execute();
    }

    public function pruefeUser_Zeit($kursId, $Id)
    {
        $query = "SELECT COUNT(*) FROM benutzer_zu_kurse WHERE 'kurs_id'=$kursId;";
        $statement = $this->con->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        $query = "SELECT 'teilnehmerbegrenzung' FROM kurse WHERE 'kurs_id'=$kursId;";
        $statement = $this->con->prepare($query);
        $statement->execute();
        $datu = $statement->fetchAll(PDO::FETCH_ASSOC);

        if($data<$datu)
        {
            $query = "SELECT 'kurs_id' FROM benutzer_zu_kurse WHERE 'b_id'=$Id;";
            $statement = $this->con->prepare($query);
            $statement->execute();
            $b_kurse = $statement->fetchAll(PDO::FETCH_ASSOC);

            $query = "SELECT 'Tag_1' FROM kurse WHERE 'kurs_id'=$kursId;";
            $statement = $this->con->prepare($query);
            $statement->execute();
            $tag1_pr = $statement->fetchAll(PDO::FETCH_ASSOC);

            $query = "SELECT 'Tag_2' FROM kurse WHERE 'kurs_id'=$kursId";
            $statement = $this->con->prepare($query); 
            $statement->execute();
            $tag2_pr = $statement->fetchAll(PDO::FETCH_ASSOC);

            $query = "SELECT 'Tag_3' FROM kurse WHERE 'kurs_id'=$kursId";
            $statement = $this->con->prepare($query);
            $statement->execute();
            $tag3_pr = $statement->fetchAll(PDO::FETCH_ASSOC);

            $test=true;

            for ($i = 0; $i < count($b_kurse); $i++) 
            {
               $query = "SELECT 'Tag_1' FROM kurse WHERE 'kurs_id'=$b_kurse[$i];";
                $statement = $this->con->prepare($query);
                $statement->execute();
                $tag1 = $statement->fetchAll(PDO::FETCH_ASSOC);

                $query = "SELECT 'Tag_2' FROM kurse WHERE 'kurs_id'=$b_kurse[$i];";
                $statement = $this->con->prepare($query);
                $statement->execute();
                $tag2 = $statement->fetchAll(PDO::FETCH_ASSOC);

                $query = "SELECT 'Tag_3' FROM kurse WHERE 'kurs_id'=$b_kurse[$i];";
                $statement = $this->con->prepare($query);
                $statement->execute();
                $tag3 = $statement->fetchAll(PDO::FETCH_ASSOC);

                if($tag1_pr==true AND $tag1==true){
                    $test=false;
                }
                if($tag2_pr==true AND $tag2==true){
                    $test=false;
                }
                if($tag3_pr==true AND $tag3==true){
                    $test=false;
                }
            }

        if($test){
            $this->benutzerZuKurse($kursId, $Id);
        }
    }
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
