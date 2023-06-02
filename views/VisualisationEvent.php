<?php ob_start(); 

?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre</th>
      <th scope="col">Flyer</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($evenements as $evenement) :?>
    <tr>
        <td><?=$evenement->getId()?></td>
        <td><?=$evenement->getTitle()?></td>
        <td>
          <img src="<?=URL."public/images/".$evenement->getFlyer()?>" alt="" width="60px">
        </td>
        <td>
           <a href="<?=URL?>admin/evenement/modification/<?=$evenement->getId()?>" class="btn btn-warning">Modifier</a>
        </td>
        <td>
            <form method="POST" action="<?= URL ?>admin/evenement/suppression/<?=$evenement->getId()?>" onsubmit="return confirm('Voulez-vous vraiment supprimer cet événement ?')">
                <input type="hidden" name="event_id" value="<?=$evenement->getId()?>">
                <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    
    <?php endforeach; ?>
  </tbody>
</table>



<?php
$content = ob_get_clean();
$title = "Les événements";
require "views/assets/Template.php";
