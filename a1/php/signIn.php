<?php
require_once("conn.php");
session_start();

  $username = $_POST['userId'];
  $password = $_POST['password'];

  // make sure form is filled
  if (empty($username) || empty($password)) {
   header('location: ../html/MainPage.html');
 }

   $sql = "SELECT * FROM user WHERE id=? AND password=?";
   $stmt = $conn->prepare($sql);
   $stmt->bind_param("is", $username, $password); // Query database using username and password
   $stmt->execute();
   $result = $stmt->get_result();


   if ($result->num_rows > 0) { // user found
     $_SESSION['success']  = true;
     $logged_in_user = $result->fetch_assoc();
     $_SESSION['user'] = $logged_in_user;
     $_SESSION['id'] = $logged_in_user['id'];
     $_SESSION['name'] = ucfirst($logged_in_user['firstName']) . " " . ucfirst($logged_in_user['lastName']);//used to show user name in nav bar
     // check if user is admin or user
     if ($logged_in_user['isAdmin'] === 1) {
       header('location: ../html/AdminPage.php');
     } else if ($logged_in_user['isAdmin'] === 0){
       header('location: ../html/StudentPage.html');
      }
   } else {
    header('location: ../html/MainPage.html');
   }

?>
