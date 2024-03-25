<?php
include('connect.php');
include('header1.php');
if(isset($_POST['btnSave']))
{
  $cartype=$_POST['txtCarTypeName'];

  $select="SELECT * FROM CarType where CarTypeName='$cartype'";
  $query1=mysqli_query($connection,$select);
  $count=mysqli_num_rows($query1);
  if($count>0)
  {
    echo"<script>alert('Duplicate CarType')</script>";
  }
  else
  {
  $insert="INSERT INTO CarType(CarTypeName) 
      values('$cartype')";

  $query=mysqli_query($connection,$insert);
  
  if($query)
  {
    echo "<script>alert('Car Register Successfully')</script>";
  }
}
}
?>

<style = "text/css">
  .cartype
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

<main id="main">


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <span>Car Type</span>
          <h2>Car Type</h2>
         
        </div>

        <div class="row" data-aos="fade-up">

        <div class="row" data-aos="fade-up">
          <div class="col-lg-6" style="width:800px; marginr: 200px; position:relative; Left:300px; auto;">
            <form action="Cartype.php" method="post">

 <!-- class="php-email-form" --> 

              <div class="row">
                
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="txtCarTypeName" id="Cartype" placeholder="Write Cartype" required>
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

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

<?php
include('footer.php');
?>