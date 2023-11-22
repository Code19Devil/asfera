<!DOCTYPE html>
<?php
session_start();
 require "config.php";
 $baseURL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http') . '://' . $_SERVER['SERVER_NAME'] . $iInfo['wwwContext'] ;
 ?>
<html lang="en" class="wide wow-animation">
  <head>
    <?php
    require "dbconn.php";
    $page           = $_SERVER['REQUEST_URI'];
    $lastUrlPortion = basename($page);
    $ext            = pathinfo($page, PATHINFO_EXTENSION);
    $page .= ($ext == "php" ? '' : ".php");
    $sql = "SELECT * FROM seo WHERE page='$page'";
    // getting meta tags for location based service
    if (isset($_GET['location'])) {
      $location = $_GET['location'];
      if ($lastUrlPortion == 'services-provided-by-asfera-technologies') {
        $sql      = "SELECT * FROM seo WHERE id='22'";
        $newTitle = basename($lastUrlPortion) . "-in-" . $location;
      }
      else {
        $lastUrlPortion .= ($ext == "php" ? '' : ".php");
        $counter        = 1;
        $sql            = "SELECT * FROM seo WHERE page='/$lastUrlPortion'";
      }
    }

    if (mysqli_num_rows(mysqli_query($link, $sql)) == 0) {
      $sql = "SELECT * FROM seo WHERE id=1";
    }

    $result = mysqli_query($link, $sql);
    $row    = mysqli_fetch_assoc($result);

    // modifying title for location based sevices
    if (isset($counter)) {
      $row['title'] .= " In $location";
      $row['og_title'] .= " In $location";
    }
    ?>

    <!-- title of the page -->
    <title><?php isset($newTitle) ? print($newTitle) : print($row['title']); ?></title>

    <!-- meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="author" content="Asfera Technologies Pvt. Ltd.">
    <meta name="robots" content="<?php print($row['robots']); ?>" />
    <meta name="keywords" content="<?php print($row['m_keywords']); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php print($row['m_description']); ?>">
    <meta name="google-site-verification" content=<?php print(($page == '/.php' or $page == '/index.php' or $page == '/home.php') ? '"2DTVWAH6QwuWqRiTxUOqJAkfMqOv372sRmqRFnlhii8"' : '""'); ?>>
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@AsferaTechnolo1">
    <meta name="twitter:title" content="<?php print($row['og_title']) ?>">
    <meta name="twitter:description" content="<?php print($row['og_description']) ?>">
    <meta name="twitter:image" content="<?php print($row['og_image']) ?>">
    <meta property="og:locale" content="en_US" />
    <meta property="og:site_name" content="India" />
    <meta property="og:url" content="<?php print("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]") ?>" />
    <meta property="og:title" content="<?php print($row['og_title']); ?>" />
    <meta property="og:description" content="<?php print($row['og_description']); ?>" />
    <meta property="og:type" content="<?php print($row['og_type']); ?>" />
    <meta property="og:image" content="<?php print($row['og_image']); ?>" />
    <link rel="canonical" href="<?php print("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]") ?>" />

    <!-- cloud links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alata">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

    <!-- site owned links -->
    <link rel="icon" type="image/x-icon" href="<?php echo $baseURL ?>assets/images/global/asfera_logo.png">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL ?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseURL ?>assets/css/custom_style.css">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TWBV6YM89D"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() { dataLayer.push(arguments); }
      gtag('js', new Date());

      gtag('config', 'G-TWBV6YM89D');
    </script>

    <!-- Clarity tracking code for https://www.asfera.in/  -->
    <?php if ($page == '/.php' or $page == '/index.php' or $page == '/home.php'): ?>
      <script>
        (function (c, l, a, r, i, t, y) {
          c[a] = c[a] || function () { (c[a].q = c[a].q || []).push(arguments) };
          t = l.createElement(r); t.async = 1; t.src = "https://www.clarity.ms/tag/" + i + "?ref=bwt";
          y = l.getElementsByTagName(r)[0]; y.parentNode.insertBefore(t, y);
        })(window, document, "clarity", "script", "ggjqzowd92");
      </script>
    <?php endif; ?>

    <!-- Schema Code Start-->
    <?php
    $location = isset($_GET['location']) ? $_GET['location'] : '';
    if ($location != '') {
      $sql = "SELECT * FROM `schema` WHERE addressLocality='$location'";
      $row = mysqli_fetch_assoc(mysqli_query($link, $sql));
      mysqli_close($link);
    }
    ?>

    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Asfera Technologies",
        "image": "https://www.asfera.in/assets/images/asfera_images/asferalogo1.png",
        "@id": "",
        "url": "https://www.asfera.in/",
        "telephone": "+91 9066677770",
        "address": {
          "@type": "PostalAddress",
          <?php
          if (isset($_GET['location'])) {

            if ($row['streetAddress'] != '') {
              print('"streetAddress":"' . $row['streetAddress'] . '",' . "\n");
            }

            if ($row['addressLocality'] != '') {
              print('"addressLocality":"' . ucfirst($row['addressLocality']) . '",' . "\n");
            }

            if ($row['postalCode'] != '') {
              print('"postalCode":"' . $row['postalCode'] . '",' . "\n");
            }

          }
          else {
            print('"streetAddress": "Saroj Tower, Office No:- 15 First Floor, 59/1",' . "\n");
            print('"addressLocality": "Delhi",' . "\n");
            print('"postalCode": "110019",' . "\n");
          }
          ?>
         "addressCountry": "IN"
        },
        "geo": {
          "@type": "GeoCoordinates",
          <?php
          if (isset($_GET['location'])) {

            if ($row['latitude'] != '' && $row['longitude'] != '') {
              print('"latitude":' . $row['latitude'] . ',' . "\n");
            }

            if ($row['latitude'] != '' && $row['longitude'] == '') {
              print('"latitude":' . $row['latitude'] . "\n");
            }

            if ($row['longitude'] != '') {
              print('"longitude":' . $row['longitude'] . "\n");
            }

          }
          else {
            print('"latitude": 28.5234036,' . "\n");
            print('"longitude": 77.2520095' . "\n");
          }
          ?>
        },
        "sameAs": [
          "https://www.facebook.com/asferatech",
          "https://twitter.com/AsferaTechnolo1",
          "https://www.instagram.com/asferatec/",
          "https://youtu.be/03TIsob8LGg",
          "https://www.linkedin.com/company/asfera-technology",
          "https://in.pinterest.com/asferatechnologies/_saved/",
          "https://www.asfera.in/"
        ]
      }
    </script>
    <!-- Schema Code End-->

    <!-- Meta Pixel Code -->
    <script>
      !function (f, b, e, v, n, t, s) {
        if (f.fbq) return; n = f.fbq = function () {
          n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
        n.queue = []; t = b.createElement(e); t.async = !0;
        t.src = v; s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
      }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '807678700244591');
      fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=807678700244591&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->

  </head>

  <body>

    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container"><span></span><span></span><span></span><span></span>
        </div>
      </div>
    </div>

    <div class="page">
      <div id="home">
        <header class="section page-header">
          <!-- RD Navbar-->
          <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
              <div class="rd-navbar-main-outer">
                <div class="rd-navbar-main">
                  <!-- RD Navbar Panel-->
                  <div class="rd-navbar-panel">
                    <!-- RD Navbar Toggle-->
                    <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                    <!-- RD Navbar Brand-->
                    <div class="rd-navbar-brand"><a class="brand" href="<?php echo $baseURL ?>"><img src="<?php echo $baseURL ?>assets/images/global/asfera_logo.png" alt="asfera-technologies-logo" /></a></div>
                  </div>
                  <div class="rd-navbar-main-element">
                    <div class="rd-navbar-nav-wrap">

                      <ul class="rd-navbar-nav">
                        <li class="rd-nav-item active"><a class="rd-nav-link" href="<?php echo $baseURL ?>home">Home</a></li>
                        <li class="rd-nav-item dropdown">
                          <p class="rd-nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">Solutions</p>
                          <div class="dropdown-menu row" aria-labelledby="solutions">
                            <a class="dropdown-item" href="<?php echo $baseURL ?>solutions/call-center-solutions-convoque">Convoque</a>
                             <a class="dropdown-item" href="<?php echo $baseURL ?>solutions/inbound-and-outbound-caller">Inbound and Outbound caller</a>
                            <a class="dropdown-item" href="<?php echo $baseURL ?>solutions/ivr-solutions">IVR Solutions</a>
                            <a class="dropdown-item" href="<?php echo $baseURL ?>solutions/call-recording-software">Registro</a>
                            <a class="dropdown-item" href="<?php echo $baseURL ?>solutions/asfercon-acx-audio-conference-solution-exchange">Asfercon ACX</a>
                            <a class="dropdown-item" href="<?php echo $baseURL ?>solutions/asfercon-vcx-video-conference-system-exchange">Asfercon VCX</a>
                            <a class="dropdown-item" href="<?php echo $baseURL ?>solutions/missed-call-services">Missed Call Service</a>
                             <a class="dropdown-item" href="<?php echo $baseURL ?>" onmouseover="document.getElementById('dialer').style.display='block'">Dialer</a>
                            <div id="dialer" style="display:none;" onblur="getElementById('dialer').style.display='none'">
                              <div>
                                <hr>
                                <a class="dropdown-item" href="<?php echo $baseURL ?>solutions/auto-dialer-software.php">Auto Dialer</a>
                                <a class="dropdown-item" href="<?php echo $baseURL ?>solutions/predictive-dialer-software.php">Predictive Dialer</a>
                                <a class="dropdown-item" href="<?php echo $baseURL ?>solutions/progressive-dialer-software.php">Progressive Dialer</a>
                              </div>
                            </div>
                          </div>
                        </li>

                        <li class="rd-nav-item dropdown" id='navig'>
                          <!-- <a class="rd-nav-link dropdown-toggle" href="<?php echo $baseURL ?>products/products-provided" aria-haspopup="true" aria-expanded="false">Products</a> -->
                          <p class="rd-nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">Products</p>
                          <div class="dropdown-menu" aria-labelledby="products">
                            <a class="dropdown-item" href="<?php echo $baseURL ?>products/gsm-pri-gateway">GSM PRI Gateway</a>
                            <a class="dropdown-item" href="<?php echo $baseURL ?>products/gsm-voip-gateway">GSM Voip Gateway</a>
                            <a class="dropdown-item" href="<?php echo $baseURL ?>products/call-center-headsets">Headsets</a>
                            <a class="dropdown-item" href="<?php echo $baseURL ?>products/ip-pbx-phone-system">IP-PBX</a>
                            <a class="dropdown-item" href="<?php echo $baseURL ?>products/voice-blaster-call-campaigner">Voice Blaster</a>
                            <a class="dropdown-item" href="<?php echo $baseURL ?>products/voice-logger-system" onmouseover="document.getElementById('loggerMenu').style.display='block'">Voice Logger</a>

                            <div id="loggerMenu" style="display:none;" onblur="getElementById('loggerMenu').style.display='none'">
                              <div>
                                <hr>
                                <a class="dropdown-item" href="<?php echo $baseURL ?>products/voice-logger-call-recorder-telephone-call-records">USB</a>
                                <a class="dropdown-item" href="<?php echo $baseURL ?>products/standalone-voice-logger">Standalone</a>
                              </div>
                            </div>

                          </div>
                        </li>

                        <li class="rd-nav-item"><a class="rd-nav-link" href="<?php echo $baseURL ?>about-us">About</a></li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="<?php echo $baseURL ?>blog">Blog</a></li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="<?php echo $baseURL ?>contact">Contacts</a></li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="<?php echo $baseURL ?>career">Career</a></li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="<?php echo $baseURL ?>certificate">Certificates</a></li>

                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </nav>
          </div>
        </header>
