<?php
require 'config/database.php';
// get signup form data if submit button was clicked
if (isset($_POST['submit'])) {
   // ASSIGN THE FIRST NAME HeRE AND SANITIZE THEM TO AVOID ANY sql INJECTION
   $theName = filter_var($_POST['theName'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $phone = filter_var($_POST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $avatar = $_FILES['avatar'];
   // check if username  already exist in database 
   $user_check_query = "SELECT * FROM users WHERE username = '$username'";
   $user_check_result = mysqli_query($connection, $user_check_query);
   if (mysqli_num_rows($user_check_result) > 0) {
      $_SESSION['add-user'] = "اسم المستخدم موجود سابقا";
   } elseif (!$avatar['name']) {
      $_SESSION['add-user'] = "ادخل صورة من فضلك";
   }  
   else {
      // Work on avatar
      // rename avatar
      $time = time(); // make each image uniqe using current timestamp
      $avatar_name = $time . $avatar['name'];
      $avatar_tmp_name = $avatar['tmp_name'];
      $avatar_destination_path = 'images/' . $avatar_name;
      // make sure image is not too large (2mb+)
      if ($avatar['size'] < 2000000) {
         // upload avatar
         move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
      } else {
         $_SESSION['add-user'] = "حجم الصورة أكبر من 2 ميقا";
      }
      }
      // redirect back to signup page if ther was any problem *****
      if (isset($_SESSION['add-user'])) {
         //pass data back ******()
         $_SESSION['add-user-data'] = $_POST;
         // pass form data back to sign page
         header('location: ' . ROOT . 'signup.php');
         die();
      } else {
         // insert new user into table
         $insert_user_query = "INSERT INTO users SET name='$theName', username='$username', phone='$phone', password='$password', avatar='$avatar_name',
         is_admin=0";
         $insert_user_result = mysqli_query($connection, $insert_user_query);
         if(!mysqli_errno($connection)) {
             // redirect to login page with Success message
            $_SESSION['signup-success'] = "تم انشاء حساب بنجاح";
            header('location: ' . ROOT . 'signin.php');
            die();
            } 
      }
}else {
   // if button wasn't clicked, bounce back to signup page
   header('location: ' . ROOT .  'signup.php');
   die();
}
