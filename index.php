<?php
include('config.php')
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <title>Event Scheduler</title>
    </head>
    <body>
    	<div class="header">
        	<a href="<?php echo $url_home; ?>"><img src="<?php echo $design; ?>/images/logo.png" alt="Members Area" /></a>
	    </div>
        <div class="content">
<?php
//We display a welcome message, if the user is logged, we display it username
?>
Hello<?php if(isset($_SESSION['username'])){echo ' '.htmlentities($_SESSION['username'], ENT_QUOTES, 'UTF-8');} ?>,<br /></br>
Welcome to Event Scheduler.<br /></br>



<?php
//If the user is logged, we display links to edit his infos, to see his pms and to log out
if(isset($_SESSION['username']))
{
//We count the number of new messages the user has
$nb_new_pm = mysql_fetch_array(mysql_query('select count(*) as nb_new_pm from pm where ((user1="'.$_SESSION['userid'].'" and user1read="no") or (user2="'.$_SESSION['userid'].'" and user2read="no")) and id2="1"'));
//The number of new messages is in the variable $nb_new_pm
$nb_new_pm = $nb_new_pm['nb_new_pm'];
//We display the links
?>
<ul>
<li><a href="users.php">List of Members</a></li><br />
<li><a href="uploadtable.php">Upload Time-Table</a></li><br/>
<li><a href="yourtimetable.php">View your Time-Table</a></li></br>
<li><a href="viewotherstimetable.php">View others Time-Table</a></li></br>
<li><a href="edit_infos.php">Edit my personnal informations</a></li><br />
<li><a href="list_pm.php">My personnal messages(<?php echo $nb_new_pm; ?> unread)</a></li><br />
<li><a href="connexion.php">Logout</a></li>
</ul>
<?php
}
else
{
//Otherwise, we display a link to log in and to Sign up
?>
<a href="sign_up.php">Sign up</a><br />
<a href="connexion.php">Log in</a>
<?php
}
?>
		
	</body>
</html>