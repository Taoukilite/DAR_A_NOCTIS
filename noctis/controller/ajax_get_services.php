<?php
/**
 * Created by PhpStorm.
 * User: stephane
 * Date: 30/11/16
 * Time: 21:24
 */

require_once "../model/accesBdd.php";
require_once '../model/_service.php';
require_once '../model/_professionnal.php';
require_once 'serviceController.php';
require_once 'professionnalController.php';
$services = getServicesName($_GET["term"]);
echo $services;
