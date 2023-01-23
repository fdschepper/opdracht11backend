<?php
//include(APPROOT . "/views/includes/head.php" );
echo $data["title"];
?>
<a href="<?= URLROOT; ?>/people/create">Nieuw record</a>
<table>
  <thead>
    <th>Id</th>
    <th>Naam</th>
    <th>Nettowaarde</th>
    <th>Leeftijd</th>
    <th>Bedrijf</th>
    <th>update</th>
    <th>delete</th>
  </thead>
  <tbody>
    <?= $data['people'] ?>
  </tbody>
</table>
<a href="<?= URLROOT; ?>/homepages/index">terug</a>