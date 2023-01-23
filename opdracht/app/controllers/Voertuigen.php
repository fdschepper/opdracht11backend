<?php

class Voertuigen extends Controller
{

    public function __construct()
    {
        $this->voertuigModel = $this->model('Voertuig');
    }

    public function index()
    {
        $result = $this->voertuigModel->getInstructors();
        var_dump($result);

        $rows = '';
        foreach ($result as $value) {
            $rows .= "<tr>
                  <td>$value->Voornaam</td>
                  <td>$value->Tussenvoegsel</td>
                  <td>$value->Achternaam</td>
                  <td>$value->Mobiel</td>
                  <td>$value->DatumInDienst</td>
                  <td>$value->AantalSterren</td>
                  <td><a href='" . URLROOT . "/people/delete/$value->Id'>delete</a></td>
                </tr>";
        }


        $data = [
            'title' => '<h1>Rijkste mensen ter wereld</h1>',
            'rows' => $rows
        ];

        $this->view('voertuigen/index', $data);
    }
}
