<?php

if(count(get_included_files()) ==1) exit("Direct access not permitted.");

class DB
{
    // Connection to MySQL database. Trying connection. Exception on Failure
    private con$;
    private $host;
    private $dbname;
    private $user;
    private $password;

    public function __construct()
    {

     $host = 'vmd48086.contaboserver.net';
     $dbname = 'projekttage';
     $user = 'Protage';
     $password = 'protage2020';
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
}
