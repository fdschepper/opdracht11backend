<?php require(APPROOT . '\views\includes\head.php') ?>
<h3><?= $data['title'] ?></h3>
<h5><?= 'datum: ' . $data['date'] . ' ' . $data['time'] ?></h5>
<table border='1'>
    <thead>
        <th>
            Opmerking
        </th>
    </thead>
    <tbody>
        <?= $data['rows']; ?>
    </tbody>
</table>
<br>
<a href="<?= URLROOT; ?>/lessen/addFeedback/<?= $data['lesId']; ?>">
    <input type="button" value="Opmerking toevoegen">
</a>

<?php require(APPROOT . '\views\includes\footer.php') ?>