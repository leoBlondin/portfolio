<?php
require_once('class.Personne.php');
class Equipe
{

    private $id = 0;
    private $nom = null;
    private $description = null;
    private $image = null;
    private $commentaire = null;

    private $laPersonne = array();

    /* constructer */
    public function __construct($id=0, $nom=null, $description=null, $image=null, $commentaire=null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->image = $image;
        $this->commentaire = $commentaire;
    }

    /* getters */
    public function getId()                         {return $this->id;}
    public function getNom()                        {return $this->nom;}
    public function getDescription()                {return $this->description;}
    public function getImage()                      {return $this->image;}
    public function getCommentaire()                {return $this->commentaire;}
    public function getLaPersonne()                 {return $this->laPersonne;}


    /* setters */
    public function setId($id)                      {$this->id = $id;}
    public function setNom($nom)                    {$this->nom = $nom;}
    public function setDescription($description)    {$this->description = $description;}
    public function setImage($image)                {$this->image = $image;}
    public function setCommentaire($commentaire)    {$this->commentaire = $commentaire;}
    public function setLaPersonne($laPersonne)      {$this->laPersonne = $laPersonne;}


}

?>