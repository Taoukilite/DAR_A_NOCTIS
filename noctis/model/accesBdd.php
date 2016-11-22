<?php
/**
* @brief    Connexion au serveur de données MySQL
* @details  Se connecte au serveur de données MySql à partir de valeurs prédéfinies de connexion (hôte, compte utilisateur et mot de passe)
* @return identifiant de connexion MySQL en cas de succès ou FALSE si une erreur survient
*/
function connexionBdd() {
    $pdo = null;

    $PARAM_hote = 'localhost';   // adresse du serveur Apache
    $PARAM_port = 3306;          // port pour les clients mysql
    $PARAM_bdd = 'noctis';        // nom de la base de données
    $PARAM_user = 'root';     // nom d'utilisateur pour se connecter
    $PARAM_mdp = '';       // mot de passe de l'utilisateur

    // Chaine de connexion à la base de données
    $PARAM_dsn = "mysql:host=$PARAM_hote;port=$PARAM_port;dbname=$PARAM_bdd";

    // Tableau des options par défaut lors de la connexion
    $PARAM_options = array(
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,        // Définit le mode d'affichage des erreurs : ici, exceptions,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,   // Définit le mode de récupération des résultats des requêtes : ici, tableau associatif
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'  // Définit le jeu de caractères utilisé pour la connexion : ici, UTF8
    );

    try {
        $pdo = new PDO($PARAM_dsn, $PARAM_user, $PARAM_mdp, $PARAM_options);
    } catch (PDOException $e) {
        afficheErreur($e);
    }

    return $pdo;    // retourne l'objet PDO qui sera utilisé pour exécuter les requêtes
}

function afficheErreur($e) {
    echo 'Erreur : : ' . $e->getMessage() . '<br />';
    echo 'N? : ' . $e->getCode();
}
