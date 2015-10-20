<?php
        session_start();
		ob_start();
		if ($_SESSION['level'] != "admin") {
			header('Location:index.php');}
		include_once "includes/db_connect.php";
		$id = $_GET['id'];
		
		$query = "SELECT * FROM link WHERE id = '$id'";
        			$profile = mysqli_query($conn, $query);
       			 	$field = mysqli_fetch_array($profile); 		
?>
<title>Edit Post - ADMIN</title>
<link href="style/main.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Playbill' rel='stylesheet' type='text/css'>
</head>
<body>
<div id="main">
<?php 
include 'includes/functions.php';
start_up();
echo '<div id="header">';
include 'style/header.php';
login_fields();
echo '</div>';
		
		$query = "SELECT * FROM link WHERE id = '$id'";
        			$profile = mysqli_query($conn, $query);
       			 	$field = mysqli_fetch_array($profile); 
		
		$tit= $field['title'];
		$lin = $field['link'];
		$des = $field['description'];
		$cha = $field['chain'];
		$user = $field['username'];
		?>
                   <center><h2> Delete Link</h2>
                            <b>Title :</b> <br />
                            <?php echo $tit; ?><br /><br />
                           <b>Link :</b><br />
                            <?php echo $lin; ?><br /><br />
                            <b>Description :</b><br />
                            <?php echo $des; ?><br /><br />
                            <b>Chain :</b><br />
                            <?php echo $cha; ?><br /><br />
                       <center>
  Are you sure you want to delete this post? <br />
                        <br />
                        <a href ="confirm_delete.php?id=<?php echo $id; ?>">Delete post</a> -- <a href="index.php">Back to links</a> 
                     </center>
               
                </div>
                
</body>
</html>
	