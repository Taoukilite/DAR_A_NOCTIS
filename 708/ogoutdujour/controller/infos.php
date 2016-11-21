<?php

require_once "accesBdd.php";

function getLesInfos()
{
    $results = null;
    $pdo = connexionBdd();

    $sql = "SELECT *
    FROM informations";

    try{

        $requete = $pdo->prepare($sql);
        $requete->execute();

        $results = $requete->fetchAll();
        $requete->CloseCursor();
        $requete = null;

    }catch(PDOException $e){
        $requete = null;
        echo 'Erreur getLesInfos : ' . $e->getMessage() . '';
        die();
    }
    if($results){
        return $results;
    }else{
        return NULL;
    }
}

function login($login, $mdp){
    $result = null;
    $pdo = connexionBdd();

    $sql = "SELECT id
    FROM utilisateurs
    WHERE login = :login
    AND mdp = :mdp";

    try{

        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':login'=> $login,
            ':mdp'=> $mdp
        ));

        $result = $requete->fetch();
        $requete->CloseCursor();
        $requete = null;

    }catch(PDOException $e){
        $requete = null;
        echo 'Erreur login : ' . $e->getMessage() . '';
        die();
    }
    if($result){
        return $result;

    }else{
        return NULL;
    }
}

function setMail($mail){
    $success = false;
    $pdo = connexionBdd();

    $sql = "UPDATE informations
    SET valeur = :mail
    WHERE cle = 'mail'";

    try{

        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':mail'=> $mail
        ));

        $success = true;

    }catch(PDOException $e){
        $requete = null;
        echo 'Erreur setMail : ' . $e->getMessage() . '';
        die();
    }
    return $success;
}

function setTel($tel){
    $success = false;
    $pdo = connexionBdd();

    $sql = "UPDATE informations
    SET valeur = :tel
    WHERE cle = 'telephone'";

    try{

        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':tel'=> $tel
        ));

        $success = true;

    }catch(PDOException $e){
        $requete = null;
        echo 'Erreur setTel : ' . $e->getMessage() . '';
        die();
    }
    return $success;
}

function setAdresse($adresse){
    $success = false;
    $pdo = connexionBdd();

    $sql = "UPDATE informations
    SET valeur = :adresse
    WHERE cle = 'adresse'";

    try{

        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':adresse'=> $adresse
        ));

        $success = true;

    }catch(PDOException $e){
        $requete = null;
        echo 'Erreur setAdresse : ' . $e->getMessage() . '';
        die();
    }
    return $success;
}

function setMsgAccueil($message){
    $success = false;
    $pdo = connexionBdd();

    $sql = "UPDATE informations
    SET valeur = :message
    WHERE cle = 'accueil'";

    try{

        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':message'=> $message
        ));

        $success = true;

    }catch(PDOException $e){
        $requete = null;
        echo 'Erreur setMsgAccueil : ' . $e->getMessage() . '';
        die();
    }
    return $success;
}

function setMenu($menu){
    $success = false;
    $pdo = connexionBdd();

    $sql = "UPDATE informations
    SET valeur = :menu
    WHERE cle = 'menu'";

    try{

        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':menu'=> $menu
        ));

        $success = true;

    }catch(PDOException $e){
        $requete = null;
        echo 'Erreur setMenu : ' . $e->getMessage() . '';
        die();
    }
    return $success;
}

function setMdp($mdp){

    $mdp = hash("sha256", $mdp);
    $success = false;
    $pdo = connexionBdd();

    $sql = "UPDATE utilisateurs
    SET mdp = :mdp
    WHERE login = 'resto'";

    try{

        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':mdp'=> $mdp
        ));

        $success = true;

    }catch(PDOException $e){
        $requete = null;
        echo 'Erreur setMdp : ' . $e->getMessage() . '';
        die();
    }
    return $success;
}


function getMenu()
{
    $results = null;
    $pdo = connexionBdd();

    $sql = "SELECT valeur
    FROM informations
    WHERE cle = 'menu'";

    try{

        $requete = $pdo->prepare($sql);
        $requete->execute();

        $results = $requete->fetch();
        $requete->CloseCursor();
        $requete = null;

    }catch(PDOException $e){
        $requete = null;
        echo 'Erreur getMenu : ' . $e->getMessage() . '';
        die();
    }
    if($results){
        return $results;
    }else{
        return NULL;
    }
}





?>
