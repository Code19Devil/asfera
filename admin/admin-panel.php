<!DOCTYPE html>

<?php
  $baseURL=(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http').'://'.$_SERVER['SERVER_NAME'].'/';
?>

<?php
session_start();
if (isset($_SESSION['login_pass'])) {
} else {
  header("Location:".$baseURL."admin/login.php");
}
?>

<html lang="en" class="wide wow-animation">

  <head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="<?php echo $baseURL ?>assets/images/global/asfera_logo.png">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL ?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL ?>assets/css/custom_style.css">
  </head>

  <body>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container"><span></span><span></span><span></span><span></span>
        </div>
      </div>
    </div>
    <div class="page">
      <div>
        <header class="section page-header">
          <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
              data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px"
              data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
              <div class="rd-navbar-main-outer">
                <div class="rd-navbar-main">
                  <div class="rd-navbar-panel">
                    <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                    <div class="rd-navbar-brand"><a class="brand" href="#"><img src="<?php echo $baseURL ?>assets/images/global/asfera_logo.png" alt="asfera-technologies-logo" /></a></div>
                  </div>
                  <div class="rd-navbar-main-element">
                    <div class="rd-navbar-nav-wrap">
                      <ul class="rd-navbar-nav">
                        <li class="rd-nav-item active"><a class="rd-nav-link" href="<?php echo $baseURL ?>admin/admin-panel">Home</a></li>
                        <li class="rd-nav-item dropdown">
                          <a class="rd-nav-link dropdown-toggle" href="<?php echo $baseURL ?>admin/add-meta" aria-haspopup="true" aria-expanded="false">Meta</a>
                          <div class="dropdown-menu row" aria-labelledby="solutions">
                            <a class="dropdown-item" href="<?php echo $baseURL ?>admin/add-meta">Add Meta (New Page)</a>
                            <a class="dropdown-item" href="<?php echo $baseURL ?>admin/update-meta">Update Meta (Existed Page)</a>
                          </div>
                        </li>
                        <li class="rd-nav-item dropdown">
                          <a class="rd-nav-link dropdown-toggle" href="<?php echo $baseURL ?>admin/add-blog" aria-haspopup="true" aria-expanded="false">Blog</a>
                          <div class="dropdown-menu row" aria-labelledby="solutions">
                            <a class="dropdown-item" href="<?php echo $baseURL ?>admin/add-blog">Add Blog (New Blog)</a>
                            <a class="dropdown-item" href="<?php echo $baseURL ?>admin/update-blog">Update Blog (Existed Blog)</a>
                          </div>
                        </li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="<?php echo $baseURL ?>admin/logout">Logout</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </nav>
          </div>
        </header>

        <section class="section wow fadeInDown">
          <div class="swiper-wrapper text-center">
            <img src="<?php echo $baseURL ?>assets/images/admin/swiper.png" alt="swiper">
          </div>
        </section>

        <section class="section section-fluid bg-default">
          <h2 class="text-center bg-primary">Welcome Admin </h2>
          <div class="container mt-4 mb-4">
            <div class="row justify-content-end text-center">
              <div class="col-sm-12 col-12 m-auto ">
                <h3 class="text-primary">For administration purpose only </h3>
                <h4 class="normal-text">Here you can add Meta tags for pages, Create Blogs, View Messages</h4>
                <h3 class="mt-4 bg-primary mb-4">Contact Messages</h3>
                <table class="show-data">
                  <tr class="bg-primary">
                    <th>ID</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Message</th>
                  </tr>

                  <?php
                    require "dbconn.php";
                    $sql="SELECT * FROM contacts";
                    $result= mysqli_query($link, $sql);
                  ?>

                  <?php  while($row=mysqli_fetch_array($result)): ?>

                  <tr>
                    <td><?php print($row['id']) ?></td>
                    <td><?php print($row['contacted_on']) ?></td>
                    <td><?php print($row['name']) ?></td>
                    <td><?php print($row['phone']) ?></td>
                    <td> <a href="mailto:<?php print($row['email']) ?>">
                        <?php print($row['email']) ?>
                      </a>
                    </td>
                    <td class="message"><?php print($row['message']) ?></td>
                  </tr>

                <?php endwhile;mysqli_close($link); ?>

                </table>
              </div>

              <div class="col-sm-12 col-12 m-auto">
                <h3 class="mt-4 bg-primary mb-4">Blogs</h3>
                <div class="row">
                  <div class="col-sm-12 col-12">
                    <table class="show-data">
                      <tr class="bg-primary">
                        <th>ID</th>
                        <!-- <th>Image</th> -->
                        <th>Slug</th>
                        <th>Title</th>
                        <th>Creator</th>
                        <th>Creation Time</th>
                        <th>Sub Blogs</th>
                      </tr>

                          <?php
                            require "dbconn.php";
                            $sql="SELECT id,slug,title,creator,creation_time FROM blog";
                            $result= mysqli_query($link, $sql);
                          ?>

                          <?php  while($row=mysqli_fetch_array($result)): ?>
                      <tr>
                        <td class="text-left"><?php print($row['id']) ?></td>
                        <td class="text-left"><?php print($row['slug']) ?></td>
                        <td class="text-left"><?php print($row['title']) ?></td>
                        <td class="text-left"><?php print($row['creator']) ?></td>
                        <td class="text-left"><?php print($row['creation_time']) ?></td>

                        <?php
                          $sb_sql="SELECT title FROM sub_blog Where blog_id =".$row['id'];
                          $sb_result= mysqli_query($link, $sb_sql);
                        ?>
                        <td >
                          <ol>
                        <?php  while($sb_row=mysqli_fetch_array($sb_result)): ?>
                          <p class="text-left"> :- <?php print($sb_row['title']) ?></p>
                        <?php endwhile; ?>
                      </ol>
                        </td>

                      </tr>
                    <?php endwhile;mysqli_close($link); ?>

                    </table>
                  </div>
                </div>

              </div>

            </div>
          </div>
        </section>


        <footer class="section section-fluid footer-minimal context-dark wow fadeInUp">
          <div class="bg-gray-15">
            <div class="container-fluid">
              <div class="col-lg-12 col-12" id="footer_new">
              </div>
              <div class="footer-minimal-bottom-panel text-sm-center">
                <p><span>All rights reserved.</span> <span>Design&nbsp;by&nbsp;<a href="<?php echo $baseURL ?>">Asfera Technologies</a></span>
                </p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>

    <script src="<?php echo $baseURL ?>assets/js/core.min.js"></script>
    <script src="<?php echo $baseURL ?>assets/js/script.js"></script>
  </body>

</html>
