<?php
include 'conponent/header.php';
$query = "SELECT * FROM posts, wilay, users WHERE posts.user_id = users.id AND posts.wilay_id = wilay.w_id  ORDER BY posts.data_time DESC ";
$posts = mysqli_query($connection, $query);
?>
<section class="posts">
    <div class="container">
        <form class="serch-form" action="<?= ROOT ?>search.php" method="GET">
            <div>
                <i class="uil uil-search"></i>
                <input type="search" name="search" placeholder="ادخل موقع ،مدينة او حي">
            </div>
            <button type="submit" name="submit" class="btn">
                ابحث
            </button>
        </form>
        <ul class="switcher">
            <li class="active" data-cat=".type-all">الكل</li>
            <li data-cat=".type-rent">للكراء</li>
            <li data-cat=".type-buy">للبيع</li>
        </ul>
        <div class="posts-parent">
            <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
                <?php if ($post['type'] == "للبيع") : ?>
                    <div class="post  type-all type-buy">
                    <?php else : ?>
                        <div class="post  type-all type-rent">
                        <?php endif ?>
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
<script src="<?= ROOT ?>js/filter.js"></script>
<?php
include 'conponent/footer.php';
?>