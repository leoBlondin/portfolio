<?php
require_once 'classes/class.Personne.php';
require_once 'classes/class.Jeux.php';
require_once 'classes/class.Niveau.php';
require_once 'classes/class.Poste.php';
require_once 'classes/class.Region.php';

if ($_SESSION["user"]["ID_Personne"] !==  $_GET['id']){
    header('Location: index.php?page=profil&id='.$_SESSION["user"]["ID_Personne"]);
    exit();

}

$sql = "SELECT * FROM personne WHERE ID_Personne = ?";
$requete = $pdo->prepare($sql);
$listPersonne = array();
$personne = new Personne;
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
        $sql1 = "SELECT * FROM personne,jeux, joue
                  WHERE personne.ID_Personne = ? AND joue.ID_Personne = ? AND jeux.ID_Jeux = joue.ID_Jeux";
        $requete2 = $pdo->prepare($sql1);
        $requete2->bindValue(1, $_GET['id']);
        $requete2->bindValue(2, $_GET['id']);
        $listJeux = array();
        if ($requete2->execute()) {
            while ($donnees2 = $requete2->fetch()) {
                $jeux = new Jeux(
                    $donnees2['ID_Jeux'],
                    $donnees2['Nom_Jeux'],
                    $donnees2['Description_Jeux'],
                    $donnees2['Parution_Jeux']
                );
                $listJeux[] = $jeux;
            }
        }
        $personne->setLeJeux($listJeux);

        $sql2 = "SELECT * FROM personne, niveau, jeux
                WHERE personne.ID_Personne = ?
                AND  personne.ID_Personne = niveau.ID_Personne";
        $requete3 = $pdo->prepare($sql2);
        $requete3->bindValue(1, $_GET['id']);

        $listNiveau = array();
        if ($requete3->execute()) {
            while ($donnees3 = $requete3->fetch()) {
                $niveau = new Niveau(
                    $donnees3['ID_Niveau'],
                    $donnees3['Nom_Niveau']
                );
                $listNiveau[] = $niveau;
            }
        }

        $personne->setLeNiveau($listNiveau);

        $sql3 = "SELECT * FROM personne, poste, jeux
                WHERE personne.ID_Personne = ?";
        $requete4 = $pdo->prepare($sql3);
        $requete4->bindValue(1, $_GET['id']);
        $listPoste = array();
        if ($requete4->execute()) {
            while ($donnees4 = $requete4->fetch()) {
                $poste = new Poste(
                    $donnees4['ID_Post'],
                    $donnees4['Nom_Post']
                );
                $listPoste[] = $poste;
            }
        }
        $personne->setLePoste($listPoste);

        $sql4 = "SELECT * FROM personne, region
                  WHERE personne.ID_Personne = ?
                  AND personne.ID_Region = region.ID_Region";
        $requete5 = $pdo->prepare($sql4);
        $requete5->bindValue(1, $_GET['id']);
        $listeRegion = array();
        if ($requete5->execute()) {
            while ($donnees5 = $requete5->fetch()) {
                $region = new Region(
                    $donnees5['ID_Region'],
                    $donnees5['Nom_Region']
                );
                $listeRegion[] = $region;
            }
        }
        $personne->setLaRegion($listeRegion);
        $listPersonne[] = $personne;

        $sql = "SELECT * FROM region ORDER BY Nom_Region";
        $requete = $pdo->prepare($sql);
        $listeRegion = array();
        if ($requete->execute()) {
            while ($donnees = $requete->fetch()) {
                $region = new Region ($donnees['ID_Region'], $donnees['Nom_Region']);
                $listeRegion[] = $region;
            }
        }
    }
}

if (isset($_POST["valider"])) {
    $newImage = true;
    if ($_FILES["photo"]["name"] != "") {
        $image = $_FILES['photo']['name'];
        $sql = "SELECT Image_Personne FROM personne WHERE ID_Personne = ?";
        $requete6 = $pdo->prepare($sql);
        $requete6->bindValue(1, $_GET["id"]);
        if ($requete6->execute()) {
            while ($donnees6 = $requete6->fetch()) {
                $personne->setImage($donnees6['Image_Personne']);
            }
        }

        move_uploaded_file($_FILES['photo']['tmp_name'], "css/images_personne/" . $image);
        $personne->setImage($image);
        $newImage = true;
    }

    if ($newImage) {
        $sql5 = "UPDATE personne SET ID_Region = ?, Mail_Personne = ?, Image_Personne = ?, Pseudo_Personne = ?, Description_Personne = ? WHERE ID_Personne = ?";
        $requete7 = $pdo->prepare($sql5);
        $requete7->bindValue(1, $_POST["region"]);
        $requete7->bindValue(2, $_POST["mail"]);
        $requete7->bindValue(3, $personne->getImage());
        $requete7->bindValue(4, $_POST["pseudo"]);
        ;
        $requete7->bindValue(5, $_POST["description"]);
        $requete7->bindValue(6, $_GET['id']);

    } else {
        $sql5 = "UPDATE personne SET ID_Region = ?, Mail_Personne = ?, Pseudo_Personne = ?, Description_Personne = ? WHERE ID_Personne = ?";


        $requete7 = $pdo->prepare($sql5);
        $requete7->bindValue(1, $_POST["region"]);
        $requete7->bindValue(2, $_POST["mail"]);
        $requete7->bindValue(3, $_POST["pseudo"]);
 ;
        $requete7->bindValue(4, $_POST["description"]);
        $requete7->bindValue(5, $_GET['id']);

    }
    $requete7->execute();
    header('Location: index.php?page=profil&id='.$personne->getIdPersonne());
    exit();
}

