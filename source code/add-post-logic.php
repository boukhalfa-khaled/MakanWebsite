<?php
require 'config/database.php';
// get signup form data if submit button was clicked
if (isset($_POST['submit'])) {
   // ASSIGN the inputs Here  AND SANITIZE THEM TO AVOID ANY SQL INJECTION
   $user_id = $_SESSION['user-id'];
   $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $wilay = filter_var($_POST['wilaya'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $type = filter_var($_POST['type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $price = filter_var($_POST['price'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
   $images = $_FILES['files'] ;
   // validate Inputs
   if (!$title) {
   $_SESSION['add-post'] = "يرجى ملئ جميع الحقول";
   } elseif (!$wilay) {
   $_SESSION['add-post'] = "يرجى ملئ جميع الحقول";
   } elseif (!$body) {
   $_SESSION['add-post'] = "يرجى ملئ جميع الحقول";
   } elseif (!$type) {
   $_SESSION['add-post'] = "يرجى ملئ جميع الحقول";
   } elseif (!$price) {
   $_SESSION['add-post'] = "يرجى ملئ جميع الحقول";
   } elseif (!$images) {
   $_SESSION['add-post'] = "يرجى ملئ جميع الحقول";
   } else {
      // REDIRECT back (with form data) to add-pst page if there is any problem
      if (isset($_SESSION['add-post'])) {
         $_SESSION['add-post-data'] = $_POST;
         header('location: ' . ROOT . 'add-post.php');
         die();
      } else {
         // insert post into database
         $query = "INSERT INTO posts (title, body, price, wilay_id, user_id, type )
   VALUES ('$title', '$body', '$price', $wilay, $user_id, '$type') ";
         $result = mysqli_query($connection, $query);
         // Get tha current post id 
         $curPostId = $connection->insert_id;
         // INsert Images into database images table
         foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
            $file_name = $key . $_FILES['files']['name'][$key];
            $file_size = $_FILES['files']['size'][$key];
            $file_tmp = $_FILES['files']['tmp_name'][$key];
            $file_type = $_FILES['files']['type'][$key];
            // make each imgae name unique with time function
            $time = time(); 
            $thumbnail_name = $time . $file_name;
            $thumbnail_tmp_name = $file_tmp;
            $thumbnail_destination_path = 'images/' . $thumbnail_name;
            move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
            $imageQuery = "INSERT into images (`post_id`,`imageName`) VALUES($curPostId,'$thumbnail_name'); ";
            $imageResult = mysqli_query($connection, $imageQuery);
            if (mysqli_errno($connection)) {
               $_SESSION['add-post'] = "حدثت مشكلة اثناء اضافة المنشور";
               header('location: ' . ROOT);
               die();
            }
         }
         if (!mysqli_errno($connection)) {
            $_SESSION['add-post-success'] = "تم اضافة منشور جديد";
            header('location: ' . ROOT . 'profil.php');
            die();
         }
      }
   }
} else {
// if button wasn't clicked, bounce back to signup page
header('location: ' . ROOT . 'signup.php');
die();
}

