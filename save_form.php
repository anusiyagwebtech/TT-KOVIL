<?php

require 'admin/config/config.inc.php';

$name = $_POST['name'];
$mobilenumber = $_POST['mobilenumber'];
$city = $_POST['city'];
$date = $_POST['date'];
$time = $_POST['time'];
 global $db;
 $queryexc = $db->prepare("INSERT INTO `appointment_booking_tbl` (`name`,`mobilenumber`,`city`,`date`,`time`) VALUES (?,?,?,?,?)");
    $queryexc->execute(array($name, $mobilenumber,$city, $date,$time));
    header('Location:https://ttbilling.in/kovil_template/poojadarashanbooking.php');
?>