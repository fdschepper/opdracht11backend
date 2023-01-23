<?php
class People extends Controller
{
  // Properties, field
  private $personModel;

  // Dit is de constructor
  public function __construct()
  {
    $this->personModel = $this->model('Person');
  }

  public function index()
  {
    /**
     * Haal via de method getFruits() uit de model Fruit de records op
     * uit de database
     */
    $people = $this->personModel->getPeople();

    /**
     * Maak de inhoud voor de tbody in de view
     */
    $rows = '';
    foreach ($people as $value) {
      $rows .= "<tr>
                  <td>$value->Id</td>
                  <td>$value->Name</td>
                  <td>$value->Nettoworth</td>
                  <td>$value->Age</td>
                  <td>$value->Company</td>
                  <td><a href='" . URLROOT . "/people/update/$value->Id'>update</a></td>
                  <td><a href='" . URLROOT . "/people/delete/$value->Id'>delete</a></td>
                </tr>";
    }


    $data = [
      'title' => '<h1>Rijkste mensen ter wereld</h1>',
      'people' => $rows
    ];
    $this->view('people/index', $data);
  }

  public function update($id = null)
  {
    // var_dump($id);exit();
    // var_dump($_SERVER);exit();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $this->personModel->updatePerson($_POST);
      header("Location: " . URLROOT . "/people/index");
    } else {
      $row = $this->personModel->getSinglePerson($id);
      $data = [
        'title' => '<h1>Update landenoverzicht</h1>',
        'row' => $row
      ];
      $this->view("people/update", $data);
    }
  }

  public function delete($id)
  {
    $this->personModel->deletePerson($id);

    $data = [
      'deleteStatus' => "Het record met id = $id is verwijdert"
    ];
    $this->view("people/delete", $data);
    header("Refresh:3; url=" . URLROOT . "/people/index");
  }

  public function create()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // var_dump($_POST);
      try {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->personModel->createPerson($_POST);
        header("Location:" . URLROOT . "/people/index");
      } catch (PDOException $e) {
        echo "Het inserten van het record is niet gelukt";
        header("Refresh:3; url=" . URLROOT . "/people/index");
      }
    } else {
      $data = [
        'title' => "Voeg een nieuw land in"
      ];

      $this->view("people/create", $data);
    }
  }

  public function scanPerson()
  {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

      $record = $this->personModel->getSinglePersonByName($_POST["person"]);

      $rowData = "<tr>
                    <td>$record->id</td>
                    <td>$record->name</td>
                    <td>$record->capitalCity</td>
                    <td>$record->continent</td>
                    <td>$record->population</td>
                  </tr>";

      $data = [
        'title' => 'Dit is het gescande land',
        'rowData' => $rowData
      ];

      $this->view('people/scanPerson', $data);
    } else {
      $data = [
        'title' => 'Scan het land',
        'rowData' => ""
      ];

      $this->view('people/scanPerson', $data);
    }
  }
}
