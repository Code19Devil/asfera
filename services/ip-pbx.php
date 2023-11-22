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
    <img src="<?php echo $baseURL ?>assets/images/location_based/location_swiper/ip_pbx.jpg" alt="swiper">
  </div>
</section>

<section class="section text-left mt-2">
  <div class="title-classic-title" align="center">
    <h1 class="bg-primary title wow fadeInDown">IP PBX in <?php print(ucfirst($loc['location'] . " (" . $loc['state'] . ")")); ?></h1>
  </div>
  <div class="container">
    <div class="ivr-solutions">
      <div class="row row-30 justify-content-center box-icon-modern custom-card-2 mt-4 wow fadeInUp">
        <div class="col-lg-12 col-12 wow fadeInRight " align="left">
          <h5 class="normal-text"><img class="float-left" src="<?php echo $baseURL ?>assets/images/location_based/location/ip_pbx.png" alt="IP-PBX">
            IP PBX (Private Branch Exchange) is a telephone system that uses Voice over IP (VoIP) technology to handle and route telephone calls within a private network, and to connect to the
            public switched telephone network (PSTN) for external calls. IP PBX systems can be used by businesses, organizations, and call centers to provide advanced call routing, voicemail, and
            other features, and can also be integrated with other communication tools such as instant messaging and video conferencing.<br>
            In <b><?php print(ucfirst($loc['location'] . " (" . $loc['state'] . ")")); ?></b>, there are a variety of companies that offer IP PBX solutions, including telecommunications providers, IT service providers, and software development companies.
            It's important to evaluate the specific requirements for your business, such as number of users, call volume, scalability, and budget, and consult with experts to understand and recommend the best fit
            solution as per the need.<br>
            It allows users to communicate with each other via telephone, fax, and other communication methods using a VoIP (Voice over Internet Protocol) network. This type of system uses IP (Internet Protocol)
            technology to transmit voice and data over a network, such as the internet, instead of using traditional telephone lines.</h5>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section text-left mt-4">
  <div class="title-classic-title" align="center">
    <h2 class="bg-primary text-light wow fadeInDown">Benefits Of IP PBX</h2>
  </div>
  <div class="container">
    <div class="ivr-solutions">
      <div class="row row-30 justify-content-center box-icon-modern custom-card-2 wow fadeInRight">
        <h5 class="normal-text text-left"><b>Some benefits of using an IP PBX system include:</b><br>
          <ul class="list-text text-left">
            <li><b>Cost savings:</b>Because an IP PBX system uses a VoIP network, it can be more cost-effective than a traditional PBX system, which requires separate telephone lines for each user.</li>
            <li><b>Flexibility:</b>An IP PBX system can be easily expanded or modified to meet the changing needs of an organization. New users can be added or removed, and additional features can be added as needed.</li>
            <li><b>Integration:</b>An IP PBX system can be easily integrated with other communication tools, such as email, messaging, and video conferencing, to provide a comprehensive communication solution for an organization.</li>
            <li><b>Scalability:</b>An IP PBX system can be easily scaled up or down to meet the needs of an organization, making it a good choice for businesses that are growing or experiencing fluctuations in the number of employees.</li>
            <li><b>Remote access:</b>An IP PBX system can allow employees to work remotely and still have access to the same communication tools as they would if they were in the office.</li>
          </ul>
          Overall, an IP PBX system is a cost-effective and flexible solution for businesses looking to improve their internal communication capabilities.
        </h5>
      </div>
    </div>
  </div>
</section>

<?php require_once "location-services.php";
require_once "../base/footer.php" ?>