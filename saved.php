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
?></nav><?php 
echo '</div>';

 if ($_SESSION['loggedIn'] != "true") 
		{  
		echo '<center><h1>Welcome to l1nk3r</h1></center>';
		}
		else
		{
			echo '<div id="main">';
			?>
           	<div id="main">
           <center><h1>Your saved links</h1></center>
           <?php 
		   $q_id= $_SESSION['id'];
           $query = "SELECT * FROM save WHERE user_id = '$q_id' GROUP BY link_id ORDER BY id DESC";
        $list = mysqli_query($conn, $query);
        while($save = mysqli_fetch_array($list)){
		$u_id = $save['user_id'];
		$l_id = $save['link_id'];

$query2 = "SELECT * from link where id = '$l_id'";
$link_user = mysqli_query($conn, $query2);
$link_name = mysqli_fetch_array($link_user);
$name = $link_name['username'];
$title = $link_name['title'];
$description = $link_name['description'];
$chain = $link_name['chain'];
$created = $link_name['date'];

$query3 = "SELECT * from users where username = '$name'";
$av_user = mysqli_query($conn, $query3);
$av_name = mysqli_fetch_array($av_user);
$av = $av_name['avatar'];

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
      <img src="<?php echo $av; ?>" width = "100" ><br />
      <?php echo $name; ?><br />
      <?php echo $when; ?><br />
   </td>
      <td width="650px"><h2><a href="<?php echo $link ?>"><?php echo $title; ?></a></h2>
      <?php echo $chain; ?><br />
      <?php echo nl2br($description.'<br />');?>
      <br />
      <br />
    </td>
    <td align="right">
    
    
  
	
        <a href="unsave.php?id=<?php echo $l_id; ?>">Unsave Link</a><br />
    
 
    </td>
    </tr>
  </tbody>
</table>
      
       <img src="images/line.jpg" width="100%">
           
           
            
		<?php } 
		}
		?>
</div>
<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
</body>
</html>