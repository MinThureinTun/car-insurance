<?php 
include('connect.php');
include('header.php');
$select="SELECT * FROM customer";
$query=mysqli_query($connection,$select);
$count=mysqli_num_rows($query);
if($count>0)
{
	echo "<table border='1'>";
	echo "<tr>";
	echo "<th>Staff ID</th>";
	echo "<th>Staff Name</th>";
	echo "<th>Staff Email</th>";
	echo "<th>Staff Password</th>";
	echo "<th>Staff Phone Number</th>";
	echo "<th>Staff Address</th>";
	echo "<th>Staff Profile</th>";
	echo "<th>Action</th>";
	echo "</tr>";
	for ($i=0; $i <$count ; $i++) 
	{ 
		$data=mysqli_fetch_array($query);
		$staff_id=$data['staff_id'];
		$staffname=$data['staffname'];
		$email=$data['email'];
		$password=$data['password'];
		$phone=$data['phone'];
		$address=$data['address'];
		$profile=$data['profile'];
		echo "<tr>";
		echo "<td>$staff_id</td>";
		echo "<td>$staffname</td>";
		echo "<td>$email</td>";
		echo "<td>$password</td>";
		echo "<td>$phone</td>";
		echo "<td>$address</td>";
		echo "<td>$profile</td>";
		echo "<td>
		<a href='UpdateStaff.php?sid=$staff_id'>
		Update
		</a>
		|
		<a href='DeleteStaff.php?sid=$staff_id'>
		Delete
		</a>
		</td>";
		echo "</tr>";
	}
	echo "</table>";
}

 ?>

<style = "text/css">
  .stafflist
    {
    background-color: #d4af37;
    } 
</style>

