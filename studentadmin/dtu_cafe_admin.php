
<!DOCTYPE html>
<?php
session_start();
include ('database_conn.php');
if($_SESSION['usertype']!='1'){
  header("Location: http://localhost/school_meal");
}
error_reporting(false)
?>
<html lang="en">
<?php
if(isset($_GET['delete_ncsid'])){
  $id=$_GET['delete_ncsid'];
  $query="delete from non_cafe where stu_id = '$id'";
  $result=mysqli_query($conn,$query);
  if($result){
    echo '<script>alert("Data deleted successfully"</script>';
  }
  else
    echo '<script>alert("Data not deleted "</script>';
}
if(isset($_GET['delete_stuid'])){
  $id=$_GET['delete_stuid'];
  $query="delete from stu_data where stu_id = '$id'";
  $result=mysqli_query($conn,$query);
  if($result){
    echo '<script>alert("Data deleted successfully"</script>';
  }
  else
    echo '<script>alert("Data not deleted"</script>';
}
?>
<head>
  <?php 
  $q=mysqli_query($conn,"SELECT * from setting LIMIT 1");
  while($rr=mysqli_fetch_assoc($q))
  {
    $logo=$rr['image'];
    $n=$rr['name'];
    ?>
    <title><?php echo $n.' School Meal Attendance System'?></title>
    <link href="../setting/<?php echo $logo?>" rel="icon">
    <?php
  }
  ?>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <!-- Start WOWSlider.com HEAD section -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">

 <link rel="stylesheet" type="text/css" href="engine1/style.css" />
 <script type="text/javascript" src="engine1/jquery.js"></script>
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
 <script type="text/javascript" src="lang_translate.js"></script>  
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
</style>
<script type="text/javascript">
  function printContent(el){
    var restorepage=document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script> 
<script type="text/javascript" src="lang_translate.js"></script>               
</head>

<body style="background-image: ; font-family: times">

  <div id="wrapper">

    <!-- Navigation -->
    <nav  style="background-color:#191970;" class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; margin-right:0;">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a style="color:white" class="navbar-brand" href=""><b class="lang" key="stsamfdtucms"> <stsamfdtucms>Admin Module for School Meal Attendance System</b></a>
      </div>
      <!-- /.navbar-header -->

      <ul class="nav navbar-top-links navbar-right">
       <li>
        <a style="color: white;background-color:#006633" href="dtu_cafe_admin.php"><i class="fa fa-home"></i> <b class="lang" key="home">Home</b></a>
      </li>
      <li><a style="color:white" href="logout_user.php" title="click for edit" onclick="return confirm('Are you sure to leave from the system?')"><i class="fa fa-sign-out"></i>&nbsp;<b class="lang" key="logout">Logout</b></a></li>
      <li class="dropdown">
        <a style="color:white"><b class="lanh" key="date">Date:-</b> 
          <?php
          $Today=date('y:m:d');
          $new=date('l, F d, Y',strtotime($Today));
          echo $new; ?>
          <span class="cart-amunt"></span> </a>
        </li>
      </ul>
      <!-- /.navbar-top-links -->

      <div style="background-color:; color: #006633" class="navbar-default sidebar" role="navigation" >
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu" >
           <li><a style="color:;font-size:14px;font-family:italic; background-color: " href=""><p><b><em class="lang" key="logedas">Loged As:- </em>
            <?php echo ''.$_SESSION["username"].'';?></b></p></a></li>
            <li>
              <a style="color:; background-color: " href="student_service_admin.php"><i class="fa fa-home"></i> <b class="lang" key="home">Home</b></a>
            </li>
            <li class="active"><a class="active" style="background-color:; color:" href="dtu_cafe_admin.php" data-toggle=""><span class="   glyphicon glyphicon-glass"></span>&nbsp; <b class="lang" key="cafeteria managment">Cafeteria Managment</b><span class="fa arrow"></span></a>
            </li>              
            <li><a style="color:" href="#manage" data-toggle="tab"><span class="  glyphicon glyphicon-book"></span>&nbsp; <b class="lang" key="help">Help</b><span class="fa arrow"></span></a></li>

          </ul>
        </div>
        <!-- /.sidebar-collapse -->
      </div>
      <!-- /.navbar-static-side -->
    </nav>
    <div style="background-image:" id="page-wrapper">
      <div class="row">   
        <div class="col-lg-12">
          <h3  style="color:#006633; size:30px">  <img style= "height: 70px; width: 70px" src="../setting/<?php echo $logo?>"><em class="lang" key="dtusmics"><?php echo $n.' School Digital ID and Meal Attendance system'?></em></h3>
        </div>   
        <div class="col-md-12">
          <div style="background-color: " class="panel panel-default">
            <div  style="background-color: #00cc99" class="panel-heading">
              <ul id="myTab" class="nav nav-tabs">
                <li><a  style="color: white;"  href="#report" data-toggle="tab"><strong  class="lang" key="generate cafe user report" >Generate Report of cafe user students</strong></a></li>
              </ul>
            </div>
            <div style="height:540px;color:black; overflow:scroll;background-color:" class="panel-body">

              <!-- ////////////////////////////////////////////////// Change Password ///////////////////////////////////////////////-->
              <?php

              if(isset($_POST['change'])){
            //$oldpass=$_POST['o_password'];
           //$newpass=$_POST['n_password'];
                $user_name=$_SESSION['username'];
                $query=mysqli_query($conn,"UPDATE authentication SET password='".$_POST['n_password']."'  WHERE username ='$user_name' AND password ='".$_POST['o_password']."' AND '".$_POST['n_password']."' = '".$_POST['c_password']."' ");
                if($query){
                  echo '<script>alert("You Modify Your Password Successfully")</script>';
                }
                else
                 echo '<script>alert("You do not Modify Your Password Try again")</script>';
             }
             ?>
             <!-- ///////////////////// Change Password /////////////////////////////////////////////????-->
             <div id="myTabContent" class="tab-content">

              <!--............................................Cafe Report ..........................................-->
              <div  style="background-color:white "  class="tab-pane fade" id="report">

                <ul id="myTab" class="nav nav-tabs">
                  <li><a  data-target="#dem" class="btn btn-success" data-parent="#acordion" data-toggle="tab"><b class="lang" key="generate report for lunch">Generat Report for Lunch</b></a >  </li>
                </ul>
                <div id="myTabContent" class="tab-content">


                  <div style="background-color:white "  id="dem" class="tab-pane fade">
                    <!-- /////////////////////////////////////////////////////  Lunch Report Tab ///////////////////////////////-->
                    <?php
                    ?>
                    <div class="form-group">
                      <label><h4 class="lang" key="generate report for lunch between the date range"> Generate report for Lunch between the date range</h4></label>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                       <input type="date" name="from_lunch" id="from_lunch" class="form-control" placeholder="From Date">
                     </div>
                   </div>
                   <div class="col-md-4">
                     <div class="form-group">
                      <input type="date" name="to_lunch" id="to_lunch" class="form-control" placeholder="To Date">
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="form-group">
                      <button type="" name="range_lunch" id="range_lunch" class="btn btn-success" ><span class="glyphicon glyphicon-search"></span> &nbsp; <b class="lang" key="pick data">Pick Data</b></button>
                    </div>
                  </div>
                  <div class="col-md-2">
                   <button onclick="printContent('printing_lunch')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button> 
                 </div>
                 <div class="clearfix"></div>
                 <br>
                 <div id="printing_lunch">
                  <div id="div_lunch">

                  </div>
                </div>
                <!-- ////////////////Lunch Report Tab /////////////////-->
              </div>


            </div>
          </div>

          <!--................Cafe Report ......................???????-->
        </div>
        <hr>
        <!--...........................................Media Contents .................................................--> 

        <div class="row">
          <div class="col-sm-6 col-md-6">
            <div class="thumbnail">
              <img src="img/cafe1.jpg"
              alt="Generic placeholder thumbnail">
            </div>
            <div class="caption">
              <h3 class="lang" key="about non cafe">About Non cafe students</h3>
              <p class="lang" key="basic clue for manipulation of non cafe student">Here user can View basic clue about manipulation of Non cafe Student data.</p>
              <p>
                <a class="lang" key="click here to expand and read more" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                  Click here to exapand and read more
                </a>
                <div id="collapse2" class="panel-collapse collapse ">
                  <div class="panel-body">
                   <!-- ................................General notes.......................-->
                   <center> <h3 class="lang" key="basic clue" style="color: #4080fb; background-color: ">Basic Clues</h3><center>
                    <ol style="color: black; float: left" class="text-left">
                      <li> &nbsp; Registering Non cafe studentes are the responsiblity of cafteria admin or student service director</li><br>
                      <li>&nbsp; While registring non cafe students be remind that there have not any type of mistake</li><br>
                      <li > &nbsp; Mnipulating non cafe studentes data also the responsiblity of cafteria admin or student service director</li><br>
                      <li >&nbsp; If any student want to be cafe user he/she can possiblly, the only task is modifing student status from non cafe to cafe serve</li><br>
                      <br>
                    </ol>
                    <!--..................................  General Notes.....................-->
                  </div>
                </div>
              </p>
            </div>
          </div>
          <div class="col-sm-6 col-md-6">
            <div class="thumbnail">
              <img src="img/cafe1.jpg"
              alt="Generic placeholder thumbnail">
            </div>
            <div class="caption">
              <h3 class="lang" key="about withdrawal and fieldtrip student">About Withdrawal or field trip Students</h3>
              <p class="lang" key="basic clue for withdrawal and fieldtrip student">Here user can view basic clue about withdrawal or field trip students.</p>
              <p>
                <a class="lang" key="click here to expand and read more" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                  Click here to exapand and read more
                </a>
                <div id="collapseOne" class="panel-collapse collapse ">
                  <div class="panel-body">
                   <!-- ................................General notes.......................-->
                   <center> <h3 class="lang" key="basic clue" style="color: #4080fb; background-color: ">Basic Clues</h3><center>
                    <ol style="color: black; float: left" class="text-left">
                      <li> &nbsp; Withdrawal or field trip student are deactivated from Student service side </li><br>
                      <li>&nbsp;Any withdrawal student are not tolarated by managment or ticker</li><br>
                      <li > &nbsp; Field trip students are deactivated their status in the system until their returning date that meanse, if one field trip student came back and try to use cafeteria beyond setteled time he/she is not allowed to use</li><br>
                    </ol>
                    <!--..................................  General Notes.....................-->
                  </div>
                </div>
              </p>
            </div>
          </div>
        </div>
        <!--...........................................Media Contents .................................................?????--> 
      </div>
    </div>
  </div>
</div>
</div>
<!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<!-- Modal -->
<div class="modal fade" id="editModal_gatway" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div style="background-color:#ff4d94" class="modal-header">
      <button type="button" class="close"
      data-dismiss="modal" aria-hidden="true">
      &times;
    </button>
    <h4 class="modal-title" id="myModalLabel">
      Please Enter your Userename and Password
    </h4>
  </div>
  <div class="modal-body">

    <!--login form-->
    <form class="form-horizontal" method="POST" action="dtu_cafe_admin.php">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Old password:</label>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="email" placeholder="Enter Old Pssword" name="o_password" autofocus="autofocus" >
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">New Password:</label>
        <div class="col-sm-8">          
          <input type="password" class="form-control" id="n_password" placeholder="Enter New password" name="n_password">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
        <div class="col-sm-8">          
          <input type="password" class="form-control" id="c_password" placeholder="Confirm password" name="c_password">
        </div>
      </div>
      <div class="form-group">        

      </div>
      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="change" class="btn btn-success"><i class="fa fa-sign-in"></i>&nbsp;Change</button>
          <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;Cancel</button>
        </div>
      </div>
    </form>
    <!--login form-->
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-success"
    data-dismiss="modal">Close
  </button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal -->
</div>
<div class="footer-top-area" style="background-image:url('img/dtu_meal_attendance.png'); max-height:10px; background-color:white; opacity: 1.5">
  <div class="zigzag-bottom"></div>
  <div class="container" style="" >
    <div class="row">
      <div class="col-lg-12 col-sm-6">
        <div class="footer-about-us">
          <center>
          <h3 ><span style="color:white"><?php echo $n .' '?>School Digtal ID and Meal Attendance System</span></h3>
          <p class="lang" key="fdescription" style="color:white"><?php echo $n .' '?>School Digtal ID and Meal Attendance system tries to address the time constraints to proceed meal attendance at schools.</p>
          <div class="footer-social">
            <a href="http://www.facebook.com" target="_blank" style="background-color: #006633"><i class="fa fa-facebook"></i></a>
            <a href="http://www.twitter.com" target="_blank" style="background-color: #006633"><i class="fa fa-twitter"></i></a>
            <a href="http://www.youtube.com" target="_blank" style="background-color: #006633"><i class="fa fa-youtube"></i></a>
            <a href="http://www.linkedin.com" target="_blank" style="background-color: #006633"><i class="fa fa-linkedin"></i></a>
          </div>
        </center>
      </div>
    </div>
  </div>
</div>
</div>
<div class="footer-bottom-area" style="background-color: #006633">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="copyright">
          <p align="right">&copy; 2010   <?php echo $n .' '?>School ID and Meal Attendance System | All Rights are Reserved </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- jQuery -->

<script src="jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>


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
<!-- table js -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/js/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
  $(function () { $('#myModal').modal({
    keyboard: true
  })});
</script> 
<script>
  $(function () {
    $('#myTab li:eq(1) a').tab('show');
  });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<script>
          // ////////////////////////////////////    javascript for None cafe   //////////////////////////////////// 
          $(document).ready(function(){
            $.datepicker.setDefaults({
              dateFormat:'yy-mm-dd'
            });
            $(function(){
              $("#from_n").datepicker();
              $("#to_n").datepicker();
            });
            $('#range_n').click(function(){
              var from=$('#from_n').val();
              var to=$('#to_n').val();
              if(from!='' && to!=''){
                $.ajax({
                 url:"range_n.php",
                 method:"POST",
                 data:{from_n:from,to_n:to},
                 success:function(data)
                 {
                  $('#div_n').html(data);
                }
              });
              }
              else
              {
                alert("Please Select The Data");
              }
            });

          });
     // ////////////////////////////////////    javascript for Non cafe  //////////////////////////////////// 
   </script>

   <script>
          // ////////////////////////////////////    javascript for breakfast   //////////////////////////////////// 
          $(document).ready(function(){
            $.datepicker.setDefaults({
              dateFormat:'yy-mm-dd'
            });
            $(function(){
              $("#from").datepicker();
              $("#to").datepicker();
            });
            $('#range').click(function(){
              var from=$('#from').val();
              var to=$('#to').val();
              if(from!='' && to!=''){
                $.ajax({
                 url:"range.php",
                 method:"POST",
                 data:{from:from,to:to},
                 success:function(data)
                 {
                  $('#purchase_order').html(data);
                }
              });
              }
              else
              {
                alert("Please Select The Data");
              }
            });

          });
     // ////////////////////////////////////    javascript for breakfast   //////////////////////////////////// 
   </script>
   <script>
          // ////////////////////////////////////    javascript for Lunch   //////////////////////////////////// 
          $(document).ready(function(){
            $.datepicker.setDefaults({
              dateFormat:'yy-mm-dd'
            });
            $(function(){
              $("#from_lunch").datepicker();
              $("#to_lunch").datepicker();
            });
            $('#range_lunch').click(function(){
              var from=$('#from_lunch').val();
              var to=$('#to_lunch').val();
              if(from!='' && to!=''){
                $.ajax({
                 url:"range.php",
                 method:"POST",
                 data:{from_lunch:from,to_lunch:to},
                 success:function(data)
                 {
                  $('#div_lunch').html(data);
                }
              });
              }
              else
              {
                alert("Please Select The Data");
              }
            });

          });
     // ////////////////////////////////////    javascript for Lunch   //////////////////////////////////// 
   </script>
   <script>
          // ////////////////////////////////////    javascript for Dinner   //////////////////////////////////// 
          $(document).ready(function(){
            $.datepicker.setDefaults({
              dateFormat:'yy-mm-dd'
            });
            $(function(){
              $("#from_dinner").datepicker();
              $("#to_dinner").datepicker();
            });
            $('#range_dinner').click(function(){
              var from=$('#from_dinner').val();
              var to=$('#to_dinner').val();
              if(from!='' && to!=''){
                $.ajax({
                 url:"range.php",
                 method:"POST",
                 data:{from_dinner:from,to_dinner:to},
                 success:function(data)
                 {
                  $('#div_dinner').html(data);
                }
              });
              }
              else
              {
                alert("Please Select The Data");
              }
            });

          });
     // ////////////////////    javascript for Dinner  //////////////////////////////////// 
   </script>
   <script>
    $(document).ready(function() {
      $('#dataTables-example').DataTable({
        responsive: true
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#dataTables').DataTable({
        responsive: true
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#dataTables-faculty').DataTable({
        responsive: true
      });
    });
  </script>
  <script type="text/javascript">
   function change_faculty(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","ajax.php?faculty_id="+document.getElementById("facultylist").value,false);
    xmlhttp.send(null);
    document.getElementById("dep").innerHTML = xmlhttp.responseText;
  }
</script>
<script type="text/javascript">

  function change_department(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","ajax.php?department_id="+document.getElementById("departmentlist").value,false);
    xmlhttp.send(null);
    document.getElementById("strm").innerHTML = xmlhttp.responseText;
  }
</script>
<script>
  var slideIndex = 0;
  showSlides();

  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
     slides[i].style.display = "none";  
   }
   slideIndex++;
   if (slideIndex> slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 4000); // Change image every 2 seconds
  }
</script>
<script>
  var slideIndex1 = 0;
  showSlides1();

  function showSlides1() {
    var i;
    var slides1 = document.getElementsByClassName("mySlides1");
    var dots1 = document.getElementsByClassName("dot1");
    for (i = 0; i < slides1.length; i++) {
     slides1[i].style.display = "none";  
   }
   slideIndex1++;
   if (slideIndex1> slides1.length) {slideIndex1 = 1}    
    for (i = 0; i < dots1.length; i++) {
      dots1[i].className = dots1[i].className.replace(" active", "");
    }
    slides1[slideIndex1-1].style.display = "block";  
    dots1[slideIndex1-1].className += " active";
    setTimeout(showSlides1, 4000); // Change image every 2 seconds
  }
</script>

</body>

</html>
