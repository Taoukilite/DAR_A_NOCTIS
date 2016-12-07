<?php
/**
 * Created by PhpStorm.
 * User: stephane
 * Date: 07/12/16
 * Time: 03:32
 */

require_once '../../model/accesBdd.php';

$serviceName = (isset($_POST['serviceName']) && !empty($_POST['serviceName'])) ? $_POST['serviceName'] : null;

if ($serviceName == null)
{
    echo json_encode(false);
} else {
    /** Requete BDD **/
    $pdo = connexionBdd();
    $sql = <<<SQL
SELECT id
FROM services  
WHERE name = :serviceName
SQL;

    try {
        $requete = $pdo->prepare($sql);
        $requete->execute(array(
            ':serviceName' => $serviceName
        ));
        $result = $requete->fetchAll();
        $requete->CloseCursor();
        $requete = null;

        if (count($result) > 0 )
            echo json_encode($result[0]['id']);
        else
            echo json_encode(false);
    } catch (PDOException $e) {
        $requete = null;
        echo 'Erreur serviceExist : ' . $e->getMessage() . '';
        die();
    }
}