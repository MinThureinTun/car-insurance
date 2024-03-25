<?php 
function Add($productid,$purchaseprice,$purchasequantity)
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

	}

	if(isset($_SESSION['purchasefunction'])) 
	{
	  	$index=IndexOf($productid);
	  if($index==-1)	
	  {
	  	$size=count($_SESSION['purchasefunction']);
	$_SESSION['purchasefunction'][$size]['productid']=$productid;
	$_SESSION['purchasefunction'][$size]['productname']=$productname;
	$_SESSION['purchasefunction'][$size]['purchaseprice']=$purchaseprice;
	$_SESSION['purchasefunction'][$size]['purchasequantity']=$purchasequantity;
	$_SESSION['purchasefunction'][$size]['productimage']=$productimage;
	  
	}
	else
	{
       
	  	
	  	$_SESSION['purchasefunction'][$index]['purchasequantity']+=$purchasequantity;
	  	
	}

	  
	}
	else
	{
		$_SESSION['purchasefunction']=array();
		$_SESSION['purchasefunction'][0]['productid']=$productid;
		$_SESSION['purchasefunction'][0]['productname']=$productname;
		$_SESSION['purchasefunction'][0]['purchaseprice']=$purchaseprice;
		$_SESSION['purchasefunction'][0]['purchasequantity']=$purchasequantity;
		$_SESSION['purchasefunction'][0]['productimage']=$productimage;
	}
	echo "<script>window.location='Purchase.php'</Script>";
}

function IndexOf($product_id)
  {
  	if(!isset($_SESSION['purchasefunction']))
  	{
  		return -1;
  	}

  	$size=count($_SESSION['purchasefunction']);
  	if($size==0)
  	{
  		return -1;
  	}
  	
  	for($i=0; $i<$size; $i++)
  	{
  		if($product_id==$_SESSION['purchasefunction'][$i]['productid'])
     {
     	return $i;
     }
  	}
     return -1;
  }


function Remove($productid)
{
	$index=IndexOf($productid);
	if($index!=-1)
	{
		unset($_SESSION['purchasefunction'][$index]);
		echo "<script>window.location='purchase.php'</script>";
	}
}

function CalculateTotalAmount()
{
	$totalamount=0;
	$size=count($_SESSION['purchasefunction']);
	for ($i=0; $i <$size ; $i++)
	 { 
		$purchaseprice=$_SESSION['purchasefunction'][$i]['purchaseprice'];
		$purchasequantity=$_SESSION['purchasefunction'][$i]['purchasequantity'];
		$totalamount=$totalamount + ($purchaseprice* $purchasequantity);
	}
	return $totalamount;
}


function CalculateTotalQuantity()
{
	$Qty=0;

	$size=count($_SESSION['purchasefunction']);

	for ($i=0; $i <$size ; $i++) 
	{ 
		$quantity=$_SESSION['purchasefunction'][$i]['purchasequantity'];
		$Qty=$Qty + ($quantity);
	}
	return $Qty;
}

?>