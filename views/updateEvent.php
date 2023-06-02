<?php ob_start();

?>

<form method="POST" action="<?= URL ?>admin/evenement/validateModif"  enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Titre :</label>
        <input type="text" class="form-control" id="title" name="title" value="<?=$evenement->getTitle()?>">
    </div>
    <h5>Image actuelle :</h5>
        <img src="<?=URL?>public/images/<?=$evenement->getFlyer()?>" alt="" width="120px">
    <div class="form-group">
        <label for="flyer">Changer image :</label>
        <input type="file" class="form-control" id="flyer" name="flyer" >
    </div>
    <input type="hidden" name="ident" value="<?=$evenement->getId()?>">

    <div class="form-group">
        <button class="btn btn-primary" type="submit">Valider</button>
    </div>
    
</form>

<?php 
$content = ob_get_clean();
$title = "Modification d'un événement : ".$evenement->getId();
require_once "views/assets/template.php";