<?php
session_start();
   require_once 'include/connection.php';
    // if(!empty($_SESSION['isLoggedIn']))
    // {
    //     echo"<script>location.href = 'index.php';</script>";
    // }
    if(isset($_SESSION['login']))
    {
        header ("Location: index.php");
    }
?>

<?php
    require_once 'include/header-link.php';
?>

<?php
    require_once 'include/header.php';
?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height:670px;">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Detecting Diabetic Retinopathy </h1>
          <h2>Shining a light on Vision : Detecting Diabetic Retinopathy with Precision</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
          <div class="mt-5 mb-5 text-center">
      <a href="http://localhost:5000/" class="btn btn-primary btn-lg">Detect Diabetic Retinopathy</a>
    </div>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="assets/img/eye2.webp" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <hr>
  </main><!-- End #main -->

  <?php
    require_once 'include/footer.php';
?>

<?php
    require_once 'include/footer-link.php';
?>
  
