<?php
$baseURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http') . '://' . $_SERVER['SERVER_NAME'] . '/';
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'):
  ?>

  <?php
  define("SecureAccess", True);
  require "vault/salt.php";
  $username = $_POST['user'];
  $password = $_POST['password'];
  $password = MD5($password .= $securityKey);


  if (($username == "adminasfera") && ($password == "80d2f099a283d6158459ac71cde6e21e")) {

    session_start();
    $_SESSION['login_pass'] = "admin_access";
    header("Location: admin-panel.php");
  }
  else {

    echo "<script>
    alert('There is No user for this credential');
    window.location.href = 'login.php';
    </script>";
  }

  ?>

<?php else: ?>
  <?php
  session_start();
  if (isset($_SESSION['login_pass'])) {
    header("Location: admin-panel.php");
  } ?>

  <html lang="en" class="wide wow-animation">

    <head>
      <title>Login</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
      <link rel="icon" type="image/x-icon" href="<?php echo $baseURL ?>assets/images/global/asfera_logo.png">
      <link rel="stylesheet" type="text/css" href="<?php echo $baseURL ?>assets/css/custom_style.css">
    </head>

    <body>
  
      <div class="row" style="margin-top:25vh;">
        <div class="col-4 col-lg-4 m-auto card shadow p-3 mb-5 bg-white rounded" style="min-width:300px;">
          <a class="btn btn-danger" style="width:10%;" href="<?php echo $baseURL ?>">X</a>

          <div class=" col-lg-12 col-12">
            <h2 class="wow fadeInDown text-center">Admin Panel</h2>
          </div>

          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="col-lg-12 col-12 mt-4">
              <input class="form-control" type="text" name="user" placeholder="Username" required>
            </div>

            <div class="col-lg-12 col-12 mt-4">
              <input class="form-control" type="password" name="password" placeholder="Password" required>
            </div>

            <div class="col-lg-12 col-12 mt-4 mb-4">
              <button class="form-control btn btn-primary" type="submit">Login</button>
            </div>
          </form>

        </div>
      </div>

      <script src="<?php echo $baseURL ?>assets/js/core.min.js"></script>
      <script src="<?php echo $baseURL ?>assets/js/script.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>

    <?php endif; ?>
  </body>

</html>