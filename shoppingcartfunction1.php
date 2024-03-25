<?php 
function Add($productid,$buyquantity)
{
	$connect=mysqli_connect("localhost","root","","posdb(hnd58)");
	$query="SELECT * FROM product WHERE ProductID='$productid'";
	$ret=mysqli_query($connect,$query);
	$count=mysqli_num_rows($ret);
	if ($count<1)
	{
		echo "<p>NO Record Found.</p>";
		//exit();
	}
	else
	{
		$data=mysqli_fetch_array($ret);
		$productname=$data['ProductName'];
		$productimage=$data['ProductImage'];
		$description=$data['Description'];
		$price=$data['Price'];
	}

	if(isset($_SESSION['shoppingcart'])) 
	{
	//   	$index=IndexOf($productid);
	//   if($index==-1)	
	//   {
	//   	$size=count($_SESSION['purchasefunction']);
	// $_SESSION['purchasefunction'][$size]['productid']=$productid;
	// $_SESSION['purchasefunction'][$size]['productname']=$productname;
	// $_SESSION['purchasefunction'][$size]['purchaseprice']=$purchaseprice;
	// $_SESSION['purchasefunction'][$size]['purchasequantity']=$purchasequantity;
	// $_SESSION['purchasefunction'][$size]['productimage']=$productimage;
	  	//}
	// else
	// {       
	  	
	//   	$_SESSION['shoppingcartfunction'][$index]['purchasequantity']+=$purchasequantity;
	  	
	// }	  
	}
	else
	{
		$_SESSION['shoppingcart']=array();
		$_SESSION['shoppingcart'][0]['productid']=$productid;
		$_SESSION['shoppingcart'][0]['productname']=$productname;
		$_SESSION['shoppingcart'][0]['price']=$price;
		$_SESSION['shoppingcart'][0]['quantity']=$buyquantity;
		$_SESSION['shoppingcart'][0]['productimage']=$productimage;
	}
	echo "<script>window.location='ShoppingCart.php'</Script>";


}

?>