<?php 

require_once './config/Database.php';
require_once 'Evenement.php';

class EventModel extends Database
{
    private $evenements;

    public function addEvents($evenement)
    {
        $this->evenements[] = $evenement;
    }

    public function getEvents()
    {
        return $this->evenements;
    }

    public function createEvents($title, $flyer)
    {
        $req = "INSERT INTO evenement (title, flyer) 
        VALUES (:title, :flyer)";
        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':flyer', $flyer, PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            $evenement = new Evenement($this->getConnection()->lastInsertId(), $title, $flyer);
            $this->addEvents($evenement);
        }
    }

    public function readEvents()
    {
        $req = "SELECT * FROM evenement ";
        $stmt = $this->getConnection()->prepare($req);
        $stmt->execute();
        $mesEvenements = $stmt->fetchAll(PDO::FETCH_ASSOC);   
        $stmt->closeCursor();

        foreach($mesEvenements as $evenement)
        {
            $evenement = new Evenement ($evenement['id'], $evenement['title'], $evenement['flyer']);
            $this->addEvents($evenement);
        }
    }

    public function getEventById($id)
    {
        for($i=0; $i < count($this->evenements); $i++)
        {
            if($this->evenements[$i]->getId() == $id)
            {
                return $this->evenements[$i];
            }
        }
        throw new Exception("L'évènement n'existe pas");
    }

    public function updateEvent($id, $title, $flyer)
    {
        $req = "UPDATE evenement 
        SET title = :title, flyer = :flyer 
        WHERE id = :id";
        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':flyer', $flyer, PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            $evenement = $this->getEventById($id);
            $evenement->setTitle($title);
            $evenement->setFlyer($flyer);
        }
    }

    public function deleteEventFromBdd($id)
    {
        $req = "DELETE FROM evenement WHERE id = :id";
        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            $evenement = $this->getEventById($id);
            unset($evenement);
        }
    }
}