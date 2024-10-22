
<!DOCTYPE html>
<?php
error_reporting(false)
?>
<?php
session_start();
if($_SESSION['usertype']!='1'){
  header("Location: http://localhost/school_meal");
}
include ('database_conn.php');
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

<body style="background-image:; font-family: times">

  <div id="wrapper">

    <!-- Navigation -->
    <nav  style="background-color: #191970;" class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0; margin-right:0;">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a style="color:white" class="navbar-brand" href=""><b class="lang" key="amfdtussp">Admin Module for School Meal Attendance System</b></a>
      </div>
      <!-- /.navbar-header -->
      <ul class="nav navbar-top-links navbar-right">
        <li><a style="color:white" href="logout_user.php" title="click for edit" onclick="return confirm('Are you sure to leave from the system?')"><i class="fa fa-sign-out"></i>&nbsp;<b class="lang" key="logout">Logout</b></a></li>
        <li class="dropdown">
          <a style="color:white" > <b class="lang" key="date" >Date - </b>  
            <?php
            $Today=date('y:m:d');
            $new=date('l, F d, Y',strtotime($Today));
            echo $new; ?>
            <span class="cart-amunt"></span> </a>
          </li>
      </ul>
      <!-- /.navbar-top-links -->
      <div style="color: #0033cc;" class="navbar-right sidebar" role="navigation" >
        <div class="sidebar-nav navbar-collapse">
          <ul class="nav" id="side-menu" >
            <li><a style="color:;font-size:16px;font-family:italic; background-color: ;" href=""><p><b><em class="lang" key="logedas">Loged As:- </em>
              <?php echo ''.$_SESSION["username"].'';?></b></p></a></li>
              <li class="">
                <a style="color:"  href="student_service_admin.php"><i class="fa fa-home"></i> <b class="lang" key="home">Home</b></a>
              </li>
              <li> <a style="color:" href="dtu_cafe_admin.php" data-toggle=""><span class="glyphicon glyphicon-glass"></span>&nbsp; <b class="lang" key="cafeteria managment">Cafeteria Mnagment</b><span class="fa arrow"></span></a> 
              </li>
              <li> <a style="color:" href="#tab_staff_register" data-toggle="tab"><span class="glyphicon glyphicon-education"></span>&nbsp; <b class="lang" key="student managment">Staff Registration</b><span class="fa arrow"></span></a> 
              </li>
              <li class=""> <a style="color:" href="student_id_manipulation.php" data-toggle=""><span class="glyphicon glyphicon-barcode"></span>&nbsp; <b class="lang" key="student id managment">Student Id Management</b><span class="fa arrow"></span></a> 
              </li>
              <li class=""> <a style="color:" href="staff_admin.php" data-toggle=""><span class="glyphicon glyphicon-user"></span>&nbsp; <b class="lang" key="student id managment">Staff Management</b><span class="fa arrow"></span></a> 
              </li>
              <li><a style="color:" href="#help" data-toggle="modal"><span class="  glyphicon glyphicon-book"></span>&nbsp; <b class="lang" key="help">Help</b><span class="fa arrow"></span></a></li>
              <li> <a style="color:" href="#editModal" data-toggle="modal"><span class="   glyphicon glyphicon-lock"></span>&nbsp;<b class="lang" key="change password"> Change Password</b><span class="fa arrow"></span></a> 
              </li>
              <li>

              </ul>
            </div>
            <!-- /.sidebar-collapse -->
          </div>
          <!-- /.navbar-static-side -->
        </nav>

        <div style="background-image: ;" id="page-wrapper">
          <div class="row">   
            <div class="col-lg-12">
              <h3  style="color:#006633; size:30px">  <img style= "height: 70px; width: 70px" src="../setting/<?php echo $logo?>"><em class="lang" key="dtusmics"><?php echo $n.' School Digital ID and Meal Attendance system'?></em></h3>
            </div>   

            <!-- ////////////////////  Admin Page or Panel //////////////////////???-->  
            <!-- ///// Change Password ///////////////////////////////////////////////-->
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
           ?>   <!-- //////////////// Change Password /////////////////////////////////////////////????-->
           <div class="col-lg-12">
            <div class="panel panel-info">
              <div style="background-color: #00cc99"  class="panel-heading">
                <ul id="myTab" class="nav nav-tabs">
                </ul>
              </div>
              <div style="height:540px;color:black; overflow:scroll; opacity:0.8;" class="panel-body">
                <div id="myTabContent" class="tab-content">

                  <!--........ tab for staff registration........-->
                  <div  style="color:" class="tab-pane fade" id="tab_staff_register">
                    <!-- ///////////// StaffRegistration ///////////////-->
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
                        $jlavel = $filesop[5];
                        $pos= $filesop[6];
                        $school = $filesop[7];
                        // $image = $filesop[8];
                        $status = $filesop[8];
                        $sql = "insert into staff_table(stu_id,first_name,sex,email,phone,job_level,position,school,ac_year,status,ec) values ('$stu_id','$f_name','$sex','$email','$phone','$jlavel','$pos','$school',NOW(),'$status',NOW())";
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
                          <?php
                        }
                      }
                      ?>
                      <button data-toggle="" data-parent="#accordion"  class="btn btn-success btn-md btn-block" data-target=""><b class="lang" key="register staff">Register Staff Here</b> </button>
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
                          <div class"col-lg-4">
                            <div class="form-group">
                              <center><h3 style="color:#006633"><b class="lang" key="staff registration">Staff Regstration</b></h3></center>
                            </div>
                          </div>
                          <form action="s_s_data.php" method="POST" enctype="multipart/form-data" name="registration_info" onsubmit="return take()">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="lang" key="staff id" for="email">staff Id:</label>
                                <input type="text" name="stu_id" class="form-control" id="email" required>
                              </div>
                              <div class="form-group">
                                <label class="lang" key="full name" for="pwd">Full Name:</label>
                                <input type="text" name="first_name" class="form-control" id="pwd" required>
                              </div>
                              <div class="form-group">
                                <label class="lang" key="sex" for="email">Sex:</label>
                              </div>
                              <div class="form-group">
                                <label class="checkbox-inline">
                                  <input  type="radio" name="sex" id="sexm" value="M" required> <b class="lang" key="male">Male</b>
                                </label>
                                <label class="checkbox-inline">
                                  <input  type="radio" name="sex" id="sexf" value="F" required> <b class="lang" key="female">Female</b>
                                </label>
                              </div>
                              <div class="form-group">
                                <label class="lang" key="email" for="pwd"> Email:</label>
                                <input type="email" name="email" class="form-control" id="pwd" >
                              </div>
                              <div class="form-group">
                                <label class="lang" key="phone" for="pwd">Mobile Number:</label>
                                <input type="text" name="phone" class="form-control" id="pwd" >
                              </div>
                              <div class="form-group">
                                <label class="lang" key="phone" for="pwd">Desination:</label>
                                <input type="text" name="job_level" class="form-control" id="pwd" required>
                              </div>
                            </div>
                            <div class="col-lg-6">

                              <div class="form-group">
                                <label class="lang" key="select school" for="email">Select school</label>
                                <?php
                                if($conn){
                                }

                                ?>
                                <select name="school" class="form-control" onChange="change_school()" id="schoollist" required>
                                  <option class="lang" key="select school" value="">select school here</option>

                                  <?php
                                  $query="SELECT * from school where status=1 ORDER BY school ASC";
                                  $res = mysqli_query($conn,$query);
                                  if($res){
                                    $count=mysqli_num_rows($res);
                                    if($count>=1){
                                      while($row=mysqli_fetch_assoc($res)){

                                       ?>
                                       <option value="<?php echo $row['school'];?>"><?php echo $row['school'];?> </option>;
                                       <?php

                                     }
                                   }
                                   else{
                                    echo '<option value="">school is not available';
                                  }
                                }
                                ?>
                              </select>
  <!--<button type="submit" name="select_dep" class="btn btn-primary">
  <span class="glyphicon glyphicon-save"></span></button>-->
</div>
<div class="form-group">

  <label class="lang" key="select department" for="email">Select Department</label>
  <div id="dep">
    <select  class="form-control" required>
    </select>
  </div>
</div>
<div class="form-group">
  <label class="lang" key="select stream" for="email">Select Stream</label>
  <div id="strm">
    <select class="form-control">
    </select>
  </div>
</div>
<div class="form-group">
  <label class="lang" key="upload photo" for="inputfile">Upload Photo</label>
  <div class="fileupload fileupload-new" data-provides="fileupload">
    <div class="fileupload-new thumbnail" style="width: 300px; height: 250px;"><img src="asset/image/images.jpeg"alt="" />
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
    <button type="submit" name="insert_staffdata" class="btn btn-success"><i class="fa fa-sign-in"></i>&nbsp;<b class="lang" key="save acount">Save Data</b></button>
    <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;<b class="lang" key="cancle">Cancel</b></button>
  </center>
</div>
</div>
</form>
</div>
</div>
<!-- /////////// Staff Registration ////////////??????-->
</div>
<!--........... tab for staff registration...........??????-->
</div> <!--dive tap-content-->
<div  style="color:black" class="" id="">
  <!-- ..............Staff data display .......................-->
  <div class="panel-heading">
    <h4 class="panel-title">
      <a class="lang" key="list of employee data" style="text-decoration:none" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Lists of employee data in the system</a>
    </h4>
  </div>

  <?php
  if(isset($_POST['upload_image']))
  {
   $id = $_POST['stu_id'];
              $maxsize = 500242880; // 500MB
              $name = $_FILES['image']['name'];
              $target_dir = "../staff_photo/";
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
                      ######<a href="staff_admin.php"><button class="btn btn-success">Back</button></a>
                    </div>
                  </div>
                  <?php
                }
                else
                {
            // Upload
                  if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file))
                  {
                    $query="UPDATE staff_table set image='$name' where stu_id = '$id'";
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
                          ######<a href="staff_admin.php"><button class="btn btn-success">Back</button></a>
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
                      <label for="exampleInputFile">Staff ID</label>
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

            </div>


            <div id="collapseOne" class="panel-collapse collapse in">
             <!--.... Delete Staff Profile from the database...................................-->
             <?php
             if(isset($_GET['delete_stafdata'])){
              $id=$_GET['delete_stafdata'];
              $cheek_id = "DELETE FROM staff_table where stu_id = '$id'";
              $run_query=mysqli_query($conn, $cheek_id);
              if($run_query)
              {
               $cheek_id = "DELETE FROM user_acount where stu_id = '$id'";
               $run_query=mysqli_query($conn, $cheek_id);
               if($run_query)
               {
                ?>
                <div class="alert alert-success alert-dismissible" rol="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
                  <strong  class="lang" key="staff profile deleted">Staff Profile are Deleted Successfully</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br> <br> 
                </div>
                <?php
              }
            }
            else{
             ?>
             <div class="alert alert-success alert-dismissible" rol="alert">
              <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
              <strong  class="lang" key="staff profile not deleted">Staff Profile are not Deleted  Successfully</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br> <br> 
            </div>
            <?php
          }

        }
        ?>

        <!--.... Delete Staff Profile from the database..........????????-->
        <?php
        $result = mysqli_query($conn,"SELECT * FROM staff_table");
        $num_rows = mysqli_num_rows($result);
        echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        &nbsp; <strong> $num_rows <b class='lang' key='staff avialable'> Staffs are Available in the Databse</b><strong>";
        ?>
        <table width="100%" class="table table-striped table-bordered table-hover " id="dataTables">
          <thead>
            <tr>
              <th  class="lang" key="id">Staff Id</th>
              <th  class="lang" key="full name">Full Name</th>
              <th  class="lang" key="sex">Sex</th>
              <th  class="lang" key="school">school</th>
              <th  class="lang" key="ac_year">Ac_Year</th>
              <th  class="lang" key="status">Staff status</th>                                    
              <th  class="lang" key="action">Action</th>
            </tr>
          </thead>
          <tbody>
           <?php

           $check_data = "SELECT * FROM staff_table ORDER BY first_name ASC ";
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
               <td><?php echo ''.$row['ac_year'].''; ?></td>


               <form clas="form-horizontal" action="staff_admin.php" method="post">
                <td>
                  <select style="width: 25px" name="stu_id">
                    <option value="<?php echo $row['stu_id'];?>"><?php echo $row['stu_id'];?> </option>; 
                  </select>
                  &nbsp;&nbsp;&nbsp;
                  <?php
                  $query="SELECT status FROM staff_table where stu_id='$std'";
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
                $q=mysqli_query($conn,"UPDATE staff_table SET  status='$st'  WHERE stu_id='$std'");
                if($q){
                  echo '<script>alert("changed")</script>';
                  echo"<script>window.open('staff_admin.php','_self')</script>";
                }
                else
                  echo '<script>alert("Not changed")</script>';
                echo"<script>window.open('staff_admin.php','_self')</script>";
              }
              ?>
            </td> 
            <td>
              <div class='btn-group' rol='group' area-level='.....'>
                <a href="view_and_edit_data.php?view_stafdata=<?php echo $row['stu_id' ]; ?> " data-toggle="modal" class="btn btn-success btn-sm"> <span class='glyphicon glyphicon-eye-open'></span></a>
                <a class="btn btn-info btn-sm edit-data" href="view_and_edit_data.php?edit_stafdata=<?php echo $row['stu_id' ]; ?>" title="click for edit" onclick="return confirm('Are you sure edit this item?')"><span class='glyphicon glyphicon-edit' area-hidden='true'></span></a>
                <a class="btn btn-danger btn-sm" href="?delete_stafdata=<?php echo $row['stu_id']; ?>" title="click for delete" onclick="return confirm('Are you sure to remove this customer?')"><span class='glyphicon glyphicon-trash'></span></a>
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
<!-- .............................................Staff data display ..............................................??????-->
</div>

</div>
</div> <!--dive tap-content-->
</div> <!--dive panel body-->
</div>
</div>
</div>
<!-- /#page-wrapper -->
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
    <form class="form-horizontal" method="POST" action="staff_admin.php">
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
      <li class="lang" key="h5"> &nbsp;In staff service table at column of status in each row there is one combo box, one dot, two small circle and on edit icon</li><br>
      <li class="lang" key="h6"> &nbsp;Each conbo box holds individuals person id</li><br>
      <li class="lang" key="h7"> &nbsp;Dot indicates weather the status activated or deactivated, if dot become green user is status is activated and if dot become black status is deactivated </li><br>
      <li class="lang" key="h8"> &nbsp;From the two small circle if you click the left and press edit icon, you change a person active </li><br>
      <li class="lang" key="h9"> &nbsp;From the two small circle if you click the right and press edit icon, you change a person deactive </li><br>
      <li class="lang" key="h9"> &nbsp;To entr student data from Excel prepare the excel file and save it as CSV (comma deliminated). then you can upload the file to the database</li><br>
    </ol>
    <li ><img src="../img/staff_data.png"></li>
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
<script type="text/javascript">
 function change_school(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","pcajax.php?school_id="+document.getElementById("schoollist").value,false);
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
    $('#dataTables-school').DataTable({
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
