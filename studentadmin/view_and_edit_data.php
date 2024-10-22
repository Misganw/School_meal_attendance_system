<?php
error_reporting(false)
?>
<?php
session_start();
include ('database_conn.php');
if($_SESSION['usertype']!='1'){
  header("Location: http://localhost/school_meal");
}
?>
<html>
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
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/clockface.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Start WOWSlider.com HEAD section -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">

  <link rel="stylesheet" type="text/css" href="engine1/style.css" />
  <script type="text/javascript" src="engine1/jquery.js"></script>
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
        <li><a style="color:white;font-size:14px;font-family:italic" href="view_and_edit_data.php"><p class="lang" key="home">Home  </p></a></li>
        <li><a style="color:white;font-size:14px;font-family:italic" href=""><p><em class="lang" key="logedas">Loged As:- </em>
          <?php echo ''.$_SESSION["username"].'';?></p></a></li>
          <li><a style="color:white;font-size:14px;font-family:italic" href="logout_user.php"><p class="lang" key="logout">Logout</p></a></li>
          <li class=""><a style="color:white;font-size:14px;font-family:italic" href=""><p><b>
            <?php
              /*date_default_timezone_set("Africa/Addis_ababa");
              echo "<em>".date('Y/m/d ')."</em><br><br>";*/
              echo "Date :-  ";
              $Today=date('y:m:d');
              $new=date('l, F d, Y',strtotime($Today));
              echo $new;
              ?>
            </b></p></a></li>            
        </ul>
      </div>

    </nav>
  </div>

  <!--................ edit query for student profile......................-->
  <?php
  if(isset($_POST['update_studata'])){
   $td=$_POST['stu_id'];
   $fn=$_POST['first_name'];
   $sx=$_POST['sex'];
   $em=$_POST['email'];
   $ph=$_POST['phone'];
   $f=$_POST['school'];
   $dep=$_POST['grade'];
   $strm=$_POST['section'];
   $ay=$_POST['ac_year'];
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
           $query="UPDATE stu_data set first_name='$fn', sex='$sx', email='$em', phone='$ph', school='$f',grade='$dep',section='$strm',ac_year=NOW(),image='$name' where stu_id = '$td'";
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
            <div class="container">
              <div class="alert alert-danger alert-dismissible" rol="alert">
                <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
                <strong> Update Faild Please try Again</strong> 
                ######<a href="student_service_admin.php"><button class="btn btn-success">Back</button></a>
              </div>
            </div>
            <?php
          }
        }
      }
    }
    else
    {
      $query="UPDATE stu_data set first_name='$fn', sex='$sx', email='$em', phone='$ph', school='$f',grade='$dep',section='$strm',ac_year=NOW() where stu_id = '$td'";
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
            <div class="container">
              <div class="alert alert-danger alert-dismissible" rol="alert">
                <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
                <strong> Update Faild Please try Again</strong> 
                ######<a href="student_service_admin.php"><button class="btn btn-success">Back</button></a>
              </div>
            </div>
            <?php
          }

    }
  }
  ?>
  <!--................................. edit query for student profile..............................................??????-->

  <!--...........................................Editing page for Student DAATA....................................-->
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
       $f=$myrow['school'];
       $dep=$myrow['grade'];
       $strm=$myrow['section'];
       $ay=$myrow['ac_year'];
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
            <td><a href="student_service_admin.php" class="btn btn-success btn-block"> <b class="lang" key="return to home page"> Return to the Home Page</b></a></td>
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
              <input class="form-control" type="email" name="email" value="<?php echo ''.$myrow['email'].''; ?>" />
            </td>
          </tr>
          <tr>
            <td><label class="control-label"><b class="lang" key="phone">Mobile No</b></label></td>
            <td>
              <input class="form-control" type="text" name="phone" value="<?php echo ''.$myrow['phone'].''; ?>"  />
            </td>
          </tr>
          <tr>
            <td><label class="control-label"><b class="lang" key="faculty">School</b></label></td>
            <td>
              <input class="form-control" type="text" name="school" value="<?php echo ''.$myrow['school'].''; ?>" required />
            </td>
          </tr> 
          <tr>
            <td><label class="control-label"><b class="lang" key="department">Grade</b></label></td>
            <td>
              <input class="form-control" type="text" name="grade" value="<?php echo ''.$myrow['grade'].''; ?>" required />
            </td>
          </tr> 
          <tr>
            <td><label class="control-label"><b class="lang" key="stream">Section</b></label></td>
            <td>
              <input class="form-control" type="text" name="section" value="<?php echo ''.$myrow['section'].''; ?>" />
            </td>
          </tr>  
          <tr>
            <td><label class="control-label"><b class="lang" key="ac_year">Acadmic Year</b></label></td>
            <td>
              <input class="form-control" type="text" name="ac_year" value="<?php echo ''.$myrow['ac_year'].''; ?>" required />
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
                      <input class="form-control" type="file" name="image" /> 
                      <img src="../photo/<?php echo $img;?>"  controls width='250' height='235' >  </span>
                      <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><b class="lang" key="remove">Remove</b></a>
                    </div>
                  </div> 
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <center><button type="submit" name="update_studata" class="btn btn-success">
                <span class="glyphicon glyphicon-save"></span> <b class="lang" key="change">Update</b> </button>
                <a class="btn btn-danger" href="student_service_admin.php"> <span class="glyphicon glyphicon-backward"></span> <b class="lang" key="cancle"> Cancel </b> </a>
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
<!--....Editing page for Student DAATA...................................????-->



<!-- ...View page for Student profile....................................-->
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
     $f=$myrow['school'];
     $dep=$myrow['grade'];
     $strm=$myrow['section'];
     $ay=$myrow['ac_year'];
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
          <td><a href="student_service_admin.php" class="btn btn-success btn-block">  <b class="lang" key="return to home page">Return to the Home Page</b></a></td>
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
    <td><label class="control-label"><b class="lang" key="faculty">School Name</b></label></td>
    <td>
     <?php echo ''.$myrow['school'].''; ?>
   </td>
 </tr> 
 <tr>
  <td><label class="control-label"><b class="lang" key="department">Grade</b></label></td>
  <td>
   <?php echo ''.$myrow['grade'].''; ?>
 </td>
</tr> 
<tr>
  <td><label class="control-label"><b class="lang" key="stream">Section</b></label></td>
  <td>
    <?php echo ''.$myrow['section'].''; ?>
  </td>
</tr>
<tr>
  <td><label class="control-label"><b class="lang" key="ac_year">Acadmic Year</b></label></td>
  <td>
    <?php echo ''.$myrow['ac_year'].''; ?>
  </td>
</tr>
<tr>
  <td><label class="control-label"> <b class="lang" key="photo">Student Photo</b></label></td>
  <td>
    <div class="col-lg-4">
      <div class="btn btn-file btn-success" >
       <img src="../photo/<?php echo $img;?>"  controls width='250' height='235' >  </span>
       </div>
     </div> 
     <div class="col-lg-4">
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
<!-- .......View page for Student profile ...........................????-->
</div>







  <!--................ edit query for Staff profile......................-->
  <?php
  if(isset($_POST['update_staff'])){
   $td=$_POST['stu_id'];
   $fn=$_POST['first_name'];
   $sx=$_POST['sex'];
   $em=$_POST['email'];
   $ph=$_POST['phone'];
   $f=$_POST['school'];
   $jl=$_POST['job_level'];
   $p=$_POST['position'];
   $ay=$_POST['ac_year'];
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
           $query="UPDATE staff_table set first_name='$fn', sex='$sx', email='$em', phone='$ph', school='$f',job_level='$jl',position='$p',ac_year=NOW(),image='$name' where stu_id = '$td'";
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
            <div class="container">
              <div class="alert alert-danger alert-dismissible" rol="alert">
                <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
                <strong> Update Faild Please try Again</strong> 
                ######<a href="staff_admin.php"><button class="btn btn-success">Back</button></a>
              </div>
            </div>
            <?php
          }
        }
      }
    }
    else
    {
      $query="UPDATE staff_table set first_name='$fn', sex='$sx', email='$em', phone='$ph', school='$f',job_level='$jl',position='$p',ac_year=NOW() where stu_id = '$td'";
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
            <div class="container">
              <div class="alert alert-danger alert-dismissible" rol="alert">
                <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
                <strong> Update Faild Please try Again</strong> 
                ######<a href="staff_admin.php"><button class="btn btn-success">Back</button></a>
              </div>
            </div>
            <?php
          }

    }
  }
  ?>
  <!--................................. edit query for Staff profile..............................................??????-->

  <!--...........................................Editing page for Staff DAATA....................................-->
  <?php
  if(isset($_GET['edit_stafdata'])){
    $id=$_GET['edit_stafdata'];
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
       $f=$myrow['school'];
       $jl=$myrow['job_level'];
       $p=$myrow['position'];
       $ay=$myrow['ac_year'];
       $img=$myrow['image'];
       ?>
       <div class="container">
         <div class="alert alert-dismissable" style="color:white;background-color:#00cc99">
          <center><h4 class="lang" key="edit student profile">Edit Staff Profile</h4></center>
        </div>

        <form method="post" action="view_and_edit_data.php" enctype="multipart/form-data" class="form-horizontal">

         <table class="table table-bordered table-responsive">
          <tr>
            <td><label class="control-label"><b class="lang" key="return">Return:</b></label></td>
            <td><a href="staff_admin.php" class="btn btn-success btn-block"> <b class="lang" key="return to home page"> Return to the Home Page</b></a></td>
          </tr>
          <tr>
            <td><label class="control-label"><b class="lang" key="id">Staff ID:</b></label></td>
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
              <input class="form-control" type="email" name="email" value="<?php echo ''.$myrow['email'].''; ?>" />
            </td>
          </tr>
          <tr>
            <td><label class="control-label"><b class="lang" key="phone">Mobile No</b></label></td>
            <td>
              <input class="form-control" type="text" name="phone" value="<?php echo ''.$myrow['phone'].''; ?>"  />
            </td>
          </tr>
          <tr>
            <td><label class="control-label"><b class="lang" key="stream">School</b></label></td>
            <td>
              <input class="form-control" type="text" name="school" value="<?php echo ''.$myrow['school'].''; ?>" />
            </td>
          </tr>
          <tr>
            <td><label class="control-label"><b class="lang" key="faculty">Job Level</b></label></td>
            <td>
              <input class="form-control" type="text" name="job_level" value="<?php echo ''.$myrow['job_level'].''; ?>" required />
            </td>
          </tr> 
          <tr>
            <td><label class="control-label"><b class="lang" key="department">Position</b></label></td>
            <td>
              <input class="form-control" type="text" name="position" value="<?php echo ''.$myrow['position'].''; ?>" required />
            </td>
          </tr>   
          <tr>
            <td><label class="control-label"><b class="lang" key="ac_year">Acadmic Year</b></label></td>
            <td>
              <input class="form-control" type="text" name="ac_year" value="<?php echo ''.$myrow['ac_year'].''; ?>" required />
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
                      <input class="form-control" type="file" name="image" /> 
                      <img src="../staff_photo/<?php echo $img;?>"  controls width='250' height='235' >  </span>
                      <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><b class="lang" key="remove">Remove</b></a>
                    </div>
                  </div> 
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <center><button type="submit" name="update_staff" class="btn btn-success">
                <span class="glyphicon glyphicon-save"></span> <b class="lang" key="change">Update</b> </button>
                <a class="btn btn-danger" href="staff_admin.php"> <span class="glyphicon glyphicon-backward"></span> <b class="lang" key="cancle"> Cancel </b> </a>
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
<!--....Editing page for Staff DAATA...................................????-->



<!-- ...View page for Staff profile....................................-->
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
     $f=$myrow['school'];
     $jl=$myrow['job_level'];
     $p=$myrow['position'];
     $ay=$myrow['ac_year'];
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
          <td><a href="staff_admin.php" class="btn btn-success btn-block">  <b class="lang" key="return to home page">Return to the Home Page</b></a></td>
        </tr>

        <tr>
          <td><label class="control-label"><b class="lang" key="id">Staff ID:</b></label></td>
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
    <td><label class="control-label"><b class="lang" key="faculty">School Name</b></label></td>
    <td>
     <?php echo ''.$myrow['school'].''; ?>
   </td>
 </tr> 
 <tr>
  <td><label class="control-label"><b class="lang" key="department">Job Label</b></label></td>
  <td>
   <?php echo ''.$myrow['job_level'].''; ?>
 </td>
</tr> 
<tr>
  <td><label class="control-label"><b class="lang" key="stream">Position</b></label></td>
  <td>
    <?php echo ''.$myrow['position'].''; ?>
  </td>
</tr>
<tr>
  <td><label class="control-label"><b class="lang" key="ac_year">Acadmic Year</b></label></td>
  <td>
    <?php echo ''.$myrow['ac_year'].''; ?>
  </td>
</tr>
<tr>
  <td><label class="control-label"> <b class="lang" key="photo">Staff Photo</b></label></td>
  <td>
    <div class="col-lg-4">
      <div class="btn btn-file btn-success" >
       <img src="../staff_photo/<?php echo $img;?>"  controls width='250' height='235' >  </span>
       </div>
     </div> 
     <div class="col-lg-4">
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
<!-- .......View page for Staff profile ...........................????-->
</div>


<!-- ......... editing query for staff user acount ........-->
<?php
if(isset($_POST['edit_adminacount'])){
  $password = "{SSHA}sNPmYlrgdn2ilaU7ByklSuXNlclqdQ==";
  function hash_password($password)
  {
    $salt='dtu';
    return '{SSHA}'.base64_encode(sha1($password.$salt,TRUE).$salt);
  }
  $td=$_POST['username'];
  $pass=$_POST['password'];
  $hash_pass=hash_password($pass);
  $sn=$_POST['usertype'];
  $st=$_POST['status'];
  $query="UPDATE user_acount set  password='$hash_pass', usertype='$sn', status='$st' where username = '$td'";
  $result=mysqli_query($conn,$query);
  if($result){
    ?>
    <div class="container">
      <div class="alert alert-success alert-dismissible" rol="alert">
        <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
        <strong class="lang" key="update success"> Update Success</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        To close Success Message Press The  X  sign to the right side 
        <a class="btn btn-success" href="student_service_admin.php"> <span class="glyphicon glyphicon-backward"></span> Back</a>
      </div>
      <?php
    }
    else{
      ?>
      <div class="alert alert-danger alert-dismissible" rol="alert">
        <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
        <strong class="lang" key="update faild try again"> Update Faild Please try Again</strong> 
        #####<a href="student_service_admin.php" class="btn btn-success">back</a>
      </div>
    </div>
    <?php
  }
}
?>
<!-- ........... editing query for staff user acount .............?????-->
<!--.......Editing page for Staff User Acount ....................-->
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
        <center><h4 class="lang" key="edit acount">Edit Staff User Acount </h4></center>
      </div>
      <form method="POST" action="view_and_edit_data.php" enctype="multipart/form-data" class="form-horizontal">
       <table class="table table-bordered table-responsive">
        <tr>
          <td><label class="control-label"><b class="lang" key="return">Return:</b></label></td>
          <td><a href="student_service_admin.php" class="btn btn-success btn-block"><b class="lang" key="return to home page"> Return to the Home Page</b></a></td>
        </tr>
        <tr>
          <td><label class="control-label"><b class="lang" key="user name">User Name:</b></label></td>
          <td><input class="form-control" type="text" name="username" value="<?php echo $sd; ?>"  /></td>
        </tr>
        <tr>
          <td><label class="control-label"><b class="lang" key="password">Password:</b></label></td>
          <td><input  class="form-control" type="text" name="password" required /></td>
        </tr>
        <tr>
          <td><label class="control-label"><b class="lang" key="user type">User Type:</b></label></td>
          <td>
            <input class="form-control" type="text" name="usertype" value="<?php echo ''.$myrow['usertype'].''; ?>" required />
          </td>
        </tr>
        <tr>
          <td><label class="control-label"><b class="lang" key="status">User Status</b></label></td>
          <td>
           <div class="col-lg-5">
             <div class="form-group">
              <label class="checkbox-inline"><b class="lang" key="status">Status</b></label>
              <!-- .................................. Active And Inactive staff User ..........................................-->
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
            <!-- ................. Active And Inactive staff User ..................??????-->
          </div>
        </div>
        <div class="col-lg-7">
          <div class="form-group">
            <label class="checkbox-inline">
              <input  type="radio" name="status" id="sexm" value="1" required> <b class="lang" key="active">Activate</b>
            </label>
            <label class="checkbox-inline">
              <input  type="radio" name="status" id="sexf" value="0" required> <b class="lang" key="deactive">De_activate</b>
            </label>
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <center><button type="submit" name="edit_adminacount" class="btn btn-success">
          <span class="glyphicon glyphicon-save"></span> <b class="lang" key="change">Update</b> </button>
          <a class="btn btn-danger" href="student_service_admin.php"> <span class="glyphicon glyphicon-backward"></span> <b class="lang" key="cancle">Cancel</b> </a>
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
<!--.Editing page for Staff User Acount ...........??????-->
</div>
<!--.View page for Staff User Acount ..........-->
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
        <center><h4 class="lang" key="view acount">View User Acount </h4></center>
      </div> 
      <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
       <table class="table table-bordered table-responsive">
        <tr>
          <td><label class="control-label"><b class="lang" key="return">Return:</b></label></td>
          <td><a href="student_service_admin.php" class="btn btn-success btn-block"> <b class="lang" key="return to home page">Return to the Home Page</b></a></td>
        </tr>
        <tr>
          <td><label class="control-label"><b class="lang" key="user name">User Name:</b></label></td>
          <td><?php echo $sd; ?></td>
        </tr>
        <tr>
          <td><label class="control-label"><b class="lang" key="password">Password:</b></label></td>
          <td><?php echo $fn; ?></td>
        </tr>
        <tr>
          <td><label class="control-label"> <b class="lang" key="user type">User Type:</b></label></td>
          <td>
           <?php echo ''.$myrow['usertype'].''; ?>
         </td>
       </tr>
       <tr>
        <td><label class="control-label"><b class="lang" key="status">User Status:</b></label></td>
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
</div>
<!-- .View page for Staff User Acount ..........................????????-->

<div class="container">
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