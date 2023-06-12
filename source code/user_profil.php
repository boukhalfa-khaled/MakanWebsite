<?php
include 'conponent/header.php';
if ($_SESSION['user-id'] == $_GET['id']) {
   header('location: ' . ROOT . 'profil.php');
}
// fetch current user from database
if (isset($_GET['id'])) {
   $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
   $query = "SELECT * FROM users WHERE id=$id";
   $result = mysqli_query($connection, $query);
   $user = mysqli_fetch_assoc($result);
   $post_query = "SELECT * FROM posts, wilay, users WHERE posts.user_id = users.id AND posts.wilay_id = wilay.w_id AND users.id = $id ORDER BY posts.data_time DESC;";
   $posts = mysqli_query($connection, $post_query);
}
?>
<div class="profil_section">
   <div class="container">
      <div class="content">
         <?php if (isset($_SESSION['edit-user-success'])) : ?>
            <div class="message success">
               <?= $_SESSION['edit-user-success'];
               unset($_SESSION['edit-user-success'])
               ?>
            </div>
         <?php elseif (isset($_SESSION['edit-user'])) : ?>
            <div class="message error">
               <?= $_SESSION['edit-user'];
               unset($_SESSION['edit-user'])
               ?>
            </div>
         <?php endif ?>
         <div class="avatar">
            <img src="<?= ROOT . 'images/' . $user['avatar'] ?>">
         </div>
         <small>@<?= $user['username'] ?></small>
         <h3><?= $user['name'] ?></h3>
         <p>رقم الهاتف: <?= $user['phone'] ?></p>
      </div>
   </div>
</div>
<section class="posts">
   <div class="container">
      <div class="posts-parent">
         <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
            <div class="post  type-all type-rent">
               <div class="post-header">
                  <div class="type ">
                     <?= $post['type'] ?>
                  </div>
                  <div class="post_author">
                     <div class="post_author-info">
                        <h5>
                           <?= $post['name'] ?>
                        </h5>
                        <small><?= date("H:i - d M, y", strtotime($post['data_time'])) ?></small>
                     </div>
                        <a href="<?= ROOT ?>user_profil.php?id=<?= $post['user_id'] ?>">
                           <div class="avatar">
                              <img src="./images/<?= $post['avatar'] ?>" alt="">
                           </div>
                        </a>
                  </div>
               </div>
               <div class="images">
                  <?php
                  // fetch author from users table using author_id Emax editor  P5tutorial
                  $post_id = $post['post_id'];
                  $imageQuery = "SELECT * FROM `images` WHERE $post_id  = images.post_id LIMIT 1";
                  $image_result = mysqli_query($connection, $imageQuery);
                  $image = mysqli_fetch_assoc($image_result);
                  ?>
                  <img src="<?= ROOT ?>images/<?= $image['imageName'] ?>" alt="">
               </div>
               <a href="<?= ROOT ?>singl-post.php?id=<?= $post['post_id'] ?>" class="title">
                  <div>
                     <?php if (strlen($post['title']) >= 50) : ?>
                        <?= substr($post['title'], 0, 40) ?> ...
                     <?php else : ?>
                        <?= $post['title'] ?>
                     <?php endif ?>
                  </div>
               </a>
               <div class="description">
                  <?php if (strlen($post['body']) >= 200) : ?>
                     <?= substr($post['body'], 0, 150) ?> ...
                  <?php else : ?>
                     <?= $post['body'] ?>
                  <?php endif ?>
               </div>
               <div class="post_footer">
                  <div class="price">
                     <?= $post['price']  ?>
                     دج
                  </div>
                  <div class="wilay">
                     <?= $post['wilayName']  ?>
                  </div>
               </div>
            </div>
         <?php endwhile ?>
      </div>
   </div>
   </div>
</section>
<?php
include 'conponent/footer.php';
?>