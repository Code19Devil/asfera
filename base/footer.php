<!-- Page Footer-->
<footer class="section section-fluid footer-minimal context-dark wow fadeInUp">
  <div class="bg-gray-15">
    <div class="container-fluid">

      <!-- location based services -->
      <div class="location">
        <h3 class=" pt-4 text-center text-light wow fadeInUp">Our Service Network</h3>

        <!-- services location row 1 -->
        <div class="row">
          <?php
          require "dbconn.php";
          $result = mysqli_query($link, "SELECT * FROM locations WHERE id<=5");
          while ($row = mysqli_fetch_assoc($result)):
            ?>
            <div class="col-lg-2 col-12 card bg-primary wow location-tab-design fadeInUp">
              <a href="<?php echo $baseURL ?><?php print($row['location']) ?>/services-provided-by-asfera-technologies" class="location-tab"><?php print(strtoupper($row['location'])) ?></a>
            </div>
          <?php endwhile; ?>

        </div>

        <!-- services location row 2 -->
        <div class="row">
          <?php
          $result = mysqli_query($link, "SELECT * FROM locations WHERE id>5 AND id<=10");
          while ($row = mysqli_fetch_assoc($result)):
            ?>
            <div class="col-lg-2 col-12 card bg-primary wow location-tab-design fadeInUp">
              <a href="<?php echo $baseURL ?><?php print($row['location']) ?>/services-provided-by-asfera-technologies" class="location-tab"><?php print(strtoupper($row['location'])) ?></a>
            </div>
          <?php endwhile; ?>
        </div>

        <!-- services location row 3 -->
        <div class="row">
          <?php
          $result = mysqli_query($link, "SELECT * FROM locations WHERE id>10 AND id<=15");
          while ($row = mysqli_fetch_assoc($result)):
            ?>
            <div class="col-lg-2 col-12 card bg-primary wow location-tab-design fadeInUp">
              <a href="<?php echo $baseURL ?><?php print($row['location']) ?>/services-provided-by-asfera-technologies" class="location-tab"><?php print(strtoupper($row['location'])) ?></a>
            </div>
          <?php endwhile; ?>
        </div>

        <!-- services location row 4 -->
        <div class="row">
          <?php
          $result = mysqli_query($link, "SELECT * FROM locations WHERE id>15 AND id<=20");
          while ($row = mysqli_fetch_assoc($result)):
            ?>
            <div class="col-lg-2 col-12 card bg-primary wow location-tab-design fadeInUp">
              <a href="<?php echo $baseURL ?><?php print($row['location']) ?>/services-provided-by-asfera-technologies" class="location-tab"><?php print(strtoupper($row['location'])) ?></a>
            </div>
          <?php endwhile; ?>
        </div>

      </div>
      <?php mysqli_close($link); ?>
    </div>

    <!-- footer links  -->
    <div class="col-lg-11 col-12 m-auto" id="footer_new">
      <div class="row ">

        <div class="footer-minimal-inset col-lg-2 col-12">
          <h3 class="text-left">Site Links</h3>
          <ul class="footer">
            <li><a href="<?php echo $baseURL ?>about-us">About Us</a></li>
            <li><a href="<?php echo $baseURL ?>blog">Blog</a></li>
            <li><a href="<?php echo $baseURL ?>contact">Contact Us</a></li>
            <li><a href="<?php echo $baseURL ?>career">Career</a></li>
            <li><a href="<?php echo $baseURL ?>certificate">Certification</a></li>
            <li><a href="<?php echo $baseURL ?>brochures">Brochures</a></li>

          </ul>
        </div>

        <div class="footer-minimal-inset col-lg-3 col-12">
          <h3 class="text-left">Solutions</h3>
          <ul class="footer">
            <li><a href="<?php echo $baseURL ?>solutions/call-center-solutions-convoque">Convoque</a></li>
            <li><a href="<?php echo $baseURL ?>solutions/ivr-solutions">IVR Solutions</a></li>
            <li><a href="<?php echo $baseURL ?>solutions/call-recording-software">Registro</a></li>
            <li><a href="<?php echo $baseURL ?>solutions/asfercon-acx-audio-conference-solution-exchange">Asfercon ACX</a></li>
            <li><a href="<?php echo $baseURL ?>solutions/asfercon-vcx-video-conference-system-exchange">Asfercon VCX</a></li>
            <li><a href="<?php echo $baseURL ?>solutions/missed-call-services">Missed Call Service</a></li>
          </ul>
        </div>

        <div class="footer-minimal-inset col-lg-3 col-12">
          <h3 class="text-left">Products</h3>
          <ul class="footer">
            <li><a href="<?php echo $baseURL ?>products/gsm-pri-gateway">GSM PRI Gateway</a></li>
            <li><a href="<?php echo $baseURL ?>products/gsm-voip-gateway">GSM Voip Gateway</a></li>
            <li><a href="<?php echo $baseURL ?>products/call-center-headsets">Headsets</a></li>
            <li><a href="<?php echo $baseURL ?>products/ip-pbx-phone-system">IP-PBX</a></li>
            <li><a href="<?php echo $baseURL ?>products/voice-blaster-call-campaigner">Voice Blaster</a></li>
            <li><a href="<?php echo $baseURL ?>products/voice-logger-system">Voice Logger</a></li>
          </ul>
        </div>

        <div class="footer-minimal-inset col-lg-2 col-12">
          <h3 class="text-left">Contact Us</h3>
          <ul class="footer">
            <li><i class="fa fa-phone" aria-hidden="true"><a href="tel: +91-1146579777"> +91-1146579777 </a></i></li>
            <li><i class="fa fa-phone" aria-hidden="true"><a href="tel: +91-9066677770"> +91-9066677770 </a></i></li>
            <li><i class="fa fa-envelope" aria-hidden="true"><a href="mailto:info@asfera.in"> info@asfera.in </a></li></i>
          </ul>

          <div class="mt-4">
            <hr>
            <h5 class="text-left">Terms & Privacy</h3>
              <ul class="footer">
                <li><a href="<?php echo $baseURL ?>terms-and-conditions"> Terms & Conditions </a></i></li>
                <li><a href="<?php echo $baseURL ?>privacy-policy"> Privacy Policies </a></i></li>
              </ul>
          </div>

        </div>

        <div class="footer-minimal-inset oh col-lg-2 col-12" align="center">
          <h3>Follow Us</h3><br>

          <div>
            <ul class="list-inline list-inline-sm footer-social-list-2 cust-icon">
              <li><a href="https://www.facebook.com/asferatech"><i class="fa fa-facebook ico"></i></a></li>
              <li><a href="https://twitter.com/AsferaTechnolo1"><i class="fa fa-twitter ico"></i></a></li>
              <li><a href="https://www.linkedin.com/in/asfera-technologies-1523664b/"><i class="fa fa-linkedin ico"></i></a></li>
            </ul>
            <br>
            <ul class="list-inline list-inline-sm footer-social-list-2 cust-icon">
              <li><a href="https://www.instagram.com/asferatec"><i class="fa fa-instagram ico"></i></a></li>
              <li><a href="https://www.youtube.com/channel/UCrgnAPKUmlWddMI4LB6veKw"><i class="fa fa-youtube ico"></i></a></li>
              <li><a href="https://in.pinterest.com/asferatechnologies/"><i class="fa fa-pinterest ico"></i></a></li>
            </ul>
          </div>

        </div>

      </div>
    </div>

    <div class="footer-minimal-bottom-panel text-sm-center">
      <p><span>All rights reserved.</span> <span>Designed&nbsp;by&nbsp;<a href="<?php echo $baseURL ?>">Asfera Technologies</a></span>
      </p>
    </div>
  </div>
</footer>

<div class="modal fade" id="modalCta" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h4>Contact Us</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
      </div>

      <div class="modal-body">
        <form method="post" action="<?php echo $baseURL ?>contacts.php">
          <div class="row row-14 gutters-14">
            <div class="col-12">
              <div class="form-wrap">
                <input class="form-input" id="contact-modal-name" type="text" name="name" data-constraints="@Required" required>
                <label class="form-label" for="contact-modal-name">Your Name</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-wrap">
                <input class="form-input" id="contact-modal-email" type="email" name="email" data-constraints="@Email @Required" required>
                <label class="form-label" for="contact-modal-email">E-mail</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-wrap">
                <input class="form-input" id="contact-modal-phone" type="text" name="phone" maxlength="10" data-constraints="@Numeric" required>
                <label class="form-label" for="contact-modal-phone">Phone</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-wrap">
                <label class="form-label" for="contact-modal-message">Message</label>
                <textarea class="form-input textarea-lg" id="contact-modal-message" name="message" data-constraints="@Required" required></textarea>
              </div>
            </div>
          </div>
          <button class="button button-primary button-pipaluk" type="submit">Send Message</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- Global Mailform Output-->
<div class="snackbars" id="form-output-global"></div>
<script src="<?php echo $baseURL ?>assets/js/core.min.js"></script>
<script src="<?php echo $baseURL ?>assets/js/script.js"></script>
</body>

</html>
