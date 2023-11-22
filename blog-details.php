<?php
require_once "base/header.php";
require "dbconn.php";

$slug = $_GET['slug'];
if (strstr($slug, '.php')) {
  $rem_ext = explode('.', $slug);
  $slug    = $rem_ext[0];
}


$sql = "SELECT * FROM blog where slug=" . "'$slug'";
$result = mysqli_query($link, $sql);
$count  = mysqli_num_rows($result);

?>

<?php if ($count > 0): ?>

  <?php
  $row     = mysqli_fetch_assoc($result);
  $sql2    = "SELECT * FROM sub_blog where blog_id=" . $row['id'];
  $result2 = mysqli_query($link, $sql2);
  ?>

  <section class="section wow fadeInDown">
    <div class="swiper-wrapper text-center">
      <img src="<?php echo $baseURL ?>assets/images/blog/swiper.png" alt="swiper">
    </div>
  </section>

  <section class="section text-center">
    <div class="container-fluid bg-primary">
      <h1 class="wow fadeInDown title">Blog</h1>
    </div>
    <div class="blog-image mt-2 wow fadeInDown">
      <img src='<?php print($baseURL . "assets/images/blog/blog-images/" . $row['image']) ?>' alt='<?php print($row['image']) ?>'>
      <!-- style="width:1200px;height:500px;"  -->
    </div>

    <div class="blog-description mt-4 p-4">
      <h3 class="btn-primary wow fadeInDown"><b><?php print($row['title']) ?></b></h3>
      <h5 class="text-left mt-2 p-4 wow fadeInUp"><?php print($row['description']) ?></h5>

      <?php while ($row2 = mysqli_fetch_array($result2)): ?>
        <div class="sub-blog p-4">
          <h3 class="sub-blog-title wow fadeInDown"><b><?php print($row2['title']) ?></b></h3>
          <h5 class="text-left sub-blog-content wow fadeInUp normal-text">
            <img class="sub_blog_image" src="<?php print($baseURL . "assets/images/blog/sub-blog-images/" . $row2["image"]) ?>" alt=<?php print($row2["image"]) ?>>
            <?php print($row2['description']) ?>
          </h5>
        </div>
      <?php endwhile; ?>
    </div>
  </section>

  <section class="clear">
    <div class="row pl-4">
      <?php
      $keywords = explode(",", $row['keywords']);
      for ($i = 0; $i < count($keywords); $i++):
        ?>

        <div class="col-sm-4 col-4 col-lg-2">
          <h5 class="bg-primary mt-1"><?php print($keywords[$i]) ?></h5>
        </div>
      <?php endfor; ?>
    </div>
  </section>

  <section class="blog-divider">
  </section>

  <!-- latest blog -->
  <section class="section section-sm bg-default">
    <?php
    require "dbconn.php";
    $sql    = "SELECT LEFT(title, 100) as title,LEFT(description, 150) as description,image,slug,creator,creation_time FROM blog order by creation_time desc limit 4";
    $result = mysqli_query($link, $sql);
    ?>
    <div class="container">
      <h2>Latest blog posts</h2>
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

<?php else: ?>

  <?php print("<script>window.location = " . "'$baseURL" . "blog'" . "</script>") ?>

<?php endif; ?>

<?php require_once "base/footer.php" ?>
