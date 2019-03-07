<?php
require_once 'classes/class.Personne.php';
require_once 'classes/class.Region.php';


if (isset($_POST["valider"])){
    $personne = new Personne();
    $personne->setNom($_POST["nom"]);
    $personne->setPrenom($_POST["prenom"]);
    $personne->setPseudo($_POST["pseudo"]);
    $personne->setNaissanceDate($_POST["naissance"]);
    $personne->setMail($_POST["mail"]);
    $personne->setPassword($_POST["password"]);
    $personne->setSexe($_POST["sexe"]);


        $sql = "INSERT INTO personne( Nom_Personne,Prenom_Personne, Pseudo_Personne, Mail_Personne, Naissance_Personne, Password_Personne, Sexe_Personne, ID_Region)"
            ."VALUES(?,?,?,?,?,?,?,?)";

        $requete = $pdo->prepare($sql);

        $requete->bindValue(1,$personne->getNom());
        $requete->bindValue(2,$personne->getPrenom());
        $requete->bindValue(3,$personne->getPseudo());
        $requete->bindValue(4,$personne->getMail());
        $requete->bindValue(5,$personne->getNaissanceDate());
        $requete->bindValue(6,$personne->getPassword());
        $requete->bindValue(7,$personne->getSexe());
        $requete->bindValue(8,$_POST["region"]);
        $requete->execute();
        header('Location: index.php?page=recherche');
        exit();

}
$sql = "SELECT * FROM region ORDER BY Nom_Region";
$requete = $pdo->prepare($sql);
$listeRegion = array();
if ($requete->execute()) {
    while ($donnees = $requete->fetch()) {
        $region = new Region ($donnees['ID_Region'], $donnees['Nom_Region']);
        $listeRegion[] = $region;
    }
}

