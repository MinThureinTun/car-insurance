<?php
include('connect.php');

if(isset($_POST['btnregister']))
{
  $staffname=$_POST['txtstaffname'];
  $email=$_POST['txtemail'];
  $password=$_POST['txtpassword'];
  $phone=$_POST['txtphone'];
  $address=$_POST['txtaddress'];


  $Image=$_FILES['txtprofile']['name'];
  $Folder="images/";
  $filename=$Folder . '_' . $Image;
  $image=copy($_FILES['txtprofile']['tmp_name'],$filename);
  if(!$image)
  {
    echo"<p>Cannot Upload Staff Profile</p>";
    exit();
  }

  $select="SELECT * FROM staff where Email='$email'";
  $query1=mysqli_query($connection,$select);
  $count=mysqli_num_rows($query1);
  if($count>0)
  {
    echo"<script>alert('Duplicate Staff')</script>";
  }
  else
  {
  $insert="INSERT INTO staff(staffname,email,password,phone,address,profile) 
      values('$staffname','$email','$password','$phone','$address','$filename')";

  $query=mysqli_query($connection,$insert);
  
  if($query)
  {
    echo "<script>alert('Staff Register Successfully')</script>";
    echo "<script>window.location='Cartype.php'</script>";
  }
}
}
?>

<style = "text/css">
  .staffregister
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
        <li><a class="staffpage" href="Staffpage.php">Home</a></li>
          <li><a class="staffregister" href="staff.php">Staff Register</a></li>
          <li><a class="stafflogin" href="StaffLogin.php">Staff Login</a></li>
      
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


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


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <span>Staff Register</span>
          <h2>Staff Register</h2>
         
        </div>

        <div class="row" data-aos="fade-up">

          <div class="col-lg-12">
            <form action="staff.php" method="post"  enctype="multipart/form-data">
              <div class="row">

              <!-- <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="id" name="txtstaff_id" class="form-control" placeholder="Staff-id" required>
                </div> -->


                <div class="col-md-6 form-group mt-3 mt-md-0">
                 <input type="text" name="txtstaffname" class="form-control"  placeholder="Staff-Name" required>
                </div>
              

                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" name="txtemail" class="form-control" placeholder="Staff-Email" required>
                </div>
              
                  <div class="col-md-6 form-group mt-3 mt-md-3">
                  <input type="password" class="form-control" name="txtpassword"  placeholder="Enter Password" required>
                </div>

                <div class="col-md-6 form-group mt-3 mt-md-3">
                  <input type="text" class="form-control" name="txtphone"  placeholder="Enter Phone Number" required>
                </div>

              <div class="form-group mt-3">
                <textarea class="form-control" name="txtaddress" rows="5" placeholder="Address" required></textarea>
                <input type="file" name="txtprofile" required="">
              </div>

              <div class="form-group mt-3">
              <div class="design button"><button type="submit" name="btnregister">Register</button></div>
              </div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->




<?php
include('footer.php');
?>