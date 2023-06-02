<?php 

session_start( );

define("URL", str_replace("index.php", "",(isset($_SERVER['HTTPS']) ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once './controller/SermonController.php';
require_once './controller/AdminController.php';
require_once './controller/EventController.php';

$sermonController = new SermonController();
$adminController = new AdminController();
$eventController = new EventController();




try{
    if(empty($_GET['page'])){
        require_once "./viewsFront/accueil.php";

    }else  {
    $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
    if(empty($url[0])) throw new Exception("La page n'existe pas");

    switch($url[0]){
        case "accueil" : $eventController->getPageAccueil();
        break;
        case "submitContactForm" : require_once "./viewsFront/submitContactForm.php";
        break;
        case "emailSent" : require_once "./viewsFront/emailSent.php";
        break;
        case "emailNotSent" : require_once "./viewsFront/emailNotSent.php";
        break;
        case "predications" : $sermonController->getPredication();
        break;
        case "ecritures" : require_once "./viewsFront/scripture.php";
        break;
        case "christ" : require_once "./viewsFront/christ.php";
        break;
        case "churchFuture" : require_once "./viewsFront/church_future.php";
        break;
        case "church" : require_once "./viewsFront/church.php";
        break;
        case "endTime" : require_once "./viewsFront/endTime.php";
        break;
        case "father" : require_once "./viewsFront/father.php";
        break;
        case "man" : require_once "./viewsFront/man.php";
        break;
        case "salvation" : require_once "./viewsFront/salvation.php";
        break;
        case "spirit" : require_once "./viewsFront/spirit.php";
        break;
        case "trinity" : require_once "./viewsFront/trinity.php";
        break; 
        case "events" : $eventController->displayEvents();
        break; 
        case "event" : 
            if(empty($url[1])) throw new Exception("Identifiant de l'évènement manquant");
            $eventController->displayOneEvent($url[1]);
        break;
        case "sermons" :$sermonController->displaySermons(); 
        break;
        case "sermon" : 
            if(empty($url[1])) throw new Exception("Identifiant du sermon manquant");
            $sermonController->displayOneSermon($url[1]); 
        break;
        case "admin" :
        if(empty($url[1])) throw new Exception("La page n'existe pas");

        switch($url[1]){
            case "login" : $adminController->getPageLogin();
            break;
            case "connexion" : $adminController->connexion();
            break;
            case "accueil" : $adminController->getAccueilAdmin();
            break;
            case "deconnexion" : $adminController->deconnexion();
            break;
            case "sermons" : 
                if(empty($url[2])) throw new Exception("La page n'existe pas");
                switch($url[2]){
                    case "visualisation" : $sermonController->DisplaySermons();
                    break;
                    case "creation" : require_once "./views/createSermon.php";
                    break;
                    case "validationCreation" : $sermonController->insertSermon();
                    break;
                    case "suppression" : $sermonController->deleteSermon($url[3]);
                    break;
                    case "modification" : $sermonController->getUpdatePage($url[3]);
                    break;
                    case "validateModif": $sermonController->updateSermon();
                    break;  
                    default : throw new Exception("La page n'existe pas");
                }
            break;
            case "evenement" :
                if(empty($url[2])) throw new Exception("La page n'existe pas");
                switch($url[2]){
                    case "visualisation" : $eventController->displayEvents();
                    break;
                    case "creation" : require_once "./views/createEvent.php";
                    break;
                    case "validationCreation" : $eventController->insertEvent();
                    break;
                    case "suppression" : $eventController->DeleteEvent($url[3]);
                    break; 
                    case "modification" : $eventController->getUpdatePage($url[3]);
                    break; 
                    case "validateModif" : $eventController->updateEvent();
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
    require "./views/PageErreur.php";
    
}