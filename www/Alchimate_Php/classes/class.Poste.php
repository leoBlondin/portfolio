<?php

require_once('class.Jeux.php');
require_once('class.Personne.php');


class Poste{

    private $id = 0;
    private $nom = null;

    private $leJeux = null;
    private $laPersonne = array();


    /* constructers */
    public function __construct($id=0, $nom=null)
    {
        $this->id = $id;
        $this->nom = $nom;
    }


    /* getters */
    public function getId()                     {return $this->id;}
    public function getNom()                    {return $this->nom;}

    public function getLeJeux()                 {return $this->leJeux;}
    public function getLaPersonne()             {return $this->laPersonne;}


    /* setters */
    public function setId($id)                  {$this->id = $id;}
    public function setNom($nom)                {$this->nom = $nom;}
    public function setLeJeux($leJeux)          {$this->leJeux = $leJeux;}
    public function setLaPersonne($laPersonne)  {$this->laPersonne = $laPersonne;}


}

?>