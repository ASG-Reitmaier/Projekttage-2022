<?php

if(count(get_included_files()) ==1) exit("Direct access not permitted.");

class DB
{
    // Connection to MySQL database. Trying connection. Exception on Failure
    private $con;
    private $host = 'vmd48086.contaboserver.net';
    private $dbname = 'projekttage';
    private $user = 'Protage';
    private $password = 'protage2020';

    public function __construct()
    {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;

        try {
            $this->con = new PDO($dsn, $this->user, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Failure" . $e->getMessage();
        }
    }

    // Returns all kurse via MySQL query (+ Prevention of SQL Injection)

    public function viewUser()
    {
        $query = "SELECT benutzer_ID,	name,	jahrgangsstufe,	rolle FROM benutzer ORDER BY Name";
        $statement = $this->con->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }


}
