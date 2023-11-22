<?php require_once "base/header.php" ?>

<section class="section wow fadeInDown">
  <div class="swiper-wrapper text-center">
    <img src="<?php echo $baseURL ?>assets/images/landing/integrate-convoque/swiper.gif" alt="swiper">
  </div>
</section>


<section class="section section-sm section-fluid bg-default text-center">
  <div class="container-fluid btn button-primary button-ujarak">
    <h1 class=" wow fadeInRight text-white title" data-wow-delay=".1s">INTEGRATE CONVOQUE WITH ZOHO</h1>
  </div>
</section>

<section class="section section-sm section-first bg-default text-center">
  <div class="container">
    <div class="row justify-content-center">
      <h5 class="text-normal wow fadeInDown mb-4">
        Integration of Convoque with Zoho allows you to use your Convoque Telephony services from a host
        of Zoho Services. Integration of Convoque with Zoho provides the following: </h5>

      <div class="col-sm-6 col-lg-3 wow fadeInLeft" data-wow-delay=".3s">
        <article class="box-icon-modern box-icon-modern-2">
          <div> <img src="assets/images/landing/integrate-convoque/icons/phone-call.gif" alt="calls popup" width='100'> </div>
          <div class="box-icon-modern-decor"></div>
          <h4 class="box-icon-modern-text">Incoming / Outgoing calls popup in Zoho with contact information from Zoho Contacts</h4>
        </article>
      </div>

      <div class="col-sm-6 col-lg-3 wow fadeInLeft" data-wow-delay=".3s">
        <article class="box-icon-modern box-icon-modern-2">
          <div> <img src="assets/images/landing/integrate-convoque/icons/logs.gif" alt="logged" width='100'> </div>
          <div class="box-icon-modern-decor"></div>
          <h4 class="box-icon-modern-text">All calls logged as activities in Zoho</h4>
        </article>
      </div>

      <div class="col-sm-6 col-lg-3 wow fadeInRight" data-wow-delay=".3s">
        <article class="box-icon-modern box-icon-modern-2">
          <div> <img src="assets/images/landing/integrate-convoque/icons/podcast.gif" alt="Call recording" width='100'> </div>
          <div class="box-icon-modern-decor"></div>
          <h4 class="box-icon-modern-text">Call recording in Zoho activity</h4>
        </article>
      </div>

      <div class="col-sm-6 col-lg-3 wow fadeInRight" data-wow-delay=".3s">
        <article class="box-icon-modern box-icon-modern-2">
          <div> <img src="assets/images/landing/integrate-convoque/icons/tap.gif" alt="Click-to-Call" width='100'> </div>
          <div class="box-icon-modern-decor"></div>
          <h4 class="box-icon-modern-text">Click-to-Call a contact from Zoho with call originating through Convoque System seamlessly</h4>
        </article>
      </div>

    </div>
  </div>
</section>

<section class="section text-center pl-4 wow fadeInUp">
  <h3 class="text-primary wow fadeInDown">How to Integrate ?</h3>
  <h5 class="wow fadeInUp">Please follow the following steps to integrate Convoque with Zoho.</h5>
  <div class="row row-30 justify-content-center box-icon-modern custom-card-2 mt-4 text-center">

    <div class="integrate">

      <h5 class="text-left">
        <b>Step 1: Setup</b>
        <br>Please get in touch with Asfera Support team, they will discuss about the prerequisites and setup the system for you.<br>
        <br><b>Step 2: Enable Integration</b>
        <br>Once the setup is completed You may at your will enable or disable the integration with Zoho. This is achieved using a toggle switch on Integration Page in
        Convoque.<br><br>
      </h5>

      <h5>
        <b>You will get the following in case Convoque is not Integrated with Zoho.</b>
      </h5>

      <img src="<?php echo $baseURL ?>assets/images/landing/integrate-convoque/Toggle_Off.png" alt="toggle-off"><br>

      <h5>
        <b>Clicking on the red toggle button will enable the Zoho Integration with Convoque.</b>
      </h5><br>

      <img src="<?php echo $baseURL ?>assets/images/landing/integrate-convoque/Toggle_On.png" alt="toggle-on"><br>

      <h5 class="text-left"><b>Step 3: Zoho User Phone Mapping</b>
        <br>On Integration the Convoque System will automatically fetch the Zoho Users and display them. The list will include the name and email
        ID from Zoho Accounts. You are required to enter the users extension / Phone number and select the extenTech and outTech for the same,
        as are provided to you by Asfera Team.<br><br>
      </h5>

      <img src="<?php echo $baseURL ?>assets/images/landing/integrate-convoque/ZohoUserList.png" alt="zohouserlist">

    </div>

    <div class="integrate-table text-left">
      <table>

        <tr>
          <td width="20%">
            <h4>Header</h4>
          </td>
          <td width="80%">
            <h4>Description</h4>
          </td>
        </tr>

        <tr>
          <td>Name</td>
          <td>Shown as is fetched from Zoho </td>
        </tr>

        <tr>
          <td>Email ID </td>
          <td>Shown as is fetched from Zoho </td>
        </tr>

        <tr>
          <td> Exten</td>
          <td>The extension number to be assigned to the user </td>
        </tr>

        <tr>
          <td>Exten Tech </td>
          <td>Please select the one provided by the Asfera Team at the time of Setup. </td>
        </tr>

        <tr>
          <td>Out Tech </td>
          <td>Please select the one provided by the Asfera Team at the time of Setup. </td>
        </tr>

        <tr>
          <td>Prefix </td>
          <td>(Optional) Provided by Asfera Team at the time of Setup only if applicable. </td>
        </tr>

        <tr>
          <td>C2D</td>
          <td>Toggle button to enable of disable click to dial in Zoho for each user.</td>
        </tr>

      </table>
    </div>

    <h5 class="text-center">
      <span class="text-danger">*</span>If you are unsure of extenTech, outTech or prefix. Please get in touch with Asfera Support Team. Selecting or
      providing the wrong value will cause the system to work in unexpected manner or even stop working.</h5>
    <h5 class="text-left"><b>Step 4: Done, As easy as that</b>
      <br>That's all done. Now you may use Convoque CCS and IP telephony services from within Zoho CRM & Zoho One and get call logs and recording in zoho itself. If you still need some help,
      do reach us.<br><br>
      <span class="text-danger">Disclaimer:</span> Zoho, Zoho logo, Zoho CRM, Zoho CRM logo, Zoho One are trademark or registered trademark of Zoho Corporation Pvt. Ltd. Convoque,
      Convoque Logo, Convoque CCS are trademark or registered trademark of Asfera Technologies Pvt. Ltd.
    </h5>
  </div>

</section>


<?php require_once "base/footer.php" ?>
