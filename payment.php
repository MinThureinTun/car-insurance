<?php
session_start();
include('connect.php');
if(isset($_POST['btnSave']))
{
  $CusName=$_POST['txtCustomerName'];
  $NRCnum=$_POST['txtNRCnumber'];
  $Email=$_POST['txtEmail'];
  $Password=$_POST['txtPassword'];
  $Phonenumber=$_POST['txtPhoneNumber'];
  $Address=$_POST['txtAddress'];

  echo $select="SELECT * FROM Customer where Email='$Email'";
  $query1=mysqli_query($connection,$select);
  $count=mysqli_num_rows($query1);
  if($count>0)
  {
    echo"<script>alert('Duplicate Customer')</script>";
  }
  else
  {
  echo $insert="INSERT INTO Customer( CustomerName, NRCnumber, Email, Password, PhoneNumber, Address) 
      values('$CusName', '$NRCnum', '$Email', '$Password', '$Phonenumber', '$Address')";

  $query=mysqli_query($connection,$insert);
  if($query)
  {
    echo "<script>alert('Customer Register Successfully')</script>";
    echo "<script>window.location='CustomerLogin.php'</script>";
  }
}
}
?>

<style = "text/css">
  .payment
    {
    background-color: #d4af37;
    } 

    .charges
    {
      border-left: none;
      border-top: none;
      border-right: none;
      background: transparent;
      margin-top: 10px;
      text-align-last: center;
      text-align: center;
      --text-align-last: center;
      -moz-text-align-last: center
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

      <h1 class="logo"><a href="index.html">Day</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
        <li><a class="homepage" href="customerhome3.php">Home</a></li>
          <li class="payment"><a href="payment.php">Payment</a></li>
          <li><a class="claim" href="Claim2.php">Claim</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


<main id="main">


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <span>Payment</span>
          <h2>Payment</h2>
         
        </div>

       

        
<div class="row" data-aos="fade-up">
          <div class="col-lg-6">
            <form action="payment.php" method="post">


              <div class="row">
              <?php 
             if(isset($_SESSION['cname']))
            {
              echo "Customer Name :".$_SESSION['cname'] . "<p>";
            }; ?>

              <div class="form-group mt-3">
                <input type="text" class="charges" name="txtcharges" placeholder="Charges" required readonly>
              </div>

              <div class="form-group mt-3">
                <input type="Date" class="form-control" name="txtpaymentdate" placeholder="Enter Date" required>
              </div>
             
              <div class="form-group mt-3">
                Choose Payment Type
                <select name="cbopaymenttype" id="cover_period_drop" style="border-left: none;border-top: none;border-right: none;background: transparent;margin-top: 10px;text-align-last: center;text-align: center;--text-align-last: center;-moz-text-align-last: center;">
                    <option value="1">Cash</option>
                    <option value="2">AYA pay</option>
                    <option value="4">CB Pay</option>
                    <option value="3">KBZ Pay</option>
                </select>
              </div> &nbsp;&nbsp;&nbsp;

             
           
              <div class="design button"><button type="submit" name="btnSave">Send Message</button></div>

             


              
            
             

            </form>
          </div>

        </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

<?php
include('footer.php');
?>