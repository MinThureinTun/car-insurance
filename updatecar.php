<?php
include('connect.php');
include('header1.php');
if(isset($_POST['btnSave']))
{
  $CarName=$_POST['txtCarName'];
  $CarTypeID=$_POST['txtCarType'];
  $CarColor=$_POST['txtCarColor'];
  $CarEngine=$_POST['txtCarEngine'];
  $CarDescription=$_POST['txtDescription'];
  

  $select="SELECT * FROM Car where CarName='$CarName'";
  $query1=mysqli_query($connection,$select);
  $count=mysqli_num_rows($query1);
  if($count>0)
  {
    echo"<script>alert('Duplicate CarName')</script>";
  }
  else
  {
  $insert="INSERT INTO Car( CarName, CarTypeID, CarColor, CarEngine, Description) 
      values('$CarName', '$CarTypeID', '$CarColor', '$CarEngine', '$Description')";

  $query=mysqli_query($connection,$insert);
  if($query)
  {
    echo "<script>alert('Car Save Successfully')</script>";
  }
}
}
?>

<style = "text/css">
  .updatecar
    {
    background-color: #d4af37;
    } 
</style>

  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

       <div class="section-title">
          <span>Update Car Register</span>
          <h2>Update Car Register</h2>
       </div>

        <div class="row" data-aos="fade-up">

          <div class="col-lg-12">
            <form action="Car.php" method="post"  class="php-email-form"  role="form" enctype="multipart/form-data">
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

              

                <div class="col-md-12 form-group mt-3 mt-md-3">
                <textarea class="form-control" name="txtDescription" rows="5" placeholder="Description" required></textarea>
              </div>
                </div>

                <div class="form-group mt-3">
              <div class="text-center"><button type="submit">Send Message</button></div>
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