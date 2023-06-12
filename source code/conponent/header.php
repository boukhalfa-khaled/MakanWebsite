<?php
require 'config/database.php';

// fetch current user from database
if (isset($_SESSION['user-id'])) {
   $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
   $query = "SELECT avatar FROM users WHERE id=$id";
   $result = mysqli_query($connection, $query);
   $avatar = mysqli_fetch_assoc($result);
}
?>




<!DOCTYPE html>
<html lang="ar">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>مكان</title>
   <!-- icon -->
   <link rel="icon" href="<?= ROOT ?>assets/house-icon-200.png" type="image/icon type">

   <!-- main css file -->
   <link rel="stylesheet" href="<?= ROOT ?>css/styleformated.css">
   <!-- google font-library -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800;900&family=Lemonada:wght@300;400;500;600;700&display=swap" rel="stylesheet">

   <!-- ICONSCOUT CDN -->
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">




   <!-- transition -->
   <link rel="stylesheet" href="<?= ROOT ?>css/transition.css">
   <script src="<?= ROOT ?>js/transition.js" defer></script>
</head>

<body>
   <div class="transition transition-1 is-active"></div>

   <nav>
      <div class="container">

         <div class="left">

            <!--  -->
            <button id="open_aside-btn"><i id="open_aside-btn" class="uil uil-bars"></i></button>





            <?php if (isset($_SESSION['user-id'])) : ?>
               <a href="profil.php">
                  <div class="avatar">
                     <img src="<?= ROOT . 'images/' . $avatar['avatar'] ?>">
                  </div>
               </a>
               <a href="<?= ROOT ?>logout.php">
                  <button class="search-icon "><i class="uil uil-signout"></i></button>
               </a>
            <?php else : ?>
               <div class="sign-in-btn ">
                  <a href="signin.php">
                     <span>
                        تسجيل الدخول
                     </span>
                     <i class="uil uil-user-plus"></i>
                  </a>
               </div>
            <?php endif ?>








            <button id="theme-chose"><i class="uil uil-setting"></i>
               <div class="theme">
                  <ul class="theme-select">
                     <li class="active" data-color="#1663bd" data-hover="#2386C8"></li>
                     <li data-color="#FF6E31" data-hover="#EF9A53"></li>
                     <li data-color="#1A4D2E" data-hover="#367E18"></li>
                     <li data-color="#222" data-hover="#444"></li>
                  </ul>
            </button>




         </div>
         <div class="right">
            <ul>
               <a href="<?= ROOT ?>posts.php">
                  <li>تصفح المنازل</li>
               </a>
               <a href="<?= ROOT ?>add-post.php">
                  <li>ضع منزلك للكراء</li>
               </a>
               <a href="<?= ROOT ?>add-post.php">
                  <li>ضع منزلك للبيع</li>
               </a>
            </ul>
            <a href="<?= ROOT ?>">
               <div class="logo">مكان</div>
            </a>
         </div>
      </div>
   </nav>
   <aside id="aside" class="aside">

   
      <ul>
         <a href="posts.php">
            <li>
               تصفح المنازل
            </li>
         </a>
         <a href="add-post.php">
            <li>
               ضع منزلك للكراء
            </li>
         </a>
         <a href="add-post.php">
            <li>
               ضع منزلك للبيع
            </li>
         </a>
         <?php if (isset($_SESSION['user-id'])) : ?>
            <a href="<?= ROOT ?>profil.php">
               <li>
                  لصفحة الشخصية
               </li>
            </a>
            <a href="<?= ROOT ?>logout.php">
               <li>
                  تسجبل الخروج
               </li>
            </a>

         <?php else : ?>
            <div class="nosignin">
               <a href="signin.php">
                  <li>
                     تسجيل الدخول
                  </li>
               </a>
               <a href="signup.php">
                  <li>
                     انشاء حساب جديد
                  </li>
               </a>
            </div>
         <?php endif ?>
      </ul>
   </aside>
   <!-- end of the header -->