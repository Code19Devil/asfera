<?php
require "../dbconn.php";
$baseURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http') . '://' . $_SERVER['SERVER_NAME'] . '/';

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
    <img src="<?php echo $baseURL ?>assets/images/location_based/location_swiper/ivr_service.jpg" alt="swiper">
  </div>
</section>

<section class="section text-left mt-2">
  <div class="title-classic-title" align="center">
    <h1 class="bg-primary title text-light wow fadeInDown">IVR in <?php print(ucfirst($loc['location'] . " (" . $loc['state'] . ")")); ?></h1>
  </div>
  <div class="container">
    <div class="ivr-solutions">
      <div class="row row-30 justify-content-center box-icon-modern custom-card-2 mt-4 wow fadeInUp">
        <div class="col-lg-12 col-12 wow fadeInRight " align="left">
          <h5 class="normal-text"><img class="float-left" src="<?php echo $baseURL ?>assets/images/location_based/location/ivr_service.png" alt="IVR">
            IVR (Interactive Voice Response) solutions are computer-based systems that interact with callers through the use of voice and DTMF (Dual-Tone Multi-Frequency)
            input (such as pressing a telephone keypad) to provide information and/or access to various services. in <b><?php print(ucfirst($loc['location'] . " (" . $loc['state'] . ")")); ?></b>, there are a variety of companies that offer IVR
            solutions, including software development companies and call center service providers.It is important to evaluate the specific requirements for your business and
            also consult with experts to understand and recommend the best fit solution as per the need.<br>

            IVR stands for Interactive Voice Response. It is a technology that allows a computer to interact with humans through the use of voice and DTMF (dual-tone multi-frequency)
            tones input via a keypad.IVR systems are commonly used in call centers and other customer service environments to route calls to the appropriate agent or department and to
            provide automated self-service options.<br> For example, when a customer calls a company, the IVR system may provide a menu of options for the customer to choose from, such as
            sales, customer service, or technical support. The customer can then select the appropriate option by pressing a key on their phone keypad, and the call will be routed to the
            corresponding department or agent.<br><br>
            IVR systems can also be used to provide automated responses to customer inquiries, such as account balances or account information. This can help reduce the workload on call
            center agents and improve the efficiency of the call center.<br>
            IVR systems can be hosted on-premises or in the cloud, and they can be integrated with other systems, such as CRM systems, to provide a more seamless and personalized experience
            for customers.</h5>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once "location-services.php";
require_once "../base/footer.php" ?>