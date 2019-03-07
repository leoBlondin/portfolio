<?php
require_once('class.Equipe.php');
require_once('class.Personne.php');


class Role{

    private $id = 0;
    private $nom = null;
    private $description = null;

    private $lEquipe = null;
    private $laPersonne = null;


    /* constructer */
    public function __construct($id=0, $nom=null, $description=null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
    }

   /* getters */
    public function getId()                             {return $this->id;}
    public function getNom()                            {return $this->nom;}
    public function getDescription()                    {return $this->description;}

    public function getLaPersonne()                     {return $this->laPersonne;}
    public function getLEquipe()                        {return $this->lEquipe;}

    /* setters */
    public function setId($id)                          {$this->id = $id;}
    public function setNom($nom)                        {$this->nom = $nom;}
    public function setDescription($description)        {$this->description = $description;}

    public function setLaPersonne($laPersonne)          {$this->laPersonne = $laPersonne;}
    public function setLEquipe($lEquipe)                {$this->lEquipe = $lEquipe;}


}

?>