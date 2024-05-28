<?php
  include('dbconnection.php');

  if(isset($_POST['submit'])) {
    $file_name = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $folder = 'Images/'.$file_name;

    $query = mysqli_query($conn, "Insert into images (file) values ('$file_name')");

    if(move_uploaded_file($tempname, $folder)) {
      echo "<h2>File uploaded successfully</h2>";
    } else {
      echo "<h2>File has not been uploaded</h2>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form method="POST" enctype="multipart/form-data">
    <input type="file" name="image" />
    <br><br>
    <button type="submit" name="submit">Submit</button>
  </form>
  <div>
    <?php
      $res = mysqli_query($conn, "select * from images");
      while($row = mysqli_fetch_assoc($res)) {
    ?>
    <img src="Images/<?php echo $row['file'] ?>" />
    <?php } ?>
  </div>
</body>
</html>