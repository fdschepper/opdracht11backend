<?php

class Instructeur
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

    public function getDIGV($id)
    {
        $this->db->query("SELECT Instructeur.Id, Instructeur.Voornaam, Instructeur.Tussenvoegsel, Instructeur.Achternaam, Instructeur.DatumInDienst, Instructeur.AantalSterren, TypeVoertuig.TypeVoertuig, Voertuig.Type, Voertuig.Kenteken, Voertuig.Bouwjaar, Voertuig.Brandstof, TypeVoertuig.Rijbewijscategorie
        FROM Instructeur
        JOIN VoertuigInstructeur ON Instructeur.Id = VoertuigInstructeur.InstructeurId
        JOIN Voertuig ON VoertuigInstructeur.VoertuigId = Voertuig.Id
        JOIN TypeVoertuig ON Voertuig.TypeVoertuigId = TypeVoertuig.Id
        WHERE instructeur.Id = :id
        ORDER BY TypeVoertuig.Rijbewijscategorie ASC
              
        ");

        $this->db->bind(':id', $id);

        $result = $this->db->resultSet();

        return $result;
    }

    public function getAllevoertuigen()
    {
        $this->db->query("SELECT Instructeur.Id, Instructeur.Voornaam, Instructeur.Tussenvoegsel, Instructeur.Achternaam, Instructeur.DatumInDienst, Instructeur.AantalSterren, TypeVoertuig.TypeVoertuig, Voertuig.Type, Voertuig.Kenteken, Voertuig.Bouwjaar, Voertuig.Brandstof, TypeVoertuig.Rijbewijscategorie, Instructeur.Achternaam, Instructeur.DatumInDienst, Instructeur.AantalSterren, TypeVoertuig.TypeVoertuig, Voertuig.Type, Voertuig.Kenteken, Voertuig.Bouwjaar, Voertuig.Brandstof, CONCAT (Voertuig.id) AS voertuigId
        FROM Instructeur
        JOIN VoertuigInstructeur ON Instructeur.Id = VoertuigInstructeur.InstructeurId
        JOIN Voertuig ON VoertuigInstructeur.VoertuigId = Voertuig.Id
        JOIN TypeVoertuig ON Voertuig.TypeVoertuigId = TypeVoertuig.Id
        WHERE
        voertuiginstructeur.Kenteken IS NULL;
        ORDER BY TypeVoertuig.Rijbewijscategorie ASC
              
        ");

        $result = $this->db->resultSet();

        return $result;
    }

    public function create()
    {
        $this->db->query("INSERT INTO Voertuig (TypeVoertuig, Type, Kenteken, Bouwjaar, Brandstof, Rijbewijscategorie)
        VALUES ('Sedan', 'VW Passat', 'XY-123-Z', 2010, 'Benzine', 'B');
        ");

        $result = $this->db->resultSet();

        return $result;
    }
}
