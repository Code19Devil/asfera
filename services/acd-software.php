<?php
require "../dbconn.php";
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
    <img src="<?php echo $baseURL ?>assets/images/location_based/location_swiper/acd_software.jpg" alt="swiper">
  </div>
</section>

<section class="section text-left mt-2">
  <div class="title-classic-title" align="center">
    <h1 class="title bg-primary wow fadeInDown">ACD Software in <?php print($loc['location'] . " (" . $loc['state'] . ")"); ?></h1>
  </div>
  <div class="container">
    <div class="ivr-solutions">
      <div class="row row-30 justify-content-center box-icon-modern custom-card-2 mt-4 wow fadeInUp">
        <div class="col-lg-12 col-12 wow fadeInRight " align="left">
          <h5 class="normal-text"><img class="float-right" src="<?php echo $baseURL ?>assets/images/location_based/location/acd_software.png" alt="acd software">
            ACD (Automatic Call Distribution) software is a type of dialer software that is specifically designed for managing and routing
            inbound calls in call centers or customer service operations. ACD software is typically used by businesses that receive a high volume of inbound calls,
            such as customer service centers, help desks, and sales teams.<br><br>ACD stands for Automatic Call Distributor, which is a type of telephone system that routes
            incoming calls to the next available agent or representative. There are many software providers in <b><?php print(ucfirst($loc['location'] . " (" . $loc['state'] . ")")); ?></b>
            that offer ACD solutions for businesses. <br><br>
            ACD software can route calls to the most appropriate agent based on a variety of factors,such as agent availability, skill level, language spoken, or customer
            priority. The software can also provide managers with real-time data on call volume,wait times, and agent performance.</h5>
          </h5>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section text-left mt-4">
  <div class="container">
    <h2 class="bg-primary text-light text-center wow fadeInDown ">Benefits Of ACD Software</h2>
  </div>
  <div class="container">
    <div class="ivr-solutions">
      <div class="row justify-content-center box-icon-modern custom-card-2 wow fadeInRight">
        <h5 class="normal-text text-left"><b>Some of the benefits of ACD software include:</b><br>
          <ul class="list-text text-left">
            <li><b>Improved call handling:</b>ACD software can help ensure that calls are handled efficiently and effectively, reducing wait times and improving customer satisfaction.</li>
            <li><b>Better agent utilization:</b> ACD software can help managers ensure that agents are handling the right types of calls and that they are not overwhelmed with too many calls at once.</li>
            <li><b>Increased scalability:</b>ACD software can help businesses handle an increase in call volume as they grow, making it easier to scale up operations.</li>
            <li><b>Advanced reporting and analytics:</b> ACD software can provide managers with detailed data on call volume, wait times, agent performance, and other metrics, which can be used to improve operations and make data-driven decisions.</li>
            <li><b>Advanced call routing capabilities: </b>ACD software can route calls based on complex criteria, such as the caller's account history, or the number they dialed from, or custom attributes of the caller</li>
            <li><b>Integrated with other business software:</b> Many ACD software can be integrated with CRM, helpdesk or other business software, which gives the agent all the information about the caller and the call history at a glance.</li>
          </ul>
        </h5>
      </div>
    </div>
  </div>
</section>

<?php require_once "location-services.php";
require_once "../base/footer.php" ?>
