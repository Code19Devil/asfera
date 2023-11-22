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
    <img src="<?php echo $baseURL ?>assets/images/location_based/location_swiper/voice_blaster.jpg" alt="swiper">
  </div>
</section>

<section class="section text-left mt-2">
  <div class="title-classic-title" align="center">
    <h1 class="bg-primary title wow fadeInDown">Voice Blaster in <?php print(ucfirst($loc['location'] . " (" . $loc['state'] . ")")); ?></h1>
  </div>
  <div class="container">
    <div class="ivr-solutions">
      <div class="row row-30 justify-content-center box-icon-modern custom-card-2 mt-4 wow fadeInUp">
        <div class="col-lg-12 col-12 wow fadeInRight " align="left">
          <h5 class="normal-text"><img class="float-left" src="<?php echo $baseURL ?>assets/images/location_based/location/voice_blaster.png" alt="Voice Blaster">A Voice Blaster is a type of technology that allows the broadcasting of pre-recorded audio messages to a large number of telephone numbers simultaneously.
            It's also called as Voice Broadcasting or phone blasting. It is a kind of outbound calling software that generally used for mass communication like emergency alerts, customer
            notifications, appointment reminders, political campaigns, and other types of automated voice messages.<br><br>
            Voice Blaster systems typically use computer-generated voice messages or pre-recorded audio files to deliver the message. These messages can be scheduled to be sent at specific
            times, and can be directed to specific groups of telephone numbers based on a variety of criteria, such as location, area code, or prefix. Some Voice Blaster systems also include
            the ability to handle interactive voice responses (IVR), which allow recipients to respond to the message using their phone keypad.<br><br>
            Voice Blaster is widely used in various fields such as political campaigns, emergency notifications, customer service, appointment reminders, survey, marketing, customer notifications,
            political campaigns, and many other types of automated voice messages. It is an effective way to reach a large number of people quickly and efficiently, without the need for manual dialing.</h5>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section text-left mt-4">
  <div class="title-classic-title" align="center">
    <h2 class="bg-primary text-light wow fadeInDown">Benefits of Voice Blaster</h2>
  </div>
  <div class="container">
    <div class="ivr-solutions">
      <div class="row row-30 justify-content-center box-icon-modern custom-card-2 wow fadeInRight">
        <h5 class="normal-text text-left"><b>There are several benefits of using a Voice Blaster or Voice Broadcasting system, including:</b><br>
          <ul class="list-text text-left">
            <li><b>Mass communication:</b>Voice Blaster allows for the simultaneous broadcasting of pre- recorded audio messages to a large number of telephone numbers. This can be very useful for emergency notifications, political campaigns, and other types of mass communication.</li>
            <li><b>Efficiency:</b>Voice Blaster systems automate the process of delivering messages, which can save a significant amount of time and resources compared to manual dialing.</li>
            <li><b>Cost-effective:</b>Voice Blaster is cost-effective as compared to manual dialing, it helps in reaching out to a large number of people with the same message at once.</li>
            <li><b>Targeted messaging:</b>Voice Blaster systems can be used to send messages to specific groups of people based on a variety of criteria, such as location, area code, or prefix. This allows for more targeted and effective messaging.</li>
            <li><b>Scheduling:</b>Voice Blaster systems allow messages to be scheduled to be sent at specific times, which can be useful for reminder calls and other types of messages that need to be delivered at a specific time.</li>
            <li><b>Interactive responses:</b>Some Voice Blaster systems have the ability to handle interactive voice responses (IVR), which allow recipients to respond to the message using their phone keypad, which can be useful for conducting surveys or receiving feedback from the audience.</li>
            <li><b>Flexibility:</b>Voice Blaster systems can be integrated with other software solutions, like CRM, and can be accessed from anywhere, providing flexibility and ease of use.</li>
          </ul>
          In summary, Voice Blaster systems provide an efficient and cost-effective way to reach a large number of people quickly and targeted messaging, scheduling, and interactive responses, can be a useful tool for mass communication, customer service,
          marketing and political campaigns among other use cases.
        </h5>
      </div>
    </div>
  </div>
</section>

<?php require_once "location-services.php";
require_once "../base/footer.php" ?>