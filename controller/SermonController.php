<?php 

require_once './model/SermonModel.php';


class SermonController
{
    private $sermonModel;

    public function __construct()
    {
        $this->sermonModel = new SermonModel();
        $this->sermonModel->readSermons();
    }

    public function displaySermons()
    {
        try{
            if(Security::verifAccess()){
                $sermons = $this->sermonModel->getSermons();
                
                require "./views/VisualisationSermons.php";
                
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

    public function displayOneSermon($id)
    {
       $sermon = $this->sermonModel->getSermonById($id);
       
    }

    public function getPredication()
    {
        $sermons = $this->sermonModel->getSermons();

        // echo "<pre>";
        // print_r($sermons);
        // echo "</pre>";
        require "./viewsFront/predications.php";
        
    }

    public function insertSermon()
    {
        try{
            //vérification de l'access
        if (Security::verifAccess()) {
            
            $date = Security::secureHTML($_POST['date']);
            $title = Security::secureHTML($_POST['title']);
            $theme = Security::secureHTML($_POST['theme']);
            $resume = Security::secureHTML($_POST['resume']);

            $file = $_FILES['audio'];
            $repertoire = "public/sermons/";
            $audioAdded = $this->addAudio($file, $repertoire);

            $author = Security::secureHTML($_POST['author']);

            $this->sermonModel->createSermons($date, $title, $theme, $resume, $audioAdded, $author);
            
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

    public function DeleteSermon($id)
    {
        try{
                
                if(Security::verifAccess()){
    
                    $sermonAudio = $this->sermonModel->getSermonById($_POST['sermon_id'])->getAudio();
    
                    unlink("public/sermons/".$sermonAudio);
    
                    $this->sermonModel->deleteSermonFromBdd($id);
    
                    $_SESSION['alert'] =[
                        "type" => "danger",
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

                //Récupération du fichier audio actuel

                $currentAudio = $this->sermonModel->getSermonById($_POST['ident'])->getAudio();
                
                //Vérification de l'existence du fichier audio
                $file = $_FILES['audio'];

                if($file['size'] > 0){

                    //Suppression de l'ancien fichier audio
                    unlink("public/sermons/".$currentAudio);

                    //Ajout du nouveau fichier audio
                    $repertoire = "public/sermons/";
                    $audioAdded = $this->addAudio($file, $repertoire);
                }else{
                    $audioAdded = $currentAudio;
                }
            
                // $id = Security::secureHTML($_POST['ident']);
                // $date = Security::secureHTML($_POST['date']);
                // $title = Security::secureHTML($_POST['title']);
                // $theme = Security::secureHTML($_POST['theme']);
                // $resume = Security::secureHTML($_POST['resume']);
                // $author = Security::secureHTML($_POST['author']);
    
                $this->sermonModel->updateSermon($_POST['ident'], $_POST['date'], $_POST['title'], $_POST['theme'], $_POST['resume'], $audioAdded, $_POST['author']);
                

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

    private function AddAudio($file, $dir){
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez sélectionner un fichier son");
    
        if(!file_exists($dir)) mkdir($dir,0777);
    
        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $random = rand(0,99999);
        $target_file = $dir.$random."_".$file['name'];
        
        if($extension !== "mpeg3" && $extension !== "mp4" && $extension !== "wav" && $extension !== "mp3")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if(file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if(!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout du fichier son n'a pas fonctionné");
        else return ($random."_".$file['name']);
    }

    
}