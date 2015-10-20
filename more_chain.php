<div id="main">
<nav class="navbar navbar-default">
  <?php 
  $number = $_GET['num'];
 $count = 0;
  
include 'includes/functions.php';
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
		{
			echo '<div id="main">';
			include 'profile.php';?>
</nav>
           	<div id="main"><?php include 'includes/db_connect.php'; ?>

<div class = 'chain'>
		 <?php 
		 
		 
           $query2 = "SELECT * FROM link WHERE broken = '0' ORDER BY id DESC OFFSET ".$number."";
        $list = mysqli_query($conn, $query2);
        while($links = mysqli_fetch_array($list)){
		$count ++;	
$link_id = $links['id'];
$title = $links['title'];
$link = $links['link'];
$description = $links['description'];
$created = $links['date'];
$username = $links['username'];
$chain = $links['chain'];
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
 <!DOCTYPE html>
 <html>
 	<head>
    	<title></title>
    </head>
    <body>          
<table>
  <tbody>
    <tr>
      <td width="120px">   
      <img src="<?php echo $avatar; ?>" width = "100" ><br />
      <a href="posted_by.php?user=<?php echo $name; ?>"><?php echo $name;?></a><br />
   		<?php echo $when; ?>
      
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
           
    </div>       
            
		<?php } 
		if ($count == 5) {
			echo'<a href="more_chain.php?num=<?php echo $link_id; ?>">Click here for more</a>';
			exit();}
		}
	
		?>
        
</div>
</div>
<a href="more_chain.php?num=<?php echo $link_id; ?>">Click here for more</a>

	</body>



