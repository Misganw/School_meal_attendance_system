<?php
include('database_conn.php');
error_reporting(false)
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
  if(isset($_GET['school_id']))
  {
    $school=$_GET['school_id'];

    if($school!=""){
      $query="select * from grade where school='$school' ";
      $res = mysqli_query($conn,$query);
      if($res){
        $count=mysqli_num_rows($res);
        if($count>=1){
         echo '<div class="form-group">';
         echo '<select name="grade" class="form-control" onChange="change_grade()" id="gradelist">';
         echo '<option value="">Select The Departmen here</option>';
         while($row=mysqli_fetch_assoc($res)){

          echo "<option value='$row[grade]'>"; echo $row["grade"];  echo " </option>";


        }
        echo '</select>';
        echo '</div>';
      }
      else{
        echo '<option value="">grade is not available In the selected school';
      }
    }
  }
}

if(isset($_GET['grade_id'])){
  $grade=$_GET['grade_id'];
  if($grade!=""){
    $query="select * from section where grade='$grade'";
    $res = mysqli_query($conn,$query);
    if($res){
      $count=mysqli_num_rows($res);
      if($count>=1){
       echo '<div class="form-group">';
       echo '<select name="section" class="form-control">';
       echo '<option value="">Select The section here</option>';
       while($row=mysqli_fetch_assoc($res)){


        echo "<option value='$row[section]'>"; echo $row['section'];  echo " </option>";


      }
      echo '</select>';
      echo '</div>';
    }
    else{
      echo '<option value="">Specialization  is not available in the selected grade';
    }
  }
}
}
?>
<?php

?>



<!-- .......  PHP for ID earened data.............-->
<?php
if(isset($_GET['school_id_id']))
{
  $school=$_GET['school_id_id'];

  if($school!=""){
    $query="SELECT * from grade where school='$school' ";
    $res = mysqli_query($conn,$query);
    if($res){
      $count=mysqli_num_rows($res);
      if($count>=1){
        echo '<div class="form-group">';
        echo '<select name="grade" class="form-control" onChange="change_grade_id()" id="gradelist_id">';
        echo '<option value="">Select The Departmen here</option>';
        while($row=mysqli_fetch_assoc($res)){
          echo "<option value='$row[grade]'>"; echo $row["grade"];  echo " </option>";
        }
        echo '</select>';
        echo '</div>';
      }
      else{
        echo '<option value="">grade is not available In the selected school';
      }
    }
  }
}
?>
<!-- ....../.PHP for Id earned data.............-->

<!-- .......  PHP for ID not earened data.............-->
<?php
if(isset($_GET['school_id_id_not'])){
  $school=$_GET['school_id_id_not'];

  if($school!=""){
    $query="SELECT * from grade where school='$school' ";
    $res = mysqli_query($conn,$query);
    if($res){
      $count=mysqli_num_rows($res);
      if($count>=1){
        echo '<div class="form-group">';
        echo '<select name="grade" class="form-control" onChange="change_grade_id()" id="gradelist_id">';
        echo '<option value="">Select The Departmen here</option>';
        while($row=mysqli_fetch_assoc($res)){
          echo "<option value='$row[grade]'>"; echo $row["grade"];  echo " </option>";
        }
        echo '</select>';
        echo '</div>';
      }
      else{
        echo '<option value="">grade is not available In the selected school';
      }
    }
  }
}
?>
<!-- ....../.PHP for Id not earned data.............-->


<!-- .......  PHP for ID recreated data.............-->
<?php
if(isset($_GET['school_id_recreate'])){
  $school=$_GET['school_id_recreate'];

  if($school!=""){
    $query="SELECT * from grade where school='$school' ";
    $res = mysqli_query($conn,$query);
    if($res){
      $count=mysqli_num_rows($res);
      if($count>=1){
        echo '<div class="form-group">';
        echo '<select name="grade" class="form-control" onChange="change_grade_id_recreate()" id="gradelist_id_recreate">';
        echo '<option value="">Select The Departmen here</option>';
        while($row=mysqli_fetch_assoc($res)){
          echo "<option value='$row[grade]'>"; echo $row["grade"];  echo " </option>";
        }
        echo '</select>';
        echo '</div>';
      }
      else{
        echo '<option value="">grade is not available In the selected school';
      }
    }
  }
}
?>
<!-- ....../.PHP for Id recreated data.............-->
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