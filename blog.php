<?php require_once "base/header.php" ?>

<section class="section wow fadeInDown">
  <div class="swiper-wrapper text-center">
    <img src="<?php echo $baseURL ?>assets/images/blog/swiper.png" alt="swiper">
  </div>
</section>

<section class="section section-sm bg-default">
  <?php
  require "dbconn.php";
  $sql    = "SELECT LEFT(title, 100) as title,LEFT(description, 150) as description,image,slug,creator,creation_time FROM blog order by creation_time desc";
  $result = mysqli_query($link, $sql);
  ?>
  <div class="container">
    <h1 class="title">Latest blog posts</h1>
    <div class="row">
      <?php while ($row = mysqli_fetch_array($result)): ?>
        <div class="col-lg-4 col-6 blog-card">
          <article class="post post-modern">

            <a class="post-modern-figure" href="<?php echo $baseURL ?>blog/<?php print($row['slug']) ?>">
              <img src="<?php print($baseURL . "assets/images/blog/blog-images/" . $row['image']); ?>" class="blog-preview-image" alt="<?php print($row['image']) ?>" />
              
              <?php if (FALSE): ?>
                <div class="post-modern-time">
                  <?php print date('d-m-Y', strtotime($row['creation_time'])) ?>
                </div>
              <?php endif; ?>
              
            </a>

            <h4 class="post-modern-title text-center">
              <a href="<?php echo $baseURL ?>blog/<?php print($row['slug']) ?>"><?php print($row['title']) ?></a>
            </h4>

            <p class="post-modern-text"><?php print($row['description']) ?>...</p><br>
          </article>
          <div class="creator">
            <p class="text-dark f-right"><?php print(ucwords($row['creator'])) ?></p>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>

<?php require_once "base/footer.php" ?>