
<!DOCTYPE html>
<?php
session_start();
include ('database_conn.php');
if($_SESSION['usertype']!='1'){
  header("Location: http://localhost/school_meal");
}
?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  
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
      $result=mysqli_query($conn,$query);
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

<!--///////// Delete faculty data and Department from the database/////////////////////////////????????-->

<div style="background-color: " id="wrapper">

  <!-- Navigation -->
  <nav  class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; background-color:#191970;">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a style="color: white;" class="navbar-brand" href=""><b class="lang" key="amfdtustsp">Admin Module for School Meal Attendance System</b></a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
     <li>
      <a style="color: white" href="student_service_admin.php"><i class="fa fa-home"></i> <b class="lang" key="home">Home</b></a>
    </li>
    <li><a style="color:white" href="logout_user.php" title="click for edit" onclick="return confirm('Are you sure to leave from the system?')"><i class="fa fa-sign-out"></i>&nbsp;<b class="lang" key="logout">Logout</b></a></li>
    <li class="dropdown">
      <a style ="color: white"> <b class="lang" key="date" >Date - </b> <?php
        $Today=date('y:m:d');
        $new=date('l, F d, Y',strtotime($Today));
        echo $new; ?>
        <span class="cart-amunt"></span> </a>
      </li>
    </ul>
    <!-- /.navbar-top-links -->
    <div style="background-color:; color: #006633 " class="navbar-default sidebar" role="navigation">
      <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
          <li><a style="color:;font-size:14px;font-family:italic; " href=""><p><b><em class="lang" key="logedas">Loged As:- </em>
            <?php echo ''.$_SESSION["username"].'';?></b></p></a></li>
            <li class="">
              <a style="color:"  href="student_service_admin.php"><i class="fa fa-home"></i> <b class="lang" key="home">Home</b></a>
            </li>
            <li> <a style="color:" href="#tab_setting" data-toggle="tab"><span class="glyphicon glyphicon-pencil"></span>&nbsp; <b class="lang" key="student s managment">Setting</b><span class="fa arrow"></span></a> 
            </li>
            <li> <a style="color:" href="#emp" data-toggle="tab"><span class="glyphicon glyphicon-user"></span>&nbsp; <b class="lang" key="student s managment">Create Account</b><span class="fa arrow"></span></a> 
            </li>
            <li> <a style="color:" href="#user_management" data-toggle="tab"><span class="glyphicon glyphicon-user"></span>&nbsp; <b class="lang" key="student s managment">Manage Account</b><span class="fa arrow"></span></a> 
            </li>
            <li> <a style="color:" href="dtu_cafe_admin.php" data-toggle=""><span class="glyphicon glyphicon-glass"></span>&nbsp; <b class="lang" key="cafeteria managment">Cafeteria Mnagment</b><span class="fa arrow"></span></a> 
            </li>
            <li> <a style="color:" href="#tab_student_register" data-toggle="tab"><span class="glyphicon glyphicon-education"></span>&nbsp; <b class="lang" key="student s managment">Student Registration</b><span class="fa arrow"></span></a> 
            </li>
            <li class=""> <a style="color:" href="student_id_manipulation.php" data-toggle=""><span class="glyphicon glyphicon-barcode"></span>&nbsp; <b class="lang" key="student id managment">Student Id Management</b><span class="fa arrow"></span></a> 
            </li>
            <li class=""> <a style="color:" href="staff_admin.php" data-toggle=""><span class="glyphicon glyphicon-user"></span>&nbsp; <b class="lang" key="student id managment">Staff Management</b><span class="fa arrow"></span></a> 
            </li>
            <li><a style="color:" href="#help" data-toggle="modal"><span class="  glyphicon glyphicon-book"></span>&nbsp; <b class="lang" key="help">Help</b><span class="fa arrow"></span></a></li>
            <li> <a style="color:" href="#editModal" data-toggle="modal"><span class="   glyphicon glyphicon-lock"></span>&nbsp;<b class="lang" key="change password"> Change Password</b><span class="fa arrow"></span></a> 
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
   ?>   <!-- /////////////////// Change Password /////////////////////////////////////////////????-->
   <div style="background-color:;" id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">

        <h3  style="color:#006633; size:30px">  <img style= "height: 70px; width: 70px" src="../setting/<?php echo $logo?>"><em class="lang" key="dtusmics"><?php echo $n.' School Digital ID and Meal Attendance system'?></em></h3>


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
                <center><b class="lang" key="student information view and managment">students information View and Mnagment</b></center>
              </h4>
            </div>
            <div style="height:800px; overflow:scroll;background-color: " class="panel-body">



              <?php
              if(isset($_POST['upload_image']))
              {
               $id = $_POST['stu_id'];
              $maxsize = 500242880; // 500MB
              $name = $_FILES['image']['name'];
              $target_dir = "../photo/";
              $target_file = $target_dir . $_FILES["image"]["name"];
       // Select file type
              $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
       // Valid file extensions
              $extensions_arr = array("jpg","png","jpeg");

       // Check extension
              if(in_array($videoFileType,$extensions_arr) )
              {
          // Check file size
                if(($_FILES['image']['size'] >= $maxsize) || ($_FILES["image"]["size"] == 0)) 
                {
                  ?>
                  <div class="container">
                    <div class="alert alert-danger alert-dismissible" rol="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
                      <strong> File is Too large. It must be leass than 5MB</strong> 
                      ######<a href="student_service_admin.php"><button class="btn btn-success">Back</button></a>
                    </div>
                  </div>
                  <?php
                }
                else
                {
            // Upload
                  if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file))
                  {
                    $query="UPDATE stu_data set image='$name' where stu_id = '$id'";
                    $result=mysqli_query($conn,$query);
                    if($result)
                    {
                      ?>
                      <div class="container">
                        <div class="alert alert-success alert-dismissible" rol="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
                          <strong> Update Success </strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                          To close Success Message Press The  X  sign to the right side 
                          ######<a href="student_service_admin.php"><button class="btn btn-success">Back</button></a>
                        </div>
                      </div>
                      <?php
                    }
                    else
                    {
                      ?>
                      <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissible" rol="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
                          <strong> Update Faild Please try Again</strong> 
                          ######
                        </div>
                      </div>
                      <?php
                    }
                  }
                }
              }
              else
              {
                ?>
                <div class="col-lg-12">
                  <div class="alert alert-danger alert-dismissible" rol="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
                    <strong> Invalid File Type</strong> 
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
                      <label for="exampleInputFile">Upload Student Photo</label>
                      <input type="file" name="image" id="file" size="150">
                    </div>
                    <button type="submit" class="btn btn-success" name="upload_image" value="submit">Upload Photo</button>
                  </form>
                </div>  
              </div>


              <!-- delte department -->
              <div class="  col-lg-6">  
                <form action="student_service_admin.php" method="POST">
                 <div class="form-group">
                   <select class="form-control" name="grade" placeholder="Search..." >
                    <option value="">Select Grade to delate</option>
                    <option value="0">Grade 0</option>
                    <option value="1">Grade 1</option>
                    <option value="2">Grade 2</option>
                    <option value="3">Grade 3</option>
                    <option value="4">Grade 4</option>
                    <option value="5">Grade 5</option>
                    <option value="6">Grade 6</option>
                    <option value="7">Grade 7</option>
                    <option value="8">Grade 8</option>
                    <option value="9">Grade 9</option>
                    <option value="10">Grade 10</option>
                    <option value="11">Grade 11</option>
                    <option value="12">Grade 12</option>
                  </select>
                </div>
                <div class="form-group">
                  <div class="form-group">
                    <input type="text" name ="section" class="form-control" placeholder="Enter Section for Delete(Example: A,B,C....)">
                  </div>
                  <div class="input-group custom-search-form">
                    <span class="input-group-btn">
                      <button class="btn btn-success" name="delete_dep" type="submit">
                        <i class="fa fa-trash"></i> Delete
                      </button>
                    </span>
                  </div>
                </div>
              </form>
              <li> <h5 style="color:" href="" data-toggle="modal"> Don't delete any Grade and Section without <b>Admin</b> permission.!!!</h5> </li>
              <?php
              if(isset($_POST['delete_dep']))
              {
                $depp=$_POST['grade'];
                $y=$_POST['section'];
                $query=mysqli_query($conn,"DELETE FROM stu_data where grade='$depp' and section='$y'");
                if($res)
                {
                  $q=mysqli_query($conn,"SELECT * FROM stu_data where grade='$depp' and section='$y'");
                  if(mysqli_num_rows($q)==0)
                  {  
                   ?>
                   <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <h4 style="color:green">Grade is deleted</h4>
                  </div>
                  <?php
                }
                else
                {
                  ?>
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <h4 style="color:red">Grade is not deleted</h4>
                  </div>
                  <?php
                }            
              }
            }
            ?>
          </div>
          <!-- //delte department -->
        </div>


        <!--............Staff User Acount Registration .....................???-->
        <?php
        if(isset($_POST['useracount']))
        {
          $password = "{SSHA}sNPmYlrgdn2ilaU7ByklSuXNlclqdQ==";
          function hash_password($password)
          {
            $salt='dtu';
            return '{SSHA}'.base64_encode(sha1($password.$salt,TRUE).$salt);
          }
//echo hash_password('silie1221');
          $uid = $_POST['stu_id'];
          $uname = $_POST['username'];
          $pass = $_POST['password'];
          $hash_pass=hash_password($pass);
  //echo hash_password($pass);
          $utype = $_POST['usertype'];
          $chek_id = mysqli_query($conn,"SELECT * FROM user_acount where stu_id = '$uid'");
          if($chek_id){
            $count=mysqli_num_rows($chek_id);
            if($count>=1){
              echo '<script>alert("The User Already Registered in the User Acount Table")</script>';
              echo"<script>window.open('bwbfwifordtusadmin.php','_self')</script>";
            }
            else
            {

              $cheek_id = "SELECT * FROM staff_table where stu_id = '$uid'";
              $run_query=mysqli_query($conn,$cheek_id);
              if($run_query)
              {
                while($row=mysqli_fetch_assoc($run_query)){
                  $sid=$row['stu_id'];
                  $s_name=$row['first_name'];
       // $s="dtu"
                  $save="INSERT into user_acount(stu_id, first_name, username, password, salt, usertype, year) VALUES ('$uid','$s_name','$uname','$hash_pass', 'dtu',
                  '$utype',NOW())";

                  $result=mysqli_query($conn,$save);   
                  if($result){
   //echo $hash_pass;
                    ?>
                    <div class="alert alert-success alert-dismissible" rol="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
                      <strong class="lang" key="user register">User Acount Saved Successfully</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br> <br> 
                    </div>
                    <?php
                  }
                  else{
                   ?>
                   <div class="alert alert-success alert-dismissible" rol="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
                    <strong class="lang" key="user not register">User Acount Not Saved </strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br> <br> 
                  </div>
                  <?php
                }
              }
            }
            else{
              echo '<script>alert("The Id Are not found at Staff data")</script>';
              echo"<script>window.open('bwbfwifordtusadmin.php','_self')</script>"; 
            }
          } 
        }
      }
      ?>
      <!--.. Staff User Acount Registration  .....................................???-->


      <div id="myTabContent" class="tab-content">
        <!--....................... tab for setting......-->
        <div  style="color:" class="tab-pane fade" id="tab_setting">
          <div class="row">
            <div class="col-lg-6">
             <button data-toggle="" data-parent="#accordion"  class="btn btn-info btn-md btn-block" data-target=""><b class="lang" key="register student">Register Setting Here</b>  </button>
             <form action="s_s_data.php" method="POST" enctype="multipart/form-data" name="registration_info" onsubmit="return take()">
              <div class="form-group">
                <label for="email">Enter School Name</label>
                <input type="text" name="name" class="form-control" required>
              </div>
              <div class="form-group">
                <label class="lang" key="upload photo" for="inputfile">School Logo</label>
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
                  <button type="submit" name="insert_setting" class="btn btn-success"><i class="fa fa-sign-in"></i>&nbsp;<b class="lang" key="save acount">Save Setting</b></button>
                  <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;<b class="lang" key="cancle">Cancel</b></button>
                </center>
              </div>
            </form>
          </div>
          <div class="col-lg-6">
           <button data-toggle="" data-parent="#accordion"  class="btn btn-info btn-md btn-block" data-target=""><b class="lang" key="register student">Update Setting Here</b>  </button>
           <form action="s_s_data.php" method="POST" enctype="multipart/form-data" name="registration_info" onsubmit="return take()">
             <div class="form-group">
              <label for="email">Row ID</label>
              <?php
              $qr=mysqli_query($conn,"SELECT * from setting LIMIT 1" );
              while($i=mysqli_fetch_assoc($qr))
              {
                $id=$i['id'];
                ?>
                <input type="text" name="id" class="form-control" value="<?php echo $id?>" required>
                <?php
              }
              ?>
            </div>
            <div class="form-group">
              <label for="email">Enter School Name</label>
              <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label class="lang" key="upload photo" for="inputfile">School Logo</label>
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
                <button type="submit" name="update_setting" class="btn btn-success"><i class="fa fa-sign-in"></i>&nbsp;<b class="lang" key="save acount">Update Stting</b></button>
                <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;<b class="lang" key="cancle">Cancel</b></button>
              </center>
            </div>
          </form>
        </div>
      </div>
    </div>


    <!-- ......... User Acount Registration Form ...............................................???-->
    <div  style="color:" class="tab-pane fade" id="emp">
      <div  class="panel panel-default">
        <div style="color:;background-color: #00cc99" class="panel-heading">
          <h3 class="panel-title"> <b class="lang" key="register staff acount">Register Staff Acount </b></h3>
        </div>
        <div style="background-image: url(img/background3.png);" class="panel-body">
         <form action="student_service_admin.php" method="POST" enctype="multipart/form-data" name="registration_info" onsubmit="return take()">
          <div class="form-group">
            <label class="lang" key="staff id" for="email">staff Id:</label>
            <input type="text" name="stu_id" class="form-control" id="email" required>
          </div>
          <div class="form-group">
            <label class="lang" key="staff name" for="email">User Name:</label>
            <input type="text" name="username" class="form-control" id="email" required>
          </div>
          <div class="form-group">
            <label class="lang" key="password" for="email">Password:</label>
            <input type="password" name="password" class="form-control" id="email" required>
          </div>
          <div class="form-group">
            <label class="lang" key="select user type" for="status">Select User type( User Lavel)</label>
            <select id="status" name="usertype" placeholder="please select user type" class="form-control" required>
              <option   value="">Select User Type</option>
              <option  value="1">Student Service Admin</option>
              <option  value="5">cafeteria admin</option>
              <option  value="6">cafeteria staff</option>
              <option  value="7">security admin</option>

            </select>
          </div>
          <div class="form-group">
            <center>
             <button type="submit" name="useracount" class="btn btn-success"><i class="fa fa-sign-in"></i>&nbsp;<b class="lang" key="save acount">Save </b></button>
             <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;<b class="lang" key="cancle">Cancle</b></button>
           </center>
         </div>
       </form>
     </div>
   </div>
 </div> <!-- div emp-->




 <!-- ............ User Acounr Registration Form ................???-->
 <div  style="color:black" class="tab-pane fade" id="user_management">
   <!-- ////  Manage User //////////////////////////////////////////////-->
   <div class="panel-group" id="accordion">
    <div style="background-image:;" class="panel panel-default">
      <div class="panel-heading" style="background-color: #00cc99">
        <h4 class="panel-title">
          <a style="text-decoration:none" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><center class="lang" key="view user" >View System Users</center></a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse in">
        <div style="background-color: ; overflow: scroll;" class="panel-body">
         <!--... Delete Staff User from the database...................................-->
         <?php
         if(isset($_GET['delete_staffacount'])){
          $id=$_GET['delete_staffacount'];
          $cheek_id = "DELETE FROM user_acount where stu_id = '$id'";

          $run_query=mysqli_query($conn, $cheek_id);

          if($run_query)
          {
            ?>
            <div class="alert alert-success alert-dismissible" rol="alert">
              <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
              <strong class="lang" key="user deleted">User Acount Deleted Successfully</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br> <br> 
            </div>
            <?php
          }
          else{
           ?>
           <div class="alert alert-success alert-dismissible" rol="alert">
            <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
            <strong class="lang" key="user not deleted">User Acount Not Deleted Successfully</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br> <br> 
          </div>
          <?php
        }
      }
      ?>
      <!--.. Delete Staff User from the database........????????-->
      <!-- .... Staff User Mnagment ......................................-->
      <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-modal">
        <thead>
          <tr>
            <th class="lang" key="user id">User Id</th>
            <th class="lang" key="full name">Full Name</th>
            <th class="lang" key="user name">User Name</th>
            <th class="lang" key="password">Password</th>
            <th class="lang" key="user type">User Type</th>
            <th class="lang" key="user status">User Status</th>
            <th class="lang" key="action">Action</th>
          </tr>
        </thead>
        <tbody>
         <?php             
         $check_data = "SELECT * FROM user_acount ORDER BY first_name ASC ";
         $run=mysqli_query($conn,$check_data);
         if(mysqli_num_rows($run)>0)
         {
          while($row = mysqli_fetch_assoc($run))
          { 
            extract($row);
            ?>
            <tr>
             <td><?php echo ''.$row['stu_id'].''; ?></td>
             <td><?php echo ''.$row['first_name'].''; ?></td>
             <td><?php echo ''.$row['username'].''; ?></td>
             <td> <?php echo ''.$row['password'].''; ?> </td>
             <td><?php echo ''.$row['usertype'].'';?></td>
             <td>
              <?php echo ''.$row['status'].'';?>
            </td>
            <td>
              <div class='btn-group' rol='group' area-lebel='.....'>
                <a href="view_and_edit_data.php?view_staffacount=<?php echo $row['stu_id'];?> "  class="btn btn-success btn-sm"> <span class='glyphicon glyphicon-eye-open'></span></a>
                <a class="btn btn-info btn-sm edit-data" href="view_and_edit_data.php?edit_staffacount=<?php echo $row['stu_id']; ?>" title="click for edit" onclick="return confirm('Are you sure edit this item?')"><span class='glyphicon glyphicon-edit' area-hidden='true'></span></a>
                <a class="btn btn-danger btn-sm" href="?delete_staffacount=<?php echo $row['stu_id']; ?>" title="click for delete" onclick="return confirm('Are you sure to remove this customer?')"><span class='glyphicon glyphicon-trash'></span></a>
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
  <!-- .Staff User Mnagment ............................................??????-->
</div>
</div>
</div>
<div style="background-image:;" class="panel panel-default">
  <div class="panel-heading" style="background-color: #00cc99">
    <h4 class="panel-title">
      <a style="text-decoration:none" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><center class="lang" key="view activated user">View Activated Users</center></a>
    </h4>
  </div>
  <div id="collapseTwo" class="panel-collapse collapse">
    <div  style="background-color:;overflow: scroll;"  class="panel-body">
     <!-- ///////////////////////////////////////////////// Activated Users ///////////////////////////////////////////////////-->  
     <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-active">
      <thead>
        <tr>
          <th class="lang" key="user id">User Id</th>
          <th class="lang" key="full name">Full Name</th>
          <th class="lang" key="user name">User Name</th>
          <th class="lang" key="password">Password</th>
          <th class="lang" key="user type">User Type</th>
          <th class="lang" key="user status">User Status</th>
        </tr>
      </thead>
      <tbody>
       <?php

       $check_data = "SELECT * FROM user_acount WHERE status =1 ORDER BY first_name ASC ";
       $run=mysqli_query($conn,$check_data);
       if(mysqli_num_rows($run)>0)
       {
        while($row = mysqli_fetch_assoc($run))
        { 
          extract($row);


          ?>
          <tr>
           <td><?php echo ''.$row['stu_id'].''; ?></td>
           <td><?php echo ''.$row['first_name'].''; ?></td>
           <td><?php echo ''.$row['username'].''; ?></td>
           <td> <?php echo ''.$row['password'].''; ?> </td>
           <td><?php echo ''.$row['usertype'].'';?></td>
           <td><?php echo ' <img src="img/active.jpg"> ';?></td>
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
<!-- / Activated Users /////////////////////////////////////////////???-->   
</div>
</div>
</div>
<div style="background-image:;" class="panel panel-default">
  <div class="panel-heading" style="background-color: #00cc99">
    <h4 class="panel-title">
      <a style="text-decoration:none" data-toggle="collapse" data-parent="#accordion" href="#collapsethree"><center class="lang" key="view deactivated user">View de activated Users</center></a>
    </h4>
  </div>
  <div id="collapsethree" class="panel-collapse collapse">
    <div style="background-color:;overflow: scroll;" class="panel-body">
      <!-- ///////////////////////////////////////////////// De Activated Users ///////////////////////////////////////////////////-->  
      <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-inactive">
        <thead>
          <tr>
            <th class="lang" key="user id">User Id</th>
            <th class="lang" key="full name">Full Name</th>
            <th class="lang" key="user name">User Name</th>
            <th class="lang" key="password">Password</th>
            <th class="lang" key="user type">User Type</th>
            <th class="lang" key="user status">User Status</th>
          </tr>
        </thead>
        <tbody>
         <?php
         $check_data = "SELECT * FROM user_acount WHERE status =0 ORDER BY first_name ASC ";
         $run=mysqli_query($conn,$check_data);
         if(mysqli_num_rows($run)>0)
         {
          while($row = mysqli_fetch_assoc($run))
          { 
            extract($row);
            ?>
            <tr>
             <td><?php echo ''.$row['stu_id'].''; ?></td>
             <td><?php echo ''.$row['first_name'].''; ?></td>
             <td><?php echo ''.$row['username'].''; ?></td>
             <td> <?php echo ''.$row['password'].''; ?> </td>
             <td><?php echo ''.$row['usertype'].'';?></td>
             <td><?php echo ' <img src="img/inactive.jpg"> ';?></td>
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
  <!-- /// De Activated Users //////////////////////////////////////????????-->
</div>
</div>
</div>
</div>
<!-- /////////////////////////////////////////////////////  Manage User //////////////////////////////////////////////????-->
</div> 




<div class="row"></div>
<!--.. tab for setting..........................................??????-->
<!--....................... tab for sudent registration......-->
<div  style="color:" class="tab-pane fade" id="tab_student_register">
  <!-- // Student Registration //////////////////////////-->
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
      $image = $filesop[8];
                   // $ac_year = $filesop[10];
      $status = $filesop[9];
                    //$ec = $filesop[12];
      $sql = "insert into stu_data(stu_id,first_name,sex,email,phone,school,grade,section,image,ac_year,status,ec) values ('$stu_id','$f_name','$sex ','$email','$phone','$faculty','$department','$stream','$image',NOW(),'$status',NOW())";
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
      </div>
      <?php
    } 
    else
    {
      ?>
      <div class="col-xs-12">
        <div class="alert alert-danger alert-dismissible" rol="alert">
          <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
          <strong class="lang" key="data not avialable"> Unable to Import the File</strong> 
        </div>
      </div>
      <?php
    }
  }
  ?>
  <button data-toggle="" data-parent="#accordion"  class="btn btn-info btn-md btn-block" data-target=""><b class="lang" key="register student">Register Student Here</b>  </button>
  <div id="" class=""> 
    <div class="  col-lg-12"> 
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
      </div>

      <div class="col-lg-12">
        <div class="form-group">
          <center><h3 style="color:#0066cc"><b class="lang" key="student registration form">Student Registration Form</b></h3></center>
        </div>
      </div>
      <div class="row">
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
              <label class="lang"  >School Name:</label>
              <input type="text" name="school" class="form-control" >
            </div>
            <div class="form-group">
              <label class="lang" >Grade</label>
              <input type="text" name="grade" class="form-control" >
            </div>
            <div class="form-group">
              <label class="lang" >Section:</label>
              <input type="text" name="section" class="form-control" id="pwd">
            </div>
            <div class="form-group">
              <label class="lang" key="upload photo" for="inputfile">Upload Photo</label>
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="fileupload-new thumbnail" style="width: 300px; height: 250px;"><img src="asset/image/images.jpeg" alt="" />
                </div>
                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 400px; max-height: 300px; line-height: 20px;">
                </div>
                <div>
                  <span class="btn btn-file btn-success"><span class="fileupload-new"><em class="lang" key="select image">Select Photo</em></span><span class="fileupload-exists"><b class="lang" key="change image">Change</b></span>
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
      <th class="lang" key="faculty">School Name</th>
      <th class="lang" key="year">Garade</th>
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
       <td><?php echo ''.$row['school'].''; ?></td>
       <td><?php echo ''.$row['grade'].''; ?></td>
       <td><?php echo ''.$row['ac_year'].''; ?></td>
       <form clas="form-horizontal" action="student_service_admin.php" method="post">
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
          echo"<script>window.open('student_service_admin.php','_self')</script>";
        }
        else
          echo '<script>alert("Not changed")</script>';
        echo"<script>window.open('student_service_admin.php','_self')</script>";
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
  </div>
  <?php 
}     
?>  
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
    <form class="form-horizontal" method="POST" action="student_service_admin.php">
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
      <li class="lang" key="h9"> &nbsp;To entr student data from Excel prepare the excel file and save it as CSV (comma deliminated). then you can upload the file to the database</li><br>
    </ol>
    <li ><img src="../img/stu_data.png"></li>
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
