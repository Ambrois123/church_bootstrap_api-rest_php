<?php 

session_start( );

define("URL", str_replace("index.php", "",(isset($_SERVER['HTTPS']) ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once './controller/SermonController.php';
require_once './controller/AdminController.php';

$sermonController = new SermonController();
$adminController = new AdminController();




try{
    if(empty($_GET['page'])){
        require_once "./accueil.php";

    }else  {
    $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
    if(empty($url[0])) throw new Exception("La page n'existe pas");

    switch($url[0]){
        case "accueil" : require_once "./accueil.php";
        break;
        case "predications" : require_once "./predications.php";
        break;  
        case "sermons" :$sermonController->readSermons(); 
        break;
        case "sermon" : 
            if(empty($url[1])) throw new Exception("Identifiant du sermon manquant");
            $sermonController->readOneSermon($url[1]); 
        break;
        case "admin" :
        if(empty($url[1])) throw new Exception("La page n'existe pas");

        switch($url[1]){
            case "login" : $adminController->getPageLogin();
            break;
            case "connexion" : $adminController->connexion();
            break;
            case "dashboard" : $adminController->getAccueilAdmin();
            break;
            case "deconnexion" : $adminController->deconnexion();
            break;
            case "sermons" : 
                if(empty($url[2])) throw new Exception("La page n'existe pas");
                switch($url[2]){
                    case "visualisation" : $sermonController->DisplaySermons();
                    break;
                    case "suppression" : $sermonController->deleteSermon();
                    break;
                    case "modification" : $sermonController->getUpdatePage($url[3]);
                    break;
                    case "validateModif": $sermonController->updateSermon();
                    break;
                    case "creation" : $sermonController->getPageCreation();
                    break;
                    case "validationCreation" : $sermonController->createSermon();
                    break;  
                    default : throw new Exception("La page n'existe pas");
                }
            break;
            case "etudesbibliques" : 
                if(empty($url[2])) throw new Exception("La page n'existe pas");
                switch($url[2]){
                    case "visualisation" : echo "visualisation";
                    break;
                    case "suppression" : echo "suppression";
                    break;
                    case "modification" : echo "modification";
                    break;
                    case "validateModif: echo validateModif";
                    break;
                    case "creation" : echo "creation";
                    break;
                    case "validationCreation" : echo "validateCreation";
                    break;
                    default : throw new Exception("La page n'existe pas");
                }
            break;
            default : throw new Exception("La page n'existe pas");
        }
        break;
        default : throw new Exception("La page n'existe pas");
    }

    }
}catch(Exception $e){
    $msg = $e->getMessage();
    echo $msg;
    echo "</br>";
    echo "<a href='".URL."admin/login'>Retour à la page de Login</a>";
}