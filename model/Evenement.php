<?php 


class Evenement 
{
    private $id;
    private $title;
    private $flyer;

    public function __construct($id, $title, $flyer)
    {
        $this->id = $id;
        $this->title = $title;
        $this->flyer = $flyer;
    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id = $id;}
    
    public function getTitle(){return $this->title;}
    public function setTitle($title){$this->title = $title;}

    public function getFlyer(){return $this->flyer;}
    public function setFlyer($flyer){$this->flyer = $flyer;}

}