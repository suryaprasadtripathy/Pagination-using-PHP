<?php
	include 'database.php';
	if(isset($_POST['submit']))
	{
		if($_POST['name']!="")
		{
			$name=$_POST['name'];
			$age=$_POST['age'];
			$email=$_POST['email'];
			$str="insert into record set username='$name',age='$age',email='$email'";
			mysqli_query($con,$str);		
		}
	}
	header("Location:index.php");
?>