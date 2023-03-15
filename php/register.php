<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "task");

// IF
if(isset($_POST["action"])){
  if($_POST["action"] == "register"){
    register();
  }
  else if($_POST["action"] == "login"){
    login();
  }
}

// REGISTER
function register(){
  global $conn;

  $name = $_POST["name"];
  $user = $_POST["user"];
  $pas = $_POST["pas"];
  $contact = $_POST["contact"];

  if(empty($name) || empty($user) || empty($pas)){
    echo "Please Fill Out The Form!";
    exit;
  }

  $user = mysqli_query($conn, "SELECT * FROM users WHERE user = '$user'");
  if(mysqli_num_rows($user) > 0){
    echo " Has Already Taken";
    exit;
  }

  $query = "INSERT INTO users (name,user,pas,contact)  VALUES('$name', '$user', '$pas','$contact')";
  mysqli_query($conn, $query);
  echo "Registration Successful";
}

// LOGIN
function login(){
  global $conn;

  $user= $_POST["user"];
  $pas = $_POST["pas"];

  $user = mysqli_query($conn, "SELECT * FROM users WHERE user = '$user'");

  if(mysqli_num_rows($user) > 0){

    $row = mysqli_fetch_assoc($user);

    if($pas == $row['pas']){
      $conn = mysqli_connect("localhost", "root", "", "task");

    
    $user = $_POST['user'];
      $user = mysqli_query($conn, "SELECT * FROM users WHERE user = '$user'");
    
      $arrays = array();
      while($row = mysqli_fetch_assoc($user)){
        $arrays[] = $row;
      }
      echo json_encode($arrays);
   
      exit;
     

    }
    else{
      echo "Wrong Password";
      exit;
    }
  }
  else{
    echo "User Not Registered";
    exit;
  }
}
?>
