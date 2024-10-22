<?php
error_reporting(false)
?>
<?php
include('database_conn.php');
?>
<html>
<head>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Start WOWSlider.com HEAD section -->
  <link rel="stylesheet" type="text/css" href="engine1/style.css" />
  <script type="text/javascript" src="engine1/jquery.js"></script>
  <link href="img/dtu_logo.png" rel="icon">
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
  if(isset($_GET['faculty_id'])){
    $faculty=$_GET['faculty_id'];

    if($faculty!=""){
      $query="select * from department where faculty='$faculty' ";
      $res = mysqli_query($conn,$query);
      if($res){
        $count=mysqli_num_rows($res);
        if($count>=1){
         echo '<div class="form-group">';
         echo '<select name="department" class="form-control" onChange="change_department()" id="departmentlist">';
         echo '<option value="">Select The Departmen here</option>';
         while($row=mysqli_fetch_assoc($res)){
          
          
          echo "<option value='$row[department]'>"; echo $row["department"];  echo " </option>";
          
          
        }
        echo '</select>';
        echo '</div>';
      }
      else{
        echo '<option value="">Department is not available In the selected Faculty';
      }
    }
  }
}
if(isset($_GET['department_id'])){
  $department=$_GET['department_id'];
  if($department!=""){
    $query="select * from stream where department='$department'";
    $res = mysqli_query($conn,$query);
    if($res){
      $count=mysqli_num_rows($res);
      if($count>=1){
       echo '<div class="form-group">';
       echo '<select name="stream" class="form-control">';
       echo '<option value="">Select The Stream here</option>';
       while($row=mysqli_fetch_assoc($res)){
        
        
        echo "<option value='$row[stream]'>"; echo $row['stream'];  echo " </option>";
        
        
      }
      echo '</select>';
      echo '</div>';
    }
    else{
      echo '<option value="">Specialization  is not available in the selected Department';
    }
  }
}
}
?>
<?php

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