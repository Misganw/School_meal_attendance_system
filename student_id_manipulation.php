
<!DOCTYPE html>
<?php
session_start();
include ('database_conn.php');
if($_SESSION['usertype']!=2){
  header("Location: http://localhost/school_meal");
}
?>
<html lang="en">

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
 <link rel="stylesheet" type="text/css" href="engine1/style.css" />
 <script type="text/javascript" src="engine1/jquery.js"></script>
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <!-- Start WOWSlider.com HEAD section -->
 <link rel="stylesheet" type="text/css" href="engine1/style.css" />
 <script type="text/javascript" src="engine1/jquery.js"></script>
 <!-- MetisMenu CSS -->
 <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
 <script type="text/javascript" src=vendor/jquery/jquery.min.js></script>
 <script type="text/javascript" src=lang_translate.js></script>
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
</style>

</head>

<body style="font-family: times">

  <div id="wrapper">

    <!-- Navigation -->
    <nav  style="background-color: #006633;" class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; margin-right:0;">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a style="color:white" class="navbar-brand" href=""><b class="lang" key="amfdtustsp" >Admin module for Debre Tabor University student service provider</b></a>
      </div>
      <!-- /.navbar-header -->

      <ul class="nav navbar-top-links navbar-right">
       <li>
        <a style="color:white; background-color:#006633;" href="student_id_manipulation.php"><i class="fa fa-home"></i><b class="lang" key="home"> Home</b></a>
      </li>
      <li><a style="color:white" href="logout_user.php" title="click for edit" onclick="return confirm('Are you sure to leave from the system?')"><i class="fa fa-sign-out"></i>&nbsp;<b class="lang" key="logout">Logout</b></a></li>
      <li class="dropdown">
        <a style="color:white;" > <b class="lang" key="date" >Date - </b> 
          <?php
          $Today=date('y:m:d');
          $new=date('l, F d, Y',strtotime($Today));
          echo $new; ?>
          <span class="cart-amunt"></span> </a>
        </li>
        <li class="dropdown">
          <button type="button" class="btn dropdown-toggle" id="dropdownMenu1"
          data-toggle="dropdown"><b class="lang" key="select language">Select Langauge</b>
          <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
          <li role="">
            <button class="btn btn-success btn-block"><em class="translate" id="am">አማርኛ</em></button>
          </li>
          <li style="background-color: blue" role="presentation" class="divider"></li>
          <li role="">
            <button class="btn btn-success btn-block"><em class="translate" id="gz">ግዕዝ</em></button>
          </li>
          <li style="background-color: blue" role="presentation" class="divider"></li>
          <li role="">
            <button class="btn btn-success btn-block"><em class="translate" id="en">English</em></button>
          </li>
        </ul>
      </li>
      <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div style="color:#006633;" class="navbar-default sidebar" role="navigation" >
      <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu" >
          <li><a style="color:;font-size:14px;font-family:italic; background-color: ;" href=""><p><b> <em class="lang" key="logedas">Loged As:- </em>
            <?php echo ''.$_SESSION["username"].'';?></b></p></a></li>
            <li>
              <a style="color:;" href="student_service_support.php"><i class="fa fa-home"></i> <b class="lang" key="home">Home</b></a>
            </li>
            <li class="active"> <a style="color:" href="student_id_manipulation.php" data-toggle=""><span class="glyphicon glyphicon-user"></span>&nbsp; <b class="lang" key="student id managment">Student Id Management</b><span class="fa arrow"></span></a> 
            </li>
            <!-- <li><a style="color:" href="#demoooo" data-toggle="collapse"><span class="  glyphicon glyphicon-barcode"></span>&nbsp; <b class="lang" key="create id">create id</b><span class="fa arrow"></span></a></li> -->  
            <li><a style="color:" href="#backsid" data-toggle="collapse"><span class="  glyphicon glyphicon-barcode"></span>&nbsp; <b class="lang" key="create id">Print Id Backside</b><span class="fa arrow"></span></a></li>
            <li><a style="color:" href="#demooo" data-toggle="collapse"><span class="  glyphicon glyphicon-eye-open"></span>&nbsp; <b class="lang" key="earned id">earned id</b><span class="fa arrow"></span></a></li> 
            <li><a style="color:" href="#demoo" data-toggle="collapse"><span class="  glyphicon glyphicon-eye-open"></span>&nbsp; <b class="lang" key="not earned id">not earned id</b><span class="fa arrow"></span></a></li>  
            <li><a style="color:" href="#d" data-toggle="collapse"><span class="  glyphicon glyphicon-eye-open"></span>&nbsp; <b class="lang" key="view recreated id">view recreated id</b><span class="fa arrow"></span></a></li> 
             <li>

            <li><a style="color:" href="#help" data-toggle="modal"><span class="  glyphicon glyphicon-book"></span>&nbsp;<b class="lang" key="help"> Help</b><span class="fa arrow"></span></a></li>

          </ul>
        </div>
        <!-- /.sidebar-collapse -->
      </div>
      <!-- /.navbar-static-side -->
    </nav>

    <div style="background-image: " id="page-wrapper">
      <div class="row">   
        <div class="col-lg-12">
         <h4  style="color:#006633; font-size:30px"> <img style="max-height: 70px; max-width: 70px" src="img/correct.jpg"><em class="lang" key="dtusmics">Debre Tabor University Smart ID Card System (SMICS for DTU)</em></h4>
       </div>   

       <!-- /////////////////  Admin Page or Panel /////////////////////???-->  
       <div class="col-lg-12">
        <div style="background-color:;" class="panel panel-default">
          <div style="background-color:#00cc99"  class="panel-heading">
            <ul id="myTab" class="nav nav-tabs">
            </ul>
          </div>
          <div style="height:2500px;color:; overflow:scroll; ;" class="panel-body">
            <div class="panel-group" id="accordion">

             <!-- ................ barcode generation...........................-->
             <div id="demoooo" class="panel-collapse collapse">
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="col-lg-6"><span class="glyphicon glyphicon-barcode"></span> Create ID</div>
                  <div class="col-lg-6">                   
                    <form action="student_id_manipulation.php" method="POST">
                      <div class="input-group custom-search-form">
                        <input type="text" class="form-control" name="stu_id" placeholder="Search..." autofocus>
                        <span class="input-group-btn">
                          <button class="btn btn-success" name="check_stu_id" type="submit">
                            <i class="fa fa-search"></i>
                          </button>
                        </span>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!--..................... ID Generation................-->
            <?php
            if(isset($_POST['check_stu_id']))
            {
              $stid=$_POST['stu_id'];
              ?>
              <div class="panel panel-default">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-8">
                      <?php
                      $qry=mysqli_query($conn,"SELECT * from stu_data where stu_id='$stid' AND status='1' ");
                      if($qry)
                      {
                        $session=$_SESSION['username'];
                        while ($myrow=mysqli_fetch_assoc($qry)) {
                          extract($myrow);
                          ?>
                          <div style="position:absolute" id="print_id">
                           <table id="" class="display nowrap" style="width:60px; hight:40px;position:absolute">
                            <thead>
                              <tr>
                                <th></th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td style="width:60%" colspan="2"><img src="img/id_header.jpg" style="max-width:340px"></td>
                              </tr>
                              <tr>
                               <td style="width:70%; hight:60%">
                                <?php echo '<b>Full Name : '.$myrow['first_name'].'</b>'; ?>
                                <?php echo '<br>';?>
                                <?php echo '<b>Department : '.$myrow['department'].'</b>'; ?>
                                <?php echo '<br>';?>
                                <?php
                                $Today=date('d:m:y');
                                ?>
                                <?php echo '<b>Issue date : '.$Today.'</b>'; ?>  
                                <?php echo '<br>';?>
                                <?php echo '<br>';?>
                              </td>
                              <td style="width:28%" rowspan="2">
                                <?php echo '<img style="max-width:220px;max-height:115px" src="data:image;base64,'.$myrow["image"].'" />'; ?>
                              </td>
                            </tr>
                            <tr>
                              <td style="width:70%; hight:30%" >
                                <?php
                                $text=$myrow['stu_id'];
                                echo "<img src='barcode.php?codetype=Code128&size=40&text=".$text."&print=true'/>";
                                ?>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-lg-4">
                     <?php
                     $fn=$myrow['first_name'];
                     $se=$myrow['sex'];
                     $em=$myrow['email'];
                     $ph=$myrow['phone'];
                     $fa=$myrow['faculty'];
                     $dep=$myrow['department'];
                     $strm=$myrow['stream'];
                     $img=$myrow['image'];
                     $ye=$myrow['year'];
//$acy=$myrow['ac_year'];
                     $stat=$myrow['status'];
                     $check=mysqli_query($conn,"SELECT * from id_issued WHERE stu_id='$stid' AND status='1'");
                     $count=mysqli_num_rows($check);
                     if($count>0)
                     {
                      ?>
                      <br>
                      <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <h3 style="color:red">Data is not entered into earned table because Id card is already Created!.so you can't print id, to resolve please inactive student status</h3>
                      </div>
                      <?php

                    }
                    else
                    {
                      ?>
                      <button onclick="printContent('print_id')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button> 
                      <?php
                      $qr=mysqli_query($conn,"SELECT * from id_issued where stu_id='$stid' AND status=0");
                      $countt=mysqli_num_rows($qr);
                      if($countt>0)
                      {
                        $qrr=mysqli_query($conn,"UPDATE id_issued set status=1  where stu_id='$stid' ");
                        ?>
                        <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <h3 style="color:green">Data changed and student statuse activated. so you can print id</h3>
                        </div>
                        <?php
                      }
                      else
                      {
                        $query=mysqli_query($conn,"INSERT into id_issued (stu_id, first_name, sex, email, phone, faculty, department, stream, year, ac_year, status, user, ec, image) VALUES ('$stid','$fn','$se','$em','$ph','$fa','$dep','$strm','$ye',NOW(),'$stat', '$session', NOW(), '$img')");
                        if($query)
                        {
                         echo '<script>alert("Id cared Created seccussfully")';
                       }
                       else
                       {
                        ?>
                        <div class="alert alert-warning">
                          <button type="button" class="close" data-dismiss="alert">×</button>
                          <h3 style="color:green">Id card is not Created!</h3>
                        </div>
                        <?php
                      }
                    }
                  }
                }
              }
              else
              {
                ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert"></button>
                  <h3 style="color:green">There is no such type of id!</h3>
                </div>
                <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
    <!--..../.................... ID genaeration..........-->


    <!--.......Print Backside of The Id...............-->
    <div  style="color:" class="panel-collapse collapse" id="backsid">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-6">
              <div id="print_backside">
                <center>
                  <table style="width: 60px;height: 40px">
                    <?php 
                    $sel=mysqli_query($conn,"SELECT * FROM id_backside WHERE ac_year=(select max(ac_year) from id_backside)");
                    if($sel)
                    {
                      $myrow=mysqli_fetch_assoc($sel);
                      $backside=$myrow['image'];
                      echo '<img width="340" height="200" src="data:image;base64,'.$backside.'" />';
                    } 
                    ?>
                  </table>
                </center>
              </div>
            </div>
            <div class="col-md-4">
             <button onclick="printContent('print_backside')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
           </div>
         </div>
       </div>
     </div>
   </div>
   <!-- ..........Backside............ -- >


   <!--.......view id Issued Student...............-->
   <div  style="color:" class="panel-collapse collapse" id="demooo">
    <div class="panel panel-default">
      <div class="panel-body">
        <?php
        $result = mysqli_query($conn,"SELECT * FROM id_issued ");
        $num_rows = mysqli_num_rows($result);
        echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
        ?>
        <table width="100%" class="table table-striped table-bordered table-hover" id="id_issued">
          <thead>
            <tr>
              <th class="lang" key="id">Student Id</th>
              <th class="lang" key="full name">Full Name</th>
              <th class="lang" key="sex">Sex</th>
              <th class="lang" key="department">Department</th>
              <th class="lang" key="year">Year</th>
              <th class="lang" key="ac_year">Ac_Year</th>
              <th class="lang" key="user">User</th> 
              <th class="lang" key="status">Status</th>
            </tr>
          </thead>
          <tbody>
           <?php
                //include('database_conn.php');
           $check_data = "SELECT * FROM id_issued ORDER BY first_name ASC ";
           $run=mysqli_query($conn,$check_data);
           if(mysqli_num_rows($run)>0)
           {
            $sess=$_SESSION['username'];
            while($row = mysqli_fetch_assoc($run))
            { 
              extract($row);
              $std=$row['stu_id'];
              ?>
              <tr>
               <td><?php echo ''.$row['stu_id'].''; ?></td>
               <td><?php echo ''.$row['first_name'].''; ?> </td>
               <td><?php echo ''.$row['sex'].''; ?></td>
               <td><?php echo ''.$row['department'].''; ?></td>
               <td><?php echo ''.$row['year'].''; ?></td>
               <td><?php echo ''.$row['ac_year'].''; ?></td>
               <td><?php echo ''.$row["user"].'';?></td>
               <td>
                <form clas="form-horizontal" action="student_id_manipulation.php" method="post">
                  <select style="width: 25px" name="stu_id">
                    <option value="<?php echo $row['stu_id'];?>"><?php echo $row['stu_id'];?> </option>; 
                  </select>
                  &nbsp;&nbsp;&nbsp;
                  <?php
                  $query="SELECT status FROM id_issued where stu_id='$std'";
                  $result=mysqli_query($conn,$query);
                  if($result){
                   $st=mysqli_fetch_array($result);
                   if($st['status'] ==1){
                    echo '<img src="img/active.jpg">';
                  }
                  else if($st['status'] ==0){
                    echo '<img src="img/inactive.jpg">';
                  }
                  else
                    echo "there is no availabe user";
                }
                ?>
                <div class='btn-group' rol='group' area-level='.....'>
                  <input class="form-control" type="radio" name="status" value="1" >&nbsp;&nbsp;&nbsp;
                  <input class="form-control" type="radio" name="status" value="0">
                  <button type="submit" name="changes_earnedid"><span class='glyphicon glyphicon-edit' area-hidden='true'></span></button>
                </div> 
              </form>
              <?php
              if(isset($_POST['changes_earnedid'])){
                $std=$_POST['stu_id'];
                $st=$_POST['status'];
                $q=mysqli_query($conn,"UPDATE id_issued SET  status='$st'  WHERE stu_id='$std'");
                if($q){
                  echo '<script>alert("changed")</script>';
                  echo"<script>window.open('student_id_manipulation.php','_self')</script>";
                }
                else
                  echo '<script>alert("Not changed")</script>';
                echo"<script>window.open('student_id_manipulation.php','_self')</script>";
              }
              ?>
            </td>
          </tr>
          <?php
        }  
      }
      else
      {
        ?>
        <div class="col-xs-12">
          <div class="alert alert-danger alert-dismissible" rol="alert">
            <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
            <strong class="lang" key="data not avialable"> Data is Not Avialable Please try Again</strong> 
          </div>
          <?php 
        }     
        ?>  
      </div>
    </tbody>
  </table>
</div>
</div>
</div>
<!--........view id Issued Student...............-->

<!--./.......view id not Issued Student...............-->
<div  style="color:" class="panel-collapse collapse" id="demoo">
  <div class="panel panel-default">
    <div class="panel-body">
      <?php
      $query=mysqli_query($conn,"SELECT * from  stu_data as sd WHERE not exists(SELECT * from id_issued as idi where sd.stu_id=idi.stu_id) " );
      $c=mysqli_num_rows($query);
      echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp;  <strong> $c    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
      ?>
      <table width="100%" class="table table-striped table-bordered table-hover" id="id_not_issued">
        <thead>
          <tr>
            <th class="lang" key="id">Student Id</th>
            <th class="lang" key="full name">Full Name</th>
            <th class="lang" key="sex">Sex</th>
            <th class="lang" key="department">Department</th>
            <th class="lang" key="year">Year</th>
            <th class="lang" key="ac_year">Ac_Year</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query=mysqli_query($conn,"SELECT * from  stu_data as sd WHERE not exists(SELECT * from id_issued as idi where sd.stu_id=idi.stu_id) " );
          $c=mysqli_num_rows($query);
          if($c>0)
          {
            $sess=$_SESSION['username']; 
            while ($mrow=mysqli_fetch_assoc($query)) { 
              extract($mrow);
              ?>
              <tr>
               <td><?php echo ''.$mrow['stu_id'].''; ?></td>
               <td><?php echo ''.$mrow['first_name'].''; ?> </td>
               <td><?php echo ''.$mrow['sex'].''; ?></td>
               <td><?php echo ''.$mrow['department'].''; ?></td>
               <td><?php echo ''.$mrow['year'].''; ?></td>
               <td><?php echo ''.$mrow['ac_year'].''; ?></td>  
             </tr>
             <?php
           }
         }
         else
           echo 'data not avialabel';
         ?>  
       </div>
     </tbody>
   </table>
 </div>
</div>
</div>
<!--./.......view id not Issued Student...............-->

<!-- ................ barcode generation..................??????-->

<!-- .........Report................................-->
<!-- .......tab content for id earnd..............,..-->
<div style="background-color: white" class="panel-collapse collapse" id="demo">
  <div class="row">
    <aside>
      <div class="col-md-6">
        <div class="form-group">
          <h4 class="lang" key="faculty">Faculty</h4>
        </div>
        <form action="student_id_manipulation.php" method="POST">
          <div class="form-group">
            <div class="input-group custom-search-form">
              <select class="form-control" name="faculty" placeholder="Search..." autofocus>
                <option class="lang" key="select faculty"  value="">select faculty here</option>
                <?php
                $query="SELECT * from faculty where status=1 ORDER BY faculty ASC";
                $res = mysqli_query($conn,$query);
                if($res){
                  $count=mysqli_num_rows($res);
                  if($count>=1){
                    while($row=mysqli_fetch_assoc($res)){

                     ?>
                     <option value="<?php echo $row['faculty'];?>"><?php echo $row['faculty'];?> </option>;
                     <?php

                   }
                 }
                 else{
                  echo '<option value="">faculty is not available';
                }
              }
              ?>
            </select>
            <span class="input-group-btn">
              <button class="btn btn-success" name="by_faculty" type="submit">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </div>
      </form>
      <div class="form-group">
        <h4 class="lang" key="department">Department</h4>
      </div>
      <form action="student_id_manipulation.php" method="POST">
        <div class="form-group">
          <div class="input-group custom-search-form">
            <select class="form-control" name="department" placeholder="Search..." autofocus>
              <option class="lang" key="select department"  value="">select Department here</option>
              <?php
              $query="SELECT * from department ORDER BY department ASC";
              $res = mysqli_query($conn,$query);
              if($res){
                $count=mysqli_num_rows($res);
                if($count>=1){
                  while($row=mysqli_fetch_assoc($res)){

                   ?>
                   <option value="<?php echo $row['department'];?>"><?php echo $row['department'];?> </option>;
                   <?php

                 }
               }
               else{
                echo '<option value="">Department is not available';
              }
            }
            ?>
          </select>
          <span class="input-group-btn">
            <button class="btn btn-success" name="by_department" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </div>
    </form> 
    <div class="form-group">
      <h4 class="lang" key="year">Year</h4>
    </div>
    <form action="student_id_manipulation.php" method="POST">
      <div class="form-group">
        <div class="input-group custom-search-form">
          <select class="form-control" name="year" placeholder="Search..." autofocus>
            <option value="">Select Year here</option>
            <option value="1">I Year</option>
            <option value="2">II Year</option>
            <option value="3">III Year</option>
            <option value="4">IV Year</option>
            <option value="5">V Year</option>
            <option value="6">VI year</option>
            <option value="7">VII year</option>
          </select>
          <span class="input-group-btn">
            <button class="btn btn-success" name="by_year" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </div>
    </form>
  </div>
</aside>
<div class="col-md-6">
 <form action="student_id_manipulation.php" method="POST">
  <div class="form-group">
    <h4 class="lang" key="faculty">Faculty</h4>
  </div>
  <div class="form-group">
    <select name="faculty" class="form-control" onChange="change_faculty_id()" id="facultylist_id" required>
      <option class="lang" key="select faculty"  value="">select faculty here</option>
      <?php
                  //include('database_conn.php');
      $query="SELECT * from faculty where status=1 ORDER BY faculty ASC";
      $res = mysqli_query($conn,$query);
      if($res){
        $count=mysqli_num_rows($res);
        if($count>=1){
          while($row=mysqli_fetch_assoc($res)){

           ?>
           <option value="<?php echo $row['faculty'];?>"><?php echo $row['faculty'];?> </option>;
           <?php 
         }
       }
       else{
        echo '<option value="">faculty is not available';
      }
    }
    ?>
  </select>
</div>
<div class="form-group">
  <h4 class="lang" key="department">Department</h4>
</div>
<div class="form-group">
  <div id="dep_id">
    <select class="form-control" name="department" placeholder="Search..." autofocus>
    </select>
  </div>
</div>
<div class="form-group">
  <h4 class="lang" key="year">Year</h4>
</div>
<div class="form-group">
  <div class="input-group custom-search-form">
    <select class="form-control" name="year" placeholder="Search..." autofocus>
      <option value="">Select Year here</option>
      <option value="1">I Year</option>
      <option value="2">II Year</option>
      <option value="3">III Year</option>
      <option value="4">IV Year</option>
      <option value="5">V Year</option>
      <option value="6">VI year</option>
      <option value="7">VII year</option>
    </select>
    <span class="input-group-btn">
      <button class="btn btn-success" name="by_whole" type="submit">
        <i class="fa fa-search"></i>
      </button>
    </span>
  </div>
</div>
</form>
</div>
</div>
</div>
<!--../ .......tab content for id earnd..............,..-->

<!-- .......tab content for id not earnd..............,..-->
<div style="background-color: white" class="panel-collapse collapse" id="dem">
  <div class="row">
    <aside>
      <div class="col-md-6">
        <div class="form-group">
          <h4 class="lang" key="faculty">Faculty</h4>
        </div>
        <form action="student_id_manipulation.php" method="POST">
          <div class="form-group">
            <div class="input-group custom-search-form">
              <select class="form-control" name="faculty" placeholder="Search..." autofocus>
                <option class="lang" key="select faculty"  value="">select faculty here</option>
                <?php
                $query="SELECT * from faculty where status=1 ORDER BY faculty ASC";
                $res = mysqli_query($conn,$query);
                if($res){
                  $count=mysqli_num_rows($res);
                  if($count>=1){
                    while($row=mysqli_fetch_assoc($res)){

                     ?>
                     <option value="<?php echo $row['faculty'];?>"><?php echo $row['faculty'];?> </option>;
                     <?php

                   }
                 }
                 else{
                  echo '<option value="">faculty is not available';
                }
              }
              ?>
            </select>
            <span class="input-group-btn">
              <button class="btn btn-success" name="by_faculty_not" type="submit">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </div>
      </form>
      <div class="form-group">
        <h4 class="lang" key="department">Department</h4>
      </div>
      <form action="student_id_manipulation.php" method="POST">
        <div class="form-group">
          <div class="input-group custom-search-form">
            <select class="form-control" name="department" placeholder="Search..." autofocus>
              <option class="lang" key="select department"  value="">select Department here</option>
              <?php
              $query="SELECT * from department ORDER BY department ASC";
              $res = mysqli_query($conn,$query);
              if($res){
                $count=mysqli_num_rows($res);
                if($count>=1){
                  while($row=mysqli_fetch_assoc($res)){

                   ?>
                   <option value="<?php echo $row['department'];?>"><?php echo $row['department'];?> </option>;
                   <?php 
                 }
               }
               else{
                echo '<option value="">Department is not available';
              }
            }
            ?>
          </select>
          <span class="input-group-btn">
            <button class="btn btn-success" name="by_department_not" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </div>
    </form> 
    <div class="form-group">
      <h4 class="lang" key="year">Year</h4>
    </div>
    <form action="student_id_manipulation.php" method="POST">
      <div class="form-group">
        <div class="input-group custom-search-form">
          <select class="form-control" name="year" placeholder="Search..." autofocus>
            <option value="">Select Year here</option>
            <option value="1">I Year</option>
            <option value="2">II Year</option>
            <option value="3">III Year</option>
            <option value="4">IV Year</option>
            <option value="5">V Year</option>
            <option value="6">VI year</option>
            <option value="7">VII year</option>
          </select>
          <span class="input-group-btn">
            <button class="btn btn-success" name="by_year_not" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </div>
    </form>
  </div>
</aside>
<div class="col-md-6">
 <form action="student_id_manipulation.php" method="POST">
  <div class="form-group">
    <h4 class="lang" key="faculty">Faculty</h4>
  </div>
  <div class="form-group">
    <select name="faculty" class="form-control" onChange="change_faculty_id_not()" id="facultylist_id_not" required>
      <option class="lang" key="select faculty"  value="">select faculty here</option>
      <?php
      $query="SELECT * from faculty where status=1 ORDER BY faculty ASC";
      $res = mysqli_query($conn,$query);
      if($res){
        $count=mysqli_num_rows($res);
        if($count>=1){
          while($row=mysqli_fetch_assoc($res)){
           ?>
           <option value="<?php echo $row['faculty'];?>"><?php echo $row['faculty'];?> </option>;
           <?php 
         }
       }
       else{
        echo '<option value="">faculty is not available';
      }
    }
    ?>
  </select>
</div>
<div class="form-group">
  <h4 class="lang" key="department">Department</h4>
</div>
<div class="form-group">
  <div id="dep_id_not">
    <select class="form-control" name="department" placeholder="Search..." autofocus>
    </select>
  </div>
</div>
<div class="form-group">
  <h4 class="lang" key="year">Year</h4>
</div>
<div class="form-group">
  <div class="input-group custom-search-form">
    <select class="form-control" name="year" placeholder="Search..." autofocus>
      <option value="">Select Year here</option>
      <option value="1">I Year</option>
      <option value="2">II Year</option>
      <option value="3">III Year</option>
      <option value="4">IV Year</option>
      <option value="5">V Year</option>
      <option value="6">VI year</option>
      <option value="7">VII year</option>
    </select>
    <span class="input-group-btn">
      <button class="btn btn-success" name="by_whole_not" type="submit">
        <i class="fa fa-search"></i>
      </button>
    </span>
  </div>
</div>
</form>
</div>
</div>
</div>
<!--../ .......tab content for id not earnd..............,..-->

<!-- .......tab content for id inserting recreating..............,..-->
<div style="background-color: white" class="panel-collapse collapse" id="de">
  <div class="row">
    <div class=" col-lg-offset-0 col-md-4">
     <div class="form-group">
      <h4 class="lang" key="search student">Search student</h4>
    </div>
    <div class="form-group">
      <form action="student_id_manipulation.php" method="POST">
       <div class="input-group custom-search-form">
        <input type="text" class="form-control" name="stu_id" placeholder="Search..." autofocus>
        <span class="input-group-btn">
          <button class="btn btn-success" name="recheck_id" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
  </div>
</div>
</div>
</div>
<div class="row">
  <?php
  if(isset($_POST['recheck_id']))
  {
    $stu=$_POST['stu_id'];
    $query=mysqli_query($conn,"SELECT * from id_issued where stu_id='$stu' AND status='0' ");
    if(mysqli_num_rows($query)>0)
    {
      while ($row=mysqli_fetch_assoc($query)) 
      {
       extract($row);
       ?>
       <form action="student_id_manipulation.php" method="POST">
        <div class="col-md-4">
          <div class="form-group">
            <h4 class="lang" key="full name">Full Name</h4>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="first_name" value="<?php echo ''.$row['first_name'].''; ?>" required>
          </div>
          <div class="form-group">
            <h4 class="lang" key="sex">Sex</h4>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="sex" value="<?php echo ''.$row['sex'].''; ?>" required>
          </div>
          <div class="form-group">
            <h4 class="lang" key="email">Email</h4>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" value="<?php echo ''.$row['email'].''; ?>" required>
          </div>
          <div class="form-group">
            <h4 class="lang" key="phone">Phone number</h4>
          </div>
          <div class="form-group">
            <input type="text" name="phone" class="form-control" value="<?php echo ''.$row['phone'].''; ?>" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <h4 class="lang" key="faculty">Faculty</h4>
          </div>
          <div class="form-group">
            <input type="text" name="faculty" class="form-control" value="<?php echo ''.$row['faculty'].''; ?>" required>
          </div>
          <div class="form-group">
            <h4 class="lang" key="department">Department</h4>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="department" value="<?php echo ''.$row['department'].''; ?>" required>
          </div>
          <div class="form-group">
            <h4 class="lang" key="stream">Specialization</h4>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="stream" value="<?php echo ''.$row['stream'].''; ?>" >
          </div>
          <div class="form-group">
            <h4 class="lang" key="year">Year</h4>
          </div>
          <div class="form-group">
            <select class="form-control" name="year" placeholder="Search..." autofocus>
              <option value="">Select Year here</option>
              <option value="1">I Year</option>
              <option value="2">II Year</option>
              <option value="3">III Year</option>
              <option value="4">IV Year</option>
              <option value="5">V Year</option>
              <option value="6">VI year</option>
              <option value="7">VII year</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <h4 class="lang" key="id">Student Id</h4>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="stu_id" value="<?php echo ''.$row['stu_id'].''; ?>" >
          </div>
          <div class="form-group">
            <h4 class="lang" key="description">Description</h4>
          </div>
          <div class="form-group">
            <select class="form-control" name="description" placeholder="Search..." autofocus>
              <option value="">Select Description here</option>
              <option value="Losted">Losted</option>
              <option value="Stollen">Stollen</option>
              <option value="Broaken">Broaken</option>
              <option value="Fade out">Fade out</option>
            </select>
          </div>
          <div class="form-group">
            <h4 class="lang" key="payment">Payment</h4>
          </div>
          <div class="form-group">
            <div class="input-group custom-search-form">
              <input type="text" class="form-control" name="payment" autofocus>
              <span class="input-group-btn">
                <button class="btn btn-success" name="regenerat_id" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </div>
        </div>
      </form>
      <?php
    }
  }
  else
  {
    echo '<script>alert("first deactivate specified student")';
    echo"<script>window.open('student_id_manipulation.php','_self')</script>";
  }
}
?>
</div>
<?php
if(isset($_POST['regenerat_id']))
{
  $user=$_SESSION['username'];
  $stid=$_POST['stu_id']; 
  $fn=$_POST['first_name']; 
  $se=$_POST['sex']; 
  $em=$_POST['email']; 
  $ph=$_POST['phone']; 
  $fac=$_POST['faculty']; 
  $dep=$_POST['department']; 
  $strm=$_POST['stream']; 
  $ye=$_POST['year'];  
  $desc=$_POST['description'];  
  $pay=$_POST['payment']; 
  $query= mysqli_query($conn,"INSERT into regenerated_id (stu_id, first_name, sex, email, phone, faculty, department, stream, year, ac_year, ec, description, user, payment) VALUES ('$stid', '$fn', '$se', '$em', '$ph', '$fac', '$dep', '$strm',   '$ye', NOW(), NOW(), '$desc', '$user', '$pay')");
  if($query)
  {
    echo '<script>alert("Data Entered Successfully!")</script>';
  }
  else
  {
    echo '<script>alert("Data not Entered please try again!")</script>';
  }
}
?>
<!--../ .......tab content for id inserting recreating..............,..--> 

<!-- .......tab content for Regenerating ID..............,..-->
<div style="background-color: white" class="panel-collapse collapse" id="d">
  <div class="row">
    <aside>
      <div class="col-md-6">
        <div class="form-group">
          <h4 class="lang" key="faculty">Faculty</h4>
        </div>
        <form action="student_id_manipulation.php" method="POST">
          <div class="form-group">
            <div class="input-group custom-search-form">
              <select class="form-control" name="faculty" placeholder="Search..." autofocus>
                <option class="lang" key="select faculty"  value="">select faculty here</option>
                <?php
                $query="SELECT * from faculty where status=1 ORDER BY faculty ASC";
                $res = mysqli_query($conn,$query);
                if($res){
                  $count=mysqli_num_rows($res);
                  if($count>=1){
                    while($row=mysqli_fetch_assoc($res)){

                     ?>
                     <option value="<?php echo $row['faculty'];?>"><?php echo $row['faculty'];?> </option>;
                     <?php  
                   }
                 }
                 else{
                  echo '<option value="">faculty is not available';
                }
              }
              ?>
            </select>
            <span class="input-group-btn">
              <button class="btn btn-success" name="by_faculty_recreate" type="submit">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </div>
      </form>
      <div class="form-group">
        <h4 class="lang" key="department">Department</h4>
      </div>
      <form action="student_id_manipulation.php" method="POST">
        <div class="form-group">
          <div class="input-group custom-search-form">
            <select class="form-control" name="department" placeholder="Search..." autofocus>
              <option class="lang" key="select department"  value="">select Department here</option>
              <?php
              $query="SELECT * from department ORDER BY department ASC";
              $res = mysqli_query($conn,$query);
              if($res){
                $count=mysqli_num_rows($res);
                if($count>=1){
                  while($row=mysqli_fetch_assoc($res)){

                   ?>
                   <option value="<?php echo $row['department'];?>"><?php echo $row['department'];?> </option>;
                   <?php

                 }
               }
               else{
                echo '<option value="">Department is not available';
              }
            }
            ?>
          </select>
          <span class="input-group-btn">
            <button class="btn btn-success" name="by_department_recreate" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </div>
    </form> 
    <div class="form-group">
      <h4 class="lang" key="year">Year</h4>
    </div>
    <form action="student_id_manipulation.php" method="POST">
      <div class="form-group">
        <div class="input-group custom-search-form">
          <select class="form-control" name="year" placeholder="Search..." autofocus>
            <option value="">Select Year here</option>
            <option value="1">I Year</option>
            <option value="2">II Year</option>
            <option value="3">III Year</option>
            <option value="4">IV Year</option>
            <option value="5">V Year</option>
            <option value="6">VI year</option>
            <option value="7">VII year</option>
          </select>
          <span class="input-group-btn">
            <button class="btn btn-success" name="by_year_recreate" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </div>
    </form>
  </div>
</aside>
<div class="col-md-6">
 <form action="student_id_manipulation.php" method="POST">
  <div class="form-group">
    <h4 class="lang" key="faculty">Faculty</h4>
  </div>
  <div class="form-group">
   <select name="faculty" class="form-control" onChange="change_faculty_id_recreate()" id="facultylist_id_recreate" required>
    <option class="lang" key="select faculty"  value="">select faculty here</option>
    <?php
    $query="SELECT * from faculty where status=1 ORDER BY faculty ASC";
    $res = mysqli_query($conn,$query);
    if($res){
      $count=mysqli_num_rows($res);
      if($count>=1){
        while($row=mysqli_fetch_assoc($res)){

         ?>
         <option value="<?php echo $row['faculty'];?>"><?php echo $row['faculty'];?> </option>;
         <?php

       }
     }
     else{
      echo '<option value="">faculty is not available';
    }
  }
  ?>
</select>
</div>
<div class="form-group">
  <h4 class="lang" key="department">Department</h4>
</div>
<div class="form-group">
  <div id="dep_id_recreate">
    <select class="form-control"  autofocus>
    </select>
  </div>
</div>
<div class="form-group">
  <h4 class="lang" key="year">Year</h4>
</div>
<div class="form-group">
  <div class="input-group custom-search-form">
    <select class="form-control" name="year" placeholder="Search..." autofocus>
      <option value="">Select Year here</option>
      <option value="1">I Year</option>
      <option value="2">II Year</option>
      <option value="3">III Year</option>
      <option value="4">IV Year</option>
      <option value="5">V Year</option>
      <option value="6">VI year</option>
      <option value="7">VII year</option>
    </select>
    <span class="input-group-btn">
      <button class="btn btn-success" name="by_whole_recreate" type="submit">
        <i class="fa fa-search"></i>
      </button>
    </span>
  </div>
</div>
</form>
</div>
</div>
</div>    
<!--../ .......tab content for Regenerating ID..............,..-->
<!-- ./.........Report................................-->

<!-- ..........Report printing id earned by Faculity............-->
<?php
if(isset($_POST['by_faculty']))
{
  $earned_fac=$_POST['faculty'];
  ?>
  <div class="panel panel-default">
   <div class="panel-body">
    <div class="row">
      <div class="col-md-2">
       <button onclick="printContent_idearned('printidearned_by_faculty')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
     </div>
   </div>
   <div id="printidearned_by_faculty">
    <?php
    echo '<center><h3>Id earned. Displayed using Faculty</h3> </center>';
    $Today=date('y:m:d');
    $new=date('l, F d, Y',strtotime($Today));
    echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
    echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
    $result = mysqli_query($conn,"SELECT * FROM id_issued WHERE faculty='$earned_fac' AND status='1' AND ec=(SELECT MAX(ec) from id_issued)");
    $num_rows = mysqli_num_rows($result);
    echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
    ?> 
    <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
      <thead>
        <tr>
          <th class="lang" key="id">Student Id</th>
          <th class="lang" key="full name">Full Name</th>
          <th class="lang" key="sex">Sex</th>
          <th class="lang" key="department">Department</th>
          <th class="lang" key="year">Year</th>
          <th class="lang" key="ac_year">Ac_Year</th>
        </tr>
      </thead>
      <tbody>
       <?php
                //include('database_conn.php');
       $check_data = "SELECT * FROM id_issued where faculty='$earned_fac' AND status='1' AND ec=(SELECT MAX(ec) from id_issued) ORDER BY first_name ASC ";
       $run=mysqli_query($conn,$check_data);
       if(mysqli_num_rows($run)>0)
       {
        while($row = mysqli_fetch_assoc($run))
        { 
          extract($row);
          $std=$row['stu_id'];
          ?>
          <tr>
           <td><?php echo ''.$row['stu_id'].''; ?></td>
           <td><?php echo ''.$row['first_name'].''; ?> </td>
           <td><?php echo ''.$row['sex'].''; ?></td>
           <td><?php echo ''.$row['department'].''; ?></td>
           <td><?php echo ''.$row['year'].''; ?></td>
           <td><?php echo ''.$row['ac_year'].''; ?></td>
         </tr>
         <?php
       }   
     }
     else
     {
      ?>
      <div class="col-xs-12">
        <div class="alert alert-danger alert-dismissible" rol="alert">
          <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
          <strong class="lang" key="data not avialable"> Data is Not Avialable Please try Again</strong> 
        </div>
        <?php 
      }     
      ?>  
    </tbody>
  </table>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing id earned by faculty...............-->

<!-- ..........Report printing id earned by department............-->
<?php
if(isset($_POST['by_department']))
{
  $earned_dep=$_POST['department'];
  ?>
  <div class="panel panel-default">
   <div class="panel-body">
    <div class="row">
      <div class="col-md-2">
       <button onclick="printContent_idearned_dep('printidearned_by_department')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
     </div>
   </div>
   <div id="printidearned_by_department">
    <?php
    echo '<center><h3>Id earned. Displayed using Department</h3> </center>';
    $Today=date('y:m:d');
    $new=date('l, F d, Y',strtotime($Today));
    echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
    echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
    $result = mysqli_query($conn,"SELECT * FROM id_issued WHERE department='$earned_dep' AND status='1' AND ec=(SELECT max(ec) from id_issued) ");
    $num_rows = mysqli_num_rows($result);
    echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
    ?> 
    <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
      <thead>
        <tr>
          <th class="lang" key="id">Student Id</th>
          <th class="lang" key="full name">Full Name</th>
          <th class="lang" key="sex">Sex</th>
          <th class="lang" key="department">Department</th>
          <th class="lang" key="year">Year</th>
          <th class="lang" key="ac_year">Ac_Year</th>
        </tr>
      </thead>
      <tbody>
       <?php
                //include('database_conn.php');
       $check_data = "SELECT * FROM id_issued where department='$earned_dep' AND status='1' AND ec=(SELECT max(ec) from id_issued) ORDER BY first_name ASC ";
       $run=mysqli_query($conn,$check_data);
       if(mysqli_num_rows($run)>0)
       {
        while($row = mysqli_fetch_assoc($run))
        { 
          extract($row);
          $std=$row['stu_id'];
          ?>
          <tr>
           <td><?php echo ''.$row['stu_id'].''; ?></td>
           <td><?php echo ''.$row['first_name'].''; ?> </td>
           <td><?php echo ''.$row['sex'].''; ?></td>
           <td><?php echo ''.$row['department'].''; ?></td>
           <td><?php echo ''.$row['year'].''; ?></td>
           <td><?php echo ''.$row['ac_year'].''; ?></td>
         </tr>
         <?php
       }   
     }
     else
     {
      ?>
      <div class="col-xs-12">
        <div class="alert alert-danger alert-dismissible" rol="alert">
          <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
          <strong class="lang" key="data not avialable"> Data is Not Avialable Please try Again</strong> 
        </div>
        <?php 
      }     
      ?>  
    </tbody>
  </table>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing id earned by department...............-->

<!-- ..........Report printing id earned by year............-->
<?php
if(isset($_POST['by_year']))
{
  $earned_ye=$_POST['year'];
  ?>
  <div class="panel panel-default">
   <div class="panel-body">
    <div class="row">
      <div class="col-md-2">
       <button onclick="printContent_idearned_ye('printidearned_by_year')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
     </div>
   </div>
   <div id="printidearned_by_year">
    <?php
    echo '<center><h3>Id earned. Displayed using Year</h3> </center>';
    $Today=date('y:m:d');
    $new=date('l, F d, Y',strtotime($Today));
    echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
    echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
    $result = mysqli_query($conn,"SELECT * FROM id_issued WHERE year='$earned_ye' AND status='1' AND ec=(SELECT max(ec) from id_issued) ");
    $num_rows = mysqli_num_rows($result);
    echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
    ?> 
    <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
      <thead>
        <tr>
          <th class="lang" key="id">Student Id</th>
          <th class="lang" key="full name">Full Name</th>
          <th class="lang" key="sex">Sex</th>
          <th class="lang" key="department">Department</th>
          <th class="lang" key="year">Year</th>
          <th class="lang" key="ac_year">Ac_Year</th>
        </tr>
      </thead>
      <tbody>
       <?php
                //include('database_conn.php');
       $check_data = "SELECT * FROM id_issued where year='$earned_ye' AND status='1' AND ec=(SELECT max(ec) from id_issued) ORDER BY first_name ASC ";
       $run=mysqli_query($conn,$check_data);
       if(mysqli_num_rows($run)>0)
       {
        while($row = mysqli_fetch_assoc($run))
        { 
          extract($row);
          $std=$row['stu_id'];
          ?>
          <tr>
           <td><?php echo ''.$row['stu_id'].''; ?></td>
           <td><?php echo ''.$row['first_name'].''; ?> </td>
           <td><?php echo ''.$row['sex'].''; ?></td>
           <td><?php echo ''.$row['department'].''; ?></td>
           <td><?php echo ''.$row['year'].''; ?></td>
           <td><?php echo ''.$row['ac_year'].''; ?></td>
         </tr>
         <?php
       }   
     }
     else
     {
      ?>
      <div class="col-xs-12">
        <div class="alert alert-danger alert-dismissible" rol="alert">
          <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
          <strong class="lang" key="data not avialable"> Data is Not Avialable Please try Again</strong> 
        </div>
        <?php 
      }     
      ?>  
    </tbody>
  </table>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing id earned by year...............-->

<!-- ..........Report printing id earned by whole............-->
<?php
if(isset($_POST['by_whole']))
{
  $earned_fac=$_POST['faculty'];
  $earned_dep=$_POST['department'];
  $earned_ye=$_POST['year'];
  ?>
  <div class="panel panel-default">
   <div class="panel-body">
    <div class="row">
      <div class="col-md-2">
       <button onclick="printContent_idearned_h('printidearned_by_h')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
     </div>
   </div>
   <div id="printidearned_by_h">
    <?php
    echo '<center><h3>Id earned. Displayed using Faculty, Department and Year</h3> </center>';
    $Today=date('y:m:d');
    $new=date('l, F d, Y',strtotime($Today));
    echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
    echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
    $result = mysqli_query($conn,"SELECT * FROM id_issued WHERE department='$earned_dep' AND year='$earned_ye' AND status='1' AND ec=(SELECT max(ec) from id_issued) ");
    $num_rows = mysqli_num_rows($result);
    echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
    ?> 
    <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
      <thead>
        <tr>
          <th class="lang" key="id">Student Id</th>
          <th class="lang" key="full name">Full Name</th>
          <th class="lang" key="sex">Sex</th>
          <th class="lang" key="department">Department</th>
          <th class="lang" key="year">Year</th>
          <th class="lang" key="ac_year">Ac_Year</th>
        </tr>
      </thead>
      <tbody>
       <?php
                //include('database_conn.php');
       $check_data = "SELECT * FROM id_issued where department='$earned_dep' AND year='$earned_ye' AND status='1' AND ec=(SELECT max(ec) from id_issued) ORDER BY first_name ASC ";
       $run=mysqli_query($conn,$check_data);
       if(mysqli_num_rows($run)>0)
       {
        while($row = mysqli_fetch_assoc($run))
        { 
          extract($row);
          $std=$row['stu_id'];
          ?>
          <tr>
           <td><?php echo ''.$row['stu_id'].''; ?></td>
           <td><?php echo ''.$row['first_name'].''; ?> </td>
           <td><?php echo ''.$row['sex'].''; ?></td>
           <td><?php echo ''.$row['department'].''; ?></td>
           <td><?php echo ''.$row['year'].''; ?></td>
           <td><?php echo ''.$row['ac_year'].''; ?></td>
         </tr>
         <?php
       }   
     }
     else
     {
      ?>
      <div class="col-xs-12">
        <div class="alert alert-danger alert-dismissible" rol="alert">
          <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
          <strong class="lang" key="data not avialable"> Data is Not Avialable Please try Again</strong> 
        </div>
        <?php 
      }     
      ?>  
    </tbody>
  </table>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing id earned by whole...............-->

<!-- ..........Report printing id note earned by Faculity............-->
<?php
if(isset($_POST['by_faculty_not']))
{
  $earned_fac=$_POST['faculty'];
  ?>
  <div class="panel panel-default">
   <div class="panel-body">
    <div class="row">
      <div class="col-md-2">
       <button onclick="printContent_idearned_not('printidearned_by_faculty_not')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
     </div>
   </div>
   <div id="printidearned_by_faculty_not">
    <?php
    echo '<center><h3>Id not earned. Displayed using Faculty</h3> </center>';
    $Today=date('y:m:d');
    $new=date('l, F d, Y',strtotime($Today));
    echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
    echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
    $query=mysqli_query($conn,"SELECT * from  stu_data as sd WHERE not exists(SELECT * from id_issued as idi where sd.stu_id=idi.stu_id) AND faculty='$earned_fac' AND ec=(SELECT MAX(ec) from stu_data) " );
    $c=mysqli_num_rows($query);
    echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp;  <strong> $c    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
    ?> 
    <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
      <thead>
        <tr>
          <th class="lang" key="id">Student Id</th>
          <th class="lang" key="full name">Full Name</th>
          <th class="lang" key="sex">Sex</th>
          <th class="lang" key="department">Department</th>
          <th class="lang" key="year">Year</th>
          <th class="lang" key="ac_year">Ac_Year</th>
        </tr>
      </thead>
      <tbody>
       <?php
                //include('database_conn.php');
       $query=mysqli_query($conn,"SELECT * from  stu_data as sd WHERE not exists(SELECT * from id_issued as idi where sd.stu_id=idi.stu_id) AND faculty='$earned_fac' AND ec=(SELECT MAX(ec) from stu_data) ORDER BY first_name ASC " );
       $c=mysqli_num_rows($query);
       if($c>0)
       {
        $sess=$_SESSION['username']; 
        while ($mrow=mysqli_fetch_assoc($query)) { 
          extract($mrow);
          ?>
          <tr>
           <td><?php echo ''.$mrow['stu_id'].''; ?></td>
           <td><?php echo ''.$mrow['first_name'].''; ?> </td>
           <td><?php echo ''.$mrow['sex'].''; ?></td>
           <td><?php echo ''.$mrow['department'].''; ?></td>
           <td><?php echo ''.$mrow['year'].''; ?></td>
           <td><?php echo ''.$mrow['ac_year'].''; ?></td>  
         </tr>
         <?php
       }
     }
     else
     {
      ?>
      <div class="col-xs-12">
        <div class="alert alert-danger alert-dismissible" rol="alert">
          <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
          <strong class="lang" key="data not avialable"> Data is Not Avialable Please try Again</strong> 
        </div>
        <?php 
      }     
      ?>  
    </tbody>
  </table>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing id note earned by faculty...............-->

<!-- ..........Report printing id note earned by department............-->
<?php
if(isset($_POST['by_department_not']))
{
  $earned_dep=$_POST['department'];
  ?>
  <div class="panel panel-default">
   <div class="panel-body">
    <div class="row">
      <div class="col-md-2">
       <button onclick="printContent_idearned_dep_not('printidearned_by_department_not')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
     </div>
   </div>
   <div id="printidearned_by_department_not">
    <?php
    echo '<center><h3>Id not earned. Displayed using Department</h3> </center>';
    $Today=date('y:m:d');
    $new=date('l, F d, Y',strtotime($Today));
    echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
    echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
    $query=mysqli_query($conn,"SELECT * from  stu_data as sd WHERE not exists(SELECT * from id_issued as idi where sd.stu_id=idi.stu_id) AND department='$earned_dep' AND ec=(SELECT MAX(ec) from stu_data) " );
    $num_rows = mysqli_num_rows($query);
    echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
    ?> 
    <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
      <thead>
        <tr>
          <th class="lang" key="id">Student Id</th>
          <th class="lang" key="full name">Full Name</th>
          <th class="lang" key="sex">Sex</th>
          <th class="lang" key="department">Department</th>
          <th class="lang" key="year">Year</th>
          <th class="lang" key="ac_year">Ac_Year</th>
        </tr>
      </thead>
      <tbody>
       <?php
       $query=mysqli_query($conn,"SELECT * from  stu_data as sd WHERE not exists(SELECT * from id_issued as idi where sd.stu_id=idi.stu_id) AND department='$earned_dep' AND ec=(SELECT MAX(ec) from stu_data) ORDER BY first_name ASC " );
       if(mysqli_num_rows($query)>0)
       {
        while($row = mysqli_fetch_assoc($query))
        { 
          extract($row);
          $std=$row['stu_id'];
          ?>
          <tr>
           <td><?php echo ''.$row['stu_id'].''; ?></td>
           <td><?php echo ''.$row['first_name'].''; ?> </td>
           <td><?php echo ''.$row['sex'].''; ?></td>
           <td><?php echo ''.$row['department'].''; ?></td>
           <td><?php echo ''.$row['year'].''; ?></td>
           <td><?php echo ''.$row['ac_year'].''; ?></td>
         </tr>
         <?php
       }   
     }
     else
     {
      ?>
      <div class="col-xs-12">
        <div class="alert alert-danger alert-dismissible" rol="alert">
          <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
          <strong class="lang" key="data not avialable"> Data is Not Avialable Please try Again</strong> 
        </div>
        <?php 
      }     
      ?>  
    </tbody>
  </table>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing id note earned by department...............-->

<!-- ..........Report printing id note earned by year............-->
<?php
if(isset($_POST['by_year_not']))
{
  $earned_ye=$_POST['year'];
  ?>
  <div class="panel panel-default">
   <div class="panel-body">
    <div class="row">
      <div class="col-md-2">
       <button onclick="printContent_idearned_ye_not('printidearned_by_year_not')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
     </div>
   </div>
   <div id="printidearned_by_year_not">
    <?php
    echo '<center><h3>Id not earned.Displayed using Year</h3> </center>';
    $Today=date('y:m:d');
    $new=date('l, F d, Y',strtotime($Today));
    echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
    echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
    $query=mysqli_query($conn,"SELECT * from  stu_data as sd WHERE not exists(SELECT * from id_issued as idi where sd.stu_id=idi.stu_id) AND year='$earned_ye' AND ec=(SELECT MAX(ec) from stu_data) " );
    $num_rows = mysqli_num_rows($query);
    echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
    ?> 
    <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
      <thead>
        <tr>
          <th class="lang" key="id">Student Id</th>
          <th class="lang" key="full name">Full Name</th>
          <th class="lang" key="sex">Sex</th>
          <th class="lang" key="department">Department</th>
          <th class="lang" key="year">Year</th>
          <th class="lang" key="ac_year">Ac_Year</th>
        </tr>
      </thead>
      <tbody>
       <?php
                //include('database_conn.php');
       $query=mysqli_query($conn,"SELECT * from  stu_data as sd WHERE not exists(SELECT * from id_issued as idi where sd.stu_id=idi.stu_id) AND year='$earned_ye' AND ec=(SELECT MAX(ec) from stu_data) ORDER BY first_name ASC " );
       if(mysqli_num_rows($query)>0)
       {
        while($row = mysqli_fetch_assoc($query))
        { 
          extract($row);
          $std=$row['stu_id'];
          ?>
          <tr>
           <td><?php echo ''.$row['stu_id'].''; ?></td>
           <td><?php echo ''.$row['first_name'].''; ?> </td>
           <td><?php echo ''.$row['sex'].''; ?></td>
           <td><?php echo ''.$row['department'].''; ?></td>
           <td><?php echo ''.$row['year'].''; ?></td>
           <td><?php echo ''.$row['ac_year'].''; ?></td>
         </tr>
         <?php
       }   
     }
     else
     {
      ?>
      <div class="col-xs-12">
        <div class="alert alert-danger alert-dismissible" rol="alert">
          <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
          <strong class="lang" key="data not avialable"> Data is Not Avialable Please try Again</strong> 
        </div>
        <?php 
      }     
      ?>  
    </tbody>
  </table>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing id note earned by year...............-->

<!-- ..........Report printing id note earned by whole............-->
<?php
if(isset($_POST['by_whole_not']))
{
  $earned_fac=$_POST['faculty'];
  $earned_dep=$_POST['department'];
  $earned_ye=$_POST['year'];
  ?>
  <div class="panel panel-default">
   <div class="panel-body">
    <div class="row">
      <div class="col-md-2">
       <button onclick="printContent_idearned_h_not('printidearned_by_h_not')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
     </div>
   </div>
   <div id="printidearned_by_h_not">
    <?php
    echo '<center><h3>Id not earned. Displayed using Faculty, Department and Year</h3> </center>';
    $Today=date('y:m:d');
    $new=date('l, F d, Y',strtotime($Today));
    echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
    echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
    $query=mysqli_query($conn,"SELECT * from  stu_data as sd WHERE not exists(SELECT * from id_issued as idi where sd.stu_id=idi.stu_id) AND faculty='$earned_fac' AND department='$earned_dep' AND year='$earned_ye' AND ec=(SELECT MAX(ec) from stu_data) " );
    $num_rows = mysqli_num_rows($query);
    echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
    ?> 
    <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
      <thead>
        <tr>
          <th class="lang" key="id">Student Id</th>
          <th class="lang" key="full name">Full Name</th>
          <th class="lang" key="sex">Sex</th>
          <th class="lang" key="department">Department</th>
          <th class="lang" key="year">Year</th>
          <th class="lang" key="ac_year">Ac_Year</th>
        </tr>
      </thead>
      <tbody>
       <?php
       $query=mysqli_query($conn,"SELECT * from  stu_data as sd WHERE not exists(SELECT * from id_issued as idi where sd.stu_id=idi.stu_id) AND faculty='$earned_fac' AND department='$earned_dep' AND year='$earned_ye' AND ec=(SELECT MAX(ec) from stu_data) ORDER BY first_name ASC" );
       if(mysqli_num_rows($query)>0)
       {
        while($row = mysqli_fetch_assoc($query))
        { 
          extract($row);
          $std=$row['stu_id'];
          ?>
          <tr>
           <td><?php echo ''.$row['stu_id'].''; ?></td>
           <td><?php echo ''.$row['first_name'].''; ?> </td>
           <td><?php echo ''.$row['sex'].''; ?></td>
           <td><?php echo ''.$row['department'].''; ?></td>
           <td><?php echo ''.$row['year'].''; ?></td>
           <td><?php echo ''.$row['ac_year'].''; ?></td>
         </tr>
         <?php
       }   
     }
     else
     {
      ?>
      <div class="col-xs-12">
        <div class="alert alert-danger alert-dismissible" rol="alert">
          <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
          <strong class="lang" key="data not avialable"> Data is Not Avialable Please try Again</strong> 
        </div>
        <?php 
      }     
      ?>  
    </tbody>
  </table>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing id note earned by whole...............-->

<!-- ..........Report printing losted and recreated id by Faculity............-->
<?php
if(isset($_POST['by_faculty_recreate']))
{
  $earned_fac=$_POST['faculty'];
  ?>
  <div class="panel panel-default">
   <div class="panel-body">
    <div class="row">
      <div class="col-md-2">
       <button onclick="printContent_faculty_recreate('print_by_faculty_recreate')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
     </div>
   </div>
   <div id="print_by_faculty_recreate">
    <?php
    echo '<center><h3>Regenerated Id Displayed using Faculty</h3> </center>';
    $Today=date('y:m:d');
    $new=date('l, F d, Y',strtotime($Today));
    echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
    echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
    $result = mysqli_query($conn,"SELECT * FROM regenerated_id WHERE faculty='$earned_fac'  AND ec=(SELECT MAX(ec) from regenerated_id)");
    $num_rows = mysqli_num_rows($result);
    echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
    ?> 
    <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
      <thead>
        <tr>
          <th class="lang" key="id">Student Id</th>
          <th class="lang" key="full name">Full Name</th>
          <th class="lang" key="sex">Sex</th>
          <th class="lang" key="department">Department</th>
          <th class="lang" key="year">Year</th>
          <th class="lang" key="ac_year">Ac_Year</th>
          <th class="lang" key="payment">Payment</th>
          <th class="lang" key="user">User</th>
        </tr>
      </thead>
      <tbody>
       <?php
                //include('database_conn.php');
       $check_data = "SELECT * FROM regenerated_id where faculty='$earned_fac' AND ec=(SELECT MAX(ec) from regenerated_id) ORDER BY first_name ASC ";
       $run=mysqli_query($conn,$check_data);
       if(mysqli_num_rows($run)>0)
       {
        while($row = mysqli_fetch_assoc($run))
        { 
          extract($row);
          $std=$row['stu_id'];
          ?>
          <tr>
           <td><?php echo ''.$row['stu_id'].''; ?></td>
           <td><?php echo ''.$row['first_name'].''; ?> </td>
           <td><?php echo ''.$row['sex'].''; ?></td>
           <td><?php echo ''.$row['department'].''; ?></td>
           <td><?php echo ''.$row['year'].''; ?></td>
           <td><?php echo ''.$row['ac_year'].''; ?></td>
           <td><?php echo ''.$row['payment'].''; ?></td>
           <td><?php echo ''.$row['user'].''; ?></td>
         </tr>
         <?php
       }   
     }
     else
     {
      ?>
      <div class="col-xs-12">
        <div class="alert alert-danger alert-dismissible" rol="alert">
          <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
          <strong class="lang" key="data not avialable"> Data is Not Avialable Please try Again</strong> 
        </div>
        <?php 
      }     
      ?>  
    </tbody>
  </table>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.....Report printing losted and recreated id by faculty...............-->

<!-- ..........Report printing losted and recreated id by department............-->
<?php
if(isset($_POST['by_department_recreate']))
{
  $earned_dep=$_POST['department'];
  ?>
  <div class="panel panel-default">
   <div class="panel-body">
    <div class="row">
      <div class="col-md-2">
       <button onclick="printContent_dep_recreate('print_by_department_recreate')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
     </div>
   </div>
   <div id="print_by_department_recreate">
    <?php
    echo '<center><h3>Regenerated Id Displayed using Department</h3> </center>';
    $Today=date('y:m:d');
    $new=date('l, F d, Y',strtotime($Today));
    echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
    echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
    $result = mysqli_query($conn,"SELECT * FROM regenerated_id WHERE department='$earned_dep' AND ec=(SELECT max(ec) from regenerated_id) ");
    $num_rows = mysqli_num_rows($result);
    echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
    ?> 
    <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
      <thead>
        <tr>
          <th class="lang" key="id">Student Id</th>
          <th class="lang" key="full name">Full Name</th>
          <th class="lang" key="sex">Sex</th>
          <th class="lang" key="department">Department</th>
          <th class="lang" key="year">Year</th>
          <th class="lang" key="ac_year">Ac_Year</th>
          <th class="lang" key="payment">Payment</th>
          <th class="lang" key="user">User</th>
        </tr>
      </thead>
      <tbody>
       <?php
       $check_data = "SELECT * FROM regenerated_id where department='$earned_dep' AND ec=(SELECT max(ec) from regenerated_id) ORDER BY first_name ASC ";
       $run=mysqli_query($conn,$check_data);
       if(mysqli_num_rows($run)>0)
       {
        while($row = mysqli_fetch_assoc($run))
        { 
          extract($row);
          $std=$row['stu_id'];
          ?>
          <tr>
           <td><?php echo ''.$row['stu_id'].''; ?></td>
           <td><?php echo ''.$row['first_name'].''; ?> </td>
           <td><?php echo ''.$row['sex'].''; ?></td>
           <td><?php echo ''.$row['department'].''; ?></td>
           <td><?php echo ''.$row['year'].''; ?></td>
           <td><?php echo ''.$row['ac_year'].''; ?></td>
           <td><?php echo ''.$row['payment'].''; ?></td>
           <td><?php echo ''.$row['user'].''; ?></td>
         </tr>
         <?php
       }   
     }
     else
     {
      ?>
      <div class="col-xs-12">
        <div class="alert alert-danger alert-dismissible" rol="alert">
          <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
          <strong class="lang" key="data not avialable"> Data is Not Avialable Please try Again</strong> 
        </div>
        <?php 
      }     
      ?>  
    </tbody>
  </table>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing losted and recreated id by department............-->

<!-- ..........Report printing losted and recreated id by year............-->
<?php
if(isset($_POST['by_year_recreate']))
{
  $earned_ye=$_POST['year'];
  ?>
  <div class="panel panel-default">
   <div class="panel-body">
    <div class="row">
      <div class="col-md-2">
       <button onclick="printContent_ye_recreate('print_by_year_recreate')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
     </div>
   </div>
   <div id="print_by_year_recreate">
    <?php
    echo '<center><h3>Regenreated Id Displayed using Year</h3> </center>';
    $Today=date('y:m:d');
    $new=date('l, F d, Y',strtotime($Today));
    echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
    echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
    $result = mysqli_query($conn,"SELECT * FROM regenerated_id WHERE year='$earned_ye' AND ec=(SELECT max(ec) from regenerated_id) ");
    $num_rows = mysqli_num_rows($result);
    echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
    ?> 
    <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
      <thead>
        <tr>
          <th class="lang" key="id">Student Id</th>
          <th class="lang" key="full name">Full Name</th>
          <th class="lang" key="sex">Sex</th>
          <th class="lang" key="department">Department</th>
          <th class="lang" key="year">Year</th>
          <th class="lang" key="ac_year">Ac_Year</th>
          <th class="lang" key="payment">Payment</th>
          <th class="lang" key="user">User</th>
        </tr>
      </thead>
      <tbody>
       <?php
       $check_data = "SELECT * FROM regenerated_id where year='$earned_ye' AND ec=(SELECT max(ec) from regenerated_id) ORDER BY first_name ASC ";
       $run=mysqli_query($conn,$check_data);
       if(mysqli_num_rows($run)>0)
       {
        while($row = mysqli_fetch_assoc($run))
        { 
          extract($row);
          $std=$row['stu_id'];
          ?>
          <tr>
           <td><?php echo ''.$row['stu_id'].''; ?></td>
           <td><?php echo ''.$row['first_name'].''; ?> </td>
           <td><?php echo ''.$row['sex'].''; ?></td>
           <td><?php echo ''.$row['department'].''; ?></td>
           <td><?php echo ''.$row['year'].''; ?></td>
           <td><?php echo ''.$row['ac_year'].''; ?></td>
           <td><?php echo ''.$row['payment'].''; ?></td>
           <td><?php echo ''.$row['user'].''; ?></td>
         </tr>
         <?php
       }   
     }
     else
     {
      ?>
      <div class="col-xs-12">
        <div class="alert alert-danger alert-dismissible" rol="alert">
          <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
          <strong class="lang" key="data not avialable"> Data is Not Avialable Please try Again</strong> 
        </div>
        <?php 
      }     
      ?>  
    </tbody>
  </table>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing losted and recreated id by year...............-->

<!-- ..........Report printing losted and recreated id by whole............-->
<?php
if(isset($_POST['by_whole_recreate']))
{
  $earned_fac=$_POST['faculty'];
  $earned_dep=$_POST['department'];
  $earned_ye=$_POST['year'];
  ?>
  <div class="panel panel-default">
   <div class="panel-body">
    <div class="row">
      <div class="col-md-2">
       <button onclick="printContent_h_recreate('print_by_h_recreate')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
     </div>
   </div>
   <div id="print_by_h_recreate">
    <?php
    echo '<center><h3>Regenerated Id Displayed using Faculty, Department and Year</h3> </center>';
    $Today=date('y:m:d');
    $new=date('l, F d, Y',strtotime($Today));
    echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
    echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
    $result = mysqli_query($conn,"SELECT * FROM regenerated_id WHERE department='$earned_dep' AND year='$earned_ye' AND ec=(SELECT max(ec) from regenerated_id) ");
    $num_rows = mysqli_num_rows($result);
    echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
    ?> 
    <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
      <thead>
        <tr>
          <th class="lang" key="id">Student Id</th>
          <th class="lang" key="full name">Full Name</th>
          <th class="lang" key="sex">Sex</th>
          <th class="lang" key="department">Department</th>
          <th class="lang" key="year">Year</th>
          <th class="lang" key="ac_year">Ac_Year</th>
          <th class="lang" key="payment">Payment</th>
          <th class="lang" key="user">User</th>
        </tr>
      </thead>
      <tbody>
       <?php
                //include('database_conn.php');
       $check_data = "SELECT * FROM regenerated_id where department='$earned_dep' AND year='$earned_ye' AND ec=(SELECT max(ec) from regenerated_id) ORDER BY first_name ASC ";
       $run=mysqli_query($conn,$check_data);
       if(mysqli_num_rows($run)>0)
       {
        while($row = mysqli_fetch_assoc($run))
        { 
          extract($row);
          $std=$row['stu_id'];
          ?>
          <tr>
           <td><?php echo ''.$row['stu_id'].''; ?></td>
           <td><?php echo ''.$row['first_name'].''; ?> </td>
           <td><?php echo ''.$row['sex'].''; ?></td>
           <td><?php echo ''.$row['department'].''; ?></td>
           <td><?php echo ''.$row['year'].''; ?></td>
           <td><?php echo ''.$row['ac_year'].''; ?></td>
           <td><?php echo ''.$row['payment'].''; ?></td>
           <td><?php echo ''.$row['user'].''; ?></td>
         </tr>
         <?php
       }   
     }
     else
     {
      ?>
      <div class="col-xs-12">
        <div class="alert alert-danger alert-dismissible" rol="alert">
          <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
          <strong class="lang" key="data not avialable"> Data is Not Avialable Please try Again</strong> 
        </div>
        <?php 
      }     
      ?>  
    </tbody>
  </table>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing losted and recreated by whole..........-->


</div> <!--dive collapse-content-->



<!--..................... ID Generation................-->
<?php
if(isset($_POST['changes']))
{
  $Today=date('y:m:d');
  $new=date('l, F d, Y',strtotime($Today));
  $stid=$_POST['stu_id'];
  ?>
  <div class="panel panel-default">
    <div class="panel-body">
      <div class="row">
        <div class="col-lg-12">
          <?php
          $qry=mysqli_query($conn,"SELECT * from stu_data where stu_id='$stid' AND status='1' ");
          if($qry)
          {
            $session=$_SESSION['username'];
            while ($myrow=mysqli_fetch_assoc($qry)) 
            {
              extract($myrow);
              ?>
            <!-- <div style="position:absolute" id="print_id">
             <table id="" class="display nowrap" style="width:60px; hight:40px;position:absolute">
              <thead>
                  <tr>
                      <th></th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td style="width:60%" colspan="2"><img src="img/id_header.jpg" style="max-width:375px"></td>
                  </tr>
                    <tr>
                 <td style="width:70%; hight:60%">
                      <?php echo '<b>Full Name : '.$myrow['first_name'].'</b>'; ?>
                      <?php echo '<br>';?>
                      <?php echo '<b>Department : '.$myrow['department'].'</b>'; ?>
                      <?php echo '<br>';?>
                      <?php
                       $Today=date('d:m:y');
                        ?>
                      <?php echo '<b>Issue date : '.$Today.'</b>'; ?>  
                       <?php echo '<br>';?>
                         <?php echo '<br>';?>
                  </td>
                  <td style="width:28%" rowspan="2">
                  <?php echo '<img style="max-width:220px;max-height:115px" src="data:image;base64,'.$myrow["image"].'" />'; ?>
                  </td>
                  </tr>
                    <tr>
                      <td style="width:70%; hight:30%" >
                        <?php
                        $text=$myrow['stu_id'];
                       echo "<img src='barcode.php?codetype=Code128&size=40&text=".$text."&print=true'/>";
                      ?>
                      </td>
                    </tr>
                  </tbody>
                  </table>
                </div> -->
                <?php
                $fn=$myrow['first_name'];
                $se=$myrow['sex'];
                $em=$myrow['email'];
                $ph=$myrow['phone'];
                $fa=$myrow['faculty'];
                $dep=$myrow['department'];
                $strm=$myrow['stream'];
                $img=$myrow['image'];
                $ye=$myrow['year'];
            //$acy=$myrow['ac_year'];
                $stat=$myrow['status'];
                $check=mysqli_query($conn,"SELECT * from id_issued WHERE stu_id='$stid' AND status='1'");
                $count=mysqli_num_rows($check);
                if($count>0)
                {
                  ?>
                  <br>
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <h3 style="color:red"> Id card is already Created!.to resolve you can inactive student status from earned id list</h3>
                  </div>
                  <?php
                }
                else
                {
                  ?>
                  <?php
                  $qr=mysqli_query($conn,"SELECT * from id_issued where stu_id='$stid' AND status=0");
                  $countt=mysqli_num_rows($qr);
                  if($countt>0)
                  {
                    $qrr=mysqli_query($conn,"UPDATE id_issued set status=1  where stu_id='$stid' ");
                    ?>
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <h3 style="color:green">Data changed and student statuse activated.</h3>
                    </div>
                    <?php
                  }
                  else
                  {
                    $query=mysqli_query($conn,"INSERT into id_issued (stu_id, first_name, sex, email, phone, faculty, department, stream, year, ac_year, status, user, ec, image) VALUES ('$stid','$fn','$se','$em','$ph','$fa','$dep','$strm','$ye',NOW(),'$stat', '$session', NOW(), '$img')");
                    if($query)
                    {
                      ?>
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <h3 style="color:"> Id card Checked Successfully</h3>
                      </div>
                      <?php
                    }
                    else
                    {
                      ?>
                      <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <h3 style="color:green">Id card Data is Not entered!</h3>
                      </div>
                      <?php
                    }
                  }
                }
              }
            }
            else
            {
             ?>
             <div class="alert alert-danger">
               <button type="button" class="close" data-dismiss="alert"></button>
               <h3 style="color:green">There is no such type of id!</h3>
             </div>
             <?php
           }
           ?>
         </div>
       </div>
     </div>
   </div>
   <?php
 }
 ?>
 <!--..../.................... ID genaeration..........-->

 <!-- .........Id Lists........................ -->
 <div class="col-xs-12">
  <table class="table table-bordered" id="id_print">
    <thead>
     <th>SN</th>
     <th>Student Id</th>
     <th>Name</th>
     <th>id_card</th>
     <th>Students Status</th>
     <th>Action</th>
   </thead>

   <tbody>
    <?php
    $qry=mysqli_query($conn,"SELECT * from stu_data where status='1' ");
    if($qry)
    {
     $session=$_SESSION['username'];
     $count = 1;
     while ($myrow=mysqli_fetch_assoc($qry)) 
     {
      extract($myrow);
      ?>
      <tr>
        <td style="width:; height:235px"><?php echo $count;?></td>
        <td style="width:; height:235px"><?php echo $myrow['stu_id'];?></td>
        <td style="width:; height:235px"><?php echo $myrow['first_name'];?></td>
        <td style="width:40%; height:235px">
         <!-- Print Body depending on student id -->
         <div style="position:" id="<?php echo $myrow['stu_id']?>">
           <center>
             <table id="" class="display nowrap" style="width:60px; height:40px;position:">
              <thead>
               <tr>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="width:60%" colspan="2"><img src="img/id_header.jpg" style="max-width:340px"></td>
              </tr>
              <tr>
                <td style="width:70%; height:60%">
                  <?php echo '<b>Full Name : '.$myrow['first_name'].'</b>'; ?>
                  <?php echo '<br>';?>
                  <?php echo '<b>Department : '.$myrow['department'].'</b>'; ?>
                  <?php echo '<br>';?>
                  <?php
                  $Today=date('d:m:y');
                  ?>
                  <?php echo '<b>Issue date : '.$Today.'</b>'; ?>  
                  <?php echo '<br>';?>
                  <?php echo '<br>';?>
                </td>
                <td style="width:28%" rowspan="2">
                 <img style="max-width:220px;max-height:105px" src="img/images.jpeg"/>
                 <!-- <?php echo '<img style="max-width:220px;max-height:115px" src="data:image;base64,'.$myrow["image"].'" />'; ?> -->
               </td>
             </tr>
             <tr>
              <td style="width:70%; height:30%" >
                <?php
                $text=$myrow['stu_id'];
                echo "<img src='barcode.php?codetype=Code128&size=40&text=".$text."&print=true'/>";
                ?>
              </td>
            </tr>
          </tbody>
        </table>
      </center>
    </div>
  </td>
  <td>
    <form clas="form-horizontal" action="student_id_manipulation.php" method="post">
      <select style="width: 40px" name="stu_id">
        <option value="<?php echo $myrow['stu_id'];?>"><?php echo $myrow['stu_id'];?> </option>; 
      </select>
      &nbsp;&nbsp;&nbsp;
      <div class='btn-group' rol='group' area-level='.....'>
        <?php
        $query="SELECT status FROM id_issued where stu_id='".$myrow['stu_id']."'";
        $result=mysqli_query($conn,$query);
        if($result)
        {
          while($st=mysqli_fetch_assoc($result))
          {
         if($st['status'] ==1)
         {
          ?>
          <?php
          echo '<img src="img/active.jpg"> ';
          echo '<p style="color:green;">Checked</p>';
          ?>
          <?php
        }
        else if($st['status'] ==0)
        {
          echo '<img src="img/inactive.jpg">';
          echo '<h4 style="color:red;">unchecked</h4>';
        }
        else
          echo "there is no availabe user";
      }
    }

      ?>

      <button class="btn btn-success" type="submit" name="changes"><span class='glyphicon glyphicon-edit' area-hidden='true'></span></button>
    </div> 
  </form>  
</td>         


<td style="width:; height:60%">
 <button onclick="printContent('<?php echo $myrow["stu_id"]?>')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
</td>
</tr>
<?php
$count++;
}
}  
?> 
</tbody>

</table>
</div>   
<!-- .........Id Lists........................ -->


</div>
</div> <!--dive panel body-->
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
<!--................HELP MODAL..............................-->
<div class="modal fade" id="help" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div style="background-color:#00cc99" class="modal-header">
      <button type="button" class="close"
      data-dismiss="modal" aria-hidden="true">
      &times;
    </button>
    <h4 class="modal-title" id="myModalLabel">
      <b class="lang" key="basic clue">Basic Clue</b>
    </h4>
  </div>
  <div class="modal-body">

    <!-- ......Basic Clue .......-->
    <ol style="color: black; float: left" class="text-left">
      <li class="lang" key="h1"> &nbsp;In all table there is three icon at the right side, which is blue, orange and red color </li><br>
      <li class="lang" key="h2"> &nbsp;To view more data press blue icon </li><br>
      <li class="lang" key="h3"> &nbsp;To edit data press orange icon</li><br>
      <li class="lang" key="h4"> &nbsp;To delete data press red icon </li><br>
      <li class="lang" key="h5"> &nbsp;In student and staff service table at column of status in each row there is one combo box, one dot, two small circle and on edit icon</li><br>
      <li class="lang" key="h6"> &nbsp;Each conbo box holds individuals person id</li><br>
      <li class="lang" key="h7"> &nbsp;Dot indicates weather the status activated or deactivated, if dot become green user is status is activated and if dot become black status is deactivated </li><br>
      <li class="lang" key="h8"> &nbsp;From the two small circle if you click the left and press edit icon, you sett a person active </li><br>
      <li class="lang" key="h9"> &nbsp;From the two small circle if you click the right and press edit icon, you sett a person deactive </li><br>
    </ol>
    <!-- ......Basic Clue........?????-->
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-success" data-dismiss="modal"><b class="lang" key="close">Close</b>
    </button>
  </div>
</div><!-- /.modal-content -->
</div><!-- /.modal -->
</div>
<!-- ............... HELP MODAL .....................???-->
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
<script src="vendor/bootstrap/js/bootstrap-fileupload.js"></script>
<script>
  function printContent(id)
  {
   var html="<html>";
   html+= document.getElementById(id).innerHTML;
   html+="</html>";
   var printWin = window.open('','','left=800,top=100,width=475,height=300,toolbar=600,scrollbars=,status  =0');
   printWin.document.write(html);
   printWin.document.close();
   printWin.focus();
   printWin.print();
   printWin.close();
 }
</script>
<script type="text/javascript">
  function printContent_idearned(ell){
    var restorepage=document.body.innerHTML;
    var printcontent = document.getElementById(ell).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>
<script type="text/javascript">
  function printContent_idearned_dep(ell){
    var restorepage=document.body.innerHTML;
    var printcontent = document.getElementById(ell).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>
<script type="text/javascript">
  function printContent_i(ell){
    var restorepage=document.body.innerHTML;
    var printcontent = document.getElementById(ell).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>
<script type="text/javascript">
  function printContent_idearned_ye(ell){
    var restorepage=document.body.innerHTML;
    var printcontent = document.getElementById(ell).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>
<script type="text/javascript">
  function printContent_idearned_h(ell){
    var restorepage=document.body.innerHTML;
    var printcontent = document.getElementById(ell).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>
<script type="text/javascript">
  function printContent_idearned_not(ell){
    var restorepage=document.body.innerHTML;
    var printcontent = document.getElementById(ell).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>
<script type="text/javascript">
  function printContent_idearned_dep_not(ell){
    var restorepage=document.body.innerHTML;
    var printcontent = document.getElementById(ell).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>
<script type="text/javascript">
  function printContent_idearned_ye_not(ell){
    var restorepage=document.body.innerHTML;
    var printcontent = document.getElementById(ell).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>
<script type="text/javascript">
  function printContent_idearned_h_not(ell){
    var restorepage=document.body.innerHTML;
    var printcontent = document.getElementById(ell).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>
<script type="text/javascript">
  function printContent_faculty_recreate(ell){
    var restorepage=document.body.innerHTML;
    var printcontent = document.getElementById(ell).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>
<script type="text/javascript">
  function printContent_dep_recreate(ell){
    var restorepage=document.body.innerHTML;
    var printcontent = document.getElementById(ell).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>
<script type="text/javascript">
  function printContent_ye_recreate(ell){
    var restorepage=document.body.innerHTML;
    var printcontent = document.getElementById(ell).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>
<script type="text/javascript">
  function printContent_h_recreate(ell){
    var restorepage=document.body.innerHTML;
    var printcontent = document.getElementById(ell).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>

<script type="text/javascript">
 function change_faculty(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","pcajax.php?faculty_id="+document.getElementById("facultylist").value,false);
  xmlhttp.send(null);
  document.getElementById("dep").innerHTML = xmlhttp.responseText;
}
</script>

<script type="text/javascript">
  function change_department(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","pcajax.php?department_id="+document.getElementById("departmentlist").value,false);
    xmlhttp.send(null);
    document.getElementById("strm").innerHTML = xmlhttp.responseText;
  }
</script>

<!--...... JavaScript for Id earned Data ..............-->
<script type="text/javascript">
 function change_faculty_id(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","pcajax.php?faculty_id_id="+document.getElementById("facultylist_id").value,false);
  xmlhttp.send(null);
  document.getElementById("dep_id").innerHTML = xmlhttp.responseText;
}
</script>
<!--....../. JavaScript for Id Data ..............-->

<!--...... JavaScript for Id not earned earnrd Data ..............-->
<script type="text/javascript">
 function change_faculty_id_not(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","pcajax.php?faculty_id_id_not="+document.getElementById("facultylist_id_not").value,false);
  xmlhttp.send(null);
  document.getElementById("dep_id_not").innerHTML = xmlhttp.responseText;
}
</script>
<!--....../. JavaScript for Id not earned Data ..............-->
<!--...... JavaScript for Id recreatedData ..............-->
<script type="text/javascript">
 function change_faculty_id_recreate(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","pcajax.php?faculty_id_recreate="+document.getElementById("facultylist_id_recreate").value,false);
  xmlhttp.send(null);
  document.getElementById("dep_id_recreate").innerHTML = xmlhttp.responseText;
}
</script>
<!--....../. JavaScript for Id recreated Data ..............-->
<script>
  $(document).ready(function() {
    $('#id_print').DataTable({
      responsive: true
    });
  });
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
<script>
  $(document).ready(function() {
    $('#tableb').DataTable({
      responsive: true
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('#id_issued').DataTable({
      responsive: true
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('#id_not_issued').DataTable({
      responsive: true
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('#dataTables-active').DataTable({
      responsive: true
    });
  });
</script>
<script>
  $(document).ready(function() {
    $('#dataTables-inactive').DataTable({
      responsive: true
    });
  });
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
