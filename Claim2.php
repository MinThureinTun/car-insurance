<?php
session_start();
include('connect.php');

if(isset($_POST['btnSave']))

{
  $CusName=$_POST['txtPhoneNumber'];
  $NRCnum=$_POST['txtlicense'];
  $Email=$_POST['txtdate'];
  $Password=$_POST['txttime'];
  $Phonenumber=$_POST['txtlocation'];
  $Address=$_POST['txtdetail'];
  $portion=$_POST['txtportion'];
  
  $Image3=$_FILES['txtprofile']['name'];
  $Folder="images/";
  $filename=$Folder . '_' . $Image3;  
  $image=copy($_FILES['txtprofile']['tmp_name'],$filename);
  if(!$image)
  {
    echo "<p>Cannot Upload  Staff Profile</p>";
    exit();
  }
$insert="INSERT INTO Claim(PhoneNumber,License,AccidentDate,AccidentTime,Locations,Detail,Portion,images) 
  values('$CusName','$NRCnum','$Email','$Password','$Phonenumber','$Address','$portion','$filename')";
  $query=mysqli_query($connection,$insert);
  if($query)
  {
    echo "<script>alert('Claim Report Successful')</script>";
  }
  else
  {
     mysqli_error($connection);
  }
}
?>

<style = "text/css">
  .claim
    {
    background-color: #d4af37;
    } 

    .design button[type="submit"] 
{
  background: #cc1616;
  border: 0;
  padding: 10px 24px;
  color: #fff;
  transition: 0.4s;
}

.design button[type="submit"]:hover 
{
  background: #e82d2d;
}
</style>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Day Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
  * Template Name: Day - v4.3.0
  * Template URL: https://bootstrapmade.com/day-multipurpose-html-template-for-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com">info@example.com</a>
        <i class="bi bi-phone-fill phone-icon"></i> +1 5589 55488 55
      </div>
      <div class="social-links d-none d-md-block">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <!-- <h1 class="logo"><a href="index.html">Green Day</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="index.html" class="logo"><img src="assets/img/10.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
        <li><a class="homepage" href="customerhome3.php">Home</a></li>
        <li class="payment"><a href="payment.php">Payment</a></li>
          <li class="claim"><a href="Claim2.php">Claim</a></li>
  
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

        </div>

       
      </div>
    </section>



   

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
 

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

<main id="main">

<div class="row" data-aos="fade-up">
          <div class="col-lg-6" style="width:800px; margin:0 auto;">
          
            <form action="Claim.php" method="POST" enctype="multipart/form-data">


              <div class="row">

              <?php 
            if(isset($_SESSION['cname']))
            {
              echo "Customer Name :".$_SESSION['cname'] . "<p>";
            }; ?>

              <div class="form-group mt-3">
                Phone Number
                <input type="text" class="form-control" name="txtPhoneNumber" placeholder="eg: 09789963539" required>
              </div>
             
              <div class="form-group mt-3">
              License
                <input type="text" class="form-control" name="txtlicense" placeholder="eg: 2R/3297" required>
              </div>

              <div class="form-group mt-3">
              Accident Date
                <input type="date" class="form-control" name="txtdate" placeholder="Select Date" required>
              </div>

              <div class="form-group mt-3">
              Accident Time
                <input type="time" class="form-control" name="txttime" placeholder="Select Time" required>
              </div>

              <div class="form-group mt-3">
              Accident Loaction
                <input type="text" class="form-control" name="txtlocation" placeholder="eg: Set Yone Road near Mingalartaungnyunt, Yangon" required>
              </div>

              <div class="form-group mt-3">
                Accident Detail
              <textarea class="form-control" name="txtdetail" rows="5" placeholder="Accident Detail" required></textarea>
              </div>

              <div class="form-group mt-3">
              Damage Portion
                <input type="text" class="form-control" name="txtportion" placeholder="eg: frontlight" required>
              </div>

              <div class="form-group mt-3">
                <textarea class="form-control" name="txtaddress" rows="5" placeholder="Address" required></textarea>


                <div class="form-group mt-3">
                <input type="file" name="txtprofile">
              </div>

              
              <div class="my-3">
                <!-- <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div> -->
              </div>
              <div class="design button"><button type="submit" name="btnSave">Send Message</button></div>
            </form>
          </div>

        </div>

        </main><!-- End #main -->

<?php
include('footer.php');
?>
