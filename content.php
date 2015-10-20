<div id="hidden_container" style="display: none">
	<div id="1">
		<li class="event">
			<?php 
			include 'includes/db_connect.php';
           $query = "SELECT * FROM link WHERE chain = '$chain' ORDER BY id DESC";
        $list = mysqli_query($conn, $query);
        while($links = mysqli_fetch_array($list)){
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

include_once("includes/functions.php"); // Include the class library

$timeAgoObject = new convertToAgo; // Create an object for the time conversion functions

// Query your database here and get timestamp

$ts = $created;

$convertedTime = ($timeAgoObject -> convert_datetime($ts)); // Convert Date Time

$when = ($timeAgoObject -> makeAgo($convertedTime)); // Then convert to ago time ?>

<table>
  <tbody>
    <tr>
      <td width="120px">   
      <img src="<?php echo $avatar; ?>" width = "100" ><br />
      <a href="posted_by.php?user=<?php echo $name; ?>"><?php echo $name;?></a><br />
      <?php echo $when ?><br />
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
	
		?>
</div>
			<div id="loader">
				<div class="sk-spinner sk-spinner-pulse"></div>
			</div>
		</div>
		<script src="js/jquery.min.js"></script>	
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"> </script>
  </body>
</html>

	</div>
</div>



