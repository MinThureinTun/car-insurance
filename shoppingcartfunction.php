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
	 $index=IndexOf($productid);
	 if($index==-1)	
	  {
	  	$size=count($_SESSION['shoppingcart']);
	$_SESSION['shoppingcart'][$size]['productid']=$productid;
	$_SESSION['shoppingcart'][$size]['productname']=$productname;
	$_SESSION['shoppingcart'][$size]['price']=$price;
	$_SESSION['shoppingcart'][$size]['quantity']=$buyquantity;
	$_SESSION['shoppingcart'][$size]['productimage']=$productimage;

	  	}
	else
	{       
	  	
	  	$_SESSION['shoppingcart'][$index]['quantity']+=$buyquantity;
	  	
	}	  
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


function Remove($productid)
{
	$index=IndexOf($productid);
	if($index!=-1)
	{
		unset($_SESSION['shoppingcart'][$index]);
		echo "<script>window.location='ShoppingCart.php'</script>";
	}
}

function IndexOf($product_id)
  {
  	if(!isset($_SESSION['shoppingcart']))
  	{
  		return -1;
  	}

  	$size=count($_SESSION['shoppingcart']);
  	if($size==0)
  	{
  		return -1;
  	}
  	
  	for($i=0; $i<$size; $i++)
  	{
  		if($product_id==$_SESSION['shoppingcart'][$i]['productid'])
     {
     	return $i;
     }
  	}
     return -1;
  }


function CalculateTotalAmount()
{
	$totalamount=0;
	
	$size=count($_SESSION['shoppingcart']);
	for ($i=0; $i <$size ; $i++)
	 { 
		$price=$_SESSION['shoppingcart'][$i]['price'];
		$quantity=$_SESSION['shoppingcart'][$i]['quantity'];
		$totalamount=$totalamount + ($price* $quantity);
		
	}
	return $totalamount;
}

function CalculateTaxAmount()
{
	$totalamount=0;
	$taxamount=0;
	$size=count($_SESSION['shoppingcart']);
	for ($i=0; $i <$size ; $i++)
	 { 
		$price=$_SESSION['shoppingcart'][$i]['price'];
		$quantity=$_SESSION['shoppingcart'][$i]['quantity'];
		$totalamount=$totalamount + ($price* $quantity);
		$taxamount=($totalamount*5)/100;
	}
	return $taxamount;
}

function CalculatePromotionAmount()
{
	$totalamount=0;
	$promotionamount=0;
	$size=count($_SESSION['shoppingcart']);
	for ($i=0; $i <$size ; $i++)
	{ 
		$price=$_SESSION['shoppingcart'][$i]['price'];
		$quantity=$_SESSION['shoppingcart'][$i]['quantity'];
		$totalamount=$totalamount + ($price* $quantity);
		$promotionamount=($totalamount*10)/100;
	}
	return $promotionamount;
}
function CalculateTotalQuantity()
{
	$Qty=0;

	$size=count($_SESSION['shoppingcart']);

	for ($i=0; $i <$size ; $i++) 
	{ 
		$quantity=$_SESSION['shoppingcart'][$i]['quantity'];
		$Qty=$Qty + ($quantity);
	}
	return $Qty;
}


?>