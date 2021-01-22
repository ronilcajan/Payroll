<?php
	include '../server/server.php';
   	session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['name']);
    header('location: ../login.php');
