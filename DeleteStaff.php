<?php 
include('connect.php');
include('header.php');
if(isset($_REQUEST['sid']))
{
	$sid=$_REQUEST['sid'];
	$delete="DELETE from staff where staff_id='$sid'";
	$query=mysqli_query($connection,$delete);
	if($query)
	{
		echo "<script>alert('Staff Delete Successfully')</script>";
		echo "<script>window.location='StaffList.php'</script>";
	}
	
}

 ?>

<style = "text/css">
  .deletestaff
    {
    background-color: #d4af37;
    } 
</style>