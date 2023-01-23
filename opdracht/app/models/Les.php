<?php

class Les
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getLessons()
    {
        $this->db->query("SELECT Les.DatumTijd
                                ,Leerling.Naam as LENA
                                ,Les.Id
                                ,Instructeur.Naam AS INNA
                          FROM Les
                          INNER JOIN Instructeur
                          ON Instructeur.Id = Les.InstructeurId
                          INNER JOIN Leerling
                          ON Leerling.Id = Les.LeerlingId
                          WHERE Instructeur.Id = :Id");

        $this->db->bind(':Id', 2);

        $result = $this->db->resultSet();

        return $result;
    }

    public function getInstructor()
    {
        $this->db->query("SELECT instructeur1.Naam ,instructeur1.Id AS INID, auto.Id AS AUID, instructeur1.Email, auto.Kenteken, auto.Type, mankement.Datum, mankement.Mankement
        FROM instructeur1
        INNER JOIN auto ON instructeur1.Id = auto.InstructeurId
        INNER JOIN mankement ON auto.Id = mankement.AutoId
        WHERE instructeur1.Id = :Id
        ORDER BY mankement.Datum DESC
        ");

        $this->db->bind(':Id', 2);

        $result = $this->db->resultSet();

        return $result;
    }

    public function getTopicsLesson($lessonId)
    {
        $this->db->query("SELECT *
                          FROM Onderwerp
                          INNER JOIN Les 
                          ON Les.Id = Onderwerp.LesId 
                          WHERE LesId = :lessonId");
        $this->db->bind(':lessonId', $lessonId);

        $result = $this->db->resultSet();

        return $result;
    }

    public function getInfoLesson($lessonId)
    {
        $this->db->query("SELECT *
                          FROM opmerking
                          INNER JOIN les 
                          ON les.Id = opmerking.LesId 
                          WHERE opmerking.LesId = :lessonId");

        $this->db->bind(':lessonId', $lessonId);

        $result = $this->db->resultSet();

        return $result;
    }

    public function addTopic($post)
    {
        $today = date("Y-m-d");
        $sql = "INSERT INTO mankement (datum
                                      ,mankement)
                VALUES                ('$today'
                                      ,'a')";

        echo $sql;

        $this->db->query($sql);
        //$this->db->bind(':topic', $post['topic'], PDO::PARAM_STR);
        echo $sql;
        return $this->db->execute();
    }

    public function addFeedback($post)
    {
        $sql = "INSERT INTO Opmerking (LesId
                                      ,Opmerking)
                VALUES                (:lesId
                                      ,:feedback)";

        $this->db->query($sql);
        $this->db->bind(':lesId', $post['lesId'], PDO::PARAM_INT);
        $this->db->bind(':feedback', $post['feedback'], PDO::PARAM_STR);
        return $this->db->execute();
    }
}
