<?php
$baseURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http') . '://' . $_SERVER['SERVER_NAME'] . '/';
?>

<?php
session_start();
if (!isset($_SESSION['login_pass'])) {
  header("Location:" . $baseURL . "admin/login.php");
}

?>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>

  <?php
  $message               = "";
  $db_error              = "<h3 class='text-danger text-center'>Oops ! <br> Something Error Occurs <br> PLease Try Again Later";
  $required_fields_error = "<h3 class='text-danger text-center'>Some required fields are left empty</h3>";
  $image_error           = "<h3 class='text-danger text-center'>Unspported File, Please upload Image only</h3>";
  require "dbconn.php";
  $submit = mysqli_real_escape_string($link, $_POST['submit']);
  if ($submit == "Create Blog"):
    ?>

    <?php
    $fields = array(
      "slug",
      "title",
      "description",
      "creator"
    );

    foreach ($fields as $rField) {
      if (strlen(isset($_POST[$rField]) ? $_POST[$rField] : "") < 1) {
        $message = $required_fields_error;
        break;
      }
    }

    if ($message == "") {
      $cols    = "";
      $vals    = "";
      $isFirst = true;
      foreach ($fields as $rField) {
        $cols .= (!$isFirst ? ", " : "") . "`$rField`";
        $vals .= (!$isFirst ? ", " : "") . "'" . mysqli_real_escape_string($link, $_POST[$rField]) . "'";
        $isFirst = false;
      }

      $cols .= ", `keywords`";
      $vals .= ", '" . (isset($_POST['keywords']) ? mysqli_real_escape_string($link, $_POST['keywords']) : "") . "' ";


      // uploading image
      $filename = $_FILES['image']['name'];

      if ($filename) {
        $filename = date("dmyHis", strtotime("now")) . $filename;
      }

      $destination = "../assets/images/blog/blog-images/" . $filename;
      $file        = $_FILES['image']['tmp_name'];
      move_uploaded_file($file, $destination);


      $cols .= ", `image`";
      $vals .= ", '" . ($filename) . "' ";


      $sql = "INSERT INTO blog ($cols) VALUES ($vals)";
      if (mysqli_query($link, $sql)) {
        print("<script>alert('Blog Created');window.location.href ='$baseURL/admin/add-blog.php';</script>");
      }
      else {
        print("<script>alert('ERROR : Report It');window.location.href ='$baseURL/admin/add-blog.php';</script>");
      }
    }
    else {
      print("<script>alert('$message');window.location.href ='add-blog.php';</script>");
    }
    ?>

  <?php elseif ($submit == "Create-Sub-Blog"): ?>
    <?php
    $fields = array(
      "blog_id",
      "title",
      "description",
      "creator",
    );

    foreach ($fields as $rField) {
      if (strlen(isset($_POST[$rField]) ? $_POST[$rField] : "") < 1) {
        $message = $required_fields_error;
        break;
      }
    }

    if ($message == "") {
      $cols    = "";
      $vals    = "";
      $isFirst = true;
      foreach ($fields as $rField) {
        $cols .= (!$isFirst ? ", " : "") . "`$rField`";
        $vals .= (!$isFirst ? ", " : "") . "'" . mysqli_real_escape_string($link, $_POST[$rField]) . "'";
        $isFirst = false;
      }

      // uploading image
      if (!empty($_FILES['image'])) {
        $filename    = $_FILES['image']['name'];
        $destination = "../assets/images/blog/sub-blog-images/" . $filename;
        $file        = $_FILES['image']['tmp_name'];
        move_uploaded_file($file, $destination);
      }
      else {
        $filename = "";
      }

      $cols .= ", `image`";
      $vals .= ", '" . ($filename) . "' ";

      $sql = "INSERT INTO sub_blog ($cols) VALUES ($vals)";
      if (mysqli_query($link, $sql)) {
        print("<script>alert('Blog Created');window.location.href ='$baseURL/admin/add-blog.php';</script>");
      }
      else {
        print("<script>alert('ERROR : Report It');window.location.href ='$baseURL/admin/add-blog.php';</script>");
      }
    }
    else {
      print("<script>alert('$message');window.location.href ='add-blog.php';</script>");
    }
    ?>

  <?php endif;
  mysqli_close($link);
else: ?>

  <!DOCTYPE html>
  <html lang="en" class="wide wow-animation">

    <head>
      <title>Add Blog</title>
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
          <div class="cssload-container">
            <span></span><span></span><span></span><span></span>
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
            <h2 class="text-center bg-theme">Create Blog/Sub Blog</h2>
            <section class="mt-4 mb-4">
              <div class="col-6 col-lg-6 m-auto p-4">
                <h3 class="text-center bg-theme">Scroll Down To Add Sub Blog</h3>
              </div>
              <div class="row justify-content-end text-center">
                <div class="col-11 col-lg-11 m-auto p-4 border-1s">
                  <h3 class="text-center bg-theme">Create Blog</h3>
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

                    <!-- new page  -->
                    <div class="row mt-4">
                      <label for="slug" align="left">Slug URL</label>
                      <input type="text" name="slug" id="slug" placeholder="Slug For The Blog" class="form-control" required>
                    </div>

                    <!-- title   -->
                    <div class="row mt-4">
                      <label for="blog-title" align="left">Title</label>
                      <input type="text" name="title" id="blog-title" placeholder="Title For The Blog" class="form-control" required>
                    </div>

                    <!-- image   -->
                    <div class="row mt-4">
                      <label for="blog-image" align="left">Image</label>
                      <input type="file" name="image" id="blog-image" placeholder="Image For The Blog" accept="image/jpeg,image/x-png,image/jpg,image/gif" class="form-control" required>
                    </div>

                    <!-- description -->
                    <div class="row mt-4">
                      <label for="blog-description" align="left">Description</label>
                      <textarea name="description" id="blog-description" class="form-control" rows="1" cols="10" placeholder="Description For The Blog" required></textarea>
                    </div>

                    <!-- creator   -->
                    <div class="row mt-4">
                      <label for="blog-creator" align="left">Creator Name</label>
                      <input type="text" name="creator" id="blog-creator" placeholder="Creator Of The Blog" class="form-control" required>
                    </div>

                    <!-- uefull keywords   -->
                    <div class="row mt-4">
                      <label for="keywords" align="left">Keywords</label>
                      <input type="text" name="keywords" id="keywords" placeholder="Keywords For The Blog (optional)" class="form-control">
                    </div>

                    <!-- update button -->
                    <div class="col-1 col-lg-1 m-auto">
                      <input type="submit" class="btn btn-primary mt-4" name="submit" value="Create Blog">
                    </div>

                  </form>
                </div>
              </div>
            </section>

            <!-- create sub blog -->
            <section class="mt-4 mb-4">
              <div class="row justify-content-end text-center">
                <div class="col-11 col-lg-11 m-auto p-4 border-1s">
                  <h3 class="text-center bg-theme">Create Sub Blog</h3>
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

                    <!-- new page  -->
                    <div class="row  mt-4 form-group">
                      <label for="blog" align="left">Select Blog</label>
                      <?php
                      require "dbconn.php";
                      $result = mysqli_query($link, "SELECT id,slug FROM blog");
                      ?>
                      <select id="blog" name="blog_id" class="form-wrap-select form-control" required>
                        <option value="" selected>Select Blog</option>
                        <?php while ($row = mysqli_fetch_array($result)): ?>
                          <option value="<?php print($row['id']); ?>"><?php print($row['slug']); ?></option>
                        <?php endwhile;
                        mysqli_close($link); ?>
                      </select>
                    </div>

                    <!-- title   -->
                    <div class="row mt-4">
                      <label for="title" align="left">Title</label>
                      <input type="text" name="title" id="title" placeholder="Title For The Blog" class="form-control" required>
                    </div>

                    <!-- image   -->
                    <div class="row mt-4">
                      <label for="image" align="left">Image</label>
                      <input type="file" name="image" id="image" placeholder="Image For The Blog" accept="image/jpeg,image/x-png,image/jpg,image/gif" class="form-control">
                    </div>

                    <!-- description -->
                    <div class="row mt-4">
                      <label for="description" align="left">Description</label>
                      <textarea id="description" name="description" class="form-control" rows="1" cols="10" placeholder="Description For The Blog" required></textarea>
                    </div>

                    <!-- creator   -->
                    <div class="row mt-4">
                      <label for="creator" align="left">Creator Name</label>
                      <input type="text" name="creator" id="creator" placeholder="Creator Of The Blog" class="form-control" required>
                    </div>

                    <!-- update button -->
                    <div class="col-1 col-lg-1 m-auto">
                      <input type="submit" class="btn btn-primary mt-4" name="submit" value="Create-Sub-Blog">
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

    <!-- sending back to contact page on refresh -->
    <script>
      window.onpopstate = function (event) {
        if (event) {
          window.location.href = '<?php echo $baseURL ?>admin/add-blog';
        }
      };
    </script>

    <script src="<?php echo $baseURL ?>assets/js/core.min.js"></script>
    <script src="<?php echo $baseURL ?>assets/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
  </body>

</html>