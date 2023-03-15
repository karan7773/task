<?php
  $conn = mysqli_connect("localhost", "root", "", "task");
  $user = $_POST['user'];
  $user = mysqli_query($conn, "SELECT * FROM users WHERE user = '$user'"); 
  $arrays = array();
  while($row = mysqli_fetch_assoc($user)){
    $arrays[] = $row;
  }
  echo json_encode($arrays);
  exit;
?>
