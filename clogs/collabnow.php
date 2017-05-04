<?php

  session_start();

  if($_SESSION['is_logged_in'] != 1){
    
    header('location: login');
    die();
  }
  	$username = $_SESSION['username'];
  	$table = 'requests';
  	$pid = null;
	
	}









?>