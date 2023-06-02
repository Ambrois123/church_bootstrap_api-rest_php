<?php ob_start(); ?>

<?php 
echo $msg;
echo "</br>";
echo "<a href='".URL."admin/login'>Retour à la page de Login</a>";
echo "</br>";
echo "<a href='".URL."'>Retour à la page d'accueil</a>";
?>

<?php 
$content = ob_get_clean();
$title = "Erreur 404 !!";
require_once "views/assets/template.php";