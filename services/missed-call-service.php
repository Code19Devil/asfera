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
    <img src="<?php echo $baseURL ?>assets/images/location_based/location_swiper/missed_call.jpg" alt="swiper">
  </div>
</section>

<section class="section text-left mt-2">
  <div class="title-classic-title" align="center">
    <h1 class="bg-primary title wow fadeInDown">Missed Call Service in <?php print(ucfirst($loc['location'] . " (" . $loc['state'] . ")")); ?></h1>
  </div>
  <div class="container">
    <div class="ivr-solutions">
      <div class="row row-30 justify-content-center box-icon-modern custom-card-2 mt-4 wow fadeInUp">
        <div class="col-lg-12 col-12 wow fadeInRight " align="left">
          <h5 class="normal-text"><img class="float-left" src="<?php echo $baseURL ?>assets/images/location_based/location/missed_call.png" alt="Missed Call Service">
            Missed call service is a way for businesses and organizations to interact with their customers and clients through the use of missed calls. The service works by having customers call a dedicated phone number and then hang up before
            the call is answered. This generates a missed call notification on the recipient's end, which can then be used to trigger a variety of actions, such as sending an SMS or email, or triggering an IVR (Interactive Voice Response) call.
            in <b><?php print(ucfirst($loc['location'] . " (" . $loc['state'] . ")")); ?></b>, there are a variety of companies that offer missed call services, including call center service providers, SMS gateway providers, and software development companies.It is important to evaluate the specific requirements for
            your business and consult with experts to understand and recommend the best fit solution as per the need.Missed call service is a type of telecommunication service that allows a customer to initiate a call to a company and then hang
            up before the call is answered.<br><br>

            The company can then call the customer back, either automatically or manually. Missed call service is often used as a way for customers to request information or assistance from a company without incurring long distance charges or using
            up their airtime minutes. It is also often used as a way for companies to gather customer information, such as phone numbers or email addresses, or to confirm the customer's willingness to receive marketing or promotional material.<br>
            Missed call service is often used in countries where pay-per-minute or pay-as-you-go phone plans are more common, as it allows customers to avoid long distance charges or high airtime costs. It is also used in countries where the cost of making a
            phone call may be prohibitively high for some customers.<br>
            Missed call service can be implemented through a range of technologies, including VoIP (Voice over Internet Protocol) and SMS (Short Message Service). Some missed call service providers offer additional features, such as call routing, voicemail, and
            integration with CRM systems.</h5>
        </div>
      </div>
    </div>
  </div>
</section>


<?php require_once "location-services.php";
require_once "../base/footer.php" ?>