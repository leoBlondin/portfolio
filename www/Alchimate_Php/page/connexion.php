<?php
require_once 'classes/class.Personne.php';
$erreurlog='';
if (isset($_POST['login'], $_POST['password'])) {

    $pseudo = $_POST['login'];
    $passe = $_POST['password'];

    $sql = "SELECT * FROM personne WHERE Mail_Personne = ? and Password_Personne = ?";
    $requete = $pdo->prepare($sql);
    $requete->bindValue(1, $pseudo);
    $requete->bindValue(2, $passe);
    $requete->execute();

    $result = $requete->fetch();


    if (!empty($result)) {

        $_SESSION['user'] = $result;
        $id = $_SESSION['user']['ID_Personne'];

        $_SESSION['Mail_Personne'] = $_POST['Mail_Personne'];
        $_SESSION['Password_Personne'] = $_POST['Password_Personne'];
        header("Location: index.php?page=profil&id=$id");

    }
    else{
        $erreurlog=' <p>Mauvais nom ou mot de passe !</p>';
    }

}






?>