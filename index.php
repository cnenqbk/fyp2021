<!--Home Page Template Credit to -> https://bootstrapmade.com/selecao-bootstrap-template/-->
<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'assets/vendor/phpmailer/phpmailer/src/Exception.php';
  require 'assets/vendor/phpmailer/phpmailer/src/PHPMailer.php';
  require 'assets/vendor/phpmailer/phpmailer/src/SMTP.php';

  // Include autoload.php file
  require 'assets/vendor/autoload.php';
  // Create object of PHPMailer class
  $mail = new PHPMailer(true);

  $output = '';

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try {
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Username = 'cwtxyz@gmail.com';
      $mail->Password = 'Qwerty666!';
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = 587;

      $mail->setFrom('cwtxyz@gmail.com');
      $mail->addAddress('charyinghaoo01@gmail.com');

      $mail->isHTML(true);
      $mail->Subject = 'Customer Contact Information';
      $mail->Body = "<h3>Name : $name <br>Email : $email <br>Subject : $subject <br>Message : $message</h3>";

      $mail->send();
      $output = '<div class="alert alert-success">
                  <h5>Thanks for contact us, we\'ll get back to you soon !</h5>
                </div>';
    } catch (Exception $e) {
      $output = '<div class="alert alert-danger">
                  <h5>' . $e->getMessage() . '</h5>
                </div>';
    }
  }

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
<!--metadata-->
  <title>CWTXYZ</title>
  <meta content="Welcome to CWTXYZ" name="description">
  <meta content="mobile" name="keywords">
  <meta content="CYH, WSH, TYS" name="author">
<!--favicon-->
  <link rel="apple-touch-icon" sizes="180x180" href="assets/images/cwtxyz/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/images/cwtxyz/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/cwtxyz/favicon-16x16.png">
  <link rel="manifest" href="assets/images/cwtxyz/site.webmanifest">


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!--vendor-->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/line-awesome/css/line-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

 
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
        display: none;
    }
</style>

  
</head>

<body>

  
  <header id="header" class="fixed-top d-flex align-items-center  header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="index">CWTXYZ</a></h1>
        
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="register">Become Our Member</a></li>
          <li><a href="login">Member Login</a></li>
          <li><a href="prod">Our Products</a></li>
          <li><a href="loginAdmin">Admin Access</a></li>
          <li><a href="#team">Teams</a></li>
          <li><a href="#contact">Contact US</a></li>

        </ul>
      </nav>

    </div>
  </header>


  <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
    <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Welcome to <span>CWTXYZ</span></h2>
          <p class="animate__animated fanimate__adeInUp">A Premier Mobile Accessories Store & Being a Trendsetter of The Higher Business Provider in Malaysia</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Welcome to <span>CWTXYZ</span></h2>
          <p class="animate__animated animate__fadeInUp">A Premier Mobile Accessories Store & Being a Trendsetter of The Higher Business Provider in Malaysia</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Welcome to <span>CWTXYZ</span></h2>
          <p class="animate__animated animate__fadeInUp">A Premier Mobile Accessories Store & Being a Trendsetter of The Higher Business Provider in Malaysia</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>About</h2>
          <p>Who we are</p>
        </div>

        <div class="row content" data-aos="fade-up">
          
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              We are Diploma In Information Technology and Science students from Multimedia University and this website was developed by us for selling the mobile accessories.
            </p>
         
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    

    

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>F.A.Q</h2>
          <p>Frequently Asked Questions</p>
        </div>

        <ul class="faq-list">

          <li data-aos="fade-up" data-aos-delay="100">
            <a data-bs-toggle="collapse" class="" data-bs-target="#faq1">What kinds of accessories that we are selling ? <i class="icofont-simple-up"></i></a>
            <div id="faq1" class="collapse show" data-bs-parent=".faq-list">
              <p>
                We are selling the type of accessories of power bank, usb cables, charges and earphones.
              </p>
            </div>
          </li>

    

          <li data-aos="fade-up" data-aos-delay="300">
            <a data-bs-toggle="collapse" data-bs-target="#faq3" class="collapsed">How the delivery fees charges ?  <i class="icofont-simple-up"></i></a>
            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
              <p>
                The delivery fees is free by purchase our products from our website.
              </p>
            </div>
          </li>

         
          <li data-aos="fade-up" data-aos-delay="500">
            <a data-bs-toggle="collapse" data-bs-target="#faq5" class="collapsed">How many payment methods that will include when checkout ? <i class="icofont-simple-up"></i></a>
            <div id="faq5" class="collapse" data-bs-parent=".faq-list">
              <p>
                The payment method can be choose either Credit Card or Online Banking.
              </p>
            </div>
          </li>

          

        </ul>

      </div>
    </section><!-- End F.A.Q Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Team</h2>
          <p>Our Hardworking Teams</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up">
              <div class="member-img">
                <img src="assets/images/teams/cyh.jpg" class="img-fluid" alt="">
                <div class="social">
              
                  <a href="https://www.facebook.com/cnenqbk/" target="_blank"><i class="icofont-facebook"></i></a>
                 
                  <a href="https://www.linkedin.com/in/cnenqbk/" target="_blank"><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>CHAR YING HAO</h4>
                <span>Project Leader</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="assets/images/teams/wsh.jpg" class="img-fluid" alt="">
                <div class="social">
                
                  <a href="https://www.facebook.com/OUMASHUUwareda/" target="_blank"><i class="icofont-facebook"></i></a>
           
                  <a href="https://www.linkedin.com/in/wong-shu-hong-a9a775117/" target="_blank"><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>WONG SHU HONG</h4>
                <span>Project Members</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="assets/images/teams/tys.jpg" class="img-fluid" alt="">
                <div class="social">
                
                  <a href="https://www.facebook.com/yisiang.tan.56" target="_blank"><i class="icofont-facebook"></i></a>
                
                  
                </div>
              </div>
              <div class="member-info">
                <h4>TAN YI SIANG</h4>
                <span>Project Members</span>
              </div>
            </div>
          </div>

          

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Contact</h2>
          <p>leave a messages</p>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4" data-aos="fade-right">
            <div class="info">
              

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Our Email:</h4>
                <p>1191201941@student.mmu.edu.my</p>
                <p>1191201940@student.mmu.edu.my</p>
                <p>1191200733@student.mmu.edu.my</p>
              </div>

              

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

            <form action="#" method="post" role="form" >
              <?= $output; ?>
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"  required />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"  required />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"  required />
                <div class="validate"></div>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" id="message" rows="5"  required placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <br/>
              <div class="text-center"><button type="submit" name="submit" value="Send" id="sendBtn">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>CWTXYZ</h3>
      
      <div class="copyright">
        &copy; Copyright <strong><span>CWTXYZ</span></strong>. All Rights Reserved
      </div>
      
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>

 
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <script src="assets/js/main.js"></script>
  

</body>

</html>