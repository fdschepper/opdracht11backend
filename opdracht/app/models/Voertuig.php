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
        Voornaam, Tussenvoegsel, Achternaam, Mobiel, DatumInDienst, AantalSterren, Id, (SELECT COUNT(*) FROM Instructeur) AS count

        FROM Instructeur ORDER BY AantalSterren DESC;");

        $result = $this->db->resultSet();

        return $result;
    }

    public function getUsedVehicles($id)
    {
        $this->db->query("SELECT Instructeur.Id, Instructeur.Voornaam, Instructeur.Tussenvoegsel, Instructeur.Achternaam, Instructeur.DatumInDienst, Instructeur.AantalSterren, TypeVoertuig.TypeVoertuig, Voertuig.Type, Voertuig.Kenteken, Voertuig.Bouwjaar, Voertuig.Brandstof, TypeVoertuig.Rijbewijscategorie
        FROM Instructeur
        JOIN VoertuigInstructeur ON Instructeur.Id = VoertuigInstructeur.InstructeurId
        JOIN Voertuig ON VoertuigInstructeur.VoertuigId = Voertuig.Id
        JOIN TypeVoertuig ON Voertuig.TypeVoertuigId = TypeVoertuig.Id
        WHERE instructeur.Id = :id
              
        ");

        $this->db->bind(':id', $id);

        $result = $this->db->resultSet();

        return $result;
    }
}
