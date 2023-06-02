<?php ob_start();

?>

<form method="POST" action="<?= URL ?>admin/sermons/validateModif"  enctype="multipart/form-data">
    <div class="form-group">
        <label for="date">Date :</label>
        <input type="date" class="form-control" id="date" name="date" value="<?= $sermons->getDate()?>">
    </div>
    <div class="form-group">
        <label for="title">Titre :</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $sermons->getTitle()?>">
    </div>
    <div class="form-group">
        <label for="theme">Thème :</label>
        <input type="text" class="form-control" id="theme" name="theme" value="<?= $sermons->getTheme()?>">
    </div>
    <div class="form-group">
        <label for="resume">Résumé :</label>
        <textarea rows="6" class="form-control" id="resume" name="resume" ><?= $sermons->getResume()?></textarea>
    </div>
    <h5>Fichier audio actuel</h5>
    <input type="text" value="<?= $sermons->getAudio()?>" >
    <div class="form-group">
        <label for="audio">Changer fichier audio :</label>
        <input type="file" class="form-control" id="audio" name="audio" >
    </div>
    <input type="hidden" name="ident" value="<?= $sermons->getId() ?>">
    <div class="form-group">
        <label for="author">Orateur :</label>
        <input type="text" class="form-control" id="author" name="author" value="<?= $sermons->getAuthor()?>">
    </div>

    <div class="form-group">
        <button class="btn btn-primary" type="submit">Valider</button>
    </div>
</form>

<?php 
$content = ob_get_clean();
$title = "Modification du sermon : ".$sermons->getId();
require_once "views/assets/template.php";