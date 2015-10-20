<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>l1nk3r - Home</title>
<link href="style/main.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Playbill' rel='stylesheet' type='text/css'>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="main">
<nav class="navbar navbar-default">
  <?php 
include 'includes/functions.php';
include 'includes/db_connect.php';
start_up();
echo '<div id="header">';
include 'style/header.php';
login_fields();
echo '</div>';

 if ($_SESSION['loggedIn'] != "true") 
		{  
		echo '<center><h1>Welcome to l1nk3r</h1></center>';
		}
		else
		{?>
</nav>
        <center><h1>Links from favorite chains</h1></center>
        <?php 
		
			 $u = $_SESSION['username'];
			 $query = "SELECT chain FROM fav_chain WHERE username = '$u' GROUP BY chain ORDER BY rand() ";
              $list = mysqli_query($conn, $query);
        while($links = mysqli_fetch_array($list)){
			
			
			$chain = $links['chain'];
			$query2 = "SELECT * FROM link WHERE chain = '$chain' ORDER BY date DESC";
            $list2 = mysqli_query($conn, $query2);
       while($links2 = mysqli_fetch_array($list2)){
			$link_id = $links2['id'];
$title = $links2['title'];
$link = $links2['link'];
$description = $links2['description'];
$created = $links2['date'];
$username = $links2['username'];
$chain = $links2['chain'];
$query2 = "SELECT * from users where username = '$username'";
$link_user = mysqli_query($conn, $query2);
$link_name = mysqli_fetch_array($link_user);
$name = $link_name['username'];
$avatar = $link_name['avatar'];
$timeAgoObject = new convertToAgo; // Create an object for the time conversion functions

// Query your database here and get timestamp

$ts = $created;

$convertedTime = ($timeAgoObject -> convert_datetime($ts)); // Convert Date Time

$when = ($timeAgoObject -> makeAgo($convertedTime)); // Then convert to ago time 

?>

<table>
  <tbody>
    <tr>
      <td width="120px">   
      <img src="<?php echo $avatar; ?>" width = "100" ><br />
      <a href="posted_by.php?user=<?php echo $name; ?>"><?php echo $name;?></a><br />
      <?php echo $when; ?><br />
   </td>
      <td width="650px"><h2><a href="<?php echo $link ?>"><?php echo $title; ?></a></h2>
    	 <?php echo nl2br($description.'<br />');?>
          posted to - <a href="chain.php?chain=<?php echo $chain ?>"><?php echo $chain; ?></a><br />
      <br />
      <br />
    </td>
    <td align="right">
   
    
   <?php 
	include 'user_menu.php';
	?>
    </td>
    </tr>
  </tbody>
</table>
      
       <img src="images/line.jpg" width="100%">
           
           
            
		<?php } 
		}
		?>
		
		<?php 
			
		}?>
		<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.js" type="text/javascript"></script>
