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
    <img src="<?php echo $baseURL ?>assets/images/location_based/location_swiper/callrecording.jpg" alt="swiper">
  </div>
</section>

<section class="section text-left mt-2">
  <div class="title-classic-title" align="center">
    <h1 class="bg-primary title wow fadeInDown">Call Recording System in <?php print(ucfirst($loc['location'] . " (" . $loc['state'] . ")")); ?></h1>
  </div>
  <div class="container">
    <div class="ivr-solutions">
      <div class="row row-30 justify-content-center box-icon-modern custom-card-2 mt-4 wow fadeInUp">
        <div class="col-lg-8 col-12 wow fadeInRight " align="left">
          <h5 class="normal-text">There are several companies in <b><?php print(ucfirst($loc['location'] . " (" . $loc['state'] . ")")); ?></b> that provide call recording systems. These companies offer a variety of call recording
            solutions that can be tailored to the specific needs of an organization. Some of the companies offer both hardware and software-based call recording
            systems, while others specialize in one or the other. These call recording systems can be integrated with a wide range of telephony systems such as PBX,
            VoIP, and virtual call centers. Some popular providers of call recording systems in <b><?php print(ucfirst($loc['location'] . " (" . $loc['state'] . ")")); ?></b> include Sify Technologies, Genesys, and Verint Systems. You
            can look for these companies and see if their solution fits your organization and look for any other local providers for better and specific solutions.</h5>
        </div>
        <div class="col-lg-4 col-12 wow fadeInLeft mt-3">
          <img src="<?php echo $baseURL ?>assets/images/location_based/location/call_recording.png" alt="call recording system" width="100%">
        </div>
      </div>
    </div>
  </div>

  <div class="title-classic-title" align="center">
    <h2 class="bg-primary text-light mt-4 wow fadeInDown">About</h2>
  </div>
  <div class="row row-30 justify-content-center box-icon-modern custom-card-2 mt-4 wow fadeInUp">
    <h5 class="normal-text">A call recording system is a technology used to record audio conversations, typically telephone calls. These recordings can be
      used for a variety of purposes, such as quality assurance, compliance with regulations, and training. Call recording systems can be hardware-based or
      software-based, and can be implemented on a variety of platforms, including PBX systems, call centers, and smartphones. There are also cloud-based call
      recording services that allow for the recording and storage of calls in the cloud. Some call recording system also come with transcription service, which
      convert speech to text.</h5>
  </div>
  </div>
</section>

<section class="section text-left">
  <div class="title-classic-title mt-4" align="center">
    <h2 class="bg-primary text-light wow fadeInDown">Benefits of call recording system</h2>
  </div>
  <div class="container">
    <div class="ivr-solutions">
      <div class="row row-30 justify-content-center box-icon-modern custom-card-2 wow fadeInRight">
        <h5 class="normal-text text-left"><b>There are several benefits of using a call recording system, including:</b><br>
          <ul class="list-text text-left">
            <li><b>Quality assurance:</b> Recording calls allows organizations to monitor and evaluate the performance of their customer service representatives and other employees who take calls. This can help identify areas for improvement and ensure that calls are handled in a professional and effective manner.</li>
            <li><b>Compliance:</b> Many industries are subject to regulations that require the recording of certain types of calls. A call recording system can help organizations comply with these regulations and avoid potential fines or legal issues.</li>
            <li><b>Training</b>: Recorded calls can be used as a training tool for new employees, as well as a means of continuing education for existing employees.</li>
            <li><b>Dispute resolution:</b> In case of disputes, call recordings can be used as evidence. It can be used to resolve disputes related to contracts, orders, and other business-related matters.</li>
            <li><b>Customer feedback:</b> Calls can be recorded for later evaluation to gather customer feedback, which can help the organization to improve its services and overall customer satisfaction.</li>
            <li><b>Fraud detection:</b> Fraudulent activities can be detected through call recordings and it can be used to take necessary action against it.</li>
          </ul>
          In summary, call recording systems provide a way for organizations to monitor and improve the quality of their customer service, ensure compliance with regulations, and provide training and support for employees, as well as a potential for dispute resolution, feedback, and fraud detection.
        </h5>
      </div>
    </div>
  </div>
</section>

<?php require_once "location-services.php";
require_once "../base/footer.php" ?>