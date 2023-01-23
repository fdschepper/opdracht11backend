<?php require(APPROOT . '\views\includes\head.php') ?>
<h3><?= $data['title'] ?></h3>

<?php

?>
<table border='1'>
    <thead>
        <th>Type voertuig</th>
        <th>Type</th>
        <th>Kenteken</th>
        <th>Bouwjaar</th>
        <th>Brandstof</th>
        <th>Rijbewijscategorie</th>
    </thead>
    <tbody>

        <?php
        if (!$data['isEmpty']) {
            echo $data['rows'];
        }
        ?>

    </tbody>

</table>
<?php if ($data['isEmpty']) {
    echo 'er zijn geen gegevens beschikbaar';
} ?>