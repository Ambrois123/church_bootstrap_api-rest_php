<?php 

require_once './model/SermonModel.php';
require_once './config/PutInJsonFormat.php';
require_once './config/Security.php';
require_once './utilities/AddAudio.php';

class SermonController extends PutInJsonFormat
{
    private $sermonModel;

    public function __construct()
    {
        $this->sermonModel = new SermonModel();
    }

    public function readSermons()
    {
        $sermons = $this->sermonModel->getSermonsFromBddd();
        $this->sendJson($this->formatSermonData($sermons));
        // echo "<pre>";
        // print_r($sermons);
        // echo "</pre>";
    }

    public function readOneSermon($id)
    {
       $sermon = $this->sermonModel->getSermonById($id);
       $this->sendJson($sermon);
    }

    private function formatSermonData($items)
    {
        $tab =[];

        foreach($items as $item){
            $tab[$item["id"]] = [
                "id" => $item['id'],
                "date" => $item['date'],
                "nom" => $item['title'],
                "theme" => $item['theme'],
                "resume" => $item['resume'],
                "audio" => $item['audio'],
                "auteur" => $item['author']
            ];
        }
        return $tab;
    }

    public function DisplaySermons()
    {
        try{
            if(Security::verifAccess()){
                $sermons = $this->sermonModel->getSermonsFromBddd();
                
                require "views/VisualisationSermons.php";
            }
            else{
                throw new Exception("Vous n'avez pas les droits d'accès à cette page");
            }
        }
        catch(Exception $e){
            $msg = $e->getMessage();
            echo $msg;
        }
    }

    public function getPageCreation()
    {
        require "views/CreateSermon.php";
    }

    public function createSermon()
    {

        // $file = $_FILES['audio'];
        // $repertoire ="public/sermons/";
        // $fileAdded = $this->addAudio($file, $repertoire);
        try{
            //vérification de l'access
        if (Security::verifAccess()) {
            
            $date = Security::secureHTML($_POST['date']);
            $title = Security::secureHTML($_POST['title']);
            $theme = Security::secureHTML($_POST['theme']);
            $resume = Security::secureHTML($_POST['resume']);
            $audio = "";
            //Vérification de l'existence du fichier audio et ajout
            if($_FILES['audio']['size'] > 0){
                $repertoire = "public/sermons/";
                $audio = addAudio($_FILES['audio'], $repertoire);
            }
            $author = Security::secureHTML($_POST['author']);

            $this->sermonModel->insertSermonInBdd($date, $title, $theme, $resume, $audio, $author);

            $_SESSION['alert'] = [
                "type" => "success",
                "message" => "Le sermon a bien été crée"
            ];
                
                header("Location: ".URL."admin/sermons/visualisation");

        }else{
            throw new Exception("Vous n'avez pas les droits d'accès");
            
        }
        }catch(Exception $e){
            $msg = $e->getMessage();
            echo $msg;
        }
    }

    public function DeleteSermon()
    {
        try{

            if(Security::verifAccess()){

                $idSermon = $this->sermonModel->deleteSermonFromBdd((int)Security::secureHTML($_POST['sermon_id']));

                //récupération du  fichier audio
                $audio = $this->sermonModel->getSermonAudioForDelete($idSermon);

                //suppression du fichier audio avec methode unlink()

                unlink("public/audio/" . $audio);

                $_SESSION['alert'] = [
                    "type" => "success",
                    "message" => "Le sermon a bien été supprimé"
                ];
                header("Location: ".URL."admin/sermons/visualisation");
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
        $sermons = $this->sermonModel->getSermonById($id);

        require "views/UpdateSermon.php";
    }

    public function updateSermon()
    {
        //vérification de l'access
        try{
            if (Security::verifAccess()) {
            
                $id = (int)Security::secureHTML($_POST['id']);
                $date = Security::secureHTML($_POST['date']);
                $title = Security::secureHTML($_POST['title']);
                $theme = Security::secureHTML($_POST['theme']);
                $resume = Security::secureHTML($_POST['resume']);
                $audio = Security::secureHTML($_POST['audio']);
                $author = Security::secureHTML($_POST['author']);
    
                $this->sermonModel->updateSermonInBdd($id, $date, $title, $theme, $resume, $audio, $author);
                

                $_SESSION['alert'] = [
                    "type" => "success",
                    "message" => "Le sermon a bien été modifié"
                ];
                    
                    header("Location: ".URL."admin/sermons/visualisation");
    
            }else{
                throw new Exception("Vous n'avez pas les droits d'accès");
                
            }
        }catch(Exception $e){
            $msg = $e->getMessage();
            echo $msg;
        }
        
    }

    
}