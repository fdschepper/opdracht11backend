<?php require(APPROOT . '\views\includes\head.php') ?>
<h3><?= $data['title'] ?></h3>
<a href="<?= URLROOT . '/Banken/create'; ?>">Nieuwe Transactie</a>

<table border='1'>
    <thead>
        <th>Naam</th>
        <th>Adres</th>
        <th>Email</th>
        <th>RekeningNo</th>
        <th>RekeningSoort</th>
        <th>TransactieNo</th>
        <th>TransactieSoort</th>
        <th>TransactieDatum</th>
        <th>Bedrag</th>
        <th>Saldo</th>
        <th>Wijzigen</th>
        <th>Verwijderen</th>
    </thead>
    <tbody>
        <?= $data['rows'] ?>
    </tbody>
</table>