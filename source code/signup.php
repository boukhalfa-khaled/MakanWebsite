<?php
include 'conponent/header.php';
// get back form data if there was an error
$name = $_SESSION['add-user-data']['theName'] ?? null;
$username = $_SESSION['add-user-data']['username'] ?? null;
$Phone = $_SESSION['add-user-data']['phone'] ?? null;
$password = $_SESSION['add-user-data']['password'] ?? null;
// delete session data
unset($_SESSION['add-user-data']);
?>
<section class="signup-section">
    <div class="container">
        <h2>
            انشاء حساب جديد
        </h2>
        <div class="everything">
            <?php if (isset($_SESSION['add-user'])) : ?>
                <div class="message error">
                    <?= $_SESSION['add-user'];
                    unset($_SESSION['add-user']); ?>
                </div>
            <?php endif ?>
            <form action="<?= ROOT ?>add-user-logic.php" method="POST" enctype="multipart/form-data">
                <div class="avatar-pick">
                    <output class="avatar" id="result">
                    </output>
                    <div class="custom-input-file">
                        اختر صورة شخصبة
                        <input type="file" name="avatar" id="files"  accept="image/jpeg, image/png, image/jpg">
                    </div>
                </div>
                <div class="form-inputs">
                    <label for="theName">
                        الاسم
                    </label>
                    <input class="input-f" type="text" required placeholder="ادخل الاسم الاول" name="theName" value="<?= $name ?>" autofocus maxlength="20">
                    <label for="username">
                        اسم المستخدم
                    </label>
                    <input type="text" required placeholder="اختر اسم المستخدم" name="username" value="<?= $username ?>" minlength="3" maxlength="20">
                    <label for="phone">
                        رقم الهاتف
                    </label>
                    <input type="text" required placeholder="ادخل رقم هاتفك" name="phone" value="<?= $Phone ?>">
                    <label for="password">
                        كلمة السر
                    </label>
                    <input type="password" required placeholder="تذكر كلمة السر جيدا" name="password" value="<?= $password ?>" minlength="8">
                </div>
                <input class="btn" name="submit" type="submit" value="انشاء حساب" />
                <small>
                    تملك حساب؟
                    <a href="signin.php">
                        سجل دخولك من هنا
                    </a>
                </small>
            </form>
        </div>
    </div>
    </sectionl>
    <script src="<?= ROOT ?>js/uploadAvatar.js"></script>
    <?php
    include 'conponent/footer.php';
    ?>