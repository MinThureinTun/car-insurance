<?php
include('connect.php');
include('header1.php');

if(isset($_POST['btnsubmit']))
	{
		$servicetypename=$_POST['txtServiceTypeName'];
    $payment=$_POST['txtpayment'];

		$select="SELECT * FROM ServiceType where ServiceTypeName='$servicetypename'";
		$query=mysqli_query($connection,$select);
		$count=mysqli_num_rows($query);
		if($count>0)
		{
			echo "<script>alert('Duplicate ServiceType Name')</script>";
	
		}

		else
		{
		$insert="insert into ServiceType(ServiceTypeName,payment) values('$servicetypename','$payment')";

		$query=mysqli_query($connection,$insert);
		if($query)
		{
			echo "<script>alert('Service Entry Successful')</script>";
      echo "<script>window.location='ServiceType.php'</script>";
		}
		}
	}
?>


<style = "text/css">
  .servicetype
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
          <span>Service Type</span>
          <h2>Service Type</h2>
         
        </div>

      

        <div class="row" data-aos="fade-up">
          <div class="col-lg-6" style="width:800px; marginr: 200px; position:relative; Left:300px; auto;">
            <form action="ServiceType.php" method="post">

 <!-- class="php-email-form" --> 

              <div class="row">
                
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="txtServiceTypeName"  placeholder="Write Service Type" required>
              </div>

              <div class="form-group mt-3">
                <input type="text" class="form-control" name="txtpayment"  placeholder="Ender payment" required>
              </div>
            
          <div class="my-3">
          <div class="design button"><button type="submit" name="btnsubmit">Send Message</button></div>
          </div>
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