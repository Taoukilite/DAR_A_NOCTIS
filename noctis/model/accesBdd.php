<?php
/**
* @brief    Connexion au serveur de données MySQL
* @details  Se connecte au serveur de données MySql à partir de valeurs prédéfinies de connexion (hôte, compte utilisateur et mot de passe)
* @return identifiant de connexion MySQL en cas de succès ou FALSE si une erreur survient
*/
function connexionBdd() 
{
	// on se connecte à notre base
	$base = mysql_connect ('localhost', 'root', '');
	mysql_select_db ('noctis', $base) ;
}
