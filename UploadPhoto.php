<html>
<head><title>Upload - photo</title>
<style>
.up_pho
{
border:1px solid #BEBEBE;
margin:50px 400px 40px 40px;
padding:10px 10px 10px 10px;
 
}
 
</style>
</head>
<body>
<div class=up_pho >
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method=post enctype="multipart/form-data" >
<input type=hidden name="MAX_FILE_SIZE" value="1000000" />
<input type=submit value=submit />
</form>
<?php
 
// Checking the file was submitted
if(!isset($_FILES['userfile'])) {   echo '<p>Please Select a file</p>';   }
 
else
{     try  {
              $msg = upload(); // function  calling to upload an image
              echo $msg;
              }
           catch(Exception $e) {   
               echo $e->getMessage();
               echo 'Sorry, Could not upload file';
                    }
}
 
 
function upload() {
    include "database/dbco.php";
    $maxsize = 10000000; //set to approx 10 MB
 
    //check associated error code
    if($_FILES['userfile']['error']==UPLOAD_ERR_OK) {
 
        //check whether file is uploaded with HTTP POST
        if(is_uploaded_file($_FILES['userfile']['tmp_name'])) {    
 
            //checks size of uploaded image on server side
            if( $_FILES['userfile']['size'] < $maxsize) {    
 
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
 
                //checks whether uploaded file is of image type
                if(strpos(finfo_file($finfo, $_FILES['userfile']['tmp_name']),"image")===0) {    
 
                    // prepare the image for insertion
                    $imgData =addslashes (file_get_contents($_FILES['userfile']['tmp_name']));
 
                    // put the image in the db...
                    // database connection
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $db = 'timetable';
 
                    mysql_connect($host, $user, $pass) OR DIE (mysql_error());
 
                    // select the db
                    mysql_select_db ($db) OR DIE ("Unable to select db".mysql_error());
 
                    // our sql query
 
        
                    $sql = "INSERT INTO storeimages
                    (id,image, name,size)
                    VALUES
                    ('$_POST[id]','{$imgData}', '{$_FILES['userfile']['name']}','{$_FILES['userfile']['size']}');";
                                mysql_query($sql) or die("Error in Query insert: " . mysql_error());
    
                    // insert the image
 
                    $msg='<p>Image successfully saved in database . </p>';
                }
                else
                    $msg="<p>Uploaded file is not an image.</p>";
            }
             else {
                // if the file is not less than the maximum allowed, print an error
                $msg='<div>File exceeds the Maximum File limit</div>
                <div>Maximum File limit is '.$maxsize.' bytes</div>
                <div>File '.$_FILES['userfile']['name'].' is '.$_FILES['userfile']['size'].
                ' bytes</div><hr />';
                }
        }
        else
            $msg="File not uploaded successfully.";
 
    }
    else {
        $msg= file_upload_error_message($_FILES['userfile']['error']);
    }
    return $msg;
}
 
// Function to return error message based on error code
 
function file_upload_error_message($error_code) {
    switch ($error_code) {
        case UPLOAD_ERR_INI_SIZE:
            return 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
        case UPLOAD_ERR_FORM_SIZE:
            return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
        case UPLOAD_ERR_PARTIAL:
            return 'The uploaded file was only partially uploaded';
        case UPLOAD_ERR_NO_FILE:
            return 'No file was uploaded';
        case UPLOAD_ERR_NO_TMP_DIR:
            return 'Missing a temporary folder';
        case UPLOAD_ERR_CANT_WRITE:
            return 'Failed to write file to disk';
        case UPLOAD_ERR_EXTENSION:
            return 'File upload stopped by extension';
        default:
            return 'Unknown upload error';
    }
}
?>
</div>
 
</body>
</html>   