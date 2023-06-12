<?php
include 'conponent/header.php';
?>
<section class="landing">
    <div class="container">
        <h3>
            ابحث عن منزلك الجديد!
        </h3>
        <form class="serch-form" action="<?= ROOT ?>search.php" method="GET">
            <div>
                <i class="uil uil-search"></i>
                <input type="search" name="search" placeholder="ادخل موقع ،مدينة او حي">
            </div>
            <button type="submit" name="submit" class="btn">
                ابحث
            </button>
        </form>
        <p>
            تريد كراء/بيع منزلك؟
            <a href="login.html">
                سجل هنا
            </a>
        </p>
    </div>
</section>
<section class="services">
    <div class="container">
        <div class="heading">
            <div class="logo">مكان</div>
            <h2>ما يوفره</h2>
        </div>
        <div class="content">
            <a href="posts.php">
                <div class="card">
                    <div class="icon">
                        <i class="uil uil-key-skeleton-alt"></i>
                    </div>
                    <h3>تصفح المنازل</h3>
                    <p>
                        عبر
                        <span>
                            مكان
                        </span>
                        يمكنك العثور على منزل للكراء و الشراء بطريقة اسهل ابدأ التصفح الآن
                    </p>
                </div>
            </a>
            <a href="add-post.php">
                <div class="card">
                    <div class="icon">
                        <i class="uil uil-building"></i>
                    </div>
                    <h3>تصفح المنازل</h3>
                    <p>
                        عبر
                        <span>
                            مكان
                        </span>
                        يمكنك العثور على منزل للكراء و الشراء بطريقة اسهل ابدأ التصفح الآن
                    </p>
                </div>
            </a>
            <a href="add-post.php">
                <div class="card">
                    <div class="icon">
                        <i class="uil uil-house-user"></i>
                    </div>
                    <h3>تصفح المنازل</h3>
                    <p>
                        عبر
                        <span>
                            مكان
                        </span>
                        يمكنك العثور على منزل للكراء و الشراء بطريقة اسهل ابدأ التصفح الآن
                    </p>
                </div>
            </a>

        </div>
    </div>
</section>
<!-- background -->
<script src="<?= ROOT ?>js/backgroun.js"></script>
<?php
include 'conponent/footer.php';
?>