<?php
require_once 'classes/class.Personne.php';;

$sql = "SELECT * 
        FROM region
        ORDER BY Nom_Region";

$requete = $pdo->prepare($sql);
$liste = array();

if ($requete->execute()){
    while($donnees = $requete->fetch()){
        $region = new Region(
            $donnees['ID_Region'],
            $donnees['Nom_Region']
        );

        $liste[] = $region;
    }
}
$pdo = null;

?>