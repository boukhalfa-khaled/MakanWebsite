<?php
include 'conponent/header.php';
$username = $_SESSION['signin-data']['username'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;
unset($_SESSION['signin-data']);
?>
<section class="signup-section" style="padding-top: 20vh;">
    <div class="container sing-in">
        <h2>
            تسجيل الدخول
        </h2>
        <div class="everything">
            <?php if (isset($_SESSION['signup-success'])) : ?>
                <div class="message success">
                    <?= $_SESSION['signup-success'];
                    unset($_SESSION['signup-success'])
                    ?>
                </div>
            <?php elseif (isset($_SESSION['signin'])) : ?>
                <div class="message error">
                    <?= $_SESSION['signin'];
                    unset($_SESSION['signin'])
                    ?>
                </div>
            <?php endif ?>
            <form action="<?= ROOT ?>signin-logic.php" method="POST" >
                <div class="form-inputs">
                    <input type="text" name="id" hidden>
                    <label for="username">
                        اسم المستخدم
                    </label>
                    <input type="text" required placeholder="ادخل اسم المستخدم" name="username" value="<?= $username ?>" minlength="3" maxlength="20">
                    <label for="password">
                        كلمة السر
                    </label>
                    <input type="password" required placeholder="ادخل كلمة السر" name="password" value="<?= $password ?>" minlength="8">
                </div>
                <input class="btn" type="submit" name="submit" value="تسجيل الدخول" />
                <small>
                    ليس لديك حساب؟
                    <a href="signup.php">
                        انشىء حساب من هنا
                    </a>
                </small>
            </form>
        </div>
    </div>
</section>
<?php
include 'conponent/footer.php'
?>