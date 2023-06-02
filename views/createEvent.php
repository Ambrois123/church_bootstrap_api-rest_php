<?php ob_start();?>


<form method="POST" action="<?= URL ?>admin/evenement/validationCreation"  enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Titre :</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="audio">Flyer :</label>
        <input type="file" class="form-control" id="audio" name="flyer">
    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Valider</button>
    </div>
    
</form>


<?php 
$content = ob_get_clean();
$title = "Page de création d'un événement";
require_once "views/assets/template.php";

?>
                        
                        