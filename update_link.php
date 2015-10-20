<?php
		session_start();
		if ($_SESSION['loggedIn'] != "true"){
			header('Location:index.php');
		} else {
        $id = $_GET['id'];
		include_once "includes/db_connect.php";
			
		$title = $_POST['title'];
        $link = $_POST['link'];
		$description = $_POST['description'];
		$chain = $_POST['chain'];
      	$sql = "UPDATE link SET title = '$title', link = '$link', description = '$description', chain = '$chain' WHERE id = '$id'"; 
            mysqli_query($conn, $sql);
			header('Location:preview_link.php');
         } ?>      
</body>
</html>