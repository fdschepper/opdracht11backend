<?php
class Person
{
  // Properties, fields
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getPeople()
  {
    $this->db->query("SELECT * FROM `richestpeople`;");
    $result = $this->db->resultSet();
    return $result;
  }

  public function getSinglePerson($id)
  {
    $this->db->query("SELECT * FROM richestpeople WHERE Id = :id");
    $this->db->bind(':id', $id, PDO::PARAM_INT);
    return $this->db->single();
  }

  public function getSinglePersonByName($name)
  {
    $this->db->query("SELECT * FROM richestpeople WHERE name = :name");
    $this->db->bind(':name', $name, PDO::PARAM_STR);
    return $this->db->single();
  }

  public function updatePerson($post)
  {
    $this->db->query("UPDATE richestpeople 
                        SET name = :name,
                            Nettoworth = :nettoworth,
                            Age = :age,
                            Company = :company
                        WHERE Id = :id");

    $this->db->bind(':id', $post["id"], PDO::PARAM_INT);
    $this->db->bind(':name', $post["name"], PDO::PARAM_STR);
    $this->db->bind(':nettoworth', $post["nettoworth"], PDO::PARAM_STR);
    $this->db->bind(':age', $post["age"], PDO::PARAM_INT);
    $this->db->bind(':company', $post["company"], PDO::PARAM_STR);


    return $this->db->execute();
  }

  public function deletePerson($id)
  {
    $this->db->query("DELETE FROM richestpeople WHERE Id = :id");
    $this->db->bind("id", $id, PDO::PARAM_INT);
    return $this->db->execute();
  }

  public function createPerson($post)
  {
    $this->db->query("INSERT INTO richestpeople(Id, Name, Nettoworth, Age, Company) 
                        VALUES(:id, :name, :nettoworth, :age, :company)");

    $this->db->bind(':id', NULL, PDO::PARAM_INT);
    $this->db->bind(':name', $post["name"], PDO::PARAM_STR);
    $this->db->bind(':nettoworth', $post["capitalCity"], PDO::PARAM_STR);
    $this->db->bind(':age', $post["continent"], PDO::PARAM_INT);
    $this->db->bind(':company', $post["population"], PDO::PARAM_STR);

    return $this->db->execute();
  }
}
