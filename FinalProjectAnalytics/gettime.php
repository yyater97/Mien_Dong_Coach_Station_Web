<?php
session_start();
include('controller/controller.php');
$number = isset($_POST['number']) ? $_POST['number'] : false;

$c = new controller();
$content = $c->getSchedule_Info($number);
$schedule_info = $content['schedule_info'];
echo json_encode($schedule_info);
?>