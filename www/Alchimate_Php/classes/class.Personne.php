<?php

require_once('class.Graduation.php');
require_once('class.Niveau.php');
require_once('class.Poste.php');
require_once('class.Region.php');
require_once('class.Equipe.php');
require_once ('class.Jeux.php');
require_once ('class.Commentaire.php');


class Personne{

    private $id_Personne = 0;
    private $nom = null;
    private $prenom = null;
    private $naissanceDate = null;
    private $sexe = null;
    private $pseudo = null;
    private $description = null;
    private $mail = null;
    private $password = null;
    private $image = null;

    private $laGraduation = array();
    private $leNiveau = null;
    private $lePoste = null;
    private $laRegion = null;
    private $lEquipe = null;
    private $leJeux = array();
    private $leCom = array();


    /* constructers */
    public function __construct($id_Personne =0, $nom =null, $prenom=null, $naissanceDate=null, $sexe=null, $pseudo=null, $description=null, $mail=null, $password=null, $image=null)
    {
        $this->id_Personne = $id_Personne;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->naissanceDate = $naissanceDate;
        $this->sexe = $sexe;
        $this->pseudo = $pseudo;
        $this->description = $description;
        $this->mail = $mail;
        $this->password = $password;
        $this->image = $image;
    }


    /* getters */
    public function getIdPersonne()                             {return $this->id_Personne;}
    public function getNom()                                    {return $this->nom;}
    public function getPrenom()                                 {return $this->prenom;}
    public function getNaissanceDate()                          {return $this->naissanceDate;}
    public function getSexe()                                   {return $this->sexe;}
    public function getPseudo()                                 {return $this->pseudo;}
    public function getDescription()                            {return $this->description;}
    public function getMail()                                   {return $this->mail;}
    public function getPassword()                               {return $this->password;}
    public function getImage()                                  {return $this->image;}

    public function getLaGraduation()                           {return $this->laGraduation;}
    public function getLeNiveau()                               {return $this->leNiveau;}
    public function getLePoste()                                {return $this->lePoste;}
    public function getLaRegion()                               {return $this->laRegion;}
    public function getLEquipe()                                {return $this->lEquipe;}
    public function getLeJeux()                                 {return $this->leJeux;}
    public function getLeCom()                                  {return $this->leCom;}



    /* setters */
    public function setIdPersonne($id_Personne)                 {$this->id_Personne = $id_Personne;}
    public function setNom($nom)                                {$this->nom = $nom;}
    public function setPrenom($prenom)                          {$this->prenom = $prenom;}
    public function setNaissanceDate($naissanceDate)            {$this->naissanceDate = $naissanceDate;}
    public function setSexe($sexe)                              {$this->sexe = $sexe;}
    public function setPseudo($pseudo)                          {$this->pseudo = $pseudo;}
    public function setDescription($description)                {$this->description = $description;}
    public function setMail($mail)                              {$this->mail = $mail;}
    public function setPassword($password)                      {$this->password = $password;}
    public function setImage($image)                            {$this->image = $image;}

    public function setLaGraduation($laGraduation)              {$this->laGraduation = $laGraduation;}
    public function setLeNiveau($leNiveau)                      {$this->leNiveau = $leNiveau;}
    public function setLePoste($lePoste)                        {$this->lePoste = $lePoste;}
    public function setLaRegion($laRegion)                      {$this->laRegion = $laRegion;}
    public function setLEquipe($lEquipe)                        {$this->lEquipe = $lEquipe;}
    public function setLeJeux($leJeux)                          {$this->leJeux = $leJeux;}
    public function setLeCom($leCom)                            {$this->leCom = $leCom;}


}

?>