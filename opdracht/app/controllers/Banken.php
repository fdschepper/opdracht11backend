<?php

class Banken extends Controller
{

    private $bankModel;

    public function __construct()
    {
        $this->bankModel = $this->model('Bank');
    }

    public function index()
    {
        $result = $this->bankModel->getInfo();
        var_dump($result);

        $rows = '';
        foreach ($result as $value) {
            $rows .= "<tr>
                   <td>$value->Full_Name</td>
                   <td>$value->Address</td>
                   <td>$value->Email</td>
                   <td>$value->Account_Number</td>
                   <td>$value->Account_Type</td>
                   <td>$value->Transaction_Number</td>
                   <td>$value->Transaction_Type</td>
                   <td>$value->Transaction_Date</td>
                   <td>$value->Amount</td>
                   <td>$value->Balance</td>
                   <td><a href='" . URLROOT . "/Banken/Edit/$value->Id_transaction_info'>Wijzigen</a></td>
                   <td><a href='" . URLROOT . "/Banken/Delete/$value->Id_transaction_info'>Verwijderen</a></td>
                 </tr>";
        }

        $data = [
            'title' => 'Overzicht Bank-Betalings-Systeem',
            'rows' => $rows
        ];

        $this->view('Bank/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Nieuwe Transactie-Betaling',
        ];

        $this->view('Bank/create', $data);
    }
}
