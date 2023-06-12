<?php
require 'config/database.php';
if (isset($_GET['id'])) {
   $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
   // fetch post from database in order to delete thumbnial from images folder
   $query = "SELECT * FROM posts , images WHERE posts.post_id = images.post_id AND id=$id";
   $result = mysqli_query($connection, $query);
   // make sure only 1 record/post ws fetched
   if (mysqli_num_rows($result) == 1); {
      $post = mysqli_fetch_assoc($result);
      $image_name = $post['imageName'];
      $image_path = 'images/' . $image_name;
      if ($image_path) {
         unlink($image_path);
         // delete post from database
         $delete_post_query = "DELETE FROM posts WHERE posts.post_id=$id LIMIT 1";
         $delete_post_result = mysqli_query($connection, $delete_post_query);
         if (!mysqli_errno($connection)) {
            $_SESSION['delete-post-success'] = "تم حذف المنشور بنجاح";
         }
      }
   }
}
header('location: ' . ROOT . 'profil.php');
