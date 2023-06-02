<?php 

require_once "./model/EventModel.php";

class EventController 
{
    private $eventModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->eventModel->readEvents();
    }

    public function displayEvents()
    {
        $evenements = $this->eventModel->getEvents();
        require_once "./views/VisualisationEvent.php";
        // echo "<pre>";
        // print_r($events);
        // echo "</pre>";
    }

    public function displayOneEvent($id)
    {
        $evenement = $this->eventModel->getEventById($id);
    }

    public function getPageAccueil()
    {
        $evenements = $this->eventModel->getEvents();
        require_once "./viewsFront/accueil.php";
    }

    public function insertEvent()
    {

        try{
            //vérification de l'access
        if (Security::verifAccess()) {

        $file = $_FILES['flyer'];
        $repertoire = "public/images/";
        $imageAdded = $this->addImage($file, $repertoire);
        $this->eventModel->createEvents($_POST['title'], $imageAdded);

        $_SESSION['alert'] =[
            "type" => "success",
            "message" => "L'évènement a bien été crée"
        ];

        header("Location: ".URL."admin/evenement/visualisation");
    }else{
        throw new Exception("Vous n'avez pas les droits d'accès");
        
    }
    }catch(Exception $e){
        $msg = $e->getMessage();
        echo $msg;
    }
        
    }

    public function DeleteEvent($id)
    {
        try{

            if(Security::verifAccess()){

                $eventImage = $this->eventModel->getEventById($_POST['event_id'])->getFlyer();

                unlink("public/images/".$eventImage);

                $this->eventModel->deleteEventFromBdd($id);

                $_SESSION['alert'] =[
                    "type" => "danger",
                    "message" => "L'évènement a bien été supprimé"
                ];

                header("Location: ".URL."admin/evenement/visualisation");

            }else{
                throw new Exception("Vous n'avez pas les droits d'accès à cette page");
            }
        }
        catch(Exception $e){
            $msg = $e->getMessage();
            echo $msg;
        }
    }

    public function getUpdatePage($id)
    {
        $evenement = $this->eventModel->getEventById($id);

        require "views/UpdateEvent.php";
    }

    public function UpdateEvent()
    {
        try{
            if(Security::verifAccess()){

                //Récupération de l'image actuelle
                $currentImage =$this->eventModel->getEventById($_POST['ident'])->getFlyer();

                //Vérification si une nouvelle image est demandée
                $file = $_FILES['flyer'];

                if($file['size'] > 0){
                    //Suppression de l'ancienne image
                    unlink("public/images/".$currentImage);

                    //Ajout de la nouvelle image
                    $repertoire = "public/images/";
                    $imageAdded = $this->addImage($file, $repertoire);
                }else{
                    $imageAdded = $currentImage;
                }

                //Mise à jour de la Bdd

                $this->eventModel->updateEvent($_POST['ident'], $_POST['title'], $imageAdded);

                $_SESSION['alert'] =[
                    "type" => "success",
                    "message" => "L'évènement a bien été modifié"
                ];

                header("Location: ".URL."admin/evenement/visualisation");

            }else{
                throw new Exception("Vous n'avez pas les droits d'accès à cette page");
            }
        }
        catch(Exception $e){
            $msg = $e->getMessage();
            echo $msg;
        }
    }

    private function addImage($file, $dir){
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");
    
        if(!file_exists($dir)) mkdir($dir,0777);
    
        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $random = rand(0,99999);
        $target_file = $dir.$random."_".$file['name'];
        
        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if(file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        if(!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random."_".$file['name']);
    }
    
}