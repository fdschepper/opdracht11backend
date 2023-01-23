<?php require(APPROOT . '\views\includes\head.php') ?>
<h3><?= $data['title'] ?></h3>
<h3> aantal instructeurs: <?= $data['count'] ?></h3>

<table border='1'>
    <thead>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>Mobiel</th>
        <th>Datum in dienst</th>
        <th>Aantal sterren</th>
        <th>Voertuigen</th>
    </thead>
    <tbody>
        <?= $data['rows'] ?>
    </tbody>
</table>