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
  // getting other fields
  $page           = mysqli_real_escape_string($link, $_POST['existed_page']);
  $title          = mysqli_real_escape_string($link, $_POST['title']);
  $m_description  = mysqli_real_escape_string($link, $_POST['m_description']);
  $m_keywords     = mysqli_real_escape_string($link, $_POST['m_keywords']);
  $robots         = mysqli_real_escape_string($link, $_POST['robots']);
  $og_title       = mysqli_real_escape_string($link, $_POST['og_title']);
  $og_description = mysqli_real_escape_string($link, $_POST['og_description']);
  $og_image       = mysqli_real_escape_string($link, $_POST['og_image']);
  $og_type        = mysqli_real_escape_string($link, $_POST['og_type']);

  $sql = " UPDATE seo SET
      title='$title',m_description='$m_description',m_keywords='$m_keywords',
      robots='$robots',og_title='$og_title',og_description='$og_description',
      og_image='$og_image',og_type='$og_type'
   WHERE page='$page'";


  if (mysqli_query($link, $sql)) {
    $message = "Success : Meta Has Been Updated";
  }
  else {
    $message = "Error : Something went wrong while handling Databse";
  }
  print("<script>alert('$message');window.location.href ='update-meta.php';</script>");

  ?>
  
  <?php mysqli_close($link);
else: ?>

  <!DOCTYPE html>
  <html lang="en" class="wide wow-animation">

    <head>
      <title>Update Meta</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

            <h2 class="text-center bg-theme">Update Meta Tags</h2>
            <section class="mt-4 mb-4">
              <div class="row justify-content-end text-center">
                <div class="col-11 col-lg-11 m-auto p-4 border-1s">
                  <section>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <h3 align="center" class="mt-4">Select Page</h3>
                      <!-- exsited page -->
                      <div class="row">
                        <label for="page" align="left">Select Page</label>
                        <?php
                        require "dbconn.php";
                        $result = mysqli_query($link, "SELECT page FROM seo");
                        ?>
                        <select id="existed-page" name="existed_page" class="form-control">
                          <option value="">Select Existed Page</option>
                          <?php while ($row = mysqli_fetch_array($result)): ?>
                            <option value="<?php print($row['page']); ?>"><?php print($row['page']); ?></option>
                          <?php endwhile;
                          mysqli_close($link); ?>
                        </select>
                      </div>
                      <div class="inside-form" id="update-meta">
                      </div>
                    </form>
                  </section>
                </div>
              </div>
            </section>
        </div>
      </div>
    <?php endif; ?>

    <script type="text/javascript">
      $(document).ready(function () {
        $('#existed-page').on('change', function () {
          var page = this.value;
          $.ajax({
            url: "ajax-update-meta.php",
            type: "POST",
            data: {
              page: page,
            },
            cache: false,
            success: function (result) {
              $('#update-meta').html(result);
            }
          });
        });
      });
    </script>

    <!-- disabling contact submit button -->
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
          window.location.href = '<?php echo $baseURL ?>admin/update-meta.php';
        }
      };
    </script>

    <script src="<?php echo $baseURL ?>assets/js/core.min.js"></script>
    <script src="<?php echo $baseURL ?>assets/js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>

  </body>

</html>