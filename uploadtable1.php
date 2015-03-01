<?php
include('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <title>Create Time Table</title>
    </head>
    <body>
    	<div class="header">
        	<a href="<?php echo $url_home; ?>"><img src="<?php echo $design; ?>/images/logo.png" alt="Members Area" /></a>
	    </div>
        <div class="content">
<?php
if(isset($_SESSION['username']))
{
$timeslot1 = mysql_real_escape_string($_POST['timeslot1']);
$timeslot2 = mysql_real_escape_string($_POST['timeslot2']);
$timeslot3 = mysql_real_escape_string($_POST['timeslot3']);
$timeslot4 = mysql_real_escape_string($_POST['timeslot4']);
$timeslot5 = mysql_real_escape_string($_POST['timeslot5']);
$timeslot6 = mysql_real_escape_string($_POST['timeslot6']);
$timeslot7 = mysql_real_escape_string($_POST['timeslot7']);
$timeslot8 = mysql_real_escape_string($_POST['timeslot8']);
$event1 = mysql_real_escape_string($_POST['event1']);
$event2 = mysql_real_escape_string($_POST['event2']);
$event3 = mysql_real_escape_string($_POST['event3']);
$event4 = mysql_real_escape_string($_POST['event4']);
$event5 = mysql_real_escape_string($_POST['event5']);
$event6 = mysql_real_escape_string($_POST['event6']);
$event7 = mysql_real_escape_string($_POST['event7']);
$event8 = mysql_real_escape_string($_POST['event8']);
$id = $_POST['id'];
$name = mysql_real_escape_string($_POST['username']);
//$abc = $_SESSION['username'];
$ousername = '';
	//We check if the form has been sent
	if(isset($_POST['username'], $_POST['password']))
	{
		//We remove slashes depending on the configuration
		if(get_magic_quotes_gpc())
		{
			$ousername = stripslashes($_POST['username']);
			$username = mysql_real_escape_string(stripslashes($_POST['username']));
			$password = stripslashes($_POST['password']);
		}
		else
		{
			$username = mysql_real_escape_string($_POST['username']);
			$password = $_POST['password'];
		}
		//We get the password of the user
		$req = mysql_query('select password,id from users where username="'.$username.'"');
		$dn = mysql_fetch_array($req);
		if($dn['password']==$password and mysql_num_rows($req)>0)
		{ 	
			echo "Time-Table submitted Successfully";
			mysql_query("INSERT INTO ".$username." (id, timeslot1, event1, timeslot2, event2, timeslot3, event3, timeslot4, event4, timeslot5, event5, timeslot6, event6, timeslot7, event7, timeslot8, event8) VALUES ('$id', '$timeslot1', '$event1', '$timeslot2', '$event2','$timeslot3', '$event3','$timeslot4', '$event4','$timeslot5', '$event5','$timeslot6', '$event6','$timeslot7', '$event7','$timeslot8', '$event8')");
			
		}
		else
		{
			echo "Incorrect Username and Password";
		}
	}

}
?>
<div class="foot"><a href="<?php echo $url_home; ?>">Go Home</a> </div>
	</body>
</html>