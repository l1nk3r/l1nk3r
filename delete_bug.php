<?php
        session_start();
		ob_start();
		if ($_SESSION['level'] != "admin") {
			header('Location:index.php');}
		include_once "includes/db_connect.php";
		$id = $_GET['id'];
		
		$query = "DELETE FROM bugs WHERE id = '$id'";
        			$profile = mysqli_query($conn, $query);
       			 	$field = mysqli_fetch_array($profile); 		
				header('Location:bug_list.php');?>
