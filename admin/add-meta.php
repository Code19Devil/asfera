<?php
$baseURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http') . '://' . $_SERVER['SERVER_NAME'] . '/';
?>

<?php
session_start();
if (!isset($_SESSION['login_pass'])) {
  header("Location:" . $baseURL . "admin/login.php");
}
?>

<?php require "dbconn.php"; ?>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>

  <?php

  // checking for page
  $message = '';

  if (empty(mysqli_real_escape_string($link, $_POST['new_page']))) {
    $message = "Error : Please Fill The Page Info";
  }
  // getting other fields
  $page = mysqli_real_escape_string($link, $_POST['new_page']);
  $ext  = pathinfo($page, PATHINFO_EXTENSION);

  if ($ext != 'php') {
    $page .= ".php";
  }

  if ($message == '') {
    $title          = mysqli_real_escape_string($link, $_POST['title']);
    $m_description  = mysqli_real_escape_string($link, $_POST['m_description']);
    $m_keywords     = mysqli_real_escape_string($link, $_POST['m_keywords']);
    $robots         = mysqli_real_escape_string($link, $_POST['robots']);
    $og_title       = mysqli_real_escape_string($link, $_POST['og_title']);
    $og_description = mysqli_real_escape_string($link, $_POST['og_description']);
    $og_image       = mysqli_real_escape_string($link, $_POST['og_image']);
    $og_type        = mysqli_real_escape_string($link, $_POST['og_type']);

    $sql = "INSERT INTO seo (`page`,`title`,`m_description`,`m_keywords`,`robots`,`og_title`,`og_description`,`og_image`,`og_type`)
            VALUES('$page','$title','$m_description','$m_keywords','$robots','$og_title','$og_description','$og_image','$og_type')";


    if (mysqli_query($link, $sql)) {
      $message = "Success : Meta Has Been Added";
    }
    else {
      $message = "Error : Something went wrong while handling Database";
    }
    print("<script>alert('$message');window.location.href ='add-meta.php';</script>");
  }
  else {
    print("<script>alert('$message');window.location.href ='add-meta.php';</script>");
  }
  ?>

  <?php mysqli_close($link);
else: ?>

  <!DOCTYPE html>

  <html lang="en" class="wide wow-animation">

    <head>
      <title>Add Meta</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
      <link rel="icon" type="image/x-icon" href="<?php echo $baseURL ?>assets/images/global/asfera_logo.png">
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
              <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
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

          <body>

            <h2 class="text-center bg-theme">Add Meta Tags</h2>
            <section class="mt-4 mb-4">
              <div class="row justify-content-end text-center">
                <div class="col-11 col-lg-11 m-auto p-4 border-1s">
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <h3 align="center" class="mt-4">Add Page (Add Pages Who Were Newly Created)</h3>

                    <!-- new page  -->
                    <div class="row mt-4">
                      <label for="new_page" align="left">Page Name (Include File Path Excluding Domain Name And Extension)</label>
                      <input type="text" name="new_page" id="new_page" placeholder="Example :  www.asfera.in/xyx.php => /xyx  or  www.asfera.in/abc/xyz.php => /abc/xyz" class="form-control">
                    </div>

                    <h3 align="center" class="mt-4">Website Meta tags</h3>

                    <!-- title   -->
                    <div class="row mt-4" align="left">
                      <label for="title">Title</label>
                      <textarea id="title" name="title" class="form-control" rows="1" cols="10"></textarea>
                    </div>

                    <!-- description -->
                    <div class="row mt-4" align="left">
                      <label for="m_description">Meta Description</label>
                      <textarea id="m_description" name="m_description" class="form-control" rows="1" cols="10"></textarea>
                    </div>

                    <!-- keywords -->
                    <div class="row mt-4" align="left">
                      <label for="m_keywords">Meta Keywords</label>
                      <textarea id="m_keywords" name="m_keywords" class="form-control" rows="1" cols="10"></textarea>
                    </div>

                    <!-- robots -->
                    <div class="row mt-4" align="left">
                      <label for="robots">Robots</label>
                      <select class="form-control" id="robots" name="robots">
                        <option value="nofollow,noindex">No Follow , No Index</option>
                        <option value="follow,noindex">Follow , No Index</option>
                        <option value="nofollow,index">No Follow , Index</option>
                        <option value="follow,index">Follow , Index</option>
                      </select>
                    </div>

                    <h3 align="center" class="mt-4">OG Tags</h3>

                    <!-- og title -->
                    <div class="row mt-4">
                      <label for="og_title" align="left">OG Title</label>
                      <textarea id="og_title" name="og_title" class="form-control" rows="1" cols="10"></textarea>
                    </div>

                    <!-- og description -->
                    <div class="row mt-4">
                      <label for="og_description" align="left">OG Description</label>
                      <textarea id="og_description" name="og_description" class="form-control" rows="1" cols="10"></textarea>
                    </div>

                    <!-- og image -->
                    <div class="row mt-4">
                      <label for="og_image" align="left">OG Image</label>
                      <textarea id="og_image" name="og_image" class="form-control" rows="1" cols="10"></textarea>
                    </div>

                    <!-- og type -->
                    <div class="row mt-4">
                      <label for="og_type" align="left">OG Type</label>
                      <select class="form-control" id="og_type" name="og_type">
                        <option value="website">Website</option>
                        <option value="article">Article</option>
                      </select>
                    </div>

                    <!-- update button -->
                    <div class="col-1 col-lg-1 m-auto">
                      <input type="submit" class="btn btn-primary mt-4" name="submit" value="Add Meta">
                    </div>
                  </form>
                </div>
              </div>

            </section>

          </body>

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
    <?php endif; ?>

    <!-- disabling submit button -->
    <script>
      $(document).ready(function () {
        $(document).on('submit', 'form', function () {
          $('button').attr('disabled', 'disabled');
        });
      });
    </script>

    <!-- clearing history till current page -->
    <script>
      window.history.pushState({
        page: 1
      }, "", "");
    </script>

    <!-- clearing sent data -->
    <script>
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      };
    </script>

    <!-- sending back to add meta page on refresh -->
    <script>
      window.onpopstate = function (event) {
        if (event) {
          window.location.href = '<?php echo $baseURL ?>admin/add-meta.php';
        }
      };
    </script>

    <script src="<?php echo $baseURL ?>assets/js/core.min.js"></script>
    <script src="<?php echo $baseURL ?>assets/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>

  </body>

</html>