<?php

require_once('class.Personne.php');

class Graduation{

    private $id = 0;
    private $libelle = null;
    private $image = null;
    private $valeur = null;

    private $laPersonne = null;

    /* constructers */
    public function __construct($id=0, $libelle=null, $image=null, $valeur=null)
    {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->image = $image;
        $this->valeur = $valeur;
    }


    /* getter */
    public function getId()                     {return $this->id;}
    public function getLibelle()                {return $this->libelle;}
    public function getImage()                  {return $this->image;}
    public function getValeur()                 {return $this->valeur;}
    public function getLaPersonne()             {return $this->laPersonne;}


    /* setters */
    public function setId($id)                  {$this->id = $id;}
    public function setLibelle($libelle)        {$this->libelle = $libelle;}
    public function setImage($image)            {$this->image = $image;}
    public function setValeur($valeur)          {$this->valeur = $valeur;}
    public function setLaPersonne($laPersonne)  {$this->laPersonne = $laPersonne;}

}

?>