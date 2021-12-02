<?php
if(isset($_FILES["fileToUpload"])){
  echo '<pre>';
  print_r($_FILES["fileToUpload"]);
  echo '</pre>';
  $target_dir = "uploads/";
  $allowed_filetype = array('image/png', 'image/jpg', 'image/jpeg');
  $i = 0;
  $errors = array();

  foreach($_FILES["fileToUpload"]["name"] as $key => $name){
    echo $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$key]);

    if ($_FILES["fileToUpload"]["size"][$key] > 1024000) {
      $errors[$key][] = "A $name túl nagy méretű. 100KB-nál nem lehet nagyobb.";
    }else if ($_FILES["fileToUpload"]["size"][$key] < 1024){
      $errors[$key][] = "A $name túl kis méretű. 1KB-nál nem lehet kisebb.";
    }

    if (!in_array($_FILES["fileToUpload"]["type"][$key], $allowed_filetype)) {
      $errors[$key][] = "A $name fájl nem jpg vagy png.";
    }
    if(!isset($errors[$key])){
      if (@move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$key], $target_file)) {
        $i++;
      }
    }
  }
}

?>

<!DOCTYPE html>
<html>
<body>

<?php
if($i > 0) echo "$i fájl feltöltve.";

if($errors){
  foreach($errors as $error){
    foreach($error as $errorMsg){
      echo "$errorMsg<br>";
    }
  }
}
?>

<form action="upload.php" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload[]" id="fileToUpload" multiple> 
  <input type="submit" value="Upload Image" name="submit">
</form>
</body>
</html>