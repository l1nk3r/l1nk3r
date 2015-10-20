<?php
        session_start();
		ob_start();
		if ($_SESSION['level'] != "admin") {
			header('Location:index.php');}
		include_once "includes/db_connect.php";
		$id = $_GET['id'];
		$err_msg="";
        $title = $_POST['title'];
        $link = $_POST['link'];
		$description = $_POST['description'];
		$chain = $_POST['chain'];
		
		$query = "SELECT * FROM link WHERE id = '$id'";
        			$profile = mysqli_query($conn, $query);
       			 	$field = mysqli_fetch_array($profile); 
		
		if (isset($_POST) && !empty($_POST)) 
        {	
         if (empty($title)) 
        {
                $err_msg = $err_msg."Title must not be empty <br \>";         
        };
         if (empty($link)) 
        {
                $err_msg = $err_msg."Link must not be empty <br \>";         
        };
        if (empty($description)) 
        {
                $err_msg = $err_msg."Description must not be empty <br \>";  
        };
		if (empty($chain)) 
        {
                $err_msg = $err_msg."Chain must not be empty <br \>";         
        };
			
        if (empty($err_msg)) 
        {
           header('Location:update_link.php');
                } 
		}
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
        <form method="post" action="update_link.php?id=<?php echo $id; ?>">
    	<?php  echo '<h3>'.$err_msg.'</h3>'; ?>
         <center>
        <h2>Edit Link</h2>
                    <table width="300" align="center" border="0">
                        <tbody>
                        <tr>
                            <td>Title : 
                            </td>
                            <td><input type="text" name="title" value = "<?php echo $tit; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Link :
                            </td>
                            <td><input type="text" name="link" value = "<?php echo $lin; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Description :
                            </td>
                            <td><input type="text" name="description" value = "<?php echo $des; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Chain :
                            </td>
                            <td><input type="text" name="chain" value = "<?php echo $cha; ?>">
                            </td>
                        </tr>           
                          
                        </tbody>
                    </table>
                    <br />
                       <center>
  When you are happy with the details, click the Update Link button below. <br />
                        <br />
                        <input type="submit" value="Update Link"> 
                     </center>
                </form>	
               
                </div>
                
</body>
</html>
		