<?php
require "../dbconn.php";
require "../config.php";
$baseURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http') . '://' . $_SERVER['SERVER_NAME'] . $iInfo['wwwContext'] ;
$location = $_GET['location'];
$get_location = mysqli_query($link, "SELECT * FROM locations WHERE `location`='$location'");
$count = mysqli_num_rows($get_location);

if ($count < 1) {
  header("Location: $baseURL" . "about-us");
} else {
  $loc = mysqli_fetch_assoc($get_location);
  mysqli_close($link);
  require_once "../base/header.php";
}
?>

<!-- Swiper-->
<section class="section wow fadeInDown">
  <div class="swiper-wrapper text-center">
    <img src="<?php echo $baseURL ?>assets/images/location_based/location_swiper/landing.jpg" alt="swiper">
  </div>
</section>

<section class="section text-left mt-2">
  <div class="title-classic-title" align="center">
    <h2 class="bg-primary wow fadeInDown">Offered Services in <?php print($loc['location'] . " (" . $loc['state'] . ")"); ?></h2>
  </div>
  <div class="container">
    <div class="ivr-solutions">
      <div class="row row-30 justify-content-center box-icon-modern custom-card-2 mt-4 wow fadeInUp">
        <div class="col-lg-12 col-12 wow fadeInRight " align="left">
          <h5 class="normal-text"><img class="float-right" src="<?php echo $baseURL ?>assets/images/location_based/location/landing.jpg" alt="acd software">
            Since its establishment by its founders in 2010, Asfera Technologies Pvt Ltd. has concentrated on offering call centre solutions and software services with IVR Software, CRM Software, and ACD Software to all clients in India and worldwide.
            Today, Best Telephone System Company, a provider of the best IVR and call centre software in India and overseas, is one of Asfera Technologies clients.<br><br>
            By providing a top-notch selection of dependable software, Asfera Technologies (P) Ltd. has carved itself a niche in <b><?php print(ucfirst($loc['location'] . " (" . $loc['state'] . ")")); ?></b>.
            Our software is specifically made to function on PCs and Voice Processing Cards that are sold commercially.<br><br>
            We also define, design, develop, and deliver technology enabled PC-Based Voice Processing System for Business Solutions in order to satisfy the unique needs of our clients.<br>
          </h5>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once "location-services.php";
require_once "../base/footer.php" ?>
