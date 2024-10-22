<!-- //////////////////// php for non cafe Report /////////////////////-->
<?php
error_reporting(false)
?>
<?php
include('database_conn.php');
session_start();
if($_SESSION['usertype']!=5)
{
	header("Location: http://localhost/school_meal/cafeadmin/dtu_cafe_adminpage.php");
}
if(isset($_POST['from_del_meal'], $_POST['to_del_meal']))
{
	$query= mysqli_query($conn,"DELETE FROM lunch WHERE d_date BETWEEN '".$_POST['from_del_meal']."' AND '".$_POST['to_del_meal']."'");
	// if( $query)
	// {
	// 	echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('Data Deleted Successfully!!!')</script></b></h3></body>";
	// 	echo"<script>window.open('dtu_cafe_adminpage.php','_self')</script>";
	// }
	// else
	// {
	// 	echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('Data Not Deleted!!!')</script></b></h3></body>";
	// 	echo"<script>window.open('dtu_cafe_adminpage.php','_self')</script>";
	// }
	?>
	<!-- /////Delete meal////////////////////////////////////////-->
