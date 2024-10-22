<?php
error_reporting(false)
?>
<?php
include('dbconn.php');

if(isset($_POST['save_barcode']))
{
	$student_id = $_POST['student_id'];
	
	$cheek_id = "SELECT * FROM `barcode` where student_id = '$student_id'";

	$run_query=mysqli_query($conn,$cheek_id);

	if(mysqli_num_rows($run_query)>0)
	{
		echo "<script>alert('The Student alerady has id!')</script>";
		echo"<script>window.open('barcode_genrater.php','_self')</script>";

	}
	else

		$save="insert into barcode ( student_id) VALUE ('$student_id')";

	mysqli_query($conn,$save);		
	echo "<script>alert('Data saved sucess fully!')</script>";
	echo"<script>window.open('barcode_genrater.php','_self')</script>";

}

?>