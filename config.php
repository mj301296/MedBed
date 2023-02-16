<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("449010560473-ipjql63bifmp2ipfr8pla851jsmt338q.apps.googleusercontent.com");
	$gClient->setClientSecret("bm4nLm3M94CqC4Ygsf0uRXCi");
	$gClient->setApplicationName("MEDBED");
	$gClient->setRedirectUri("http://localhost:8080/MEDBED/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
