<?php 
include('connect.php');
if(isset($_REQUEST['sid']))
{
	$sid=$_REQUEST['sid'];
	$select="SELECT * FROM staff where staff_id='$sid'";
	$query=mysqli_query($connection,$select);
	$count=mysqli_num_rows($query);
	if($count>0)
	{
		$data=mysqli_fetch_array($query);
		$staff_id=$data['staff_id'];
		$staffname=$data['staffname'];
		$email=$data['email'];
		$password=$data['password'];
		$phone=$data['phone'];
		$address=$data['address'];
		$profile=$data['profile'];
	}

}


if(isset($_POST['btnupdate']))
{
	$txtstaff_id=$_POST['txtstaff_id'];
	$txtstaffname=$_POST['txtstaffname'];
	$txtemail=$_POST['txtemail'];
	$txtpassword=$_POST['txtpassword'];
	$txtphone=$_POST['txtphone'];
	$txtaddress=$_POST['txtaddress'];
	

	//////////////////////////////////Image/////////////////////////////////


	$Image=$_FILES['txtprofile']['name'];
	$Folder="images/";
	$filename=$Folder . '_' . $Image; 
	$image=copy($_FILES['txtprofile']['tmp_name'],$filename);
	if(!$image)
	{
		echo "<p>Cannot Upload  Staff Profile</p>";
		exit();
	}

/////////////////////////////////////////////////////////////////////////

	$update="UPDATE staff set staffname='$txtstaffname',email='$txtemail',password='$txtpassword',phone='$txtphone',address='$txtaddress',profile='$filename' where staff_id='$txtstaff_id'";
	$query=mysqli_query($connection,$update);
	if($query)
	{
		echo "<script>alert('Staff Update Successfully')</script>";
		echo "<script>window.location='StaffList.php'</script>";
	}
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<form action="UpdateStaff.php" method="POST" enctype="multipart/form-data">

	<table id="tableformat" align="center">
		<tr>
			<th colspan="2"><h2>Staff Update Form</h2></th>
			
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Staff Name</td>
			<td width="200px">
				<input type="hidden" name="txtstaff_id" value="<?php echo $staff_id ?>">
				<input type="text" name="txtstaffname" required value="<?php echo $staffname ?>">
			</td>
		</tr>
		<tr>
			<td>Staff Email</td>
			<td>
				<input type="text" name="txtemail" required value="<?php echo $email ?>">
			</td>
		</tr>
		<tr>
			<td>Phone Number</td>
			<td>
				<input type="text" name="txtphone" required value="<?php echo $phone ?>">
			</td>
		</tr>
		<tr>
			<td>Password</td>
			<td>
				<input type="password" name="txtpassword" required value="<?php echo $password ?>">
			</td> 
		</tr>
		
		<tr>
			<td>Address</td>
			<td>
				
				<textarea name="txtaddress" cols="30">
					<?php echo $address ?>
				</textarea>
			</td>
		</tr>
		<tr>
			<td>Staff Profile</td>
			<td>
				<input type="file" name="txtprofile" required>
				<img src="<?php echo $profile ?>" width="100px" height="100px">
			</td>
		</tr>
		<tr>
			<td align="right">
				<input type="submit" name="btnupdate" value="Update">

			</td>
			<td>
				<input type="reset" name="btncancel" value="Cancel">
			</td>
		</tr>
	</table>
	</form>
</body>
</html>