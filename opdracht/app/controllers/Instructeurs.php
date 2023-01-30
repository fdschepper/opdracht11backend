<?php

class Instructeurs extends Controller
{
    private $instructeurModel;

    public function __construct()
    {
        $this->instructeurModel = $this->model('Instructeur');
    }

    public function index()
    {
        $result = $this->instructeurModel->getInstructors();
        //var_dump($result);

        $rows = '';
        foreach ($result as $value) {
            $rows .= "<tr>
                  <td>$value->Voornaam</td>
                  <td>$value->Tussenvoegsel</td>
                  <td>$value->Achternaam</td>
                  <td>$value->Mobiel</td>
                  <td>$value->DatumInDienst</td>
                  <td>$value->AantalSterren</td>
                  <td><a href='" . URLROOT . "/instructeurs/Digv/$value->Id'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-car-front-fill' viewBox='0 0 16 16'>
                  <path d='M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z'/>
                </svg></a></td>
                </tr>";
        }


        $data = [
            'title' => '<h1>Instructeurs in dienst</h1>',
            'rows' => $rows,
            'count' => $result[0]->count
        ];

        $this->view('Instructeurs/index', $data);
    }

    public function digv($id)
    {
        $result = $this->instructeurModel->getDIGV($id);
        //var_dump($result);



        $rows = '';
        foreach ($result as $value) {
            $rows .= "<tr>
                  <td>$value->TypeVoertuig</td>
                  <td>$value->Type</td>
                  <td>$value->Kenteken</td>
                  <td>$value->Bouwjaar</td>
                  <td>$value->Brandstof</td>
                  <td>$value->Rijbewijscategorie</td>
                </tr>";
        }


        if ($rows == '') {
            $isEmpty = true;
        } else {
            $isEmpty = false;
        }


        if (!$isEmpty) {
            $data = [
                'title' => '<h1>Door instructeur gebruikte voertuigen</h1>',
                'rows' => $rows,
                'isEmpty' => $isEmpty,
                'datumInDienst' => $result[0]->DatumInDienst,
                'naam' => $result[0]->Voornaam . ' ' . $result[0]->Tussenvoegsel . ' ' . $result[0]->Achternaam,
                'aantalSterren' => $result[0]->AantalSterren,
                'id' => $id
            ];
        } else {
            $data = [
                'title' => '<h1>Door instructeur gebruikte voertuigen</h1>',
                'rows' => $rows,
                'isEmpty' => $isEmpty,
                'id' => $id
            ];
        }






        //var_dump($data);

        $this->view('instructeurs/DIGV', $data);
    }

    public function alleVoertuigen($id)
    {
        $result = $this->instructeurModel->getAllevoertuigen();
        var_dump($result);



        $rows = '';
        foreach ($result as $value) {
            $rows .= "<tr>
                  <td>$value->TypeVoertuig</td>
                  <td>$value->Type</td>
                  <td>$value->Kenteken</td>
                  <td>$value->Bouwjaar</td>
                  <td>$value->Brandstof</td>
                  <td>$value->Rijbewijscategorie</td>
                  <td><a href='" . URLROOT . "/instructeurs/create/$value->voertuigId'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus-lg' viewBox='0 0 16 16'>
  <path fill-rule='evenodd' d='M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z'/>
</svg></a></td>
                </tr>";
        }


        if ($rows == '') {
            $isEmpty = true;
        } else {
            $isEmpty = false;
        }


        if (!$isEmpty) {
            $data = [
                'title' => '<h1>Alle voertuigen</h1>',
                'rows' => $rows,
                'isEmpty' => $isEmpty,
                'datumInDienst' => $result[0]->DatumInDienst,
                'naam' => $result[0]->Voornaam . ' ' . $result[0]->Tussenvoegsel . ' ' . $result[0]->Achternaam,
                'aantalSterren' => $result[0]->AantalSterren,
                'id' => $id
            ];
        } else {
            $data = [
                'title' => '<h1>Alle voertuigen</h1>',
                'rows' => $rows,
                'isEmpty' => $isEmpty,
                'id' => $id
            ];
        }






        //var_dump($data);

        $this->view('Instructeurs/alleVoertuigen', $data);
    }

    public function create($id)
    {
        $this->instructeurModel->getAllevoertuigen($id);
    }
}
