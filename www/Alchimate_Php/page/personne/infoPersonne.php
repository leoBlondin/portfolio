<?php
require_once 'classes/class.Personne.php';
require_once 'classes/class.Commentaire.php';

$sql = "SELECT * FROM personne WHERE ID_Personne = ?";
$requete = $pdo->prepare($sql);
$listPersonne=array();
$requete->bindValue(1, $_GET['id']);
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
        $listPers1[]=$personne;
    }


}

$sql2 = "SELECT * FROM personne, region
                  WHERE personne.ID_Personne = ?
                  AND personne.ID_Region = region.ID_Region";
$requete5 = $pdo->prepare($sql2);
$requete5->bindValue(1, $_GET['id']);
$listeRegion=array();
if($requete5->execute()){
    while ($donnees5 = $requete5->fetch()){
        $region = new Region(
            $donnees5['ID_Region'],
            $donnees5['Nom_Region']
        );
        $listeRegion[]=$region;
    }
}
if(isset($_POST["submit_comment"])){
    $date = new DateTime("",new DateTimeZone('Europe/Paris'));
    $dateFormat = $date->format('d-m-Y H:i');
    var_dump($dateFormat);
    $commentaire = new Commentaire();
    $commentaire->setDescription($_POST["commentaire"]);
    $commentaire->setEcrivain($_SESSION["user"]["Pseudo_Personne"]);
    $commentaire->setDate($dateFormat);
    $commentaire->setLaPersonne($_GET["id"]);
    $commentaire->setIdEcrivain($_SESSION["user"]["ID_Personne"]);



    $sql = "INSERT INTO commentaire( Description_Com, Date_Com, ID_Personne,Ecrivain,ID_Ecrivain)"
        ."VALUES(?,?,?,?,?)";

    $requete = $pdo->prepare($sql);

    $requete->bindValue(1,$commentaire->getDescription());
    $requete->bindValue(2,$commentaire->getDate());
    $requete->bindValue(3,$commentaire->getLaPersonne());

    $requete->bindValue(4,$commentaire->getEcrivain());
    $requete->bindValue(5,$commentaire->getIdEcrivain());

    $requete->execute();
    header('Location: index.php?page=profil&id='.$_GET["id"]);
    exit();
}
$sql = "SELECT * FROM commentaire WHERE ID_Personne = ?";
$requete = $pdo->prepare($sql);
$listeCom=array();
$requete->bindValue(1, $_GET['id']);
if ($requete->execute()) {
    while ($donnees = $requete->fetch()) {
        $commentaire = new Commentaire(
            $donnees['ID_Personne'],
            $donnees['Description_Com'],
            $donnees['Date_Com'],
            $donnees['Ecrivain'],
            $donnees['ID_Ecrivain']

        );
        $listeCommentaires[]=$commentaire;
       $listeCom = array_reverse($listeCommentaires);
    }


}
?>