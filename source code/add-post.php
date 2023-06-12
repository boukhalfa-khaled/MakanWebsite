<?php
include 'conponent/header.php';
// check login status
if (!isset($_SESSION['user-id'])) {
   header('location: ' . ROOT . 'signin.php');
} 
?>
<section class="add-post  signup-section">
   <div class="container sing-in">
      <h2>
         انشاء منشور
      </h2>
      <div class="everything">
         <form action="<?= ROOT ?>add-post-logic.php" method="POST" enctype="multipart/form-data">
            <div class="form-inputs">
               <input type="hidden" name="user_id" value="">
               <label for="title">
                  العنوان
               </label>
               <input class="input-f" type="text" required placeholder="اعط عنوان للمنشور" name="title" autofocus minlength="5" maxlength="50">
               <div id="select">
                  <div>
                     <label for="sellOrRent">نوع المعاملة</label>
                     <select class="one" id="sellORrent" name="type">
                        <option value="للكراء">كراء</option>
                        <option value="للبيع">بيع</option>
                     </select>
                  </div>
                  <div>
                     <label for="wilaya">الولاية</label>
                     <select class="one" id="wilaya" name="wilaya">
                        <option value="1">الجلفة</option>
                        <option value="2">وهران</option>
                        <option value="3">الجزائر</option>
                        <option value="4">بومرداس</option>
                     </select>
                  </div>
               </div>
               <label for="price">
                  السعر
               </label>
               <input type="number" required placeholder="السعر" name="price" minlength="1">
               <div><label for="description">الوصف</label></div>
               <div id="desc">
                  <textarea name="body" id="description" placeholder="اكتب شيئا ..."></textarea>
               </div>
               <div class="uploadimages-pick">
                  <output class="uploadimages" id="result">
                  </output>
                  <div class="uploadimages-btn custom-input-file">
                     اضف صور
                     <input type="file" name="files[]" id="files" multiple accept="image/jpeg, image/png, image/jpg">
                  </div>
               </div>
            </div>
            <input class="btn" type="submit" name="submit" value="انشاء منشور" />
         </form>
      </div>
   </div>
</section>
<script src="<?= ROOT ?>js/form3.js"></script>
<?php
include 'conponent/footer.php';
?>