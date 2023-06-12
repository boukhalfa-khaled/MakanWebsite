<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
   //get form data
   $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
   $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
      // fetch user from database
      $fetch_user_query = "SELECT * FROM users WHERE username = '$username'";
      $fetch_user_result = mysqli_query($connection, $fetch_user_query);
         if (mysqli_num_rows($fetch_user_result) == 1) {
         // convert the record into assoc array
         $user_record = mysqli_fetch_assoc($fetch_user_result);
         $db_password = $user_record['password']; // here we get the password
         // compare input form password with database password
         // if (password_verify($password, $db_password)) 
         if ($password == $db_password) {
            // set session for access control to user her in the avatar for example
            $_SESSION['user-id'] = $user_record['id'];
            // log user in 
            header('location: ' . ROOT . 'profil.php');
         } else {
            $_SESSION['signin'] = "كلمة المرور غير صحيحة";
         }
      } else {
         $_SESSION['signin'] = "لا يوجد مستخدم بهذا الاسم";
      }
   // if any problem, redirect back to signin page with login data
   if (isset($_SESSION['signin'])) {
      $_SESSION['signin-data'] = $_POST;
      header('location:' . ROOT . 'signin.php');
      die();
   }
} else {
   header('location:' . ROOT . 'signin.php');
   die();
}
