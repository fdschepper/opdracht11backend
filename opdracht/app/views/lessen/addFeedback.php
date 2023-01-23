<?php require(APPROOT . '\views\includes\head.php') ?>
<h3><?= $data['title']; ?></h3>

<form action="<?= URLROOT ?>/lessen/addFeedback" method="post">
    <label for="feedback">Opmerking</label><br>
    <input type="text" name="feedback" id="feedback"><br>
    <div class="feedbackError">
        <?= $data['feedbackError']; ?>
    </div>
    <input type="hidden" name="lesId" value="<?= $data['lesId']; ?>"><br>
    <input type="submit" value="Toevoegen">
</form>
<?php require(APPROOT . '\views\includes\footer.php') ?>