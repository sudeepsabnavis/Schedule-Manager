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
//We check if the user is logged
if(isset($_SESSION['username']))
{
?>
<form action = "uploadtable1.php" method = "post">
<h1 style="align:left">Time-Table</h1>
<table>
    <tr>
	<td><label>Time Slot 1:</label>
       <td> <input name="timeslot1" placeholder="Time Slot 1" type="text">
    
       <td> <label>Event 1:</label>
       <td> <input name="event1" placeholder="Event 1" type="text">
    <tr>
	<td><label>Time Slot 2:</label>
        <td><input name="timeslot2" placeholder="Time Slot 2" type="text">
    
        <td><label>Event 2:</label>
        <td><input name="event2" placeholder="Event 2" type="text">
    <tr>
	<td><label>Time Slot 3:</label>
        <td><input name="timeslot3" placeholder="Time Slot 3" type="text">
    
        <td><label>Event 3:</label>
        <td><input name="event3" placeholder="Event 3" type="text">
    <tr>
	<td><label>Time Slot 4:</label>
        <td><input name="timeslot4" placeholder="Time Slot 4" type="text">
    
        <td><label>Event 4:</label>
        <td><input name="event4" placeholder="Event 4" type="text">
   <tr>
	<td><label>Time Slot 5:</label>
        <td><input name="timeslot5" placeholder="Time Slot 5" type="text">
    
        <td><label>Event 5:</label>
        <td><input name="event5" placeholder="Event 5" type="text">
   <tr>
	<td><label>Time Slot 6:</label>
        <td><input name="timeslot6" placeholder="Time Slot 6" type="text">
    
        <td><label>Event 6:</label>
        <td><input name="event6" placeholder="Event 6" type="text">
    <tr>
	<td><label>Time Slot 7:</label>
        <td><input name="timeslot7" placeholder="Time Slot 7" type="text">
    
        <td><label>Event 7:</label>
        <td><input name="event7" placeholder="Event 7" type="text">
    <tr>
	<td><label>Time Slot 8:</label>
        <td><input name="timeslot8" placeholder="Time Slot 8" type="text">
    
        <td><label>Event 8:</label>
        <td><input name="event8" placeholder="Event 8" type="text">
  </table> 
    
<h3>Please Select the day</h3>
<input type="radio" name="id" value="Monday">Monday<br>
<input type="radio" name="id" value="Tuesday">Tuesday<br>
<input type="radio" name="id" value="Wednesday">Wednesday<br>
<input type="radio" name="id" value="Thursday">Thursday<br>
<input type="radio" name="id" value="Friday">Friday<br>
<input type="radio" name="id" value="Saturday">Saturday<br>
<input type="radio" name="id" value="Sunday">Sunday<br><br>

<h3>Enter Username and Password</h3><br>
Username  <input type="text" name="username" required ><br>
Password  <input type="password" name="password" required ><br>
<input style="align:center" value="Submit" type="submit">
  </form>  
<?php
}
else
{
	echo 'You must be logged to access this page.';
}
?>
		
		<div class="foot"><a href="<?php echo $url_home; ?>">Go Home</a> </div>
	</body>
</html>