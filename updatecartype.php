<?php
include('connect.php');
include('header1.php');
if(isset($_POST['btnSave']))
{
  $CarTypename=$_POST['txtCarTypename'];
  $select="SELECT * FROM Cartype where CarTypeName='$CarTypename'";
  $query1=mysqli_query($connection,$select);
  $count=mysqli_num_rows($query1);
  if($count>0)
  {
    echo"<script>alert('Duplicate txtCarTypename')</script>";
  }
  else
  {
  $insert="INSERT INTO CarType(CarTypeName) 
      values('$CarTypename')";

  $query=mysqli_query($connection,$insert);
  if($query)
  {
    echo "<script>alert('CarType Save Successfully')</script>";
  }
}
}
?>


<style = "text/css">
  .updatecartype
    {
    background-color: #d4af37;
    } 

    .row
    {
    
    }
</style>


  <main id="main">

   

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <span>Update Cartype</span>
          <h2>Update Cartype</h2>
         
        </div>

        <div class="row" data-aos="fade-up">

          <div class="col-lg-9">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="Cartype" id="Cartype" placeholder="Write Cartype" required>
              </div>
            
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->


</body>

</html>

<?php
include('footer.php');
?>