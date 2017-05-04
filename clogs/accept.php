<?php
session_start();
if($_SESSION['is_logged_in'] != 1){
    
    header('location: ../login');
    die();
  }
include ('db_connect.php');

$table_req = 'requests';

if (isset($_GET['project_id']) && isset($_GET['request_user'])){
	$pid = $_GET['project_id'];
	$user = $_GET['request_user'];

	$sql = "UPDATE $db_name.$table_req SET status = 1 WHERE project_id='$pid' AND user_id='$user'";

	$status_ = mysqli_query($connect_link, $sql);
	if ($status_){
		header('location: ../profile');
		die();
	} 
	else
		header('location: ../html/error.html');
}

?>