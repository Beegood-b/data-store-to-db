<?php
  $conn = mysqli_connect("localhost", "root", "", "crud");

  if($conn == false) {
    die("Connection Error:" . mysqli_connect_error());
  }
?>