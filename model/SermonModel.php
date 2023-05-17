<?php 

require_once './config/Database.php';

class SermonModel extends Database
{
    private $table = "sermons";

    public $id;
    public $date;
    public $title;
    public $theme;
    public $resume;
    public $audio;
    public $author;

  

    public function getSermonsFromBddd()
    {
        $req = "SELECT * FROM " . $this->table . " ORDER BY date DESC";
        $stmt = $this->getConnection()->prepare($req);
        $stmt->execute();
        $sermons = $stmt->fetchAll(PDO::FETCH_ASSOC);   
        $stmt->closeCursor();

        return $sermons;

    }

    public function getSermonById($id)
    {
        $req = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $sermon = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        
        return $sermon;
    }

    public function insertSermonInBdd($date, $title, $theme, $resume, $audio, $author)
    {
        $req = "INSERT INTO " . $this->table . " (date, title, theme, resume, audio, author) 
        VALUES (date, title, theme, resume, audio, author)";
        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(':date', $date, PDO::PARAM_STR);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':theme', $theme, PDO::PARAM_STR);
        $stmt->bindValue(':resume', $resume, PDO::PARAM_STR);
        $stmt->bindValue(':audio', $audio, PDO::PARAM_STR);
        $stmt->bindValue(':author', $author, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();

        return $this->getConnection()->lastInsertId();
    }

    public function updateSermonInBdd($id, $date, $title, $theme, $resume, $audio, $author)
    {
        $req = "UPDATE " . $this->table . " 
        SET date = :date, title = :title, theme = :theme, resume = :resume, audio = :audio, author = :author WHERE id = :id";
        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':date', $date, PDO::PARAM_STR);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':theme', $theme, PDO::PARAM_STR);
        $stmt->bindValue(':resume', $resume, PDO::PARAM_STR);
        $stmt->bindValue(':audio', $audio, PDO::PARAM_STR);
        $stmt->bindValue(':author', $author, PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function deleteSermonFromBdd($id)
    {
        $req = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function getSermonAudioForDelete($idSermon)
    {
        $req = "SELECT audio_file FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(':id', $idSermon, PDO::PARAM_INT);
        $stmt->execute();
        $audio = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $audio['audio'];
    }

    
}