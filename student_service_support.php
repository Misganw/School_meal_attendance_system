
<!DOCTYPE html>
<?php
session_start();
include("database_conn.php");
if($_SESSION['usertype']!='2'){
  header("Location: http://localhost/dtu/smics");
}
?>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>ደብረ ታቦር ዩኒቨርሲቲ</title>
  <link href="img/dtu_logo.png" rel="icon">
  <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- MetisMenu CSS -->
  <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="dist/css/sb-admin-2.css" rel="stylesheet">
  <script type="text/javascript" src=vendor/jquery/jquery.min.js></script>
  <script type="text/javascript" src=lang_translate.js></script>
  <!-- Morris Charts CSS -->
  <link href="vendor/morrisjs/morris.css" rel="stylesheet">
  <!-- Custom Fonts -->    
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap-fileupload.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/datatables-plugins/dataTables.bootstrap.css"  rel="stylesheet">
  <link href="vendor/datatables-responsive/dataTables.responsive.css"  rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap-fileupload.min.css" rel="stylesheet" type="text/css">
  <style>
    ul.wysihtml5-toolbar> li
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
</style>                 
</head>
<body style="background-image:; font-family:times;">
  <?php
  if(isset($_GET['delete_id'])){
    $id=$_GET['delete_id'];
    $query="DELETE from tiker_data where employee_id = '$id'";
    $result=mysqli_query($conn,$query);
    if($result){
     echo '<script>alert("the data deleted successfully")</script>';
   }
   else
     echo '<script>alert("Data not deleted")</script>';
 }
 if(isset($_GET['delete_stuid'])){
  $id=$_GET['delete_stuid'];
  $query="delete from stu_data where stu_id = '$id'";
  $result=mysqli_query($conn,$query);
  if($result){
   echo '<script>alert("Data deleted successfully")</script>';
 }
 else
   echo '<script>alert("Data not deleted ")</script>';

}
?>
<!--////// Delete faculty data and Department  from the database////-->
<?php
if(isset($_GET['delete_fid'])){
  $fid=$_GET['delete_fid'];
  $cheek_id = "SELECT * FROM department where faculty = '$fid'";
  $run_query=mysqli_query($conn, $cheek_id);
  if($run_query)
  {
    while($row=mysqli_fetch_assoc($run_query)){
      $empid=$row['faculty'];
      $depa=$row['department'];
      $query="DELETE FROM faculty  WHERE faculty='$fid'";
      $result=mysqli_query($query);
      if($result){
        $query="DELETE FROM department WHERE faculty='$fid' AND faculty='$empid'";
        $res=mysqli_query($conn,$query);
        if($res){
         $query="DELETE FROM stream WHERE department='$depa'";
         $res=mysqli_query($conn,$query);
         if($res){
          echo"<script> alert ('Data Deleted Succefully')</script>";
        }
        else
          echo"<script> alert (' Data From Stream are not Deleted')</script>";
      }
      else
        echo"<script> alert (' Data From Department are not Deleted')</script>";
    }
    else
      echo"<script> alert ('Data From Faculty are not Deleted')</script>";

  }
}
}
?>

<!--/////////////////////////////////// Delete faculty data and Department from the database/////////////////////////////????????-->

<div style="background-color: " id="wrapper">

  <!-- Navigation -->
  <nav  class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color:#006633;">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a style="color: white" class="navbar-brand" href=""><b class="lang" key="amfdtustsp">Admin Module for Debre Tabor University student service provider</b></a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
     <li>
      <a style="color: white" href="student_service_support.php"><i class="fa fa-home"></i> <b class="lang" key="home">Home</b></a>
    </li>
    <li><a style="color:white" href="logout_user.php" title="click for edit" onclick="return confirm('Are you sure to leave from the system?')"><i class="fa fa-sign-out"></i>&nbsp;<b class="lang" key="logout">Logout</b></a></li>
    <li class="dropdown">
      <a style ="color: white"> <b class="lang" key="date" >Date - </b> <?php
        $Today=date('y:m:d');
        $new=date('l, F d, Y',strtotime($Today));
        echo $new; ?>
        <span class="cart-amunt"></span> </a>
      </li>
      <li style="margin-top: " class="dropdown">
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
  <div style="background-color:; color: #006633 " class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
      <ul class="nav" id="side-menu">
        <li><a style="color:;font-size:14px;font-family:italic; " href=""><p><b><em class="lang" key="logedas">Loged As:- </em>
          <?php echo ''.$_SESSION["username"].'';?></b></p></a></li>
          <li class="">
            <a style="color:"  href="student_service_support.php"><i class="fa fa-home"></i> <b class="lang" key="home">Home</b></a>
          </li>

<li> <a style="color:" href="#tab_student_register" data-toggle="tab"><span class="glyphicon glyphicon-education"></span>&nbsp; <b class="lang" key="student s managment">Student Registration</b><span class="fa arrow"></span></a> 
</li>
<li class=""> <a style="color:" href="student_id_manipulation.php" data-toggle=""><span class="glyphicon glyphicon-user"></span>&nbsp; <b class="lang" key="student id managment">Student Id Management</b><span class="fa arrow"></span></a> 
</li>
<li><a style="color:" href="print_student_id.php" data-toggle=""><span class="  glyphicon glyphicon-print"></span>&nbsp; <b class="lang" key="print all student id">Print all student ID</b><span class="fa arrow"></span></a></li>
<li><a style="color:" href="print_student_backside.php" data-toggle=""><span class="  glyphicon glyphicon-print"></span>&nbsp; <b class="lang" key="print all student id backside">Print all student ID backside</b><span class="fa arrow"></span></a></li>
<li><a style="color:" href="#help" data-toggle="modal"><span class="  glyphicon glyphicon-book"></span>&nbsp; <b class="lang" key="help">Help</b><span class="fa arrow"></span></a></li>
<li> <a style="color:" href="#editModal" data-toggle="modal"><span class="   glyphicon glyphicon-user"></span>&nbsp;<b class="lang" key="change password"> Change Password</b><span class="fa arrow"></span></a> 
</li>
<li>


  <!-- /.nav-third-level --> 
  <!-- /.nav-second-level -->
</li>
</ul>
</div>
<!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>
<!-- ////////////////////////////////////////////////// Change Password ///////////////////////////////////////////////-->
<?php
if(isset($_POST['change'])){
  $password = "{SSHA}sNPmYlrgdn2ilaU7ByklSuXNlclqdQ==";
  function hash_password($password)
  {
    $salt='dtu';
    return '{SSHA}'.base64_encode(sha1($password.$salt,TRUE).$salt);
  }
  $user_name=$_SESSION['username'] ;
  $opass=$_POST['password'];
  $hash_opass=hash_password($opass);
  $npass=$_POST['n_password'];
  $hash_npass=hash_password($npass);
  $cpass=$_POST['c_password'];
  $hash_cpass=hash_password($cpass);

  $qr=mysqli_query($conn,"SELECT * FROM user_acount WHERE username='$user_name' ") or die("error"); 
  if($qr){
    $passrow=mysqli_fetch_row($qr);
    $rr=$passrow[3];
                //$spass=$row['password'];
    if($passrow[3]==$hash_opass && $hash_npass==$hash_cpass){
      $query=mysqli_query($conn,"UPDATE user_acount SET password ='$hash_npass' WHERE username ='$user_name' ");
      if($query){
        echo '<script>alert("You Modify Your Password Successfully")</script>';
      }
      else{
       echo '<script>alert("You do not Modify Your Password Try again")</script>';
     }
   }
   else echo '<script> alert("There is no muched password")</script>' ;
 }
}
?>   <!-- ////////////////////////////////////////////////// Change Password /////////////////////////////////////////////????-->
<div style="background-color:;" id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
     <h3  style="color:#006633; size:30px">  <img style= "height: 70px; width: 70px" src="img/correct.jpg"><em class="lang" key="dtusmics">Debre Tabor University Smart ID Card System (SMICS for DTU)</em></h3>

   </div>
   <!-- /.col-lg-12 -->
 </div>
 <!-- /.row -->
 <div class="row">

 </div>
 <!-- /.row -->
 <div  class="row">
   <div  class="row">
     <div class="col-lg-12">
      <div id="myTabContent" class="">
       <div  style="color:black" class="" id="">                      
         <!--....Display and Update Student Data .............................................-->     
         <div style="background-color: " class="panel panel-default">
          <div class="panel-heading" style="background-color: #00cc99">
            <h4 class="panel-title">
              <center><b>students information View and Mnagment</b></center>
            </h4>
          </div>
          <div style="height:540px; overflow:scroll;background-color: " class="panel-body">
            <?php
            if(isset($_POST['upload_image']))
            {
             $id = $_POST['stu_id'];
             $image=addslashes($_FILES['image']['tmp_name']);
             $name=addslashes($_FILES['image']['name']);
             $image=file_get_contents($image);
             $image=base64_encode($image);
             $query="UPDATE stu_data set image='$image' where stu_id = '$id'";
             $result=mysqli_query($conn,$query);
             if($result){
              ?>
              <div class="col-lg-12">
                <div class="alert alert-success alert-dismissible" rol="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
                  <strong> Update Success </strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                  To close Success Message Press The  X  sign to the right side 
                  ######
                </div>
              </div>
              <?php
            }
            else{
              ?>
              <div class="container">
                <div class="alert alert-danger alert-dismissible" rol="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
                  <strong> Update Faild Please try Again</strong> 
                  ######
                </div>
              </div>
              <?php
            }
          }
          ?>
          <div class="row">
            <div class="  col-lg-6">  
              <div class="form-group">
                <form enctype="multipart/form-data" method="post" role="form">
                  <div class="form-group">
                    <label for="exampleInputFile">Student ID</label>
                    <input type="text" name="stu_id" required="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Upload Image</label>
                    <input type="file" name="image" id="file" size="150">
                    <p class="help-block">Import Only Image File Here.</p>
                  </div>
                  <button type="submit" class="btn btn-success" name="upload_image" value="submit">Upload Image File</button>
                </form>
              </div>  
            </div>


              <!-- delte department -->
            <div class="  col-lg-6">  
              <form action="student_service_support.php" method="POST">
               <div class="form-group">
                <select class="form-control" name="department" placeholder="Search..." >
                  <option class="lang" key="select department"  value="">select Department here to delete</option>
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
            </div>
            <div class="form-group">
              <div class="input-group custom-search-form">
                <select class="form-control" name="year" placeholder="Search..." >
                  <option value="">Select Year to delate</option>
                  <option value="1">I Year</option>
                  <option value="2">II Year</option>
                  <option value="3">III Year</option>
                  <option value="4">IV Year</option>
                  <option value="5">V Year</option>
                  <option value="6">VI year</option>
                  <option value="7">VII year</option>
                </select>
                <span class="input-group-btn">
                  <button class="btn btn-success" name="delete_dep" type="submit">
                    <i class="fa fa-trash"></i>
                  </button>
                </span>
              </div>
            </div>
          </form>
          <li> <h5 style="color:" href="" data-toggle="modal"> Don't delete any department and year without <b>super admin</b> permission.!!!</h5> </li>
          <?php
          if(isset($_POST['delete_dep']))
          {
            $depp=$_POST['department'];
            $y=$_POST['year'];
            $query=mysqli_query($conn,"DELETE FROM stu_data where department='$depp' and year='$y'");
            if($res)
            {
              $q=mysqli_query($conn,"SELECT * FROM stu_data where department='$depp' and year='$y'");
            if(mysqli_num_rows($q)==0)
            {  
             ?>
             <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <h4 style="color:green">Department is deleted</h4>
            </div>
            <?php
            }
          else
          {
            ?>
              <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <h4 style="color:red">Department is not deleted</h4>
            </div>
            <?php
          }            
          }
        }
        ?>
      </div>
        <!-- //delte department -->
    </div>




    <div id="myTabContent" class="tab-content">
      <!--....................... tab for sudent registration......-->
      <div  style="color:" class="tab-pane fade" id="tab_student_register">
        <!-- // Student Registration ///////////////////////////////////////////////-->
        <?php
        if(isset($_POST["excel_file"]))
        {
          $file = $_FILES['file']['tmp_name'];
          $handle = fopen($file, "r");
          $c = 0;
          while(($filesop = fgetcsv($handle, 100000, ",")) !== false)
          {
            $stu_id = $filesop[0];
            $f_name = $filesop[1];
            $sex = $filesop[2];
            $email = $filesop[3];
            $phone = $filesop[4];
            $faculty = $filesop[5];
            $department = $filesop[6];
            $stream = $filesop[7];
            $year = $filesop[8];
            $image = $filesop[9];
                   // $ac_year = $filesop[10];
            $status = $filesop[10];
                    //$ec = $filesop[12];
            $sql = "insert into stu_data(stu_id,first_name,sex,email,phone,faculty,department,stream,year,image,ac_year,status,ec) values ('$stu_id','$f_name','$sex ','$email','$phone','$faculty','$department','$stream','$year','$image',NOW(),'$status',NOW())";
            $stmt = mysqli_prepare($conn,$sql);
            mysqli_stmt_execute($stmt);

            $c = $c + 1;
          }

          if($sql){
            ?>
            <div class="col-xs-12">
              <div class="alert alert-success alert-dismissible" rol="alert">
                <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
                <strong class="lang" key="data not avialable"> Successfully Imported</strong> 
              </div>
            </div><?php
          } 
          else
          {
            ?>
            <div class="col-xs-12">
              <div class="alert alert-danger alert-dismissible" rol="alert">
                <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
                <strong class="lang" key="data not avialable"> Unable to Import the File</strong> 
              </div>
              <?php
            }
          }
          ?>
          <button data-toggle="" data-parent="#accordion"  class="btn btn-success btn-md btn-block" data-target=""><b class="lang" key="register student">Register Student Here</b>  </button>
          <div id="" class=""> 
            <div class="  col-lg-12">    
              <div class="form-group">
                <form enctype="multipart/form-data" method="post" role="form">
                  <div class="form-group">
                    <label for="exampleInputFile">File Upload</label>
                    <input type="file" name="file" id="file" size="150">
                    <p class="help-block">Import Only Excel/CSV File Here.</p>
                  </div>
                  <button type="submit" class="btn btn-success" name="excel_file" value="submit">Upload Excel File</button>
                </form>
              </div>

              <div class="form-group">
                <center><h3 style="color:#006633"><b class="lang" key="student registration form">Student Registration Form</b></h3></center>
              </div>
              <form action="s_s_data.php" method="POST" enctype="multipart/form-data" name="registration_info" onsubmit="return take()">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label class="lang" key="id" for="email">Student Id:</label>
                    <input type="text" name="stu_id" class="form-control" id="email" required>
                  </div>
                  <div class="form-group">
                    <label class="lang" key="full name"  for="pwd">Full Name:</label>
                    <input type="text" name="first_name" class="form-control" id="pwd" required>
                  </div>
                  <div class="form-group">
                    <label class="lang" key="sex"  for="email">Sex:</label>
                  </div>
                  <div class="form-group">
                    <label class="checkbox-inline">
                      <input  type="radio" name="sex" id="sexm" value="M" required><b class="lang" key="male" > Male</b>
                    </label>
                    <label class="checkbox-inline">
                      <input  type="radio" name="sex" id="sexf" value="F" required> <b class="lang" key="id" >Female</b>
                    </label>
                  </div>
                  <div class="form-group">
                    <label class="lang" key="email"  for="pwd"> Email:</label>
                    <input type="email" name="email" class="form-control" id="pwd">
                  </div>
                  <div class="form-group">
                    <label class="lang" key="phone"  for="pwd">Mobile Number:</label>
                    <input type="text" name="phone" class="form-control" id="pwd">
                  </div>
                </div>
                <div class="col-lg-6">

                  <div class="form-group">
                    <label class="lang" key="select faculty"  for="email">Select The Faculty</label>
                    <?php
                    if($conn){
                    }

                    ?>
                    <select name="faculty" class="form-control" onChange="change_faculty()" id="facultylist" required>
                      <option class="lang" key="select faculty"  value="">select faculty here</option>

                      <?php
  //include('database_conn.php');
                      $query="select * from faculty where status=1 ORDER BY faculty ASC";
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

                  <label class="lang" key="select department"  for="email">Select The Department</label>
                  <div id="dep">
                    <select  class="form-control" required>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="lang" key="select stream"  for="email">Select The Stream</label>
                  <div id="strm">
                    <select class="form-control">
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">Select The Year(Bach)</label>
                  <select name="year" class="form-control" required>
                    <option value="1">I Year</option>
                    <option value="2">II Year</option>
                    <option value="3">III Year</option>
                    <option value="4">IV Year</option>
                    <option value="5">V Year</option>
                    <option value="6">VI year</option>
                    <option value="7">VII year</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="lang" key="upload photo" for="inputfile">Upload Photo</label>
                  <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 300px; height: 250px;"><img src="asset/image/images.jpeg" alt="" />
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 400px; max-height: 300px; line-height: 20px;">
                    </div>
                    <div>
                      <span class="btn btn-file btn-success"><span class="fileupload-new"><em class="lang" key="select image">Select image</em></span><span class="fileupload-exists"><b class="lang" key="change image">Change</b></span>
                      <input type="file" name="image" /></span>
                      <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><b class="lang" key="remove">Remove</b></a>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <center>
                    <button type="submit" name="insert_studata" class="btn btn-success"><i class="fa fa-sign-in"></i>&nbsp;<b class="lang" key="save acount">Save Data</b></button>
                    <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;<b class="lang" key="cancle">Cancel</b></button>
                  </center>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /// Student Registration ////////////////////////////////////??????-->
      </div>
      <!--.. tab for student registration..........................................??????-->
    </div> <!--dive tap-content-->
    <?php
              //include('database_conn.php');
    $result = mysqli_query($conn,"SELECT * FROM stu_data");
    $num_rows = mysqli_num_rows($result);

    echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";

    ?>
    <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables">
      <thead>
        <tr>
          <th class="lang" key="id">Student Id</th>
          <th class="lang" key="full name">Full Name</th>
          <th class="lang" key="sex">Sex</th>
          <th class="lang" key="faculty">Faculty</th>
          <th class="lang" key="year">Year</th>
          <th class="lang" key="ac_year">Ac_Year</th>
          <th class="lang" key="status">Students status</th>                                     
          <th class="lang" key="action">Action</th>
        </tr>
      </thead>
      <tbody>
       <?php
                //include('database_conn.php');
       $check_data = "SELECT * FROM stu_data ORDER BY first_name ASC ";
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
           <td><?php echo ''.$row['faculty'].''; ?></td>
           <td><?php echo ''.$row['year'].''; ?></td>
           <td><?php echo ''.$row['ac_year'].''; ?></td>
           <form clas="form-horizontal" action="student_service_support.php" method="post">
            <td>
              <select style="width: 25px" name="stu_id">
                <option value="<?php echo $row['stu_id'];?>"><?php echo $row['stu_id'];?> </option>; 
              </select>
              &nbsp;&nbsp;&nbsp;
              <?php
              $query="SELECT status FROM stu_data where stu_id='$std'";
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
              <button type="submit" name="changes"><span class='glyphicon glyphicon-edit' area-hidden='true'></span></button>
            </div> 
          </form>
          <?php
          if(isset($_POST['changes'])){
            $std=$_POST['stu_id'];
            $st=$_POST['status'];
            $q=mysqli_query($conn,"UPDATE stu_data SET  status='$st'  WHERE stu_id='$std'");
            if($q){
              echo '<script>alert("changed")</script>';
              echo"<script>window.open('student_service_support.php','_self')</script>";
            }
            else
              echo '<script>alert("Not changed")</script>';
            echo"<script>window.open('student_service_support.php','_self')</script>";
          }
          ?>
        </td> 
        <td>
          <div class='btn-group' rol='group' area-level='.....'>
            <a href="view_and_edit_data.php?view_stuid=<?php echo $row['stu_id' ]; ?> " data-toggle="modal" class="btn btn-success btn-sm"> <span class='glyphicon glyphicon-eye-open'></span></a>
            <a class="btn btn-info btn-sm edit-data" href="view_and_edit_data.php?edit_stuid=<?php echo $row['stu_id' ]; ?>" title="click for edit" onclick="return confirm('Are you sure edit this item?')"><span class='glyphicon glyphicon-edit' area-hidden='true'></span></a>
            <a class="btn btn-danger btn-sm" href="?delete_stuid=<?php echo $row['stu_id']; ?>" title="click for delete" onclick="return confirm('Are you sure to remove this customer?')"><span class='glyphicon glyphicon-trash'></span></a>
          </div>
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
<!--.......................... Display and Update Student Data.......??????-->
</div>
</div>                       
</div>

<!-- /.panel slider -->
</div>
<!-- /.panel-heading -->

<!-- /.panel-body -->

</div>
</div>
<!-- /.col-lg-8 -->
<!-- /.col-lg-4 -->

</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->


<hr>
</div>
<!-- /#wrapper -->
<!--.........................password change  Modal....................... -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div style="background-color:#00ff80" class="modal-header">
      <button type="button" class="close"
      data-dismiss="modal" aria-hidden="true">
      &times;
    </button>
    <h4 class="modal-title" id="myModalLabel">
      <b class="lang" key="please eyoanp">Please Enter your Old and New Password</b>
    </h4>
  </div>
  <div class="modal-body">

    <!--login form-->
    <form class="form-horizontal" method="POST" action="student_service_support.php">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email"><em class="lang" key="old password">Old Password:</em></label>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="email" placeholder="Enter Old Pssword" name="password" autofocus="autofocus" >
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd"><em class="lang" key="new password">New Password:</em></label>
        <div class="col-sm-8">          
          <input type="password" class="form-control" id="n_password" placeholder="Enter New password" name="n_password">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd"><em class="lang" key="new password">Confirm Password:</em></label>
        <div class="col-sm-8">          
          <input type="password" class="form-control" id="c_password" placeholder="Confirm password" name="c_password">
        </div>
      </div>
      <div class="form-group">        

      </div>
      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="change" class="btn btn-success"><i class="fa fa-sign-in"></i>&nbsp;<b class="lang" key="change">Change</b></button>
          <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;<b class="lang" key="cancle">Cancel</b></button>
        </div>
      </div>
    </form>
    <!--login form-->
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-success"
    data-dismiss="modal"><b class="lang" key="close">Close</b>
  </button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal -->
</div>
<!--.........................password change  Modal.......................???????? -->
<!--......HELP MODAL........................................-->
<div class="modal fade" id="help" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div style="background-color:#ff4d94" class="modal-header">
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
      <li class="lang" key="h2"> &nbsp;To view more data press green icon </li><br>
      <li class="lang" key="h3"> &nbsp;To edit data press blue icon</li><br>
      <li class="lang" key="h4"> &nbsp;To delete data press red icon </li><br>
      <li class="lang" key="h5"> &nbsp;In student service table at column of status in each row there is one combo box, one dot, two small circle and on edit icon</li><br>
      <li class="lang" key="h6"> &nbsp;Each conbo box holds individuals person id</li><br>
      <li class="lang" key="h7"> &nbsp;Dot indicates weather the status activated or deactivated, if dot become green user is status is activated and if dot become black status is deactivated </li><br>
      <li class="lang" key="h8"> &nbsp;From the two small circle if you click the left and press edit icon, you change a person active </li><br>
      <li class="lang" key="h9"> &nbsp;From the two small circle if you click the right and press edit icon, you change a person deactive </li><br>
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
<!-- ..... HELP MODAL ...........................................???-->
<div class="footer-top-area" style="background-image:url('img/dtu_meal_attendance.png'); max-height:10px; background-color:white; opacity: 1.5">
  <div class="zigzag-bottom"></div>
  <div class="container" style="" >
    <div class="row">
      <div class="col-lg-12 col-sm-6">
        <div class="footer-about-us">
          <center>
           <div class="row" style="color: white; font-size: 16px">
            <button style="background-color: #006633"  class="translate" id="am">አማርኛ</button>&nbsp;|&nbsp;
            <button style="background-color: #006633" class="translate" id="gz"> ግዕዝ</button> &nbsp;| &nbsp;
            <button style="background-color: #006633" class="translate" id="en">English</button> 
          </div>
          <h3 ><span style="color:white">Debre Tabor Uinversity</span></h3>
          <p class="lang" key="fdescription" style="color:white">Debre Tabor University is dedicated to the supply of highly qualified and innovative human resource by providing societal needs-tailored quality education.</p>
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
          <p align="right">&copy; 2010   ደብረ ታቦር ዩኒቨርሲቲ | All Rights are Reserved </p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

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
<script src="vendor/bootstrap/js/bootstrap-fileupload.js"></script>
<!-- table js -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/js/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
<script src="vendor/bootstrap/js/bootstrap-fileupload.js"></script>
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
<script>
  $(document).ready(function() {
    $('#tableb').DataTable({
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
</body>

</html>
