<?php

class Voertuig
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getInstructors()
    {
        $this->db->query("SELECT 
        Voornaam, Tussenvoegsel, Achternaam, Mobiel, DatumInDienst, AantalSterren 
        FROM Instructeur ORDER BY AantalSterren DESC;");

        $result = $this->db->resultSet();

        return $result;
    }
}
