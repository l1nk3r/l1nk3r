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

?>
 </nav>
 <center><h2>Search Results</h2></center>
            <center>Not what your looking for? Try another </br>
             <form  action="search_result.php" action ="post"> 
 <input type="text" name="search" placeholder = "Search again">
  <input type="submit" value="Search"> 
  </form>
  </center>
  <?php 

 if ($_SESSION['loggedIn'] != "true") 
		{  
		echo '<center><h1>Welcome to l1nk3r</h1></center>';
		}
		else
		{
		$search_result = $_GET["search"];
	$query = "SELECT * FROM link WHERE title LIKE '%".$search_result."%' OR description LIKE '%".$search_result."%' OR chain LIKE '%".$search_result."%'";
        $list = mysqli_query($conn, $query);
        while($links = mysqli_fetch_array($list)){
 $link_id = $links['id'];
$title = $links['title'];
$link = $links['link'];
$broken = $links['broken'];
$description = $links['description'];
$created = $links['date'];
$username = $links['username'];
$chain = $links['chain'];
$query2 = "SELECT * from users where username = '$username'";
$link_user = mysqli_query($conn, $query2);
$link_name = mysqli_fetch_array($link_user);
$name = $link_name['username'];
$avatar = $link_name['avatar'];
?>

<?php if ($broken == '0'){ ?>
<table>
  <tbody>
    <tr>
      <td width="120px">   
      <img src="<?php echo $avatar; ?>" width = "100" ><br />
      <a href="posted_by.php?user=<?php echo $name; ?>"><?php echo $name;?></a><br />
      <?php echo $created; ?><br />
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
			
			<?php } else{ 
		}
			?>
            <?php } }?>
        
           <br />
          
                </div>

<script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
</body>
</html>
