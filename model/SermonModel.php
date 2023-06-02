<?php 

require_once './config/Database.php';
require_once "Sermon.php";

class SermonModel extends Database
{
    private $sermons;

    public function addSermons($sermon)
    {
        $this->sermons[] = $sermon;
    }

    public function getSermons()
    {
        return $this->sermons;
    }

    public function createSermons($date, $title, $theme, $resume, $audio, $author)
    {
        $req = "INSERT INTO sermons (date, title, theme, resume, audio, author) 
        VALUES (:date, :title, :theme, :resume, :audio, :author)";
        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(':date', $date, PDO::PARAM_STR);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':theme', $theme, PDO::PARAM_STR);
        $stmt->bindValue(':resume', $resume, PDO::PARAM_STR);
        $stmt->bindValue(':audio', $audio, PDO::PARAM_STR);
        $stmt->bindValue(':author', $author, PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            $sermon = new Sermon($this->getConnection()->lastInsertId(), $date, $title, $theme, $resume, $audio, $author);
            $this->addSermons($sermon);
        }
   
    }

    public function readSermons()
    {
        $req = "SELECT * FROM sermons ORDER BY date DESC";
        $stmt = $this->getConnection()->prepare($req);
        $stmt->execute();
        $sermons = $stmt->fetchAll(PDO::FETCH_ASSOC);   
        $stmt->closeCursor();

        foreach($sermons as $sermon)
        {
            $sermon = new Sermon ($sermon['id'], $sermon['date'], $sermon['title'], $sermon['theme'], $sermon['resume'], $sermon['audio'], $sermon['author']);
            $this->addSermons($sermon);
        }
    }

    public function getSermonById($id)
    {
        for($i=0; $i < count($this->sermons); $i++)
        {
            if($this->sermons[$i]->getId() == $id)
            {
                return $this->sermons[$i];
            }
        }

        throw new Exception("La page n'existe pas");
    }

    public function updateSermon($id, $date, $title, $theme, $resume, $audio, $author)
    {
        $req = "UPDATE sermons
        SET date = :date, title = :title, theme = :theme, resume = :resume, audio = :audio, author = :author WHERE id = :id";
        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':date', $date, PDO::PARAM_STR);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':theme', $theme, PDO::PARAM_STR);
        $stmt->bindValue(':resume', $resume, PDO::PARAM_STR);
        $stmt->bindValue(':audio', $audio, PDO::PARAM_STR);
        $stmt->bindValue(':author', $author, PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            $sermon = $this->getSermonById($id);
            $sermon->setDate($date);
            $sermon->setTitle($title);
            $sermon->setTheme($theme);
            $sermon->setResume($resume);
            $sermon->setAudio($audio);
            $sermon->setAuthor($author);
        }
    }


    public function deleteSermonFromBdd($id)
    {
        $req = "DELETE FROM sermons WHERE id = :id";
        $stmt = $this->getConnection()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            $sermon = $this->getSermonById($id);
            unset($sermon);
        }
    }

}