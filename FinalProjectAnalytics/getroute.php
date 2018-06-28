<?php
session_start();
include('controller/controller.php');
$number = isset($_POST['number']) ? $_POST['number'] : false;

$c = new controller();
$content = $c->getRoute_Info($number);
$route_info = $content['route_info'];
echo json_encode($route_info);
?>