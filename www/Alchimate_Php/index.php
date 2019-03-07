<?php
    include 'cnx.php';
    include 'fonctions.php';
$page = "";
$param = 0;
$titre = "";
if(!isset($_GET["page"])){
    $_GET["page"] = "accueil";
}
if(isset($_GET["page"])){
    $routes = parse_ini_file("param/routes.ini", true);
    $page = $routes[$_GET["page"]]["page"];
    $template = $routes[$_GET["page"]]["template"];
    if(isset($routes[$_GET["page"]]["param"])){
        $param = $routes[$_GET["page"]]["param"];
    }
    if(isset($routes[$_GET["page"]]["titre"])){
        $titre = $routes[$_GET["page"]]["titre"];
    }

}

    ?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Alchimate</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/typo_couleur.css">
    <link rel="stylesheet" href="css/animation.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
require_once 'classes/class.Personne.php';
session_start();
if(!empty ($_SESSION['user'])){
$sql = "SELECT * FROM personne WHERE ID_Personne =".$_SESSION["user"]["ID_Personne"];
$requete = $pdo->prepare($sql);
if ($requete->execute()) {
    while ($donnees = $requete->fetch()) {
        $personne_header = new Personne(
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
}
}


if($page != ""){
    include $page;
}
if($page =='page/connexion.php' || $page =='page/personne/newPersonne.php'){
}else{
    include 'header.html';
}

include $template;

?>
</body>
</html>