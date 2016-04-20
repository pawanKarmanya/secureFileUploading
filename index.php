<?php
if(isset($_POST["submit"])){
    
$extension=array('jpg','jpeg','png','gif');
for($x=0;$x<count($_FILES["imagefile"]["name"]);$x++){
    
$filename= $_FILES["imagefile"]["tmp_name"][$x];
$filename12="uploads/".$_FILES["imagefile"]["name"][$x];
@$validation= strtolower(end(explode(".", $_FILES["imagefile"]["name"][$x])));
if(!in_array($validation, $extension)){
    $error="";
    $error.="Only image files can be uploaded";
}
if($_FILES["imagefile"]["size"][$x]>2097152){
    
    $error.="File is too large";
}
if(!isset($error)){
    
if(move_uploaded_file($filename, $filename12)){
    
    echo $_FILES["imagefile"]["name"][$x]." File Uploaded Successfully","<br><br>";
}
else{
    
    echo $_FILES["imagefile"]["name"][$x]." File Couldnot be uploaded","<br><br>";
}
}
}
}
?>
<!doctype html>
<html>
    <head><title>Multiple File Upload</title></head>
    <body>
        <p>Hold control and select multiple files to upload max size 2 Mb</p>
        <form  method="post" class="form-horizontal" enctype="multipart/form-data" >
            <input type="file" class="form-control" name="imagefile[]" accept="image/*" multiple required>
        <input type="submit" name='submit'>
        </form>
        <div><?php if(isset($error)){echo $error;}?></div>
    </body>
</html>