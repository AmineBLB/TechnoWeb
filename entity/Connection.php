<?php

class Connection
{
    private $db;
    private $selectAllresult;

    public function __construct($hostname, $username, $password)
    {
        try {
            $this->db = new PDO("mysql:host=$hostname;dbname=mysql", $username, $password)or die(print_r($this->db->errorInfo(), true));
            //echo 'Connected to database OK';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getPDO()
    {
        return $this->db;
    }

    public function closeConnection() {
        $db = null;
        //echo 'Discoonnected from database';
    }

    public function insertIntoIncident(Incident &$incident, $txt)
    {
        $description = $incident->getDescription();
        $type = $incident-> getType();
        $adresse = $incident-> getAdresse();
        $severite = $incident-> getReference();
        $reference = $incident-> getReference();

        try {
            $count = $this->db->exec("INSERT INTO Mairie.Incident(Description, Type, Adresse, Severite, Reference, Image)
                                      VALUES ('$description',
                                              '$type',
                                              '$adresse',
                                              '$severite',
                                              '$reference',
                                              '');"
                                    )
            or die(print_r($this->db->errorInfo(), true));

        }catch (PDOException $e)
        {
            echo $e->getMessage();
        }

        return "Nombre de lignes insérées : ".$count;
    }

    public function selectAll() {
        $rqt = "SELECT * FROM Mairie.Incident";
        $this->selectAllresult = $this->db ->prepare($rqt);
        $this->selectAllresult->execute();

    }

    public function getNextRow() {
        return $this->selectAllresult->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteRow($id) {
        $rqt = "DELETE FROM Mairie.Incident
                WHERE Incident.Id = $id;";
        $delete = $this -> db -> prepare($rqt);
        $delete ->execute();
        echo "Delete";
    }

}

