<?php
session_start();
include('controller/controller.php');
$number = isset($_POST['number']) ? $_POST['number'] : false;

$c = new controller();
$content = $c->getCharList_Info($number);
$charlist_info = $content['charlist_info'];
echo json_encode($charlist_info);
?>