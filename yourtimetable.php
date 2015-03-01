<?php
include('config.php')
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="<?php echo $design; ?>/style.css" rel="stylesheet" title="Style" />
        <title>Upload Time-Table</title>
    </head>
    <body>
    	<div class="header">
        	<a href="<?php echo $url_home; ?>"><img src="<?php echo $design; ?>/images/logo.png" alt="Members Area" /></a>
	    </div>
        <div class="content">
<?php
if(isset($_SESSION['username']))
{
$username = $_SESSION['username'];
$req1 = mysql_query("SELECT timeslot1, timeslot2,  timeslot3, timeslot4, timeslot5,  timeslot6,  timeslot7, timeslot8 FROM ".$username." ");
while($timeslot = mysql_fetch_array($req1))
{
?>
<table>
    <tr>
    	<th>Weekday</th>
    	<th><?php echo $timeslot['timeslot1']; ?></th>
    	<th><?php echo $timeslot['timeslot2']; ?></th>
	<th><?php echo $timeslot['timeslot3']; ?></th>
	<th><?php echo $timeslot['timeslot4']; ?></th>
	<th><?php echo $timeslot['timeslot5']; ?></th>
	<th><?php echo $timeslot['timeslot6']; ?></th>
	<th><?php echo $timeslot['timeslot7']; ?></th>
	<th><?php echo $timeslot['timeslot8']; ?></th>
    </tr>
<?php
//We get the IDs, usernames and emails of users
break;
}
$req2 = mysql_query("SELECT id,  event1, event2,  event3, event4, event5,  event6,  event7, event8 FROM ".$username."");
while($dnn = mysql_fetch_array($req2))
{
?>
	<tr>
    	<td class="left"><?php echo $dnn['id']; ?></td>
    	<td class="left"><?php echo $dnn['event1']; ?></td>
    	<td class="left"><?php echo $dnn['event2']; ?></td>
	<td class="left"><?php echo $dnn['event3']; ?></td>
    	<td class="left"><?php echo $dnn['event4']; ?></td>
	<td class="left"><?php echo $dnn['event5']; ?></td>
    	<td class="left"><?php echo $dnn['event6']; ?></td>
	<td class="left"><?php echo $dnn['event7']; ?></td>
    	<td class="left"><?php echo $dnn['event8']; ?></td>
    </tr>

<?php
}
}
else
{
echo 'You must be logged to access this page.';
}

?>
	</table>	
	<div class="foot"><a href="<?php echo $url_home; ?>">Go Home</a> </div>
	</body>
</html>