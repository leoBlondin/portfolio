<?php
require_once 'classes/class.Personne.php';

class Commentaire
{
    private $id_com = 0;
    private $description = null;
    private $date = null;
    private $ecrivain = null;
    private $IdEcrivain = 0;

    private $laPersonne = null;

    public function __construct($id_com=0, $description=null, $date=null, $ecrivain=null, $IdEcrivain=0)
    {
        $this->id_com = $id_com;
        $this->description = $description;
        $this->date = $date;
        $this->ecrivain = $ecrivain;
        $this->IdEcrivain = $IdEcrivain;
    }


    public function getIdCom()                      {return $this->id_com;}

    public function setIdCom($id_com)               {$this->id_com = $id_com;}

    public function getDescription()                {return $this->description;}

    public function setDescription($description)    {$this->description = $description;}

    public function getDate()                       {return $this->date;}

    public function setDate($date)                  {$this->date = $date;}

    public function getEcrivain()                   {return $this->ecrivain;}

    public function setEcrivain($ecrivain)          {$this->ecrivain = $ecrivain;}

    public function getLaPersonne()                 {return $this->laPersonne;}

    public function setLaPersonne($laPersonne)      {$this->laPersonne = $laPersonne;}

    public function getIdEcrivain()                 {return $this->IdEcrivain;}
    public function setIdEcrivain($IdEcrivain)      {$this->IdEcrivain = $IdEcrivain;}








}