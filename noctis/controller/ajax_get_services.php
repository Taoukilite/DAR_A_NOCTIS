<?php
/**
 * Created by PhpStorm.
 * User: stephane
 * Date: 30/11/16
 * Time: 21:24
 */

//require_once "../../model/accesBdd.php";
//require_once '../../model/_service.php';
//require_once '../../model/_professionnal.php';
//require_once '../serviceController.php';
//require_once '../../controller/professionnalController.php';
$services = getServices();
echo 'toto1';

/*$professionnals = getProfessionnals();

foreach($professionnals as $pro){
    setSuppliedServices($pro);
}

foreach($professionnals as $pro) {

    if ($pro->getSuppliedServices() != NULL) {
        foreach ($pro->getSuppliedServices() as $service) {
            die('toto');
            echo "".$service->getName() . "";
        }
    }
}*/


