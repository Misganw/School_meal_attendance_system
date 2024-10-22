<html lang="en">
<?php
error_reporting(false)
?>
<?php
session_start();
include('database_conn.php');
?>
<head>
 <title>ደብረ ታቦር ዩኒቨርሲቲ</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <!-- Start WOWSlider.com HEAD section -->
 <link rel="stylesheet" type="text/css" href="engine1/style.css" />
 <script type="text/javascript" src="engine1/jquery.js"></script>
 <link href="asset/image/ice_screenshot_20170511-212540.png" rel="icon">
 <!-- MetisMenu CSS -->
 <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

 <!-- Custom CSS -->
 <link href="dist/css/sb-admin-2.css" rel="stylesheet">

 <!-- Morris Charts CSS -->
 <link href="vendor/morrisjs/morris.css" rel="stylesheet">

 <!-- Custom Fonts -->
 <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

 <link href="vendor/datatables-plugins/dataTables.bootstrap.css"  rel="stylesheet">
 <link href="vendor/datatables-responsive/dataTables.responsive.css"  rel="stylesheet">
 <link href="vendor/datatables/css/dataTables.bootstrap.min.css"  rel="stylesheet">
 <link href="vendor/bootstrap/css/bootstrap-fileupload.min.css" rel="stylesheet" type="text/css">
 <!-- Start WOWSlider.com HEAD section -->
 <link rel="stylesheet" type="text/css" href="engine1/style.css" />
 <script type="text/javascript" src="engine1/jquery.js"></script>
 <!-- End WOWSlider.com HEAD section -->
 <style>
  ul.wysihtml5-toolbar > li
  {
    position: relative;
  }
  
  
</style>
<style>
  @media print {
    .control-group {
      display: none;
    }
  }
  .mySlides {display:none}
  .mySlides1 {display:none}

  /* Slideshow container */
  .slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
  }
  .slideshow-container1 {
    max-width: 1000px;
    position: relative;
    margin: auto;
  }


  /* Caption text */
  .text {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
  }

  /* Number text (1/3 etc) */
  .numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
  }

  /* The dots/bullets/indicators */
  .dot {
    height: 13px;
    width: 13px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
  }
  .dot1 {
    height: 13px;
    width: 13px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
  }

  .active {
    background-color: #717171;
  }

  /* Fading animation */
  .fade {
    -webkit-animation-name: fade;
    -webkit-animation-duration: 6s;
    animation-name: fade;
    animation-duration: 6s;
  }

  @-webkit-keyframes fade {
    from {opacity: .4} 
    to {opacity: 1}
  }

  @keyframes fade {
    from {opacity: .4} 
    to {opacity: 1}
  }

  /* On smaller screens, decrease text size */
  @media only screen and (max-width: 300px) {
    .text {font-size: 11px}
  }
  body {
    font-family: "Lato", sans-serif;
  }

  .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
  }

  .sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 14px;
    color: #818181;
    display: block;
    transition: 0.3s;
  }

  .sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
  }

  .sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }

  #main {
    transition: margin-left .5s;
    padding-left: 0px;
  }

  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }
</style>

</head>

<body style="background-image:;font-family: times; ">

<!-- /////////////////////////////////////////////// php for Lunch Report ////////////////////////////////////////////////-->
<?php
if(isset($_POST['from_lunch'], $_POST['to_lunch'])){
  $query= mysqli_query($conn,"SELECT stu_id, first_name, grade, COUNT(*) FROM lunch WHERE d_date BETWEEN '".$_POST['from_lunch']."' AND '".$_POST['to_lunch']."' GROUP BY stu_id");
  if( $query){
    ?>
    <?php
  $num_rows = mysqli_num_rows($query);
  ?>
  <?php
  $Today=date('y:m:d');
  $new=date('l, F d, Y',strtotime($Today));
  echo '<center><strong><em>Date of Report</em>:</strong> </center>';
  echo '<center><strong><em>'.$new.'</em>:</strong> </center>';
  ?>
  <div class="form-group">
   <?php echo ' <center><strong><em>Name of Reporter</em>:  '.$_SESSION["username"].'</strong> </center>';?>
   <?php echo '<br> <center><strong><em>Luch Report from</em>:  '.$_POST["from_lunch"].' To '.$_POST["to_lunch"].'</strong> </center>';?>
 </div>
 
 <?php
 echo "<center>";
 echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
 <strong> $num_rows    Students Are Available between The specified Date in Lunch data<strong>";
  echo "</center>";
  ?>
  <center>
    <table class="table table-striped table-bordered table-hover table-responsive" id="lunch">
      <tr>
        <th>Id</th>
        <th>Full Name</th>
        <th>Grade</th>
        <th>Total Meal</th>
      </tr>
      <?php
      while($row = mysqli_fetch_assoc($query)){
        //echo $row ;
        ?>
        <tr>
          <td> <?php echo $row['stu_id'];?> </td>
          <td> <?php echo $row['first_name'];?> </td>
          <td> <?php echo $row['grade'];?> </td>
          <td> <?php echo $row['COUNT(*)'];?> </td>
        </tr>
        <?php
      }
      ?>
    </table>
  </center>
  <?php
}
}
?>
<!-- /////////////////////////////////////////////// php for Lunch Report ////////////////////////////////////////////////-->

<script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
  }
</script>

<script src="jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>


<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="vendor/raphael/raphael.min.js"></script>
<script src="vendor/morrisjs/morris.min.js"></script>
<script src="data/morris-data.js"></script>
<script src="vendor/bootstrap/js/bootstrap-fileupload.js"></script>
<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>
<script src="js/bxslider.min.js"></script>
<script src="js/script.slider.js"></script>
<!-- table js -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/js/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

<script type="text/javascript">
 function change_faculty(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","pcajax.php?faculty_id="+document.getElementById("facultylist").value,false);
  xmlhttp.send(null);
  document.getElementById("dep").innerHTML = xmlhttp.responseText;
}
</script>
<script>
  $(document).ready(function() 
  {
    $('#breakfast').DataTable({
      responsive: true
    });
  });
</script>
<script>
  $(document).ready(function() 
  {
    $('#lunch').DataTable({
      responsive: true
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('#dinner').DataTable({
      responsive: true
    });
  });
</script>
<script type="text/javascript">
  function change_department(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","pcajax.php?department_id="+document.getElementById("departmentlist").value,false);
    xmlhttp.send(null);
    document.getElementById("strm").innerHTML = xmlhttp.responseText;
  }
</script> 
</body>
</html>