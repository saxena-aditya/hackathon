<?php

$server = "localhost";
$username = "root";
$pass = "";
$db_name = "collab";

$connect_link = mysqli_connect($server, $username, $pass, $db_name);

	if(mysqli_connect_errno())
		header("location: ../html/error.html"); 

function validate($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function SQLProof($connect_link,$data){
	return mysqli_real_escape_string($connect_link,$data);
}

?>
