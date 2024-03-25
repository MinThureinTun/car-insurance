<?php 
	session_start();
	include('connect.php');
	include('AutoID.php');
	include('ServiceFunction.php');
	if(isset($_GET['btnsave']))
	{
		$purchaseid=$_GET['txtpurchaseid'];
		$purchasedate=$_GET['txtpurchasedate'];
		$totalamount=$_GET['txttotalamount'];
		$totalquantity=$_GET['txttotalquantity'];
		$SupplierID=$_GET['cboSupplierID'];
		$StaffID=$_GET['cboStaffID'];
		$status="Purchase";

		$insert="insert into Purchase(ServiceID,PurchaseDate,TotalQuantity,TotalPrice,SupplierID,StaffID,PurchaseStatus)
		values('$purchaseid','$purchasedate','$totalquantity','$totalamount','$SupplierID','$StaffID','$status')";
		$query=mysqli_query($connection,$insert);


		$size=count($_SESSION['purchasefunction']);
		for ($i=0; $i <$size ; $i++) 
		{ 		
		$product_id1=$_SESSION['purchasefunction'][$i]['productid'];
		$purchase_price1=$_SESSION['purchasefunction'][$i]['purchaseprice'];
		$purchase_quantity1=$_SESSION['purchasefunction'][$i]['purchasequantity'];
			$Subtotal1=$purchase_price1 * $purchase_quantity1;

			$insert1="insert into PurchaseProduct(PurchaseCode,ProductID,UnitQuantity,UnitPrice,UnitAmount)
			values('$purchaseid','$product_id1',
				'$purchase_quantity1','$purchase_price1','$Subtotal1')";
			$query=mysqli_query($connection,$insert1);	

			$update="UPDATE product set Quantity=Quantity+'$purchase_quantity1' where ProductID='$product_id1'";
			$query=mysqli_query($connection,$update);

			
		}
		if($query)
			{
				echo "<script>alert('Purchase Product Successful')</script>";
			}

	}
	if (isset($_GET['action'])) 
	{
		$action=$_GET['action'];
		if ($action==='add') 
		{
	        $productid=$_GET['cboProductID'];
			$purchaseprice=$_GET['txtpurchaseprice'];
			$purchasequantity=$_GET['txtpurchasequantity'];
			Add($productid,$purchaseprice,$purchasequantity);
		}

		elseif ($action==='remove') 
		{
			$productid=$_GET['productid'];
			Remove($productid);
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
    
	
		<!-- Start Contact -->
		<section id="mu-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-contact-area">

							<div class="mu-heading-area">
								<h2 class="mu-heading-title">Publisher Entry</h2>
								<span class="mu-header-dot"></span>
									</div>

							<!-- Start Contact Content -->
							<div class="mu-contact-content">

								<div id="form-messages"></div>
                                <form action="service.php" method="GET">
		 <input type="hidden" name="action" value="add">
			<table>
			<tr>
				<td>Purchase ID</td>
				<td>
					<input type="text" name="txtpurchaseid" readonly value="<?php echo Auto_ID('purchase', 'purchasecode','Pur_', 6) ?>">
				</td>
			</tr>
			<tr>	
				<td>	Purchase Date</td>
				<td>	
					<input name="txtpurchasedate"  type="text" value="<?php echo date('Y-m-d')?>" readonly/>
				</td>
			</tr>
			<tr>	
					<td>	Total Amount</td>
					<td>	
						<input  name="txttotalamount" type="number" value="<?php 
						if(!isset($_SESSION['purchasefunction']))
						{
							echo "0";
						}
						else
						{
							echo CalculateTotalAmount();
						}
						 ?>"  readonly/>	

					</td>
			</tr>
			
			<tr>	
					<td>	Total Quantity</td>
					<td>	
						<input  name="txttotalquantity" type="number" value="<?php 
						if(!isset($_SESSION['purchasefunction']))
						{
							echo "0";
						}
						else
						{
							echo CalculateTotalQuantity();
						}
						?>"  readonly/>	
					</td>
			</tr>
			<tr>	
					<td>	Product Name</td>
					<td>	
					<?php 
					
					$select="SELECT * FROM Book";
					$query=mysqli_query($connection,$select);
					$count=mysqli_num_rows($query);

					echo "<select name='cboProductID'>";
					for ($i=0; $i <$count; $i++) 
					{ 
						$data=mysqli_fetch_array($query);
						$productname=$data['BookName'];
						$productid=$data['BookID'];
						echo "<option value='$productid'>$productname</option>";
					}
					echo "</select>";
					?>	

					</td>
			</tr>

			<tr>	
					<td>	Purchase Price</td>
					<td>	
					<input name="txtpurchaseprice" type="number"  placeholder="0"/>
					</td>
			</tr>

			<tr>	
					<td>	Purchase Quantity</td>
					<td>	
					<input name="txtpurchasequantity" type="number"  placeholder="0"  />
					</td>
			</tr>
			<tr>	
					<td></td>
					<td>	
				<input type="submit" name="btnAdd" value="Add">
					</td>
			</tr>


		</table>

	<fieldset>
		<legend>Product List</legend>
		<?php
		if (!isset($_SESSION['purchasefunction'])) 
		{
			echo "<p>No Purchase Record Found.</p>";
			exit();
		}
		?>

		<table align="center" border="1" cellpadding="3px">
			<tr>
				<th>Product Image</th>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Purchase Price</th>
				<th>Purchase Qty</th>
				<th>Sub Total</th>
				<th>Action</th>
			</tr>

			<?php
		$size=count($_SESSION['purchasefunction']);
		for ($i=0; $i <$size ; $i++) 
		{ 
		$product_image=$_SESSION['purchasefunction'][$i]['productimage'];
		$product_id=$_SESSION['purchasefunction'][$i]['productid'];
		$product_name=$_SESSION['purchasefunction'][$i]['productname'];
	$purchase_price=$_SESSION['purchasefunction'][$i]['purchaseprice'];
$purchase_quantity=$_SESSION['purchasefunction'][$i]['purchasequantity'];
			$Subtotal=$purchase_price * $purchase_quantity;
			echo
			"<tr>
			<td> <img src='$product_image' width='100px' height='100px'/></td>
			<td> $product_id </td>
			<td> $product_name </td>
			<td> $purchase_price MMK </td>
			<td> $purchase_quantity Pcs </td>
			<td> $Subtotal MMK </td>
			<td>
			<a href='purchase.php?action=remove&productid=$product_id'>Remove</a>
			</td>
			</tr>";
		}
		?>	
		<tr>
			<td>Supplier Name</td>
			<td>
				<select name="cboSupplierID">
					<option>-----Select Supplier Name------</option>
					<?php
					$query="Select * FROM supplier";
					$ret=mysqli_query($connection,$query);
					$count=mysqli_num_rows($ret);

					for ($i=0; $i <$count ; $i++)
					{ 
						$arr=mysqli_fetch_array($ret);
						$SupplierID=$arr['supplierid'];
						$suppliername=$arr['suppliername'];
						echo"<option value='$SupplierID'>" . $suppliername ."</option>";
					}
					?>	
				</select>
			</td>
</tr>
<tr>
			<td>Staff Name</td>
			<td>
				<select name="cboStaffID">
					<option>-----Select Staff Name------</option>
					<?php
					$query="Select * FROM staff";
					$ret=mysqli_query($connection,$query);
					$count=mysqli_num_rows($ret);

					for ($i=0; $i <$count ; $i++)
					{ 
						$arr=mysqli_fetch_array($ret);
						$StaffID=$arr['staffid'];
						$staffname=$arr['staffname'];
						echo"<option value='$StaffID'>" . $staffname ."</option>";
					}
					?>	
				</select>
			</td>
			<td>
				<input type="submit" name="btnsave" value="Save">
			</td>
	
</tr>

		</table>
	</fieldset>
	</form>
					</div>
							<!-- End Contact Content -->

						</div>
					</div>
				</div>
			</div>
		</section>

</main><!-- End #main -->


</body>

</html>

<?php
include('footer.php');
?>