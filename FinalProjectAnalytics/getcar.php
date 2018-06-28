<?php
session_start();
include('controller/controller.php');
$number = isset($_POST['number']) ? $_POST['number'] : false;

$c = new controller();
$content = $c->getCar_Info($number);
$car = $content['car_info'];
echo json_encode($car);
?>