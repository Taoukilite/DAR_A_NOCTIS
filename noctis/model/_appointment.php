<?php
/**
* 
*/

require_once 'accesBdd.php';
class Appointment
{
	private $_title;
	private $_date;
	private $_start;
	private $_end;
	private $_description;
	function __construct($title, $date, $start, $end, $description)
	{
		$this->_title = $title;
		$this->_date = $date;
		$this->_start = $start;
		$this->_description = $description;
	}

	function timeToISO8601(){
	}

    /**
     * Retourne l'id d'un pro dispo dans le range $start - $end
     * pour le service $serviceId
     * ou false si il n'y en a pas
     *
     * @param $serviceId
     * @param $start
     * @param $end
     * @return bool
     */
	public static function isUsableEventRange ($serviceId, $start, $end)
    {
        $pdo = connexionBdd();
        /**
         * Requête qui récupère tous les pro dispo dans cette plage horaire $start / $end
         */
        $sql = <<<SQL
SELECT DISTINCT u.id AS professionnalId
FROM users u
LEFT JOIN appointment a ON u.id = a.professionnalId
JOIN service_supplier ss ON ss.professionnalId = u.id
WHERE u.type = 2
AND ss.serviceId = :serviceId
AND u.id NOT IN (SELECT DISTINCT professionnalId
    FROM appointment a
    WHERE (a.start <= :start AND a.end > :start
OR a.start >= :start AND a.start < :end)
                )
OR (a.professionnalId IS NULL
AND ss.serviceId = :serviceId
AND u.type = 2)

SQL;

        try {
            $requete = $pdo->prepare($sql);
            $requete->execute(array(
                ':serviceId' => $serviceId,
                ':start' => $start,
                ':end' => $end,

            ));
            $result = $requete->fetchAll();
            $requete->CloseCursor();
            $requete = null;

            return (count($result) > 0) ? $result[0]["professionnalId"] : false;
        } catch (PDOException $e) {
            $requete = null;
            echo 'Erreur addevent - getproID  : ' . $e->getMessage() . '';
            die();
        }
        return false;
    }

}

?>