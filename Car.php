<?php
session_start();
include('connect.php');

if(isset($_POST['btnSave']))
{
  $CarName=$_POST['txtCarName'];
  $CarTypeID=$_POST['txtCarType'];
  $CarColor=$_POST['txtCarColor'];
  $CarEngine=$_POST['txtCarEngine'];
  $CarDescription=$_POST['txtDescription'];
  $License=$_POST['txtlicense'];
  $cid=$_SESSION['cid'];
  $cname=$_SESSION['cname'];



  $Image=$_FILES['txtimage1']['name'];
  $Folder="images/";
  $filename=$Folder . '_' . $Image;
  $image=copy($_FILES['txtimage1']['tmp_name'],$filename);
  if(!$image)
  {
    echo"<p>Cannot Upload Car Image</p>";
    exit();
  }

  $Image=$_FILES['txtimage2']['name'];
  $Folder="images/";
  $filename1=$Folder . '_' . $Image;
  $image=copy($_FILES['txtimage2']['tmp_name'],$filename1);
  if(!$image)
  {
    echo"<p>Cannot Upload Car Image</p>";
    exit();
  }

  $Image=$_FILES['txtimage3']['name'];
  $Folder="images/";
  $filename2=$Folder . '_' . $Image;
  $image=copy($_FILES['txtimage3']['tmp_name'],$filename2);
  if(!$image)
  {
    echo"<p>Cannot Upload Car Image</p>";
    exit();
  }

  $Image=$_FILES['txtimage4']['name'];
  $Folder="images/";
  $filename3=$Folder . '_' . $Image;
  $image=copy($_FILES['txtimage4']['tmp_name'],$filename3);
  if(!$image)
  {
    echo"<p>Cannot Upload Car Image</p>";
    exit();
  }

  
  $Image=$_FILES['txtimage4']['name'];
  $Folder="images/";
  $filename4=$Folder . '_' . $Image;
  $image=copy($_FILES['txtimage4']['tmp_name'],$filename4);
  if(!$image)
  {
    echo"<p>Cannot Upload Car Image</p>";
    exit();
  }

  $Image=$_FILES['txtimage5']['name'];
  $Folder="images/";
  $filename5=$Folder . '_' . $Image;
  $image=copy($_FILES['txtimage5']['tmp_name'],$filename5);
  if(!$image)
  {
    echo"<p>Cannot Upload Car Image</p>";
    exit();
  }


  

  $select="SELECT * FROM Car where license='$License'";
  $query1=mysqli_query($connection,$select);
  $count=mysqli_num_rows($query1);
  if($count>0)
  {
    echo"<script>alert('Duplicate Lincense')</script>";
  }
  else
  {
  $insert="INSERT INTO Car(CustomerID,CarName, CarTypeID, CarColor, CarEngine, Description,image1,image2,image3,image4,image5,image6,license) 
  values('$cid','$CarName','$CarTypeID','$CarColor','$CarEngine','$CarDescription','$filename','$filename1','$filename2','$filename3','$filename4','$filename5','$License')";

  $query=mysqli_query($connection,$insert);
  if($query)
  {
    echo "<script>alert('Car Save Successfully')</script>";
    echo "<script>window.location='Service.php'</script>";
  }
}
}
?>

<style = "text/css">
  .car
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
        <li><a class="homepage" href="customerhome2.php">Home</a></li>
          <li class="Car"><a href="Car.php">Car Register</a></li>
          <li><a class="Claim" href="Claim.php">Claim</a></li> 
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
          <span>Car Register</span>
          <h2>Car Register</h2>
       </div>

        <div class="row" data-aos="fade-up">

          <div class="col-lg-12">
            <form action="Car.php" method="post" enctype="multipart/form-data"   >

            <div class="row"> 
            <?php 
            if(isset($_SESSION['cname']))
            {
              echo "Customer Name :".$_SESSION['cname'] . "<p>";
            }; ?>


            </div>

             <div class="row"> 
                             
             <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" name="txtCarName" class="form-control" id="name" placeholder="Car Name" required>
                </div> 

                <div class="col-md-6 form-group mt-3 mt-md-0">

<?php 
					
					        $select="SELECT * FROM CarType";
					        $query=mysqli_query($connection,$select);
					        $count=mysqli_num_rows($query);

					        echo "<select name='txtCarType' class='form-control' >";
				        	for ($i=0; $i <$count; $i++) 
					        { 
					        	$data=mysqli_fetch_array($query);
					        	$CarTypeName=$data['CarTypeName'];
					        	$CarTypeID=$data['CarTypeID'];

						        echo "<option value='$CarTypeID'>$CarTypeName</option>";
				        	}
					        echo "</select>";
?>

                </div>

                <div class="col-md-6 form-group mt-3 mt-md-3">
                  <input type="text" name="txtCarColor" class="form-control"  placeholder="Car Color" required>
                </div>

                <div class="col-md-6 form-group mt-3 mt-md-3">              
                  <input type="text" name="txtCarEngine" class="form-control"  placeholder="Car Engine" required>
                </div>

                <div class="col-md-6 form-group mt-3 mt-md-3">     
                  <label>Front View</label>         
                  <input type="file" name="txtimage1" class="form-control" placeholder="Choose front photo" required>
                </div>

                <div class="col-md-6 form-group mt-3 mt-md-3">  
                <label>Back View</label>            
                  <input type="file" name="txtimage2" class="form-control" placeholder="Choose back photo" required>
                </div>

                <div class="col-md-6 form-group mt-3 mt-md-3">      
                <label>Right Size View</label>        
                  <input type="file" name="txtimage3" class="form-control" placeholder="Choose full image" required>
                </div>

                <div class="col-md-6 form-group mt-3 mt-md-3">        
                <label>Left Size View</label>      
                  <input type="file" name="txtimage4" class="form-control" placeholder="Choose  photo" required>
                </div>

                <div class="col-md-6 form-group mt-3 mt-md-3">      
                <label>Interior Front View</label>        
                  <input type="file" name="txtimage5" class="form-control" placeholder="Choose  photo" required>
                </div>

                <div class="col-md-6 form-group mt-3 mt-md-3">      
                <label>Interior Back View</label>        
                  <input type="file" name="txtimage6" class="form-control" placeholder="Choose  photo" required>
                </div>

                <div class="col-md-6 form-group mt-3 mt-md-3">  
                <label></label>            
                  <input type="text" name="txtlicense" class="form-control" placeholder="Write License" required>
                </div>

              

                <div class="col-md-12 form-group mt-3 mt-md-3">
                <textarea class="form-control" name="txtDescription" rows="5" placeholder="Description" required></textarea>
              </div>
                

                <div class="form-group mt-3">
                <div class="design button"><button type="submit" name="btnSave">Send Message</button></div>
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