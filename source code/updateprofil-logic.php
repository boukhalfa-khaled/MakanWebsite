
<?php
require 'config/database.php';
if (isset($_POST['submit'])) {
   // get updated form data
   $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
   $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $phone = filter_var($_POST['phone'], FILTER_SANITIZE_SPECIAL_CHARS);
   $old_password = filter_var($_POST['old_password'], FILTER_SANITIZE_SPECIAL_CHARS);
   $new_password = filter_var($_POST['new_password'], FILTER_SANITIZE_SPECIAL_CHARS);
   $avatar = $_FILES['avatar'];
   // fetch user from database 
   $query = "SELECT * FROM users WHERE id=$id";
   $result = mysqli_query($connection, $query);
   $user = mysqli_fetch_assoc($result);
   $password = $user['password'];
   if($old_password == $password ) {
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
         // echo "helllo";
         // update user
         $query = "UPDATE users SET name='$name', phone='$phone', password=$new_password, avatar='$avatar_name'
         WHERE id=$id LIMIT 1";
         $result = mysqli_query($connection, $query);

         if (mysqli_errno($connection)) {
            $_SESSION['edit-user'] = "فشل تعديل الحساب";
         } else {
            $_SESSION['edit-user-success'] = "تم تعديل الحساب بنجاح";
         } 
      } else {
         $_SESSION['add-user'] = "حجم الصورة أكبر من 2 ميقا";
      } 
   }else {
      $_SESSION['edit-user'] = "فشل تعديل الحساب";      
   }
   
}
header('location: ' . ROOT . 'profil.php');
die();
