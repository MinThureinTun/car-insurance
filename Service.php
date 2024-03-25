<?php
session_start();
include('connect.php');

if(isset($_POST['btnsubmit']))
	{
	
    $classname=$_POST['cboclassname'];
    $cartype=$_POST['cbocartype'];
    $period=$_POST['cboperiod'];
    $servicetype=$_POST['cboservicetype'];
    $market=$_POST['txtmarket'];
    $power=$_POST['cbopower'];


 $customerid=$_SESSION['cid'];

		$insert="insert into Service(CustomerID,ClassOfVehicle,cartype,period,ServiceType,MarketValue,Enginepower) 
              values('$customerid','$classname','$cartype','$period','$servicetype','$market','$power')";

		$query=mysqli_query($connection,$insert);
		if($query)
		{
			echo "<script>alert('Service Entry Successful')</script>";
      echo "<script>window.location='payment.php'</script>";
		}
		
	}
?>

<style = "text/css">
  .service
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

      <h1 class="logo"><a href="index.html">Day</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
        <li><a class="homepage" href="customerhome.php">Home</a></li>
          <li class="service"><a href="Service.php">Service</a></li>
          <li><a class="claim" href="Claim1.php">Claim</a></li>
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




<div class="container" id="motor_data">
    <input type="text" class="d-none" name="insurance_id" id="insurance_id" value="10">
    <meta name="csrf-token" content="sR0EYQJfN5QWqxWRYgcEtwOni1qnBvhk2V13Qnqk">
    <div style="height: 40px;"></div>
   <form action="Service.php" method="POST"> 
    <div class="row">
    <p>
            <?php 
            if(isset($_SESSION['cname']))
            {
              echo "Customer Name :".$_SESSION['cname'] . "<p>";
            }; ?>


            </div>
  </p>
  </div>
    <div class="row"> 
          
        <div class="col-12 text-center">
            <!-- <p>I want to cover my vehicles against losses resulting from accidents.</p> -->
            
            <p>
              
                Class of vehicle 
                <select name="cboclassname" id="type_of_vehicle" style="border-left: none;border-top: none;border-right: none;background: transparent;margin-top: 10px;text-align-last: center;text-align: center;--text-align-last: center;-moz-text-align-last: center;">
                                                    <option value="1" style="text-align: center;">Private</option>
                                                    <option value="2" style="text-align: center;">Commercial</option>                                         
                                            </select>&nbsp;&nbsp;&nbsp;
                <span id="vehicle_usage_p">Usage 
                <select name=cbocartype id="vehicle_usage" style="border-left: none;border-top: none;border-right: none;background: transparent;margin-top: 10px;text-align-last: center;text-align: center;--text-align-last: center;-moz-text-align-last: center;">
                                                    <option value="1" style="text-align: center;">Car</option>
                                                    <option value="2" style="text-align: center;">Truck</option>
                                            </select></span>
            </p>

            <div style="height: 10px;"></div>
            <p class="" id="cover_period_p">
                Choose a covered period as 
                <select name="cboperiod" id="cover_period_drop" style="border-left: none;border-top: none;border-right: none;background: transparent;margin-top: 10px;text-align-last: center;text-align: center;--text-align-last: center;-moz-text-align-last: center;">
                    <option value="1">3 Months</option>
                    <option value="2">6 Months</option>
                    <option value="4">9 Months</option>
                    <option value="3">12 Months</option>
                </select>
            </p>

            <p class="" id="cover_period_p">
                Choose a Service Type
                <select name="cboservicetype" id="cover_period_drop" style="border-left: none;border-top: none;border-right: none;background: transparent;margin-top: 10px;text-align-last: center;text-align: center;--text-align-last: center;-moz-text-align-last: center;">
                <?php 
							$select="SELECT * FROM servicetype";
							$query=mysqli_query($connection,$select);
							$count=mysqli_num_rows($query);
							if($count>0)
							{
								for ($i=0; $i <$count ; $i++) 
								{ 
									$data=mysqli_fetch_array($query);
									$servicetypeid=$data['ServiceTypeID'];
									$servicetypename=$data['ServiceTypeName'];
                  echo "<option value='$servicetypeid'>$servicetypename</option>";
								}
							}
						?>
                </select>

              

            </p>

            <div style="height: 20px;"></div>
            <p id="market_value_p">
                Market value <input type="text" name="txtmarket" id="market_value" placeholder="" require style="border-left: none;border-top: none;border-right: none;background: transparent;text-align: center;border-bottom: 1px solid #000;">
            </p>
            <span class="d-none" id="market_value_err_msg" style="font-size: 12px;color: #a7222c;">* Please enter the market value.</span>
            <span class="d-none" id="market_value_range_err_msg" style="font-size: 12px;color: #a7222c;">* Market value must be between 50lkhs to 2900lkhs.</span>
            <span class="d-none" id="mobile_range_err_msg" style="font-size: 12px;color: #a7222c;">* Market value must be between 200lkhs to 3000lkhs.</span>
            <div style="height: 20px;"></div>
            <p id="engine_power_p">
                Engine power 
                <select name="cbopower" id="engine_power" style="border-left: none;border-top: none;border-right: none;background: transparent;margin-top: 10px;text-align-last: center;text-align: center;--text-align-last: center;-moz-text-align-last: center;">
                    <option value="1">0 - 1500 CC</option>
                    <option value="2">1501 - 2000 CC</option>
                    <option value="3">2001 - 3000 CC</option>
                    <option value="4">3001 - 4000 CC</option>
                    <option value="5">Above 4001 CC</option>
                </select>
            </p>
            <span class="d-none" id="engine_power_err_msg" style="font-size: 12px;color: #a7222c;">* Please enter the engine power.</span>
            <div style="height: 20px;"></div>
            
            <div style="height: 30px;"></div>
            <!-- <button class="btn btn-default" id="btn-calculate">CALCULATE NOW</button> -->
            <div class="design button"><button type="submit" name="btnsubmit">Submit</button></div>
            <div style="height: 40px;"></div>
        </div>
    </div>
    </form>
</div>

</main><!-- End #main -->


</body>

</html>

<?php
include('footer.php');
?>