<?php 
session_start();
include "includes/db_connect.php";
$link_id = $_GET['id'];
	$sql = "DELETE FROM save WHERE link_id = '$link_id';";
                   mysqli_query($conn, $sql);
				header('Location:saved.php');
echo $link_id;
?>