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
?>
<form action="viewother.php" method= "post">
Enter username of other user to see their timetable  <input type=text name=otheruser ></br>
<input type=submit name=Submit>
	
	<div class="foot"><a href="<?php echo $url_home; ?>">Go Home</a> </div>
	</body>
</html>
<?php
}
else
{
	echo 'You must be logged to access this page.';
}
?>