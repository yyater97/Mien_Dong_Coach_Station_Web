<?php
session_start();
include('controller/controller.php');
$number = isset($_POST['number']) ? $_POST['number'] : false;

$c = new controller();
$cost = $c->deleteTicket_Info($number);
echo $cost;
?>