<?php
include 'admin/assets/includes/head.inc.php';
require_once('admin/models/DbConnect.class.php');
require_once('admin/models/HomeManager.class.php');
require_once('admin/models/AboutManager.class.php');
require_once('admin/models/ServicesManager.class.php');
require_once('admin/models/TeamManager.class.php');
require_once('admin/models/PortfolioManager.class.php');
require_once('admin/models/ContactUsManager.class.php');
require_once('admin/models/ContactCardManager.class.php');
require_once('admin/models/ServicesCardManager.class.php');
$homeManager = new HomeManager();
$homeData = $homeManager->getHomeData();
$aboutManager = new AboutManager();
$aboutData = $aboutManager->getAboutData();
$servicesManager = new ServicesManager();
$servicesData = $servicesManager->getServicesData();
$teamManager = new TeamManager();
$teamData = $teamManager->getTeamData();
$teamMemberData = $teamManager->getTeamMemberData();
$portfolioManager = new PortfolioManager();
$portfolioItems = $portfolioManager->getPortfolioItems();
$contactUsManager = new ContactUsManager();
$contactUsData = $contactUsManager->getContactUsInfo();
$contactCardManager = new ContactCardManager();
$contactCards = $contactCardManager->getAllContactCards();
$servicesCardManager = new ServicesCardManager();
$servicesCards = $servicesCardManager->getAllServicesCards();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BizLand Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">BizLand<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <?php foreach ($homeData as $data) : ?>
    <section id="hero" class="d-flex align-items-center" style="background: url(<?php echo $data['bgd_image']; ?>);">
      <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <!-- Heading -->
        <h1><?php echo $data['heading']; ?></h1>
        <!-- Sub-Heading -->
        <h2><?php echo $data['subheading']; ?></h2>
        <div class="d-flex">
          <!-- Call to action -->
          <a href="#about" class="btn-get-started scrollto"><?php echo $data['btnText']; ?></a>
          <!-- Video -->
          <a href="<?php echo $data['video']; ?>" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span><?php echo $data['videoText']; ?></span></a>
        </div>
      </div>
    </section>
  <?php endforeach; ?>
  <!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <?php foreach ($aboutData as $data) : ?>
      <section id="about" class="about section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>About</h2>
            <h3><?php echo $data['section_title']; ?></h3>
            <p><?php echo $data['section_subheader']; ?></p>
          </div>

          <div class="row">
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
              <img src="assets/img/about.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
              <h3><?php echo $data['article_header']; ?></h3>
              <p class="fst-italic">
                <?php echo $data['article_subheader']; ?>
              </p>
              <ul>
                <li>
                  <i class="bx bx-store-alt"></i>
                  <div>
                    <h5><?php echo $data['listitem1_title']; ?></h5>
                    <p><?php echo $data['listitem1_text']; ?></p>
                  </div>
                </li>
                <li>
                  <i class="bx bx-images"></i>
                  <div>
                    <h5><?php echo $data['listitem2_title']; ?></h5>
                    <p><?php echo $data['listitem2_text']; ?></p>
                  </div>
                </li>
              </ul>
              <p>
                <?php echo $data['paragraph']; ?>
              </p>
            </div>
          </div>

        </div>
      </section>
    <?php endforeach; ?>
    <!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <?php foreach ($servicesData as $data) : ?>
      <section id="services" class="services">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Services</h2>
            <h3><?php echo $data['section_title']; ?></h3>
            <p><?php echo $data['section_subheader']; ?></p>
          </div>

        <?php endforeach; ?>
        <div class="row">
          <?php foreach ($servicesCards as $data) : ?>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><i class="<?php echo $data['icon']; ?>"></i></div>
                <h4><a href=""><?php echo $data['title']; ?></a></h4>
                <p><?php echo $data['text']; ?></p>
              </div>
            </div>

          <?php endforeach; ?>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">
        <?php foreach ($portfolioItems as $item) { ?>
          <div class="section-title">
            <h2>Portfolio</h2>
            <h3><?php echo $item['header']; ?></h3>
            <p><?php echo $item['subheader']; ?></p>
          </div>

          <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <?php
            $images = json_decode($item['images'], true);
            if (is_array($images)) {
              foreach ($images as $image) {
                ?>
                <div class="col-lg-4 col-md-6 portfolio-item">
                  <a href="<?php echo $image; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link">
                    <img src="<?php echo $image; ?>" class="img-fluid" alt="">
                  </a>
                </div>
                <?php
              }
            }
            ?>
          </div>
        <?php } ?>
      </div>
    </section>
    <!-- End Portfolio Section -->



    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">
        <?php foreach ($teamData as $data) : ?>
          <div class="section-title">
            <h2>Team</h2>
            <h3><?php echo $data['section_title']; ?></h3>
            <p><?php echo $data['section_subheader']; ?></p>
          </div>

        <?php endforeach; ?>
        <div class="row">
          <?php foreach ($teamMemberData as $data) : ?>
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
              <div class="member">
                <div class="member-img">
                  <img src="<?php echo $data['picture']; ?>" class="img-fluid" alt="">
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4><?php echo $data['name']; ?></h4>
                  <span><?php echo $data['title']; ?></span>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div>
  </section><!-- End Team Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
      <?php foreach ($contactUsData as $data) : ?>
        <div class="section-title">
          <h2>Contact</h2>
          <h3><?php echo $data['heading']; ?></h3>
          <p><?php echo $data['subheading']; ?></p>
        </div>
      <?php endforeach; ?>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <?php foreach ($contactCards as $data) : ?>
          <div class="col-lg-<?php echo $data['size']; ?>">
            <div class="info-box mb-4">
              <i class="<?php echo $data['icon']; ?>"></i>
              <h3><?php echo $data['title']; ?></h3>
              <p><?php echo $data['text']; ?></p>
            </div>
          </div>
        <?php endforeach; ?>

      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <?php foreach ($contactUsData as $data) : ?>
          <div class="col-lg-6 ">
            <iframe class="mb-4 mb-lg-0" src="<?php echo $data['map']; ?>" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
          </div>
        <?php endforeach; ?>

        <div class="col-lg-6">
          <form action="contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section>
  <!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= bottom Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
  <div class="container d-flex justify-content-center justify-content-md-between">
    <div class="social-links d-none d-md-flex align-items-center">
      <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
    </div>
  </div>
</section>

<!-- ======= Footer ======= -->
<footer id="footer">
  <div class="container py-4">
    <div class="copyright">
      <?php foreach ($homeData as $data) : ?>
        &copy;<?php echo $data['footer']; ?>
      <?php endforeach; ?>
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>