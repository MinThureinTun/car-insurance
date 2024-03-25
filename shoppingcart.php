<?php 
session_start();
include('connect.php');
include('ShoppingCartFunction.php');
if(isset($_GET['action'])) 
{
	$action=$_GET['action'];
	if ($action==="buy")
	{
		$productid=$_GET['productid'];
		$BuyQuantity=$_GET['txtBuyQuantity'];
		Add($productid,$BuyQuantity);
	}

	elseif ($action==='remove') 
	{
		$productid=$_GET['productid'];
		Remove($productid);
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<fieldset>
		<legend>Shopping Cart List:</legend>
		<?php
		if (!isset($_SESSION['shoppingcart'])) 
		{
			echo "<p>No Shopping Record Found.</p>";
			exit();
		}
		?>


		<table align="center" border="1" cellpadding="3px">
			
			<tr>
				<th>Product Image</th>
				<th>Product ID</th>
				<th>Product Name</th>
				<th>Purchase Price</th>
				<th>Purchase Quantity</th>
				<th>Sub Total</th>
				<th>Action</th>
			</tr>

			<?php
		$size=count($_SESSION['shoppingcart']);
		echo "Product Count :" . $size;
		for ($i=0; $i <$size ; $i++) 
		{ 
			$product_image=$_SESSION['shoppingcart'][$i]['productimage'];
			$product_id=$_SESSION['shoppingcart'][$i]['productid'];
			$product_name=$_SESSION['shoppingcart'][$i]['productname'];
			$price=$_SESSION['shoppingcart'][$i]['price'];
			$quantity=$_SESSION['shoppingcart'][$i]['quantity'];
			$Subtotal=$price * $quantity;
			echo
			"<tr>
			<td> <img src='$product_image' width='100px' height='100px'/></td>
			<td> $product_id </td>
			<td> $product_name </td>
			<td> $price MMK </td>
			<td> $quantity Pcs </td>
			<td> $Subtotal MMK </td>
			<td>
			<a href='ShoppingCart.php?action=remove&productid=$product_id'>Remove</a>
			</td>
			</tr>";
		}
		?>	

		<tr>
			<td colspan="7" align="right">
				TotalAmount:<b><?php echo CalculateTotalAmount() ?></b>MMK<br/>
				TotalQuantity:<b><?php echo CalculateTotalQuantity() ?></b> <br/>
				<a href="index.php" style="color:red">Product Display</a> |
				<a href="checkout.php" style="color:red">Make Checkout</a>
				
			</td>
		</tr>
		</table>
	</fieldset>
</body>
</html>