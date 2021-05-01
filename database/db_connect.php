<?php
$con=mysqli_connect("localhost","root","","blog_admin_db");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Karakter setini utf8 olarak değiştirin
mysqli_set_charset($con,"utf8");

 ?>