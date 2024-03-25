<?php
session_start();
include('connect.php');
include('header.php');
if(isset($_POST['btnSave']))
{
  $txtemail=$_POST['txtemail'];
  $txtpassword=$_POST['txtpassword'];

  $select="SELECT * FROM Customer where email='$txtemail'";
  $query1=mysqli_query($connection,$select);
  $count=mysqli_num_rows($query1);
  if($count>0)  
  {
    $data=mysqli_fetch_array($query1);
    $_SESSION['cid']=$data['CustomerID'];
    $_SESSION['cname']=$data['CustomerName'];
    echo "<script>alert('Customer Login Successfully')</script>";
    echo "<script>window.location='Car.php'</script>";
   
  }
  else
  {
    echo"<script>alert('Already Exit')</script>";
   
  }
}

?>

<style = "text/css">
  .customerlogin
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
      <span>Customer Login</span>
      <h2>Customer Login</h2>
     
    </div>

    <div class="row" data-aos="fade-up">

      <div class="col-lg-6" style="width:800px; marginr: 200px; position:relative; Left:120px; auto;">
        <form action="CustomerLogin.php" method="post" role="form" >
          <!-- <div class="row"> -->
            
          <div class="form-group mt-3">
                <input type="email" class="form-control" name="txtemail"  placeholder="Enter email" required>
              </div>

              <div class="form-group mt-3">
                <input type="password" class="form-control" name="txtpassword"  placeholder="Enter password" required>
              </div>

          
        
          <div class="my-3">
          
            
          <div class="design button"><button type="submit" name="btnSave">Login</button></div>
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


