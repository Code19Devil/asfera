<?php require_once "base/header.php" ?>

<?php  if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
<?php
    require "dbconn.php";
    $name=mysqli_real_escape_string($link, $_POST['name']);
    $email=mysqli_real_escape_string($link, strtolower($_POST['email']));
    $phone=mysqli_real_escape_string($link, $_POST['phone']);
    $c_message=mysqli_real_escape_string($link, $_POST['message']);

    $phone_error="<h3 class='text-danger text-center'>Sorry<br>But Phone Number (<span class='text-primary'>$phone</span>) Provided By You Is Not Of Ten Digits</h3>";
    $email_error="<h3 class='text-danger text-center normal-text'>Sorry<br>But Email (<span class='text-primary'>$email</span>) Provided By You Is Not Valid</h3>";
    $db_error="<h3 class='text-danger text-center'>Oops ! <br> Something Error Occurs <br> PLease Try Again Later";
    $success='success';
    $message="";

    if (strlen($phone)!=10) {
    $message=$phone_error;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $message=$email_error;
    }
     if(preg_match("/((https:\/\/?|http:\/\/| www\.))/i",$_POST['message'])){

 die("<script>alert('Please Remove Url');window.location.href ='contact.php';</script>");
}
    ?>
    <?php if($message==""): ?>

      <?php
     $sql="INSERT INTO contacts (name,email,phone,message) VALUES ('$name','$email','$phone','$c_message')";
     if (mysqli_query($link, $sql)) {
  
   require "mail_config.php";
   $sendemail->Subject   = 'Asfera Query';
   $sendemail->Body ="Got a query from Asfera<br><br>Name = $name<br>Mobile = $phone<br>Email = $email<br>Message = $c_message<br>";
   $sendemail->AddAddress("asferatechnologies@gmail.com");
  $sendemail->AddAddress("harish@asfera.in");
   $sendemail->Send();
   $sendemail->clearAddresses();
 } else {
print($sql);
print(mysqli_error($link));
     echo "<br><h2 align='center'>Something went wrong, Kindly reach us on contact numbers</h2>";
 }
 mysqli_close($link);
       ?>
    <?php   if ($success=='success'):  ?>
    <img src='<?php echo $baseURL ?>assets/images/contact/submitted.gif' alt='success-message'>
    <?php
     mysqli_close($link);
     ?>
   <?php else: ?>
          <?php
          print($message);
          mysqli_close($link);
          ?>
    <?php endif; ?>

      <?php else: ?>
        <?php
          print($message);
          mysqli_close($link);
        ?>
      <?php endif; ?>

<?php else: ?>

<section class="section wow fadeInDown">
  <div class="swiper-wrapper text-center">
    <img src="<?php echo $baseURL ?>assets/images/contact/swiper.png" alt="swiper">
  </div>
</section>


  <section class="section section-sm section-fluid bg-default text-center mt-4">
    <div class="container-fluid bg-primary">
      <h1 class="wow fadeInDown title">Contacts</h1>
    </div>

    <div class="row row-30 justify-content-center box-icon-modern custom-card-2 mt-4 ">

      <div class="col-sm-12 col-lg-12 wow fadeInLeft">
      <h3 class="text-primary">If You Have Any Query, Just Send It To Us</h3>
      </div>

      <div class="col-sm-6 col-lg-6 wow fadeInLeft">
        <img src="<?php echo $baseURL ?>assets/images/contact/contact-us.png" alt="contact-us">
      </div>

      <div class="col-sm-6 col-lg-6 wow fadeInRight">

        <form class="form-control" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
          <div class="row row-14 gutters-14">

            <div class="col-md-6">
              <div class="form-wrap">
                <input class="form-input" id="contact-your-name-2" type="text" name="name" required data-constraints="@Required" autocomplete="off">
                <label class="form-label" for="contact-your-name-2">Full Name</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-wrap">
                <input class="form-input" id="contact-email-2" type="email" name="email" required data-constraints="@Email @Required" autocomplete="off">
                <label class="form-label" for="contact-email-2">E-mail</label>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-wrap">
                <input class="form-input" id="contact-phone-2" type="text" name="phone" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required data-constraints="@Numeric" autocomplete="off">
                <label class="form-label" for="contact-phone-2">Mobile No.</label>
              </div>
            </div>
            <div class=" col-md-12">
              <div class="form-wrap">
                <label class="form-label" for="contact-message-2">Message</label>
                <textarea class="form-input textarea-lg" id="contact-message-2" name="message" required data-constraints="@Required" autocomplete="off"></textarea>
              </div>
           </div>
          </div>
         <button class="button button-primary button-pipaluk" type="submit">Send Message</button>
        </form>
      </div>
    </div>
  </section>

<?php endif; ?>

  <section class="section section-sm section-first bg-default text-center">
    <div class="container">
      <h3 class="btn-primary wow fadeInDown">You Can Contact Us Here</h3>
      <h4 class="mt-4 wow fadeInUp">We are open monday to saturday (10:00am-06:00pm)<br>If you got any route related issue just call us on phone numbers given below</h4>


      <div class="row row-30 justify-content-center">

        <div class="col-sm-6 col-lg-4 box-icon-modern custom-card-2 ht-300 wow fadeInLeft">
          <div class="mb-4"> <img src="<?php echo $baseURL ?>assets/images/contact/phone-call.png" alt="Features Of call recording software" width='50'> </div>
          <a class="box-contacts-link" href="tel:+91-9066677770">+91-9066677770</a><br>
          <a class="box-contacts-link" href="tel:+91-1146579777">+91-1146579777</a>
        </div>
        <div class="col-sm-6 col-lg-4 box-icon-modern custom-card-2 ht-300 wow fadeInDown">
          <div class="mb-4"> <img src="<?php echo $baseURL ?>assets/images/contact/map.png" alt="Features Of call recording software" width='50'> </div>
          <a class="pe-none">Asfera Technologies Private Limited<br>
              59/1, Office No-15 First Floor, Saroj Tower<br>
              Above Bank of Baroda, Kalkaji Extension<br>
              New Delhi - 110019
          </a>
        </div>
        <div class="col-sm-6 col-lg-4 box-icon-modern custom-card-2 ht-300 wow fadeInRight">
          <div class="mb-4"> <img src="<?php echo $baseURL ?>assets/images/contact/email.png" alt="Features Of call recording software" width='50'> </div>
          <a class="box-contacts-link" href="mailto:info@asfera.in"> info@asfera.in</a><br>
          <a class="box-contacts-link" href="mailto:sales@asfera.in ">sales@asfera.in </a>
        </div>
      </div>

    </div>
  </section>


<section>
  <article>
    <div class="col-lg-12 col-12 mt-4 mb-4 wow fadeInUp">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m19!1m8!1m3!1d112158.75800120851!2d77.2454995!3d28.5408863!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x390cfd309eebed77%3A0xf47bee595f075e26!2sasfera%20technologies!3m2!1d28.540134199999997!2d77.26204179999999!5e0!3m2!1sen!2sin!4v1631150214279!5m2!1sen!2sin"
        width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
  </article>
</section>

<!-- disabling contact submit button -->
<script>
  $(document).ready(function() {
    $(document).on('submit', 'form', function() {
      $('button').attr('disabled', 'disabled');
    });
  });
</script>

<!-- clearing history till current page -->
<script>
  window.history.pushState({
    page: 1
  }, "", "");
</script>

<!-- clearing sent data -->
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  };
</script>

<!-- sending back to contact page on refresh -->
<script>
  window.onpopstate = function(event) {
    if (event) {
      window.location.href = '<?php echo $baseURL ?>contact.php';
    }
  };
</script>

<?php require_once "base/footer.php" ?>
