<?php
include('connect.php');
include('autoidfunction.php');
include('header1.php');
if(isset($_POST['btnSave']))
{
   $InsuranceID=$_POST['txtInsuranceID'];
  $InsuranceType=$_POST['txtInsuranceType'];
  $Car=$_POST['txtCar'];
  $InsuranceFees=$_POST['txtInsuranceFees'];
  $InsurancePeriod=$_POST['txtInsurancePeriod'];
  $InsuranceDescription=$_POST['txtInsuranceDescription'];
  $Service=$_POST['txtService'];
  
  

  
  $insert="INSERT INTO Insurance(InsuranceID, InsuranceType, InsuranceFees, InsurancePeriod,  InsuranceDescription, ServiceID) 
      values('$InsuranceID', '$InsuranceType', '$InsuranceFees', '$InsurancePeriod', '$InsuranceDescription', $Service)";

  $query=mysqli_query($connection,$insert);
  
    $insert="INSERT INTO CarDetail( CarID, InsuranceID) 
      values('$Car', '$InsuranceID')";

       $query=mysqli_query($connection,$insert);
  if($query)
  {
    echo "<script>alert('Insurance Save Successfully')</script>";
  }

}
?>

<style>
    .Insurance
    {
    background-color: #d4af37;
    } 
</style>

  <main id="main">
   
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">


      <div class="section-title">
          <span>Insurance</span>
          <h2>Insurance</h2>          
        
         
        </div>

        

        <div class="row" data-aos="fade-up">

          

          <div class="col-lg-9">
            <form action="Insurance.php" method="post"  enctype="multipart/form-data">


<!--              <div class="row">  -->
 <div class="col-md-12 mt-3 form-group">

      <input type="text" class="form-control" name="txtInsuranceID" value="<?php echo AutoID('Insurance','InsuranceID','SUR_',6)?>" readonly>
</div>

                <div class="col-md-12 mt-3 form-group">
               
                  <input type="text" name="txtInsuranceType" class="form-control"  placeholder="InsuranceType" required>
                </div>
                 <div class="col-md-12  mt-3 form-group">

<?php          
          $select="SELECT * FROM Car";
          $query=mysqli_query($connection,$select);
          $count=mysqli_num_rows($query);

          echo "<select name='txtCar' class='form-control' >";
          for ($i=0; $i <$count; $i++) 
          { 
            $data=mysqli_fetch_array($query);
            $CarName=$data['CarName'];
            $CarID=$data['CarID'];

            echo "<option value='$CarID'>$CarName</option>";
          }
          echo "</select>";
          ?>
</div>

         
                 <div class="col-md-12  mt-3 form-group">

                  <?php 
          
          $select="SELECT * FROM Service";
          $query=mysqli_query($connection,$select);
          $count=mysqli_num_rows($query);

          echo "<select name='txtService' class='form-control' >";
          for ($i=0; $i <$count; $i++) 
          { 
            $data=mysqli_fetch_array($query);
            $Servicetype=$data['ServiceTypeID'];
            $ServiceID=$data['ServiceID'];

            echo "<option value='$ServiceID'>$Servicetype</option>";
          }
          echo "</select>";
          ?>


                <div class="col-md-12 mt-3 form-group">
                <input type="text" name="txtInsuranceFees" class="form-control"  placeholder="InsuranceFees" required>
                </div>

                 <div class="col-md-12 mt-3 form-group">
                   <input type="text" name="txtInsurancePeriod" class="form-control"  placeholder="InsurancePeriod" required>
                </div>

               

                <div class="col-md-12 mt-3 form-group">
              <textarea class="form-control" name="txtInsuranceDescription" rows="5" placeholder="Write Description" required></textarea>
              </div>

                

                 <div class="my-3">
             
              <div class="text-center"><button type="submit" name="btnSave" style="background-color:Red ; width:100px;">Save</button></div>
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