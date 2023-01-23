<?php require(APPROOT . '\views\includes\head.php') ?>
<h3><?= $data['title'] ?></h3>

<p>Auto van instructeur:
    <?= $data['instructeurNaam'] ?>
</p>
<p>E-mailadres:
    <?= $data['instructeurEmail'] ?>
</p>
<p>Kenteken auto:
    <?= $data['instructeurAutoKenteken'] ?> <?= $data['instructeurAutoType'] ?>
</p>

<table border='1'>
    <thead>
        <th>Datum</th>
        <th>mankement</th>
    </thead>
    <tbody>
        <?= $data['rows'] ?>
    </tbody>
</table>
<a href="<?= URLROOT . '/Lessen/addTopic/' . $data['instructeurId']; ?>">Mankament Toevoegen</a>