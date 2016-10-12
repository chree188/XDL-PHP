<html>
<head><title>upload picture more once</title></head>
<body>
 <form action="" method="post" enctype="multipart/form-data">
  <p>Pictures:<br />
  <input type="file" name="pictures[]" /><br />
  <input type="file" name="pictures[]" /><br />
  <input type="file" name="pictures[]" /><br />
  <input type="submit" name="upload" value="Send" />
  </p>
 </form>
</body>
</html>

<?php
if($_POST['upload']=='Send'){
    $dest_folder   =  "picture/";
 if(!file_exists($dest_folder)){
        mkdir($dest_folder);
 }
 foreach ($_FILES["pictures"]["error"] as $key => $error) {
     if ($error == UPLOAD_ERR_OK) {
         $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
         $name    = $_FILES["pictures"]["name"][$key];
      $uploadfile = $dest_folder.$name;
         move_uploaded_file($tmp_name, $uploadfile);
     }
 }
}
?>  