<?php
require_once("conn.php");
session_start();

if (isset($_POST['login_btn'])) {

  $username = $_POST['userId'];
  $password = $_POST['password'];

  // make sure form is filled
  if (empty($username) || empty($password)) {
   header('location: ../html/MainPage.html');
 }

  if (count($errors) == 0) {
   $sql = "SELECT * FROM user WHERE id=? AND password=?";
   $stmt = $conn->prepare($sql);
   $stmt->bind_param("is", $username, $password); // Query database using username and password
   $stmt->execute();
   $result = $stmt->get_result();


   if ($result->num_rows > 0) { // user found
     $_SESSION['success']  = true;
     $logged_in_user = $result->fetch_assoc();
     $_SESSION['user'] = $logged_in_user;
     // check if user is admin or user
     if ($logged_in_user['isAdmin'] === 1) {
       header('location: ../html/AdminPage.html');
     } else if ($logged_in_user['isAdmin'] === 0){
       header('location: ../html/StudentPage.html');
      }
   } else {
    header('location: ../html/MainPage.html');
   }
  }
}
?>
