<?php
include 'conponent/header.php';
// check login status
if (!isset($_SESSION['user-id'])) {
    header('location: ' . ROOT . 'signin.php');
}
// fetch current user from database
elseif (isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
}
?>
<section class="signup-section">
    <div class="container">
        <h2>
            تعديل معلومات الحساب
        </h2>
        <div class="everything">
                
            <form action="<?= ROOT ?>updateprofil-logic.php" method="post" enctype="multipart/form-data">
                <div class="avatar-pick">
                    <output class="avatar" id="result">
                        <img src="<?= ROOT . 'images/' . $user['avatar'] ?>">
                    </output>
                    <div class="custom-input-file">
                        اختر صورة شخصبة
                        <input type="file" name="avatar" required id="files" accept="image/jpeg, image/png, image/jpg">
                    </div>
                </div>
                <div class="form-inputs">
                    <input type="hidden" value="<?= $user['id'] ?>" name="id">
                    <label for="theName">
                        الاسم
                    </label>
                    <input class="input-f" type="text" required placeholder="ادخل الاسم الاول" value="<?= $user['name'] ?>" name="name" autofocus maxlength="20">
                    <label for="phone">
                        رقم الهاتف
                    </label>
                    <input type="text" required placeholder="ادخل رقم هاتفك" value="<?= $user['phone'] ?>" name="phone">
                    <label for="password">
                        كلمة لسر القديمة
                    </label>
                    <input type="password" required placeholder="ادخل كلمة السر القديمة" name="old_password" minlength="8">
                    <label for="password">
                        كلمة السر الجديد
                    </label>
                    <input type="password" required placeholder="تذكر كلمة السر جيدا" name="new_password" minlength="8">
                </div>
                <input class="btn" type="submit" name="submit" value="تعديل الحساب" />
            </form>
        </div>
    </div>
</section>
<script src="<?= ROOT ?>js/uploadAvatar.js"></script>
<?php
include 'conponent/footer.php';
?>