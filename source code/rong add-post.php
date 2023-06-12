<?php
require 'config/database.php';

// check login status
if (!isset($_SESSION['user-id'])) {
  header('location: ' . ROOT . 'signin.php');
}
?>

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?= ROOT ?>css/Form3.css" />
  <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
  <title>Document</title>
</head>

<body>
  <div class="everything">
    <div id="title">انشاء منشور</div>
    <form class="form" action="" method="post">

      <div>

        <div id="labels">

          <div>
            <div><label for="title1">العنوان</label></div>
            <input class="input-f" id="title1" type="text" required placeholder="اعط عنوان للمنشور" name="title1" minlength="3" maxlength="20" />
          </div>
          <div id="select">
            <div>
              <label for="sellOrRent">نوع المعاملة</label>
              <select class="one" id="sellORrent" name="sellORrent">
                <option value="rent">كراء</option>
                <option value="sell">بيع</option>
              </select>
            </div>
            <div>
              <label for="wilaya">الولاية</label>
              <select class="one" id="wilaya" name="wilaya">
                <option value="volvo">الجلفة</option>
                <option value="saab">وهران</option>
                <option value="fiat">الجزائر</option>
                <option value="audi">بومرداس</option>
              </select>
            </div>
          </div>
          <div>
            <div><label for="phoneN">رقم الهاتف</label></div>
            <input class="input-f" id="phoneN" type="password" required placeholder="ادخل رقم هاتفك" name="phoneN" minlength="8" />
          </div>
          <div>
            <div><label for="price">السعر</label></div>
            <input class="input-f" id="price" type="password" required placeholder="السعر" name="price" minlength="8" />
          </div>
        </div>
        <div>
          <div><label for="description">الوصف</label></div>
          <div id="desc">
            <textarea name="الوصف" id="description" placeholder="اكتب شيئا ..."></textarea>
          </div>
        </div>
        <div>
          <!--<label for="box">حمل صورة</label>
             <div id="box">
              <label id="seclabel" for="imageInput" onchange="preview()"
                >اضغط لرفع الصورة<iconify-icon
                  id="upIcon"
                  icon="typcn:cloud-storage"
                ></iconify-icon
              ></label>
              <input type="file" id="imageInput" />
              <p id="imagesChosen">لم تختر اي صورة بعد</p>
              <div id="images"></div>
            </div> -->
          <div class="avatar-pick">
            <output class="avatar" id="result">


            </output>

            <div class="custom-input-file">
              اضف صور
              <iconify-icon id="upIcon" icon="typcn:cloud-storage"></iconify-icon>
              <input type="file" id="files" multiple accept="image/jpeg, image/png, image/jpg">
            </div>
          </div>
        </div>
        <div id="creatD">
          <input id="creat" type="submit" value="انشاء" />
        </div>
      </div>
    </form>
  </div>
  <script src="<?= ROOT ?>js/form3.js"></script>
</body>

</html>