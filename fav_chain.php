<?php 
include 'includes/functions.php';
include 'includes/db_connect.php';
start_up();
echo '<div id="header">';
include 'style/header.php';
login_fields();
echo '</div>';
$fav = $_GET['chain'];
$u = $_SESSION['username'];
 $sql = "INSERT INTO fav_chain
                    (username, chain)
                    VALUES (
                    '".mysqli_real_escape_string($conn,$u)."', 
					'".mysqli_real_escape_string($conn, $fav)."')";
                    mysqli_query($conn, $sql);
                    header('Location:fav_chains.php'); 
					?>
