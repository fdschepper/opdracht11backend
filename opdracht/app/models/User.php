<?php
class Country
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function getUsers()
  {
    $this->db->query("SELECT * FROM `richestpeople` ORDER BY Nettoworth DESC;");

    $result = $this->db->resultSet();

    return $result;
  }
}
