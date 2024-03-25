<?php
include('connect.php');
include('header.php');
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
  .customerregister
    {
    background-color: #d4af37;
    } 

  
.row
{
  margin-left: 100px;
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
          <span>Customer Register</span>
          <h2>Customer Register</h2>
         
        </div>

       

        <div class="row" data-aos="fade-up">
          <div class="col-lg-6" style="width:800px; margin: ; auto;">
            <form action="Customer.php" method="post">


              <div class="row">
                
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="txtCustomerName" placeholder="Customer Name" required>
              </div>

              <div class="form-group mt-3">
                <input type="text" class="form-control" name="txtNRCnumber"  placeholder="NRCnumber" required>
              </div>

              <div class="form-group mt-3">
                <input type="text" class="form-control" name="txtEmail"  placeholder="Email" required>
              </div>

              <div class="form-group mt-3">
                <input type="text" class="form-control" name="txtPassword"  placeholder="Enter Password" required>
              </div>

              <div class="form-group mt-3">
                <input type="text" class="form-control" name="txtPhoneNumber" placeholder="Enter Phonenumber" required>
              </div>

              <div class="form-group mt-3">
              <textarea class="form-control" name="txtAddress" rows="5" placeholder="Enter Address" required></textarea>
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