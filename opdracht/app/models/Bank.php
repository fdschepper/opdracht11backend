<?php

class Bank
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getInfo()
    {
        $this->db->query("CALL select_all_data()");

        $result = $this->db->resultSet();

        return $result;
    }
}
