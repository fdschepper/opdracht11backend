<?php require(APPROOT . '\views\includes\head.php') ?>
<h3><?= $data['title']; ?></h3>
<?php // var_dump($data) 
?>
<p><?= $data['kenteken'] ?> <?= $data['type'] ?></p>

<form action="<?= URLROOT ?>/lessen/addTopic" method="post">
    <label for="topic">Mankement</label><br>
    <input type="text" name="topic" id="topic"><br>
    <div class="topicError">
        <?= $data['topicError']; ?>
    </div>
    <input type="hidden" name="lesId" value="<?= $data['lesId']; ?>"><br>
    <input type="submit" value="Toevoegen">
</form>
<?php require(APPROOT . '\views\includes\footer.php') ?>