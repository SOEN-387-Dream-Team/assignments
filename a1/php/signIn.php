<?php
include('./conn.php');
include('./functions.php');
session_start();

  // Call login function when button is clicked
  if (isset($_POST['login_button'])) {
    login();
  }

function login() {
  global $username, $errors;

  $username = $_POST['username'];
  $password = $_POST['password'];

  // make sure form is filled
  if (empty($username) || empty($password)) {
   array_push($errors, "Username/password are required");
 }

  if (count($errors) == 0) {

   $query = ""; // Query database using username and password
   $result = perform_query($query);

   if (mysqli_num_rows($results) == 1) { // user found
     $_SESSION['success']  = true;
     $logged_in_user = mysqli_fetch_assoc($result);
     $_SESSION['user'] = $logged_in_user;
     // check if user is admin or user
     if ($logged_in_user['isAdmin'] == 'admin') {
       header('location: ../html/AdminOptions.html');
      } else{
       header('location: ../html/StudentOptions.html');
      }
   } else {
    array_push($errors, "Wrong username/password combination");
   }
  }
}
?>
