<html>
<head>
	 <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
 <link href="asset/image/ice_screenshot_20170511-212540.png" rel="icon">
  <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap-fileupload.min.css" rel="stylesheet" type="text/css">
	</head>
<body>
<?php
$conn = mysql_connect('localhost','root') or die ("The connectin is failed");
mysql_select_db("stu_meal",$conn) or die ("The database not connected");

$faculty=$_GET["faculty_id"];
$department=$_GET['department_id'];
if($faculty!=""){
$query="select * from department where faculty='$faculty' ";
$res = mysql_query($query,$conn);
if($res){
$count=mysql_num_rows($res);
if($count>=1){
	echo '<div class="form-group">';
	echo '<select name="department" class="form-control" onChange="change_department()" id="departmentlist">';
	 echo '<option value="">Select The Departmen here</option>';
while($row=mysql_fetch_assoc($res)){
  
  
  echo "<option value='$row[department]'>"; echo $row["department"];  echo " </option>";
 
 
}
echo '</select>';
echo '</div>';
}
else{
  echo '<option value="">faculty is not available';
}
}
}
if($department!=""){
$query="select * from stream where department='$department'";
$res = mysql_query($query,$conn);
if($res){
$count=mysql_num_rows($res);
if($count>=1){
	echo '<div class="form-group">';
	echo '<select name="stream" class="form-control">';
	echo '<option value="">Select The Stream here</option>';
while($row=mysql_fetch_assoc($res)){
  
  
  echo "<option value='$row[stream]'>"; echo $row['stream'];  echo " </option>";
 
 
}
echo '</select>';
echo '</div>';
}
else{
  echo '<option value="">faculty is not available';
}
}
}

?>
<?php
$conn = mysql_connect('localhost','root') or die ("The connectin is failed");
mysql_select_db("stu_meal",$conn) or die ("The database not connected");

?>
<script src="vendor/jquery/jquery.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script src="js/bxslider.min.js"></script>
    <script src="js/script.slider.js"></script>
    <script src="vendor/bootstrap/js/bootstrap-fileupload.js"></script>
</body>
</html>