<?php 
$uname = $_SESSION['username'];
     if ($username == $uname) {
		echo '<a href="delete_post_user.php?id='.$link_id.'">Delete Post</a><br />';
		echo '<a href="edit_post_user.php?id='.$link_id.'">Edit Post</a><br />';
		} else { ?>
        <a href="save.php?id=<?php echo $link_id; ?>">Save Link</a><br />
    <a href="broken.php?id=<?php echo $link_id; ?>">Broken Link</a><br />
     <a href="report.php?id=<?php echo $link_id; ?>">Report Link</a><br />
    <a href="posted_by.php?user=<?php echo $name; ?>"><?php echo $name; ?>s Posts</a><br />
        Message User<br />
    <a href="fav_chain.php?chain=<?php echo $chain; ?>">Favorite Chain</a><br />
    <?php } 
	
	if ($_SESSION['level'] == "admin")
	{
	echo '<a href="delete_post.php?id='.$link_id.'" style="color:#dd0000">Delete Post</a><br />';
		echo '<a href="edit_post.php?id='.$link_id.'" style="color:#dd0000">Edit Post</a><br />'; } 
		?>
