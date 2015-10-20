<?php 
session_start();
include "includes/db_connect.php";
$link_id = $_GET['id'];
$user_id = $_SESSION['id'];
$sql = "INSERT INTO save
                    (link_id, user_id)
                    VALUES (
                    '".mysqli_real_escape_string($conn,$link_id)."', 
					'".mysqli_real_escape_string($conn, $user_id)."')";
                    mysqli_query($conn, $sql);
					header('Location:index.php');
?>