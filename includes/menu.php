<link href="../style/main.css" rel="stylesheet" type="text/css">
<div id ="menuleft">
<a href="../index.php">Links</a>
 -- 
 <a href="../add_link.php">Add Link</a>
 -- 
 <a href="../saved.php">Saved Links</a>
 -- 
 <a href="../my_links.php">My Links</a>
 -- 
 <a href="../fav_chains.php">Favorite Chains</a>
 -- 
 <a href="../bug.php">Report Bug</a>
 --
<a href="../logout.php">Logout</a>
</div>
<div id="menuright">
 <form  action="search_result.php" action ="post"> 
 <input type="text" name="search" placeholder = "Enter search here">
  <input type="submit" value="Search"> 
  </form>
</div>
<?php if ($_SESSION['level'] == "admin")
	{ ?><br />
    <a href="to_do_list.php" style="color:#dd0000">To Do List</a> --
    <a href="to_do.php" style="color:#dd0000">Add To Do </a> -- 
		<a href="bug_list.php"  style="color:#dd0000">Bugs</a>
        <br /> 
        <?php }
		?> 