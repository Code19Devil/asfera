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
    <img src="<?php echo $baseURL ?>assets/images/location_based/location_swiper/automated.jpg" alt="swiper">
  </div>
</section>

<section class="section text-left mt-2">
  <div class="title-classic-title" align="center">
    <h1 class="bg-primary title wow fadeInDown">Automated Outbound Calling in <?php print($loc['location'] . " (" . $loc['state'] . ")"); ?></h1>
  </div>
  <div class="container">
    <div class="ivr-solutions">
      <div class="row row-30 justify-content-center box-icon-modern custom-card-2 mt-4 wow fadeInUp">
        <div class="col-lg-4 col-12 wow fadeInLeft mt-1">
          <img src="<?php echo $baseURL ?>assets/images/location_based/location/automated.png" alt="automated outbound calling" width="100%">
        </div>
        <div class="col-lg-8 col-12 wow fadeInRight " align="left">
          <h5 class="normal-text">Automated outbound calling, also known as automated dialing, is a technology that uses software to automatically place telephone
            calls to a list of telephone numbers. The calls are usually pre-recorded, and the recipients have the option to interact with the system by pressing
            buttons on their phone to speak to a live agent or access more information.Automated outbound calling is a technology that is used by many businesses
            in <b><?php print(ucfirst($loc['location'] . " (" . $loc['state'] . ")")); ?></b>and is widely available.Many software
            providers in <b><?php print(ucfirst($loc['location'] . " (" . $loc['state'] . ")")); ?></b> offer automated outbound calling solutions.These solutions typically include a
            software platform, a list of telephone numbers, and a pre-recorded message or script.</h5>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section text-left mt-4">
  <div class="title-classic-title" align="center">
    <h2 class="btn-primary wow fadeInDown">Benefits of Automated Outbound calling</h2>
  </div>
  <div class="container">
    <div class="ivr-solutions">
      <div class="row row-30 justify-content-center box-icon-modern custom-card-2 wow fadeInRight">
        <h5 class="normal-text text-left"><b>There are several benefits of using automated outbound calling, including:</b><br>
          <ul class="list-text text-left">
            <li><b>Telemarketing:</b> Automated outbound calling is commonly used for telemarketing, where businesses can make pre-recorded sales pitches or advertisements to potential customers.</li>
            <li><b>Surveys: </b>Automated outbound calling can also be used to conduct surveys, where businesses can gather information about customer satisfaction or market research.</li>
            <li><b>Appointment reminders:</b> Automated outbound calling can be used to remind customers of upcoming appointments, reducing the number of missed appointments.</li>
            <li><b>Political campaign:</b> automated outbound calling is used by political campaigns to generate support and funding by providing information to voters.</li>
            <li><b>Notifications:</b> Many organizations also use automated outbound calling as a means of providing notifications, such as school closures or important information regarding upcoming events.</li>
            <li><b>Debt collection:</b> Automated outbound calling is also used in debt collection process, where the calls are made to the debtors to remind them to pay their debts on time.</li>
          </ul>
          It is important to note that there are rules and regulations regarding automated outbound calling, such as the TCPA in the
          US which regulates certain type of auto-dialing or pre-recorded message calls, and organizations must comply with these regulations to avoid
          penalties.It is important to note that while automated outbound calling can be a powerful tool for businesses, there are rules and regulations
          in place in India to protect consumers from unwanted calls and companies must comply with these regulations.<br><br>

          The Telecom Regulatory Authority of India (TRAI) has put in place rules for unsolicited commercial communication which includes sending pre-recorded
          voice messages to the consumers, organizations must follow these guidelines to avoid any penalties. And it is better to get prior consent from the
          customers before sending them any automated outbound calls.<br><br>
          It is also important for businesses to carefully consider the use of automated outbound calling, and to ensure that they are only making calls to
          people who have expressed an interest in receiving them, or to those who have given their prior consent to receive calls.
        </h5>
      </div>
    </div>
  </div>
</section>


<?php require_once "location-services.php";
require_once "../base/footer.php" ?>