<?php
	session_start();
	include("controller/controller.php");
	$c = new controller();
	$c->deleteTicket_DidntPay_c();
	$c->logoutAccount();
?>