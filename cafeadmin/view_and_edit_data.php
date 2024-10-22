<?php
error_reporting(false)
?>
<?php
session_start();
include('database_conn.php');
?>
<?php

if(!$_SESSION['username']){
  header("Location: http://localhost/dtu/smics");
}

?>
<html>
<head>
  <title>ደብረ ታቦር ዩኒቨርሲቲ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/clockface.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Start WOWSlider.com HEAD section -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">

  <link rel="stylesheet" type="text/css" href="engine1/style.css" />
  <script type="text/javascript" src="engine1/jquery.js"></script>
  <link href="img/dtu_logo.png" rel="icon">
  <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="dist/css/sb-admin-2.css" rel="stylesheet">
  <script type="text/javascript" src=lang_translate.js></script>
  <!-- Morris Charts CSS -->
  <link href="vendor/morrisjs/morris.css" rel="stylesheet">
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- End WOWSlider.com HEAD section -->
  <link href="vendor/datatables-plugins/dataTables.bootstrap.css"  rel="stylesheet">
  <link href="vendor/datatables-responsive/dataTables.responsive.css"  rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap-fileupload.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap-fileupload.min.css" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="lang_translate.js"></script>
  <style>
    ul.wysihtml5-toolbar > li
    {
      position: relative;
    }
    
  </style>
  
</head>
</head>
<body>
 <div class="container">
  <nav style="max-heigt:100px;background-color:#191970;color:white" class="navbar navbar-default ">
    <div class="container-fluid"></div>
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
      <?php 
      $q=mysqli_query($conn,"SELECT * from setting LIMIT 1");
      while($rr=mysqli_fetch_assoc($q))
      {
        $logo=$rr['image'];
        ?>
        <a ><img class="img-round img-responsive" style="max-height:60px;padding-top:2px" src="../setting/<?php echo $logo?>" /></a>
        <?php
      }
      ?>
      
    </div>

    <div  class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul style="margin-right:9px;display:block" class="nav navbar-nav navbar-right">
        <ul style="margin-right:9px;display:block" class="nav navbar-nav navbar-right">
          <li><a style="color:white;font-size:14px;font-family:italic" href="dtu_cafe_adminpage.php"><p class="lang" key="home">Home </p></a></li>
          <li><a style="color:white;font-size:14px;font-family:italic" href=""><p ><em class="lang" key="logedas">Loged As:- </em>
            <?php echo ''.$_SESSION["username"].'';?></p></a></li>
            <li><a style="color:white;font-size:14px;font-family:italic" href="logout_user.php"><p class="lang" key="logout">Logout</p></a></li>
            <li class=""><a style="color:white;font-size:14px;font-family:italic" href=""><p><b>
              <?php
              /*date_default_timezone_set("Africa/Addis_ababa");
              echo "<em>".date('Y/m/d ')."</em><br><br>";*/
              echo "<b class='lang' key='date'>Date :-</b>  ";
              $Today=date('y:m:d');
              $new=date('l, F d, Y',strtotime($Today));
              echo $new;
              ?>
            </b></p></a></li>
            <li style="margin-top: 13px" class="dropdown">
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
        </ul>
      </div>

    </nav>
  </div>
  <!--Editing page for eMPLOYEE DAATA////////////////////////////////////////////////////////////////////////////////////-->
  <?php
  if(isset($_GET['edit_id'])){
    $id=$_GET['edit_id'];
    $query="SELECT * FROM tiker_data where employee_id = '$id'";
    $result=mysqli_query($conn,$query);
    if($result){
      while ($myrow = mysqli_fetch_assoc($result))
      {
       $td=$myrow['employee_id'];
       $fn=$myrow['first_name'];
       $po=$myrow['position'];
       $sx=$myrow['sex'];
       $img=$myrow['image'];
       ?>
       <div class="container">
         <div class="alert alert-dismissable" style="color:white;background-color:#00cc99">
          <center><h4>Edit Employees Data for DTU Meal Attendance Ssystem</h4></center>
        </div>
        <form method="post" action="data_managment.php" enctype="multipart/form-data" class="form-horizontal">
          
         <table class="table table-bordered table-responsive">
          <tr>
            <td ><label class="control-label">Tiker_Id:</label></td>
            <td><input class="form-control" type="text" name="employee_id" value="<?php echo $td; ?>" required /></td>
          </tr>
          
          <tr>
            <td><label class="control-label">Full_Name:</label></td>
            <td><input  class="form-control" type="text" name="first_name" value="<?php echo $fn; ?>" required /></td>
          </tr>
          <tr>
            <td><label class="control-label">Position</label></td>
            <td>
              <input class="form-control" type="text" name="position" value="<?php echo ''.$myrow['position'].''; ?>" required />
            </td>
          </tr><tr>
          <td><label class="control-label">Sex</label></td>
          <td>
            <input class="form-control" type="text" name="sex" value="<?php echo ''.$myrow['sex'].''; ?>" required />
          </td>
        </tr>  
        <tr>
          <td><label class="control-label">Year</label></td>
          <td>
            <input class="form-control" type="text" name="sex" value="<?php echo ''.$myrow['yer'].''; ?>" required />
          </td>
        </tr>  
        <tr>
          <td><label class="control-label">Photo</label></td>
          <td>
            
            <div class="form-group">
              <label for="inputfile">Upload Photo</label>
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="col-lg-4">
                  <div class="fileupload-new thumbnail" style="width: 250px; height: 250px; line-height: 20px;"><img src="asset/image/images.jpeg"alt="" />
                  </div>
                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 300px; max-height: 300px; line-height: 20px;">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div>
                    <span class="btn btn-file btn-success" ><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                    <input class="form-control" type="file" name="image"  /> <?php echo '<img width="250" height="235" src="data:image;base64,'.$myrow["image"].'" />'; ?></span>
                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                  </div>
                </div> 
              </div>
            </div>
            
          </td>
        </tr>
        
        <tr>
          <td colspan="2"><center><button type="submit" name="update_stu_data" class="btn btn-success">
            <span class="glyphicon glyphicon-save"></span> Update </button>
            
            <a class="btn btn-danger" href="student_managment.php"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
          </center>
        </td>
      </tr>
      
    </table>
    
  </form> 

  <?php
}
}
else{
  ?>
  <div class="alert alert-danger alert-dismissible" rol="alert">
    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
    <strong> The Data has no Selected From the Database</strong> 
  </div>
  <?php
}  
}

?>
</div>
<!--Editing page for eMPLOYEE DAATA///////-->


<!-- ....... View page for Employee DAATA .................-->
<?php
if(isset($_GET['view_employeeid'])){
  $id=$_GET['view_employeeid'];
  $query="SELECT * FROM tiker_data where employee_id = '$id'";
  $result=mysqli_query($conn,$query);
  if($result){
    while ($myrow = mysqli_fetch_assoc($result))
    {
     $td=$myrow['employee_id'];
     $fn=$myrow['first_name'];
     $po=$myrow['position'];
     $sx=$myrow['sex'];
     $img=$myrow['image'];
     ?>
     <div style="margin-top:0px"class="container">
       <div class="alert alert-dismissable" style="color:white;background-color:#00cc99">
        <center><h4>View Employee Data for DTU Meal Attendance System</h4></center>
      </div>
      
      <form method="post" action="data_managment.php" enctype="multipart/form-data" class="form-horizontal">
        
       <table class="table table-bordered table-responsive">
        

        <tr>
          <td><label class="control-label">Tiker_Id:</label></td>
          <td><?php echo $td; ?> </td>
        </tr>
        
        <tr>
          <td><label class="control-label">Full_Name:</label></td>
          <td><?php echo $fn; ?> </td>
        </tr>
        <tr>
          <td><label class="control-label">Position</label></td>
          <td>
           <?php echo ''.$myrow['position'].''; ?>
         </td>
       </tr><tr>
       <td><label class="control-label">Sex</label></td>
       <td>
        <?php echo ''.$myrow['sex'].''; ?>
      </td>
    </tr>  
    <tr>
      <td><label class="control-label">Year</label></td>
      <td>
        <?php echo ''.$myrow['yer'].''; ?>
      </td>
    </tr>  
    <tr>
      <td><label class="control-label"> Employee Photo</label></td>
      <td>
        <div class="col-lg-4">
          <div class="btn btn-file btn-success" >
           <?php echo '<img width="250" height="235" src="data:image;base64,'.$myrow["image"].'" />'; ?></div>
         </div> 
         <div class="col-lg-4">
          
          <a class="btn btn-danger" href="data_managment.php"> <span class="glyphicon glyphicon-backward"></span>Back To Employee data Managing Page </a>
        </div>
      </td>
    </tr>
    
    <tr>
      <td colspan="2">
       
      </td>
    </tr>
    
  </table>
  
</form> 

<?php
}
}
else{
  ?>
  <div class="alert alert-danger alert-dismissible" rol="alert">
    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
    <strong> The Data has no Selected From the Database</strong> 
  </div>
  <?php
}  
}

?>
</div>
<!-- ..... View page for Employee DAATA ......???????-->
<!-- ....... Editing query for  Staff Profile.......-->
<?php
if(isset($_POST['update_staff_data'])){
 $td=$_POST['stu_id'];
 $fn=$_POST['first_name'];
 $sx=$_POST['sex'];
 $em=$_POST['email'];
 $ph=$_POST['phone'];
 $f=$_POST['faculty'];
 $dep=$_POST['department'];
 $strm=$_POST['stream'];
 if(getimagesize($_FILES['image']['tmp_name'])==false){
  echo "<script>alert('Please fill photo of student');</script>";
}
else{
  $image=addslashes($_FILES['image']['tmp_name']);
  $name=addslashes($_FILES['image']['name']);
  $image=file_get_contents($image);
  $image=base64_encode($image);
  $query="UPDATE staff_table set first_name='$fn', sex='$sx',  email='$em', phone='$ph', faculty='$f', department='$dep', stream='$strm', image='$image' where stu_id = '$td'";
  $result=mysqli_query($conn,$query);
  if($result){
    ?>
    <div class=container>
      <div class="alert alert-success alert-dismissible" rol="alert">
        <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
        <strong> Staff Profile Update Success</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        To close Success Message Press The  X  sign to the right side 
        ######<a href="dtu_cafe_adminpage.php"><button class="btn btn-success">Back</button></a>
        <?php
      }
    }
  }
  ?>
  <!--............................. Editing query for Staff Profile.......????-->

  <!--....Editing page for Staff Profile..................-->
  <?php
  if(isset($_GET['edit_stafdata'])){
    $id=$_GET['edit_stafdata'];
    $query="SELECT * FROM staff_table where stu_id = '$id'";
    $result=mysqli_query($conn,$query);
    if($result){
      while ($myrow = mysqli_fetch_assoc($result))
      {
       $td=$myrow['stu_id'];
       $fn=$myrow['first_name'];
       $sx=$myrow['sex'];
       $em=$myrow['email'];
       $ph=$myrow['phone'];
       $f=$myrow['faculty'];
       $dep=$myrow['department'];
       $strm=$myrow['stream'];
       $img=$myrow['image'];
       ?>
       <div class="container">
         <div class="alert alert-dismissable" style="color:white;background-color:#00cc99">
          <center><h4>Edit staff Profile for DTU Meal Attendance Ssystem</h4></center>
        </div>
        <form method="post" action="view_and_edit_data.php" enctype="multipart/form-data" class="form-horizontal">
          
         <table class="table table-bordered table-responsive">
          <tr>
            <td ><label class="control-label">Staff Id:</label></td>
            <td><input class="form-control" type="text" name="stu_id" value="<?php echo $td; ?>" required /></td>
          </tr>
          <tr>
            <td><label class="control-label">Full_Name:</label></td>
            <td><input  class="form-control" type="text" name="first_name" value="<?php echo $fn; ?>" required /></td>
          </tr>
          <tr>
            <td><label class="control-label">Sex</label></td>
            <td>
              <input class="form-control" type="text" name="sex" value="<?php echo ''.$myrow['sex'].''; ?>" required />
            </td>
          </tr>
          <tr>
            <td><label class="control-label">Email</label></td>
            <td>
              <input class="form-control" type="email" name="email" value="<?php echo ''.$myrow['email'].''; ?>" required />
            </td>
          </tr>
          <tr>
            <td><label class="control-label">Mobile No</label></td>
            <td>
              <input class="form-control" type="text" name="phone" value="<?php echo ''.$myrow['phone'].''; ?>" required />
            </td>
          </tr> 
          <tr>
            <td><label class="control-label">Faculty</label></td>
            <td>
              <input class="form-control" type="text" name="faculty" value="<?php echo ''.$myrow['faculty'].''; ?>" required />
            </td>
          </tr>
          <tr>
            <td><label class="control-label">Department</label></td>
            <td>
              <input class="form-control" type="text" name="department" value="<?php echo ''.$myrow['department'].''; ?>" required />
            </td>
          </tr> 
          <tr>
            <td><label class="control-label">Specialization</label></td>
            <td>
              <input class="form-control" type="text" name="stream" value="<?php echo ''.$myrow['stream'].''; ?>" />
            </td>
          </tr>
          <tr>
            <td><label class="control-label">Year</label></td>
            <td>
              <input class="form-control" type="text" name="ac_year" value="<?php echo ''.$myrow['ac_year'].''; ?>" required />
            </td>
          </tr>  
          <tr>
            <td><label class="control-label">Staff Photo</label></td>
            <td>
              
              <div class="form-group">
                <label for="inputfile">Upload Photo</label>
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="col-lg-4">
                    <div class="fileupload-new thumbnail" style="width: 250px; height: 250px; line-height: 20px;"><img src="asset/image/images.jpeg"alt="" />
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 300px; max-height: 300px; line-height: 20px;">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div>
                      <span class="btn btn-file btn-success" ><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                      <input class="form-control" type="file" name="image"  /> <?php echo '<img width="250" height="235" src="data:image;base64,'.$myrow["image"].'" />'; ?></span>
                      <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                    </div>
                  </div> 
                </div>
              </div>
              
            </td>
          </tr>
          
          <tr>
            <td colspan="2"><center><button type="submit" name="update_staff_data" class="btn btn-success">
              <span class="glyphicon glyphicon-save"></span> Update </button>
              
              <a class="btn btn-danger" href="bwbfwifordtusadmin.php"> <span class="glyphicon glyphicon-backward"></span> Back </a>
            </center>
          </td>
        </tr>
        
      </table>
      
    </form> 

    <?php
  }
}
else{
  ?>
  <div class="alert alert-danger alert-dismissible" rol="alert">
    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
    <strong> The Data has no Selected From the Database</strong> 
  </div>
  <?php
}  
}

?>
</div>
<!--..Editing page for Staff Profile.....???????????-->
<!-- ...View page for Stff Profile..............................?????-->
<?php
if(isset($_GET['view_stafdata'])){
  $id=$_GET['view_stafdata'];
  $query="SELECT * FROM staff_table where stu_id = '$id'";
  $result=mysqli_query($conn,$query);
  if($result){
    while ($myrow = mysqli_fetch_assoc($result))
    {
     $sd=$myrow['stu_id'];
     $fn=$myrow['first_name'];
     $sx=$myrow['sex'];
     $em=$myrow['email'];
     $ph=$myrow['phone'];
     $f=$myrow['faculty'];
     $dep=$myrow['department'];
     $strm=$myrow['stream'];
     $ay=$myrow['ac_year'];
     $img=$myrow['image'];
     ?>
     <div class="container">
       <div class="alert alert-dismissable" style="color:white;background-color:#00cc99">
        <center><h4>View Student Data for DTU Meal Attendance System</h4></center>
      </div>
      
      <form method="post" action="data_managment.php" enctype="multipart/form-data" class="form-horizontal">
        
       <table class="table table-bordered table-responsive">
        

        <tr>
          <td><label class="control-label">Student ID:</label></td>
          <td><?php echo $sd; ?></td>
        </tr>
        
        <tr>
          <td><label class="control-label">Full Name:</label></td>
          <td><?php echo $fn; ?></td>
        </tr>
        <tr>
          <td><label class="control-label">Sex</label></td>
          <td>
           <?php echo ''.$myrow['sex'].''; ?>
         </td>
       </tr>
       <tr>
        <td><label class="control-label">Email</label></td>
        <td>
         <?php echo ''.$myrow['email'].''; ?>
       </td>
     </tr>
     <tr>
      <td><label class="control-label">Mobile No</label></td>
      <td>
       <?php echo ''.$myrow['phone'].''; ?>
     </td>
   </tr>
   <tr>
    <td><label class="control-label">Faculty</label></td>
    <td>
     <?php echo ''.$myrow['faculty'].''; ?>
   </td>
 </tr> 
 <tr>
  <td><label class="control-label">Department</label></td>
  <td>
   <?php echo ''.$myrow['department'].''; ?>
 </td>
</tr> 
<tr>
  <td><label class="control-label">Specialization</label></td>
  <td>
    <?php echo ''.$myrow['stream'].''; ?>
  </td>
</tr>  
<tr>
  <td><label class="control-label">Year of Registration</label></td>
  <td>
    <?php echo ''.$myrow['ac_year'].''; ?>
  </td>
</tr>
<tr>
  <td><label class="control-label"> Staff Photo</label></td>
  <td>
    
    <div class="col-lg-4">
      <div class="btn btn-file btn-success" >
       <?php echo '<img width="250" height="235" src="data:image;base64,'.$myrow["image"].'" />'; ?></div>
     </div> 
     <div class="col-lg-4">
      <a class="btn btn-danger" href="bwbfwifordtusadmin.php"> <span class="glyphicon glyphicon-backward"></span> Back To Staff Profile Managing Page </a>
    </div> 
    
  </td>
</tr>

<tr>
  <td colspan="2">       
    <center></center>
    
  </td>
</tr>

</table>

</form> 

<?php
}
}
else{
  ?>
  <div class="alert alert-danger alert-dismissible" rol="alert">
    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
    <strong> The Data has no Selected From the Database</strong> 
  </div>
  <?php
}  
}

?>
<!-- .View page for Staff Profile ......?????????-->

<!--.edit query for student profile.......-->
<?php
if(isset($_POST['update_studata'])){
 $td=$_POST['stu_id'];
 $fn=$_POST['first_name'];
 $sx=$_POST['sex'];
 $em=$_POST['email'];
 $ph=$_POST['phone'];
 $f=$_POST['faculty'];
 $dep=$_POST['department'];
 $strm=$_POST['stream'];
 $y=$_POST['year'];
 $ay=$_POST['ac_year'];
  //    if(getimagesize($_FILES['image']['tmp_name'])==false){
  // echo "<script>alert('Please fill photo of student');</script>";
  // }
  // else{
 $image=addslashes($_FILES['image']['tmp_name']);
 $name=addslashes($_FILES['image']['name']);
 $image=file_get_contents($image);
 $image=base64_encode($image);
 $query="UPDATE stu_data set first_name='$fn', sex='$sx', email='$em', phone='$ph', faculty='$f',department='$dep',stream='$strm',year='$y',ac_year=NOW(),image='$image' where stu_id = '$td'";
 $result=mysqli_query($conn,$query);
 if($result){
  ?>
  <div class="container">
    <div class="alert alert-success alert-dismissible" rol="alert">
      <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
      <strong> Update Success</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      To close Success Message Press The  X  sign to the right side 
      ######<a href="dtu_cafe_adminpage.php"><button class="btn btn-success">Back</button></a>
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
      ######<a href="dtu_cafe_adminpage.php"><button class="btn btn-success">Back</button></a>
    </div>
  </div>
  <?php
}
          // }
}
?>
<!--........... edit query for student profile.....??????-->

<!--...Editing page for Student DAATA....................................-->
<?php
if(isset($_GET['edit_stuid'])){
  $id=$_GET['edit_stuid'];
  $query="SELECT * FROM stu_data where stu_id = '$id'";
  $result=mysqli_query($conn,$query);
  if($result){
    while ($myrow = mysqli_fetch_assoc($result))
    {
     $sd=$myrow['stu_id'];
     $fn=$myrow['first_name'];
     $sx=$myrow['sex'];
     $em=$myrow['email'];
     $ph=$myrow['phone'];
     $f=$myrow['faculty'];
     $dep=$myrow['department'];
     $strm=$myrow['stream'];
     $y=$myrow['year'];
     $ay=$myrow['ac_year'];
     $img=$myrow['image'];
     ?>
     <div class="container">
       <div class="alert alert-dismissable" style="color:white;background-color:#00cc99">
        <center><h4>Edit Students Data for DTU Meal Attendance Ssystem</h4></center>
      </div>
      
      <form method="post" action="view_and_edit_data.php" enctype="multipart/form-data" class="form-horizontal">
        
       <table class="table table-bordered table-responsive">

        <tr>
          <td><label class="control-label">Student ID:</label></td>
          <td><input class="form-control" type="text" name="stu_id" value="<?php echo $sd; ?>" required /></td>
        </tr>
        
        <tr>
          <td><label class="control-label">Full Name:</label></td>
          <td><input  class="form-control" type="text" name="first_name" value="<?php echo $fn; ?>" required /></td>
        </tr>
        <tr>
          <td><label class="control-label">Sex</label></td>
          <td>
            <input class="form-control" type="text" name="sex" value="<?php echo ''.$myrow['sex'].''; ?>" required />
          </td>
        </tr>
        <tr>
          <td><label class="control-label">Email</label></td>
          <td>
            <input class="form-control" type="email" name="email" value="<?php echo ''.$myrow['email'].''; ?>" required />
          </td>
        </tr>
        <tr>
          <td><label class="control-label">Mobile No</label></td>
          <td>
            <input class="form-control" type="text" name="phone" value="<?php echo ''.$myrow['phone'].''; ?>" required />
          </td>
        </tr>
        <tr>
          <td><label class="control-label">Faculty</label></td>
          <td>
            <input class="form-control" type="text" name="faculty" value="<?php echo ''.$myrow['faculty'].''; ?>" required />
          </td>
        </tr> 
        <tr>
          <td><label class="control-label">Department</label></td>
          <td>
            <input class="form-control" type="text" name="department" value="<?php echo ''.$myrow['department'].''; ?>" required />
          </td>
        </tr> 
        <tr>
          <td><label class="control-label">Stream</label></td>
          <td>
            <input class="form-control" type="text" name="stream" value="<?php echo ''.$myrow['stream'].''; ?>" />
          </td>
        </tr>  
        <tr>
          <td><label class="control-label">Year</label></td>
          <td>
            <input class="form-control" type="text" name="year" value="<?php echo ''.$myrow['year'].''; ?>" required />
          </td>
        </tr> 
        <tr>
          <td><label class="control-label">Acadmic Year</label></td>
          <td>
            <input class="form-control" type="text" name="ac_year" value="<?php echo ''.$myrow['ac_year'].''; ?>" required />
          </td>
        </tr>
        <tr>
          <td><label class="control-label">Photo</label></td>
          <td>
            
            <div class="form-group">
              <label for="inputfile">Upload Photo</label>
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="col-lg-4">
                  <div class="fileupload-new thumbnail" style="width: 250px; height: 250px; line-height: 20px;"><img src="asset/image/images.jpeg" alt="" />
                  </div>
                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 300px; max-height: 300px; line-height: 20px;">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div>
                    <span class="btn btn-file btn-success" ><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                    <input class="form-control" type="file" name="image" required/> <?php echo '<img width="250" height="235" src="data:image;base64,'.$myrow["image"].'" />'; ?></span>
                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                  </div>
                </div> 
              </div>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <center><button type="submit" name="update_studata" class="btn btn-success">
              <span class="glyphicon glyphicon-save"></span> Update </button>
              <a class="btn btn-danger" href="data_managment.php"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
            </center>
          </td>
        </tr>
      </table>    
    </form> 
    <?php
  }
}
else{
  ?>
  <div class="alert alert-danger alert-dismissible" rol="alert">
    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
    <strong> The Data has no Selected From the Database</strong> 
  </div>
  <?php
}  
}
?>
</div>
<!--.................Editing page for Student DAATA...............????-->
<!-- .........View page for Student profile...................-->
<?php
if(isset($_GET['view_stuid'])){
  $id=$_GET['view_stuid'];
  $query="SELECT * FROM stu_data where stu_id = '$id'";
  $result=mysqli_query($conn,$query);
  if($result){
    while ($myrow = mysqli_fetch_assoc($result))
    {
     $sd=$myrow['stu_id'];
     $fn=$myrow['first_name'];
     $sx=$myrow['sex'];
     $em=$myrow['email'];
     $ph=$myrow['phone'];
     $f=$myrow['faculty'];
     $dep=$myrow['department'];
     $strm=$myrow['stream'];
     $y=$myrow['year'];
     $ay=$myrow['ac_year'];
     $img=$myrow['image'];
     ?>
     <div class="container">
       <div class="alert alert-dismissable" style="color:white;background-color:#00cc99">
        <center><h4>View Student Data for DTU Meal Attendance System</h4></center>
      </div>
      
      <form method="post" action="data_managment.php" enctype="multipart/form-data" class="form-horizontal">
        
       <table class="table table-bordered table-responsive">
        <tr>
          <td><label class="control-label">Student ID:</label></td>
          <td><?php echo $sd; ?></td>
        </tr>
        
        <tr>
          <td><label class="control-label">Full Name:</label></td>
          <td><?php echo $fn; ?></td>
        </tr>
        <tr>
          <td><label class="control-label">Sex</label></td>
          <td>
           <?php echo ''.$myrow['sex'].''; ?>
         </td>
       </tr>
       <tr>
        <td><label class="control-label">Email Address</label></td>
        <td>
         <?php echo ''.$myrow['email'].''; ?>
       </td>
     </tr>
     <tr>
      <td><label class="control-label">Mobile No</label></td>
      <td>
       <?php echo ''.$myrow['phone'].''; ?>
     </td>
   </tr>
   <tr>
    <td><label class="control-label">Faculty</label></td>
    <td>
     <?php echo ''.$myrow['faculty'].''; ?>
   </td>
 </tr> 
 <tr>
  <td><label class="control-label">Department</label></td>
  <td>
   <?php echo ''.$myrow['department'].''; ?>
 </td>
</tr> 
<tr>
  <td><label class="control-label">Stream</label></td>
  <td>
    <?php echo ''.$myrow['stream'].''; ?>
  </td>
</tr>  
<tr>
  <td><label class="control-label">Year</label></td>
  <td>
    <?php echo ''.$myrow['year'].''; ?>
  </td>
</tr> 
<tr>
  <td><label class="control-label">AcadmicYear</label></td>
  <td>
    <?php echo ''.$myrow['ac_year'].''; ?>
  </td>
</tr>
<tr>
  <td><label class="control-label"> Student Photo</label></td>
  <td>
    
    <div class="col-lg-4">
      <div class="btn btn-file btn-success" >
       <?php echo '<img width="250" height="235" src="data:image;base64,'.$myrow["image"].'" />'; ?></div>
     </div> 
     <div class="col-lg-4">
      <a class="btn btn-danger" href="data_managment.php"> <span class="glyphicon glyphicon-backward"></span> Back To Student Managing Page </a>
    </div> 
  </td>
</tr>
<tr>
  <td colspan="2">       
    <center></center>
  </td>
</tr>
</table>
</form> 
<?php
}
}
else{
  ?>
  <div class="alert alert-danger alert-dismissible" rol="alert">
    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
    <strong> The Data has no Selected From the Database</strong> 
  </div>
  <?php
}  
}

?>
<!-- .........View page for Student profile ..............????-->
<!--........ edit query for None Cafe student profile..........-->
<?php
if(isset($_POST['update_ncsdata'])){
 $td=$_POST['stu_id'];
 $stat=$_POST['status'];
 $py=$_POST['payment'];
 $query="UPDATE non_cafe set status='$stat', payment='$py' where stu_id = '$td'";
 $result=mysqli_query($conn,$query);
 if($result){
  ?>
  <div class="container">
    <div class="alert alert-success alert-dismissible" rol="alert">
      <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
      <strong> Update Success</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      To close Success Message Press The  X  sign to the right side 
      ######<a href="dtu_cafe_adminpage.php"><button class="btn btn-success">Back</button></a>
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
      ######<a href="dtu_cafe_adminpage.php"><button class="btn btn-success">Back</button></a>
    </div>
  </div>
  <?php
}
}
?>
<!--...... edit query for Non Cafe student profile..............??????-->

<!--..............Editing page for Non Cafe Student DAATA..............-->
<?php
if(isset($_GET['edit_ncsid'])){
  $id=$_GET['edit_ncsid'];
  $query="SELECT * FROM non_cafe where stu_id = '$id'";
  $result=mysqli_query($conn,$query);
  if($result){
    while ($myrow = mysqli_fetch_assoc($result))
    {
     $sd=$myrow['stu_id'];
     $fn=$myrow['first_name'];
     $sx=$myrow['sex'];
     $em=$myrow['email'];
     $ph=$myrow['phone'];
     $f=$myrow['faculty'];
     $dep=$myrow['department'];
     $strm=$myrow['stream'];
     $stat=$myrow['status'];
     $py=$myrow['payment'];
     $y=$myrow['year'];
     $ay=$myrow['ac_year'];
     $pd=$myrow['payment_date'];
     $img=$myrow['image'];
     ?>
     <div class="container">
       <div class="alert alert-dismissable" style="color:white;background-color:#00cc99">
         <center><h4 class="lang" key="edit student profile">Edit Students Profile</h4></center>
       </div>
       
       <form method="post" action="view_and_edit_data.php" enctype="multipart/form-data" class="form-horizontal">
        
         <table class="table table-bordered table-responsive">
          <tr>
            <td><label class="control-label"><b class="lang" key="return">Return:</b></label></td>
            <td><a href="dtu_cafe_adminpage.php" class="btn btn-success btn-block"><b class="lang" key="return to home page"> Return to the Home Page</b></a></td>
          </tr>
          <tr>
            <td><label class="control-label"><b class="lang" key="id">Student ID:</b></label></td>
            <td><input class="form-control" type="text" name="stu_id" value="<?php echo $sd; ?>" required /></td>
          </tr>
          
          <tr>
            <td><label class="control-label"><b class="lang" key="full name">Full Name:</b></label></td>
            <td><input  class="form-control" type="text" name="first_name" value="<?php echo $fn; ?>" required /></td>
          </tr>
          <tr>
            <td><label class="control-label"><b class="lang" key="sex">Sex</b></label></td>
            <td>
              <input class="form-control" type="text" name="sex" value="<?php echo ''.$myrow['sex'].''; ?>" required />
            </td>
          </tr>
          <tr>
            <td><label class="control-label"><b class="lang" key="email">Email</b></label></td>
            <td>
              <input class="form-control" type="email" name="email" value="<?php echo ''.$myrow['email'].''; ?>" required />
            </td>
          </tr>
          <tr>
            <td><label class="control-label"><b class="lang" key="phone">Mobile No</b></label></td>
            <td>
              <input class="form-control" type="text" name="phone" value="<?php echo ''.$myrow['phone'].''; ?>" required />
            </td>
          </tr>
          <tr>
            <td><label class="control-label"><b class="lang" key="faculty">Faculty</b></label></td>
            <td>
              <input class="form-control" type="text" name="faculty" value="<?php echo ''.$myrow['faculty'].''; ?>" required />
            </td>
          </tr> 
          <tr>
            <td><label class="control-label"><b class="lang" key="department">Department</b></label></td>
            <td>
              <input class="form-control" type="text" name="department" value="<?php echo ''.$myrow['department'].''; ?>" required />
            </td>
          </tr> 
          <tr>
            <td><label class="control-label"><b class="lang" key="stream">Spececialzation</b></label></td>
            <td>
              <input class="form-control" type="text" name="stream" value="<?php echo ''.$myrow['stream'].''; ?>"  />
            </td>
          </tr> 
          <tr>
           <td>
             <label class="lang" key="status" >Status</label>
           </td>
           <td>
            <select class="form-control" name="status" required>
              <?php
              $query="SELECT status from non_cafe WHERE stu_id='$id' ";
              $res = mysqli_query($conn, $query);
              if($res){
                $count=mysqli_num_rows($res);
                if($count>=1){
                  while($row=mysqli_fetch_assoc($res)){
                    
                   ?>
                   <option class="form-control" value="<?php echo $row['status'];?>">
                    <?php 
                    if($count='0')
                    {
                      echo 'Non Cafe';
                    }
                    else echo 'utilize cafe';
                    ?>
                  </option>;

                  <?php
                }
              }
              else{
                echo '<option value="">status is not available';
              }
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td><label class="control-label"><b class="lang" key="payment">Payment</b></label></td>
        <td>
          <input class="form-control" type="text" name="payment" value="<?php echo ''.$myrow['payment'].''; ?>" required />
        </td>
      </tr>   
      <tr>
        <td><label class="control-label"><b class="lang" key="year">Year</b></label></td>
        <td>
          <input class="form-control" type="text" name="year" value="<?php echo ''.$myrow['year'].''; ?>" required />
        </td>
      </tr> 
      <tr>
        <td><label class="control-label"><b class="lang" key="ac_year">Acadmic Year</b></label></td>
        <td>
          <input class="form-control" type="text" name="ac_year" value="<?php echo ''.$myrow['ac_year'].''; ?>" disabled />
        </td>
      </tr>
      <tr>
        <td><label class="control-label"><b class="lang" key="payment date">Payment Date </b></label></td>
        <td>
          <input class="form-control" type="text" name="ac_year" value="<?php echo ''.$myrow['payment_date'].''; ?>" disabled />
        </td>
      </tr>
      <tr>
        <td><label class="control-label"><b class="lang" key="photo">Photo</b></label></td>
        <td>
          
          <div class="form-group">
            <label for="inputfile"><b class="lang" key="upload photo">Upload Photo</b></label>
            <div class="fileupload fileupload-new" data-provides="fileupload">
              <div class="col-lg-4">
                <div class="fileupload-new thumbnail" style="width: 250px; height: 250px; line-height: 20px;"><img src="asset/image/images.jpeg" alt="" />
                </div>
                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 300px; max-height: 300px; line-height: 20px;">
                </div>
              </div>
              <div class="col-lg-4">
                <div>
                 <span class="btn btn-file btn-success" ><span class="fileupload-new"><b class="lang" key="select image">Select image</b></span><span class="fileupload-exists"><b class="lang" key="change">Change</b></span>
                 <input class="form-control" type="file" name="image" /> <?php echo '<img width="250" height="235" src="data:image;base64,'.$myrow["image"].'" />'; ?></span>
                 <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><b class="lang" key="remove">Remove</b></a>
               </div>
             </div> 
           </div>
         </div>
       </td>
     </tr>
     <tr>
      <td colspan="2">
        <center><button type="submit" name="update_ncsdata" class="btn btn-success">
          <span class="glyphicon glyphicon-save"></span> <b class="lang" key="change">Update</b></button>
          <a class="btn btn-danger" href="dtu_cafe_adminpage.php"> <span class="glyphicon glyphicon-backward"></span><b class="lang" key="cancle"> Cancel </b></a>
        </center>
      </td>
    </tr>
  </table>    
</form> 
<?php
}
}
else{
  ?>
  <div class="alert alert-danger alert-dismissible" rol="alert">
    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
    <strong> The Data has no Selected From the Database</strong> 
  </div>
  <?php
}  
}
?>
</div>
<!--........Editing page for Non Cafe Student DAATA........????-->
<!-- ......View page for Non Cafe Student profile.......-->
<?php
if(isset($_GET['view_ncsid'])){
  $id=$_GET['view_ncsid'];
  $query="SELECT * FROM non_cafe where stu_id = '$id'";
  $result=mysqli_query($conn,$query);
  if($result){
    while ($myrow = mysqli_fetch_assoc($result))
    {
     $sd=$myrow['stu_id'];
     $fn=$myrow['first_name'];
     $sx=$myrow['sex'];
     $em=$myrow['email'];
     $ph=$myrow['phone'];
     $f=$myrow['faculty'];
     $dep=$myrow['department'];
     $strm=$myrow['stream'];
     $stat=$myrow['status'];
     $py=$myrow['payment'];
     $y=$myrow['year'];
     $ay=$myrow['ac_year'];
     $pd=$myrow['payment_date'];
     $img=$myrow['image'];
     ?>
     <div class="container">
       <div class="alert alert-dismissable" style="color:white;background-color:#00cc99">
         <center><h4 class="lang" key="student profile display">Student Profile Display</h4></center>
       </div>
       
       <form method="post" action="data_managment.php" enctype="multipart/form-data" class="form-horizontal">
        
         <table class="table table-bordered table-responsive">
          <tr>
            <td><label class="control-label"><b class="lang" key="return">Return:</b></label></td>
            <td><a href="dtu_cafe_adminpage.php" class="btn btn-success btn-block"> <b class="lang" key="return to home page">Return to the Home Page</b></a></td>
          </tr>
          <tr>
            <td><label class="control-label"><b class="lang" key="id">Student ID:</b></label></td>
            <td><?php echo $sd; ?></td>
          </tr>
          <tr>
            <td><label class="control-label"><b class="lang" key="full name">Full Name:</b></label></td>
            <td><?php echo $fn; ?></td>
          </tr>
          <tr>
            <td><label class="control-label"><b class="lang" key="sex">Sex</b></label></td>
            <td>
             <?php echo ''.$myrow['sex'].''; ?>
           </td>
         </tr>
         <tr>
          <td><label class="control-label"><b class="lang" key="email">Email </b></label></td>
          <td>
           <?php echo ''.$myrow['email'].''; ?>
         </td>
       </tr>
       <tr>
        <td><label class="control-label"><b class="lang" key="phone">Mobile No</b></label></td>
        <td>
         <?php echo ''.$myrow['phone'].''; ?>
       </td>
     </tr>
     <tr>
      <td><label class="control-label"><b class="lang" key="faculty">Faculty</b></label></td>
      <td>
       <?php echo ''.$myrow['faculty'].''; ?>
     </td>
   </tr> 
   <tr>
    <td><label class="control-label"><b class="lang" key="department">Department</b></label></td>
    <td>
     <?php echo ''.$myrow['department'].''; ?>
   </td>
 </tr> 
 <tr>
  <td><label class="control-label"><b class="lang" key="stream">Specialization</b></label></td>
  <td>
    <?php echo ''.$myrow['stream'].''; ?>
  </td>
</tr>  
<tr>
  <td><label class="control-label"><b class="lang" key="year">Year</b></label></td>
  <td>
    <?php echo ''.$myrow['year'].''; ?>
  </td>
</tr> 
<tr>
  <td><label class="control-label"><b class="lang" key="ac_year">Acadmic Year</b></label></td>
  <td>
    <?php echo ''.$myrow['ac_year'].''; ?>
  </td>
</tr>
<tr>
  <td><label class="control-label"> <b class="lang" key="payment date">Payment Date</b></label></td>
  <td>
    <?php echo ''.$myrow['payment_date'].''; ?>
  </td>
</tr> 
<tr>
  <td><label class="control-label"> <b class="lang" key="photo">Student Photo</b></label></td>
  <td>
    
    <div class="col-lg-4">
      <div class="btn btn-file btn-success" >
       <?php echo '<img width="250" height="235" src="data:image;base64,'.$myrow["image"].'" />'; ?></div>
     </div> 
     <div class="col-lg-4">
      <a class="btn btn-danger" href="dtu_cafe_adminpage.php"> <span class="glyphicon glyphicon-backward"></span> <b class="lang" key="return to home page">Back To Student Managing Page </b></a>
    </div> 
  </td>
</tr>
<tr>
  <td colspan="2">       
    <center></center>
  </td>
</tr>
</table>
</form> 
<?php
}
}
else{
  ?>
  <div class="alert alert-danger alert-dismissible" rol="alert">
    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
    <strong> The Data has no Selected From the Database</strong> 
  </div>
  <?php
}  
}

?>
<!-- ........View page for Non Cafe Student profile .......????-->

<!--..........Editing page for Faculty DAATA.............-->
<?php
if(isset($_GET['edit_fid'])){
  $id=$_GET['edit_fid'];
  $query="SELECT * FROM faculty where faculty = '$id'";
  $result=mysqli_query($conn,$query);
  if($result){
    while ($myrow = mysqli_fetch_assoc($result))
    {
     $f=$myrow['faculty'];
     $dep=$myrow['status'];
     ?>
     <div class="container">
       <div class="alert alert-dismissable" style="color:white;background-color:#00cc99">
        <center><h4>Edit Faculty Data for DTU Meal Attendance Ssystem</h4></center>
      </div>
      <form method="post" action="view_and_edit_data.php" enctype="multipart/form-data" class="form-horizontal">
       <table class="table table-bordered table-responsive">
        <tr>
          <td><label class="control-label">Faculty</label></td>
          <td>
            <input class="form-control" type="text" name="faculty" value="<?php echo ''.$myrow['faculty'].''; ?>" required />
          </td>
        </tr> 
        <tr>
          <td><label class="control-label">Status</label></td>
          <td>
            <input class="form-control" type="text" name="status" value="<?php echo ''.$myrow['status'].''; ?>" required />
          </td>
        </tr> 
        <tr>
          <td colspan="2">
            <center><button type="submit" name="update_faculty" class="btn btn-success">
              <span class="glyphicon glyphicon-save"></span> Update </button>
              <a class="btn btn-danger" href="bwbfwifordtusadmin.php"> <span class="glyphicon glyphicon-backward"></span> Back </a>
            </center>
          </td>
        </tr>
      </table>
    </form> 
    <?php
  }
}
else{
  ?>
  <div class="alert alert-danger alert-dismissible" rol="alert">
    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
    <strong> The Data has no Selected From the Database</strong> 
  </div>
  <?php
}  
}
?>
</div>
<!--.....Editing page for Faculty DAATA................???-->

<!-- ... Editing query for  Faculty ......................-->
<?php
if(isset($_POST['update_faculty'])){
 $d=$_POST['faculty'];
 $s=$_POST['status'];
 $query="UPDATE faculty set status='$s' where faculty = '$d'";
 $result=mysqli_query($conn,$query);
 if($result){
  ?>
  <div class=container>
    <div class="alert alert-success alert-dismissible" rol="alert">
      <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
      <strong> Update Success</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      To close Success Message Press The  X  sign to the right side 

      <!--.....Editing page for Department DAATA..............-->
      <?php
      $query="SELECT * FROM  department where faculty = '$d'";
      $result=mysqli_query($conn,$query);
      if($result){
        while ($myrow = mysqli_fetch_assoc($result))
        {
         $pd=$myrow['department'];
         $fn=$myrow['faculty'];
         ?>
         <div class="alert alert-dismissable" style="color:white;background-color:#00cc99">
          <center><h4>You have to Edite the same data to this page for Department data</h4></center>
        </div>  
        <form method="post" action="view_and_edit_data.php" enctype="multipart/form-data" class="form-horizontal">
         <table class="table table-bordered table-responsive">
          <tr>
            <td ><label class="control-label">Department:</label></td>
            <td><input class="form-control" type="text" name="department" value="<?php echo $pd; ?>" required /></td>
          </tr>
          <tr>
            <td><label class="control-label">Faculty:</label></td>
            <td><input  class="form-control" type="text" name="faculty" value="<?php echo $fn; ?>" required /></td>
          </tr>    
          <tr>
            <td colspan="2"><center><button type="submit" name="update_department" class="btn btn-success">
              <span class="glyphicon glyphicon-save"></span> Update </button>        
              <a class="btn btn-danger" href="bwbfwifordtusadmin.php"> <span class="glyphicon glyphicon-backward"></span> Back </a>
            </center>
          </td>
        </tr>   
      </table>   
    </form> 
    <?php
  }
}
else{
  ?>
  <div class="alert alert-danger alert-dismissible" rol="alert">
    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
    <strong> The Data has no Selected From the Database</strong> 
  </div>
  <?php
}           
?>
<!--............. Editing page for Department DAATA.....?????-->
</div>
</div>
<?php
}
else{
  ?>
  <div class=container>
    <div class="alert alert-danger alert-dismissible" rol="alert">
      <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
      <strong> Update Faild Please try Again</strong> 
    </div>
  </div>
  <?php
}
}
?>
<!--..... Editing query for faculty..................?????-->

<!-- ........ edit User Acount..............-->
<?php
if(isset($_POST['edit_acount'])){
 $td=$_POST['username'];
 $fn=$_POST['password'];
 $sn=$_POST['usertype'];
 $ln=$_POST['status'];
 $query="UPDATE authentication set  password='$fn', usertype='$sn', status='$ln' where username = '$td'";
 $result=mysqli_query($conn,$query);
 if($result){
  ?>
  <div class="container">
    <div class="alert alert-success alert-dismissible" rol="alert">
      <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
      <strong> Update Success</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      To close Success Message Press The  X  sign to the right side 
      <a class="btn btn-danger" href="dtu_cafe_admin.php"> <span class="glyphicon glyphicon-backward"></span> Back</a>
    </div>

    <?php
  }
  else{
    ?>
    <div class="alert alert-danger alert-dismissible" rol="alert">
      <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
      <strong> Update Faild Please try Again</strong> 
    </div>
  </div>
  <?php
}

}
?>
<!-- ........ edit User Acount .......................?????-->

<!--/////// Editing page for User Acount  ////////////////-->
<?php
if(isset($_GET['edit_useracount'])){
  $user_id=$_GET['edit_useracount'];
  $query="SELECT * FROM authentication where username = '$user_id'";
  $result=mysqli_query($conn,$query);
  if($result){
    while ($myrow = mysqli_fetch_assoc($result))
    {
     $sd=$myrow['username'];
     $fn=$myrow['password'];
     $sx=$myrow['usertype'];
     ?>
     <div class="container">
       <div class="alert alert-dismissable" style="color:white;background-color:#00cc99">
        <center><h4>Edit User Acount for DTU Meal Attendance Ssystem</h4></center>
      </div>
      
      <form method="POST" action="view_and_edit_data.php" enctype="multipart/form-data" class="form-horizontal">
        
       <table class="table table-bordered table-responsive">
        

        <tr>
          <td><label class="control-label">User Name:</label></td>
          <td><input class="form-control" type="text" name="username" value="<?php echo $sd; ?>" required /></td>
        </tr>
        
        <tr>
          <td><label class="control-label">Password:</label></td>
          <td><input  class="form-control" type="text" name="password" value="<?php echo $fn; ?>" required /></td>
        </tr>
        <tr>
          <td><label class="control-label">User Type</label></td>
          <td>
            <input class="form-control" type="text" name="usertype" value="<?php echo ''.$myrow['usertype'].''; ?>" required />
          </td>
        </tr>
        <tr>
          <td><label class="control-label">User Status</label></td>
          <td>
           <div class="col-lg-5">
             <div class="form-group">
              <label class="checkbox-inline">Status</label>
              <!-- ////////////// Active And Inactive User ///////-->
              <?php
              $query="SELECT status FROM authentication where username='$user_id'";
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
            <!-- /////// Active And Inactive User //////////////-->
          </div>
        </div>
        <div class="col-lg-7">
          <div class="form-group">
            <label class="checkbox-inline">
              <input  type="radio" name="status" id="sexm" value="1" required> Activate
            </label>
            <label class="checkbox-inline">
              <input  type="radio" name="status" id="sexf" value="0" required> De_activate
            </label>
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <center><button type="submit" name="edit_acount" class="btn btn-success">
          <span class="glyphicon glyphicon-save"></span> Update </button>
          
          <a class="btn btn-danger" href="dtu_cafe_admin.php"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        </center>
      </td>
    </tr>
    
  </table>
  
</form> 

<?php
}
}
else{
  ?>
  <div class="alert alert-danger alert-dismissible" rol="alert">
    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
    <strong> The Data has no Selected From the Database</strong> 
  </div>
  <?php
}  
}

?>
<!--/ Editing page for User Acount  //////////////////////////////////////-->
</div>

<!-- ///// View page for User Acount /////////////////////-->
<?php
if(isset($_GET['view_useracount'])){
  $user_id=$_GET['view_useracount'];
  $query="SELECT * FROM authentication where username = '$user_id'";
  $result=mysqli_query($conn,$query);
  if($result){
    while ($myrow = mysqli_fetch_assoc($result))
    {
     $sd=$myrow['username'];
     $fn=$myrow['password'];
     $sx=$myrow['usertype'];
     $s=$myrow['status'];
     ?>
     <div class="container">
       <div class="alert alert-dismissable" style="color:white;background-color:#00cc99">
        <center><h4>View User Acount for DTU Meal Attendance System</h4></center>
      </div>
      
      <form method="post" action="dtu_cafe_admin.php" enctype="multipart/form-data" class="form-horizontal">
        
       <table class="table table-bordered table-responsive">
        

        <tr>
          <td><label class="control-label">User Name:</label></td>
          <td><?php echo $sd; ?></td>
        </tr>
        
        <tr>
          <td><label class="control-label">Password:</label></td>
          <td><?php echo $fn; ?></td>
        </tr>
        <tr>
          <td><label class="control-label">User Type</label></td>
          <td>
           <?php echo ''.$myrow['usertype'].''; ?>
         </td>
       </tr>
       <tr>
        <td><label class="control-label">User Status</label></td>
        <td>
         <?php
         $query="SELECT status FROM authentication where username='$user_id'";
         $result=mysqli_query($conn,$query);
         if($result){
           $st=mysqli_fetch_array($result);
           if($st['status'] ==1){
            echo '<img src="img/active.jpg">  &nbsp;  Active ';
          }
          else if($st['status'] ==0){
            echo '<img src="img/inactive.jpg">  &nbsp; Inactive ' ;
          }
          else
            echo "there is no availabe user";
        }
        ?>
      </td>
    </tr>
    <tr>
      <td colspan="2">       
        <center></center>
        
      </td>
    </tr>
    
  </table>
  
</form> 

<?php
}
}
else{
  ?>
  <div class="alert alert-danger alert-dismissible" rol="alert">
    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
    <strong> The Data has no Selected From the Database</strong> 
  </div>
  <?php
}  
}

?>
<!-- ////// View page for User Acount ////////////////-->
</div>

<!-- ...... editing query for staff user acount ...............-->
<?php
if(isset($_POST['edit_adminacount'])){
 $td=$_POST['username'];
 $fn=$_POST['password'];
 $sn=$_POST['usertype'];
 $st=$_POST['status'];
 $query="UPDATE user_acount set  password='$fn', usertype='$sn', status='$st' where username = '$td'";
 $result=mysqli_query($query);
 if($result){
  ?>
  <div class="container">
    <div class="alert alert-success alert-dismissible" rol="alert">
      <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
      <strong> Update Success</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      To close Success Message Press The  X  sign to the right side 
      <a class="btn btn-danger" href="dtu_cafe_admin.php"> <span class="glyphicon glyphicon-backward"></span> Back</a>
    </div>

    <?php
  }
  else{
    ?>
    <div class="alert alert-danger alert-dismissible" rol="alert">
      <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
      <strong> Update Faild Please try Again</strong> 
    </div>
  </div>
  <?php
}

}
?>
<!-- ..... editing query for staff user acount .............?????-->
<!--......Editing page for Staff User Acount ..........................-->
<?php
if(isset($_GET['edit_staffacount'])){
  $user_id=$_GET['edit_staffacount'];
  $query="SELECT * FROM user_acount where stu_id= '$user_id'";
  $result=mysqli_query($conn,$query);
  if($result){
    while ($myrow = mysqli_fetch_assoc($result))
    {
     $sd=$myrow['username'];
     $fn=$myrow['password'];
     $sx=$myrow['usertype'];
     ?>
     <div class="container">
       <div class="alert alert-dismissable" style="color:white;background-color:#00cc99">
        <center><h4>Edit Staff User Acount for DTU Barcode and Web Based Fast Work Implementation Ssystem</h4></center>
      </div>
      
      <form method="POST" action="view_and_edit_data.php" enctype="multipart/form-data" class="form-horizontal">
        
       <table class="table table-bordered table-responsive">
        

        <tr>
          <td><label class="control-label">User Name:</label></td>
          <td><input class="form-control" type="text" name="username" value="<?php echo $sd; ?>" required /></td>
        </tr>
        
        <tr>
          <td><label class="control-label">Password:</label></td>
          <td><input  class="form-control" type="text" name="password" value="<?php echo $fn; ?>" required /></td>
        </tr>
        <tr>
          <td><label class="control-label">User Type</label></td>
          <td>
            <input class="form-control" type="text" name="usertype" value="<?php echo ''.$myrow['usertype'].''; ?>" required />
          </td>
        </tr>
        <tr>
          <td><label class="control-label">User Status</label></td>
          <td>
           <div class="col-lg-5">
             <div class="form-group">
              <label class="checkbox-inline">Status</label>
              <!-- .............. Active And Inactive staff User ...............-->
              <?php
              $query="SELECT status FROM user_acount where stu_id='$user_id'";
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
            <!-- ....... Active And Inactive staff User ...??????-->
          </div>
        </div>
        <div class="col-lg-7">
          <div class="form-group">
            <label class="checkbox-inline">
              <input  type="radio" name="status" id="sexm" value="1" required> Activate
            </label>
            <label class="checkbox-inline">
              <input  type="radio" name="status" id="sexf" value="0" required> De_activate
            </label>
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <center><button type="submit" name="edit_adminacount" class="btn btn-success">
          <span class="glyphicon glyphicon-save"></span> Update </button>
          
          <a class="btn btn-danger" href="bwbfwifordtusadmin.php"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
        </center>
      </td>
    </tr>
    
  </table>
  
</form> 

<?php
}
}
else{
  ?>
  <div class="alert alert-danger alert-dismissible" rol="alert">
    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
    <strong> The Data has no Selected From the Database</strong> 
  </div>
  <?php
}  
}

?>
<!--.. Editing page for Staff User Acount .......................??????-->
</div>
<!--.....View page for Staff User Acount ..................-->
<?php
if(isset($_GET['view_staffacount'])){
  $user_id=$_GET['view_staffacount'];
  $query="SELECT * FROM user_acount where stu_id = '$user_id'";
  $result=mysqli_query($conn,$query);
  if($result){
    while ($myrow = mysqli_fetch_assoc($result))
    {
     $sd=$myrow['username'];
     $fn=$myrow['password'];
     $sx=$myrow['usertype'];
     $s=$myrow['status'];
     ?>
     <div class="container">
       <div class="alert alert-dismissable" style="color:white;background-color:#00cc99">
        <center><h4>View User Acount for DTU Meal Attendance System</h4></center>
      </div>
      
      <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
        
       <table class="table table-bordered table-responsive">
        

        <tr>
          <td><label class="control-label">User Name:</label></td>
          <td><?php echo $sd; ?></td>
        </tr>
        
        <tr>
          <td><label class="control-label">Password:</label></td>
          <td><?php echo $fn; ?></td>
        </tr>
        <tr>
          <td><label class="control-label">User Type</label></td>
          <td>
           <?php echo ''.$myrow['usertype'].''; ?>
         </td>
       </tr>
       <tr>
        <td><label class="control-label">User Status</label></td>
        <td>
         <?php
         $query="SELECT status FROM user_acount where stu_id='$user_id'";
         $result=mysqli_query($conn,$query);
         if($result){
           $st=mysqli_fetch_array($result);
           if($st['status'] ==1){
            echo '<img src="img/active.jpg">  &nbsp;  Active ';
          }
          else if($st['status'] ==0){
            echo '<img src="img/inactive.jpg">  &nbsp; Inactive ' ;
          }
          else
            echo "there is no availabe user";
        }
        ?>
      </td>
    </tr>
    <tr>
      <td colspan="2">       
        <center></center>
      </td>
    </tr>
  </table>
</form> 
<?php
}
}
else{
  ?>
  <div class="alert alert-danger alert-dismissible" rol="alert">
    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
    <strong> The Data has no Selected From the Database</strong> 
  </div>
  <?php
}  
}
?>
<!-- ........View page for Staff User Acount ............????????-->
</div>

<div class="container">
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
<script>
</script>
</body>
</html>