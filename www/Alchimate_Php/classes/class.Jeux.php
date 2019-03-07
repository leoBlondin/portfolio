<?php
require_once('class.Niveau.php');
require_once('class.Poste.php');
require_once('class.Personne.php');

class Jeux
{

    private $id = 0;
    private $nom = null;
    private $description = null;
    private $parution = null;
    private $image = null;

    private $leNiveau = array();
    private $lePoste = array();
    private $laPersonne = array();


    /* constructers */
    public function __construct($id = 0, $nom = null, $description = null, $parution = null, $image = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->parution = $parution;
        $this->image = $image;
    }


    /* getters */
    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getParution()
    {
        return $this->parution;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getLeNiveau()
    {
        return $this->leNiveau;
    }

    public function getLePoste()
    {
        return $this->lePoste;
    }

    public function getLaPersonne()
    {
        return $this->laPersonne;
    }

    /* setters */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setParution($parution)
    {
        $this->parution = $parution;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setLeNiveau($leNiveau)
    {
        $this->leNiveau = $leNiveau;
    }

    public function setLePoste($lePoste)
    {
        $this->lePoste = $lePoste;
    }

    public function setLaPersonne($laPersonne)
    {
        $this->laPersonne = $laPersonne;
    }

}

?>