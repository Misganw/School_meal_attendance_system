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
<!-- ..................Student Registration....................................-->
<?php
if(isset($_POST['insert_studata']))

{
  $sd=$_POST['stu_id'];
  $fn=$_POST['first_name'];
  $sx = $_POST['sex'];
  $em=$_POST['email'];
  $ph=$_POST['phone'];
  $f=$_POST['school'];
  $dep=$_POST['grade'];
  $strm=$_POST['section'];
  $check_student = "SELECT * FROM stu_data WHERE stu_id = '$sd'";
  $run=mysqli_query($conn,$check_student);
  if(mysqli_num_rows($run)>0)
  {
    echo"<script> alert ('student registered before')</script>";
    echo"<script>window.open('student_service_admin.php','_self')</script>";
  }
  else
  {
      $maxsize = 500242880; // 500MB
       $name = $_FILES['image']['name'];
       $target_dir = "../photo/";
       $target_file = $target_dir . $_FILES["image"]["name"];

       // Select file type
       $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("jpg","png","jpeg");

       // Check extension
       if( in_array($videoFileType,$extensions_arr) )
       {
          // Check file size
        if(($_FILES['image']['size'] >= $maxsize) || ($_FILES["image"]["size"] == 0)) 
        {
          echo "File too large. File must be less than 5MB.";
        }
        else
        {
            // Upload
          if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file))
          {
              // Insert record
           $query=mysqli_query($conn,"INSERT INTO stu_data (stu_id,first_name, sex, email, phone, school,grade,section,image,ac_year, status,ec) VALUES ('$sd','$fn','$sx', '$em', '$ph','$f','$dep','$strm','$name',NOW(), '1', NOW())") ;
            if($query)
            {
                         echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('The Student are Registered successfully')</script></b></h3></body>";
                           echo"<script>window.open('student_service_admin.php','_self')</script>";
            }
            else
            {
                        echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('The Student are not Registered ')</script></b></h3></body>";
                        echo"<script>window.open('student_service_admin.php','_self')</script>";
            }
          }
        }

      }
      else
      {
        echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('Invalid File Extension')</script></b></h3></body>";
                        echo"<script>window.open('student_service_admin.php','_self')</script>";

      }
}


}
?>
<!-- ...............Student Registration...................?????-->



<!--.......... Student Registration for Device ...............-->
<?php
if(isset($_POST['insert_studentdata']))
{
  $stid = $_POST['stu_id'];
  $serial = $_POST['pc_serial'];
  $stat=$_POST['status'];
  $check_stu = "SELECT * FROM staffpc_data WHERE pc_serial = '$serial'";
  $run=mysqli_query($conn,$check_stu );
  if(mysqli_num_rows($run)>0)
  {
    echo"<script> alert ('The electronics device registered before in Staff Data')</script>";
    echo"<script>window.open('stupc_control_and_registration.php','_self')</script>";
  }
  else{
    $check_student = "SELECT * FROM student_data WHERE pc_serial = '$serial'";
    $run=mysqli_query($conn,$check_student );
    if(mysqli_num_rows($run)>0)
    {
      echo"<script> alert ('The electronics device registered before')</script>";
      echo"<script>window.open('stupc_control_and_registration.php','_self')</script>";
    }
    else{
      $cheek_id = "SELECT * FROM stu_data where stu_id = '$stid'";
      $run_query=mysqli_query($conn,$cheek_id);
      if($run_query)
      {
        while($row=mysqli_fetch_assoc($run_query)){
          $sid=$row['stu_id'];
          $s_name=$row['first_name'];
          $s=$row['sex'];
          $fac=$row['faculty'];
          $dep=$row['department'];
          $strm=$row['stream'];
          $img=$row['image'];
          $save="INSERT into student_data (pc_serial, stu_id, first_name, sex, faculty, department, stream, status, image, ac_year) VALUES 
          ('$serial','$stid', '$s_name', '$s', ' $fac', ' $dep', ' $strm', '$stat', ' $img', NOW())";
          $result=mysqli_query($conn,$save);   
          if($result){
            echo "<script>alert('Data saved sucess fully!')</script>";
            echo"<script>window.open('stupc_control_and_registration.php','_self')</script>";
          }
          else
            echo '<script>alert("The data Are not inserted")</script>';
          echo"<script>window.open('stupc_control_and_registration.php','_self')</script>";
        }
      }
      else
        echo '<script>alert("The Id Are not found at Student data")</script>';
      echo"<script>window.open('stupc_control_and_registration.php','_self')</script>"; 

    }
  }
}
?>
<!--.......... Student Registration for Device.........................???-->

<!--................ Device Ragistration for Students  .........................???-->
<?php
if(isset($_POST['insert_studentpcdata']))
{
  $serial = $_POST['pc_serial'];
  $pcname = $_POST['pc_name'];
  $core = $_POST['cpu_lavel'];

  $check_student = "SELECT * FROM stupc_table WHERE pc_serial = '$serial'";
  $run=mysqli_query($conn,$check_student );
  if(mysqli_num_rows($run)>0)
  {
    echo"<script> alert ('The electronics device registered before')</script>";
    echo"<script>window.open('stupc_control_and_registration.php','_self')</script>";
  }
  else {
    $cheek_id = "SELECT * FROM student_data where pc_serial = '$serial'";
    $run_query=mysqli_query($conn,$cheek_id);
    if($run_query)
    {
      while($row=mysqli_fetch_assoc($run_query)){
        $bid=$row['pc_serial'];
        $sid=$row['stu_id'];
        $s_name=$row['first_name'];
        $stat=$row['status'];
        $save="INSERT into stupc_table (pc_serial, stu_id, first_name, status, pc_name, cpu_lavel) VALUES ('$serial','$sid', '$s_name', '$stat', ' $pcname', ' $core')";
        $result=mysqli_query($conn,$save);   
        if($result){
          echo "<script>alert('Data saved sucess fully!')</script>";
          echo"<script>window.open('stupc_control_and_registration.php','_self')</script>";
        }
        else
        {
          echo "<script>alert('The data Are not inserted')</script>";
          echo"<script>window.open('stupc_control_and_registration.php','_self')</script>";
        }
      }
    }
    else
      echo "<script>alert('Id Are not found at Student data')</script>";
    echo"<script>window.open('stupc_control_and_registration.php','_self')</script>"; 
  }
} 
?>
<!--........... Device Ragistration for Students ........................???-->

<!-- ..................Setting Registration....................................-->
<?php
if(isset($_POST['insert_setting']))

{
  $sn=$_POST['name'];
 
  $check_student = "SELECT * FROM setting WHERE name = '$sn'";
  $run=mysqli_query($conn,$check_student);
  if(mysqli_num_rows($run)>0)
  {
    echo"<script> alert ('School registered before')</script>";
    echo"<script>window.open('student_service_admin.php','_self')</script>";
  }
  else
  {
      $maxsize = 500242880; // 500MB
       $name = $_FILES['image']['name'];
       $target_dir = "../setting/";
       $target_file = $target_dir . $_FILES["image"]["name"];

       // Select file type
       $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("jpg","png","jpeg");

       // Check extension
       if( in_array($videoFileType,$extensions_arr) )
       {
          // Check file size
        if(($_FILES['image']['size'] >= $maxsize) || ($_FILES["image"]["size"] == 0)) 
        {
          echo "File too large. File must be less than 5MB.";
        }
        else
        {
            // Upload
          if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file))
          {
              // Insert record
           $query=mysqli_query($conn,"INSERT INTO setting (name,image) VALUES ('$sn','$name')") ;
            if($query)
            {
                         echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('The School is Registered successfully')</script></b></h3></body>";
                           echo"<script>window.open('student_service_admin.php','_self')</script>";
            }
            else
            {
                        echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('The School is not Registered ')</script></b></h3></body>";
                        echo"<script>window.open('student_service_admin.php','_self')</script>";
            }
          }
        }

      }
      else
      {
        echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('Invalid File Extension')</script></b></h3></body>";
                        echo"<script>window.open('student_service_admin.php','_self')</script>";

      }
}


}
?>
<!-- ...............Student Registration...................?????-->


 <!--................ edit query for setting.....................-->
  <?php
  if(isset($_POST['update_setting']))
  {
      $id=$_POST['id'];
      $sn=$_POST['name'];

       $maxsize = 500242880; // 500MB
       $name = $_FILES['image']['name'];
       $target_dir = "../setting/";
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
          echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('Logo size is too large. please minimize and try agin ')</script></b></h3></body>";
                        echo"<script>window.open('student_service_admin.php','_self')</script>";
        }
        else
        {
            // Upload
          if(move_uploaded_file($_FILES['image']['tmp_name'],$target_file))
          {
           $query="UPDATE setting set name='$sn',image='$name' where id = '$id'";
           $result=mysqli_query($conn,$query);
           if($result)
           {
            echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('Update Success')</script></b></h3></body>";
                        echo"<script>window.open('student_service_admin.php','_self')</script>";
          }
          else
          {
            echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('Update faile try again ')</script></b></h3></body>";
                        echo"<script>window.open('student_service_admin.php','_self')</script>";
          }
        }
      }
    }
    else
    {
      $query="UPDATE setting set name='$sn' where id = '$id'";
           $result=mysqli_query($conn,$query);
           if($result)
           {
            echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('Update Success')</script></b></h3></body>";
                        echo"<script>window.open('student_service_admin.php','_self')</script>";
          }
          else
          {
            echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('Update faile try again ')</script></b></h3></body>";
                        echo"<script>window.open('student_service_admin.php','_self')</script>";
          }

    }
  }
  ?>
  <!--................................. edit query for setting ..............................................??????-->
