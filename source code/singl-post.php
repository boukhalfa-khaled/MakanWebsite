<?php
include 'conponent/header.php';
// fech post from database if id is isset
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts, wilay, users WHERE posts.user_id = users.id AND posts.wilay_id = wilay.w_id  AND posts.post_id=$id LIMIT 1";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
    // fetch author from users table using author_id 
    $post_id = $post['post_id'];
    $imageQuery = "SELECT * FROM `images` WHERE $id  = images.post_id ";
    $image_result = mysqli_query($connection, $imageQuery);
} else {
    header('location: ' . ROOT . 'posts.php');
    die();
}
?>
<section class="posts">
    <div class="container">
        <div class="single-post">
            <div class="post-header">
                <div class="type">
                    <?= $post['type'] ?>
                </div>
                <div class="post_author">
                    <div class="post_author-info">
                        <h5>
                            <?= $post['name'] ?>
                        </h5>
                        <small><?= date("H:i - d M, y", strtotime($post['data_time'])) ?></small>
                    </div>
                    <div class="avatar">
                        <a href="<?= ROOT ?>user_profil.php?id=<?= $post['user_id'] ?>">
                            <img src="./images/<?= $post['avatar'] ?>" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="images">
                <div class="one">
                    <div class="slide-container">
                        <div id="slide-number" class="slide-number"></div>

                        <?php while ($image = mysqli_fetch_assoc($image_result)) : ?>
                            <img src="<?= ROOT ?>images/<?= $image['imageName'] ?>" alt="">
                        <?php endwhile ?>

                        <div class="slider-controls">
                            <span id="prev" class="prev">&rArr; </span>
                            <span id="next" class="next">&lArr;</span>
                        </div>
                        <span class="indicators" id="indicators"></span>
                    </div>
                </div>
            </div>
            <div class="title">
                <?= $post['title'] ?>
            </div>
            <div class="description">
                <?= $post['body'] ?>
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
    </div>
    </div>
</section>
<script src="<?= ROOT ?>js/slider.js"></script>
<?php
include 'conponent/footer.php';

?>