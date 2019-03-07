<?php
require_once 'classes/class.Graduation.php';
require_once 'classes/class.Niveau.php';
require_once 'classes/class.Poste.php';
require_once 'classes/class.Region.php';
require_once 'classes/class.Equipe.php';
require_once 'classes/class.Jeux.php';
require_once 'classes/class.Personne.php';


$sql = "SELECT * FROM personne WHERE personne.ID_Personne = personne.ID_Personne";

$requete = $pdo->prepare($sql);
$liste = array();

if ($requete->execute()) {
    while ($donnees = $requete->fetch()) {
        $personne = new Personne(
            $donnees['ID_Personne'],
            $donnees['Nom_Personne'],
            $donnees['Prenom_Personne'],
            $donnees['Naissance_Personne'],
            $donnees['Sexe_Personne'],
            $donnees['Pseudo_Personne'],
            $donnees['Description_Personne'],
            $donnees['Mail_Personne'],
            $donnees['Password_Personne'],
            $donnees['Image_Personne']
        );

        $sql = "SELECT * FROM niveau, personne
                    WHERE niveau.ID_Personne = personne.ID_Personne";
        $listeDesNiveaux = array();
        $requete2 = $pdo->prepare($sql);
        if ($requete2->execute()) {
            while ($donnees2 = $requete2->fetch()) {
                $niveau2 = new Niveau(
                    $donnees2["ID_Niveau"],
                    $donnees2['Nom_Niveau']
                );
                $listeDesNiveaux[] = $niveau2;
            }

        }
        $sql = "SELECT * FROM poste, personne
                    WHERE poste.ID_Personne = personne.ID_Personne";
        $listeDesPostes = array();
        $requete3 = $pdo->prepare($sql);
        if ($requete3->execute()) {
            while ($donnees3 = $requete3->fetch()) {
                $poste = new Poste(
                    $donnees3['ID_Post'],
                    $donnees3['Nom_Post']
                );
                $listeDesPostes[] = $poste;
            }

        }
        $sql = "SELECT * FROM jeux, joue, personne   WHERE personne.ID_Personne = personne.ID_Personne AND joue.ID_Personne = personne.ID_Personne AND jeux.ID_Jeux = joue.ID_Jeux";
        $listeDesJeux = array();
        $requete4 = $pdo->prepare($sql);
        if ($requete4->execute()) {
            while ($donnees4 = $requete4->fetch()) {
                $jeux = new Jeux(
                    $donnees4["ID_Jeux"],
                    $donnees4['Nom_Jeux'],
                    $donnees4['Description_Jeux'],
                    $donnees4['Parution_Jeux'],
                    $donnees4['IMAGE']
                );
                $listeDesJeux[] = $jeux;
            }

        }
        $sql = "SELECT * FROM region, personne
                    WHERE personne.ID_Region = region.ID_Region";
        $listeDesRegions = array();
        $requete5 = $pdo->prepare($sql);
        if ($requete5->execute()) {
            while ($donnees5 = $requete5->fetch()) {
                $region = new Region(
                    $donnees5['ID_Region'],
                    $donnees5['Nom_Region']
                );
                $listeDesRegions[] = $region;
            }

        }
        $personne->setLeNiveau($listeDesNiveaux);
        $personne->setLePoste($listeDesPostes);
        $personne->setLeJeux($listeDesJeux);
        $personne->setLaRegion($listeDesRegions);
        $liste[] = $personne;

    }
}
$url_filter ="";
$pseudo ="";
$role ="";
$niveau="";
$sexe ="";
if(isset($_POST["apply-filter"])){
    if($_POST["pseudo"] != ""){
        $pseudo = "&pseudo=".$_POST["pseudo"];
        $url_filter = $pseudo;

    }
    if(isset($_POST["role"])){
        $role = "&role=".$_POST["role"];
        $url_filter = $pseudo.$role;

    }
    if(isset($_POST["niveau"])){
        $niveau = "&niveau=".$_POST["niveau"];
        $url_filter = $pseudo.$role.$niveau;


    }
    if(isset($_POST["sexe"])){
        $sexe = "&sexe=".$_POST["sexe"];
        $url_filter = $pseudo.$role.$niveau.$sexe;


    }

    header('Location: index.php?page=rechercheLol'.$url_filter);


}

$url = "$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$find = "&pseudo=";
if (strpos($url, $find) !== false) {
    $sql = "SELECT * FROM personne WHERE  Pseudo_Personne = ?";

    $requete = $pdo->prepare($sql);
    $liste = array();
    $requete->bindValue(1, $_GET['pseudo']);
    if ($requete->execute()) {
        while ($donnees = $requete->fetch()) {
            $personne = new Personne(
                $donnees['ID_Personne'],
                $donnees['Nom_Personne'],
                $donnees['Prenom_Personne'],
                $donnees['Naissance_Personne'],
                $donnees['Sexe_Personne'],
                $donnees['Pseudo_Personne'],
                $donnees['Description_Personne'],
                $donnees['Mail_Personne'],
                $donnees['Password_Personne'],
                $donnees['Image_Personne']
            );
        }
        $personne->setLeNiveau($listeDesNiveaux);
        $personne->setLePoste($listeDesPostes);
        $personne->setLeJeux($listeDesJeux);
        $personne->setLaRegion($listeDesRegions);
        $liste[] = $personne;
    }


}
$find = "&sexe=";

if (strpos($url, $find) !== false) {
    $sql = "SELECT * FROM personne WHERE  Sexe_Personne = ?";

    $requete = $pdo->prepare($sql);
    $liste = array();
    $requete->bindValue(1, $_GET['sexe']);
    if ($requete->execute()) {
        while ($donnees = $requete->fetch()) {
            $personne = new Personne(
                $donnees['ID_Personne'],
                $donnees['Nom_Personne'],
                $donnees['Prenom_Personne'],
                $donnees['Naissance_Personne'],
                $donnees['Sexe_Personne'],
                $donnees['Pseudo_Personne'],
                $donnees['Description_Personne'],
                $donnees['Mail_Personne'],
                $donnees['Password_Personne'],
                $donnees['Image_Personne']
            );
        }
        $personne->setLeNiveau($listeDesNiveaux);
        $personne->setLePoste($listeDesPostes);
        $personne->setLeJeux($listeDesJeux);
        $personne->setLaRegion($listeDesRegions);
        $liste[] = $personne;
    }
}

?>


