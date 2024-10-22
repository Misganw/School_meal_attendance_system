<?php
error_reporting(false)
?>
<?php
include('database_conn.php');
?>
<!-- .....................................................Student Registration....................................-->
<?php
if(isset($_POST['insert_studata']))

{
  $sd=$_POST['stu_id'];
  $fn=$_POST['first_name'];
  $sx = $_POST['sex'];
  $em=$_POST['email'];
  $ph=$_POST['phone'];
  $f=$_POST['faculty'];
  $dep=$_POST['department'];
  $strm=$_POST['stream'];
  $y=$_POST['year'];
  $check_student = "SELECT * FROM stu_data WHERE stu_id = '$sd'";
  $run=mysqli_query($conn,$check_student);
  if(mysqli_num_rows($run)>0)
  {
    echo"<script> alert ('student registered before')</script>";
    echo"<script>window.open('dtu_cafe_admin.php','_self')</script>";
  }
  else{
   if(getimagesize($_FILES['image']['tmp_name'])==false){
     echo "<script>alert('Please fill photo of student')</script>";
   }
   else{
     $image=addslashes($_FILES['image']['tmp_name']);
     $name=addslashes($_FILES['image']['name']);
     $image=file_get_contents($image);
     $image=base64_encode($image);
     $query=mysqli_query($conn,"INSERT INTO stu_data (stu_id,first_name, sex, email, phone, faculty,department,stream,year,image,ac_year) VALUES ('$sd','$fn','$sx', '$em', '$ph','$f','$dep','$strm','$y','$image',NOW())") ;
     if($query){
      echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('The Student are Registered successfully')</script></b></h3></body>";
      echo"<script>window.open('dtu_student_registration.php','_self')</script>";
    }
    else
      echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('The Student are not Registered ')</script></b></h3></body>";
    echo"<script>window.open('dtu_student_registration.php','_self')</script>";
  }
}
}
?>
<!-- .....................................................Student Registration....................................?????-->
<!-- .....................................................Staff  Registration....................................-->
<?php
if(isset($_POST['insert_staffdata']))

{
  $sd=$_POST['stu_id'];
  $fn=$_POST['first_name'];
  $sx = $_POST['sex'];
  $em = $_POST['email'];
  $ph = $_POST['phone'];
  $f=$_POST['faculty'];
  $dep=$_POST['department'];
  $strm=$_POST['stream'];
  $check_student = "SELECT * FROM staff_table WHERE stu_id = '$sd'";
  $run=mysqli_query($conn,$check_student);
  if(mysqli_num_rows($run)>0)
  {
    echo"<script> alert ('Staff registered before')</script>";
    echo"<script>window.open('bwbfwidtusa.php','_self')</script>";
  }
  else{
   if(getimagesize($_FILES['image']['tmp_name'])==false){
     echo "<script>alert('Please fill photo of student')</script>";
   }
   else{
     $image=addslashes($_FILES['image']['tmp_name']);
     $name=addslashes($_FILES['image']['name']);
     $image=file_get_contents($image);
     $image=base64_encode($image);
     $query=mysqli_query($conn,"INSERT INTO staff_table (stu_id,first_name, sex,email, phone, faculty,department,stream,image,ac_year) VALUES ('$sd','$fn','$sx','$em','$ph', '$f','$dep','$strm','$image', NOW())") ;
     if($query){
      echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('The data you enter is Registered successfully')</script></b></h3></body>";
      echo"<script>window.open('bwbfwidtusastr.php','_self')</script>";
    }
    else
     echo "hello misganaw the qeury is invalid </br> ";
 }
}
}
?>
<!-- .............................Staff  Registration................?????-->

<?php
if(isset($_POST['save_tiker'])){
  $td=$_POST['employee_id'];
  $fn=$_POST['first_name'];
  $po=$_POST['position'];
  $sx=$_POST['sex'];

  $check_student = "SELECT * FROM tiker_data WHERE employee_id = '$td'";
  $run=mysqli_query($conn,$check_student);
  if(mysqli_num_rows($run)>0)
  {
    echo"<script> alert ('The tiker registered before')</script>";
    echo"<script>window.open('bwbfwidtusastr.php','_self')</script>";
  }
  else{
    if(getimagesize($_FILES['image']['tmp_name'])==false){
     echo "<script>alert('Please fill photo of student');</script>";
   }
   else{
     $image=addslashes($_FILES['image']['tmp_name']);
     $name=addslashes($_FILES['image']['name']);
     $image=file_get_contents($image);
     $image=base64_encode($image);
     $query="INSERT INTO tiker_data (employee_id,first_name,position,sex, image) VALUES ('$td','$fn','$po','$sx','$image')" ;
     if(mysqli_query($conn,$query)){
      echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('The data you enter is Registered successfully')</script></b></h3></body>";
      echo" <script>window.open('bwbfwidtusastr.php','_self')</script>";
   //echo "<body ><br><h3 style='color:cyan;'><b> INFORMATION IS SAVED</b></h3></body>";
    }
    else  echo "hello misganaw the qeury is invalid";
  }
}
}
?>
<!-- ................. Employee Registration for PC........................-->
<?php
if(isset($_POST['insert_empdata']))
{
  $stid = $_POST['stu_id'];
  $serial = $_POST['pc_serial'];
  $stat=$_POST['status'];
  $check_student = "SELECT * FROM staffpc_data WHERE pc_serial = '$serial'";
  $run=mysqli_query($conn,$check_student );
  if(mysqli_num_rows($run)>0)
  {
    echo"<script> alert ('The electronics device registered before')</script>";
    echo"<script>window.open('stupc_control_and_registration.php','_self')</script>";
  }
  else{
    $cheek_id = "SELECT * FROM staff_table where stu_id = '$stid'";
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
        $save="INSERT into staffpc_data (pc_serial, stu_id, first_name, sex, faculty, department, stream, status, image, ac_year) VALUES ('$serial','$stid', '$s_name', '$s', ' $fac', ' $dep', ' $strm', '$stat', ' $img', NOW())";
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
?>
<!-- ...................................... Employee Registration for PC.......................................?????-->

<!--....................................... Device Ragistration for employees  .....................................???-->
<?php
if(isset($_POST['insert_emppcdata']))
{
  $serial = $_POST['pc_serial'];
  $pcname = $_POST['pc_name'];
  $core = $_POST['cpu_lavel'];

  $check_student = "SELECT * FROM emppc_table WHERE pc_serial = '$serial'";
  $run=mysqli_query($conn,$check_student );
  if(mysqli_num_rows($run)>0)
  {
    echo"<script> alert ('The electronics device registered before')</script>";
    echo"<script>window.open('stupc_control_and_registration.php','_self')</script>";
  }
  else{
    $cheek_id = "SELECT * FROM staffpc_data where pc_serial = '$serial'";

    $run_query=mysqli_query($conn,$cheek_id);

    if($run_query)
    {
      while($row=mysqli_fetch_assoc($run_query)){
        $bid=$row['pc_serial'];
        $sid=$row['stu_id'];
        $s_name=$row['first_name'];
        $stat=$row['status'];
        $save="INSERT into emppc_table (pc_serial, stu_id, first_name, status, pc_name, cpu_lavel) VALUES ('$serial','$sid', '$s_name', '$stat', ' $pcname', ' $core')";

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
      echo '<script>alert("The Id Are not found at Staff data")</script>';
    echo"<script>window.open('stupc_control_and_registration.php','_self')</script>"; 
  }
} 
?>
<!--.............. Device Ragistration for employees  ..................???-->

<!--........... Student Registration for Device ..............???-->
<?php
if(isset($_POST['insert_studentdata']))
{
  $stid = $_POST['stu_id'];
  $serial = $_POST['pc_serial'];
  $stat=$_POST['status'];
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
?>
<!--....................................... Student Registration for Device.....................................???-->
<!--....................................... Device Ragistration for Students  .....................................???-->
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
  else{
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
         
          echo '<script>alert("The data Are not inserted")</script>';
        echo"<script>window.open('stupc_control_and_registration.php','_self')</script>";
        
      }
    }
    else
      echo '<script>alert("The Id Are not found at Staff data")</script>';
    echo"<script>window.open('stupc_control_and_registration.php','_self')</script>"; 
  }
} 
?>
<!--....................................... Device Ragistration for Students  .....................................???-->
<!--....................................... None cafe student Registration .......................................-->
<?php
if(isset($_POST['insert_ncsdata']))
{
  $sd = $_POST['stu_id'];
  $stat=$_POST['status'];
  $py=$_POST['payment'];
  $check = "SELECT * FROM non_cafe WHERE stu_id = '$sd'";
  $run=mysqli_query($conn,$check);
  if(mysqli_num_rows($run)>0)
  {
    echo"<script> alert ('The Student are None cafe before')</script>";
    echo"<script>window.open('dtu_cafe_adminpage.php','_self')</script>";
  }
  else{
    $cheek_id = "SELECT * FROM stu_data where stu_id = '$sd'";
    $run_query=mysqli_query($conn,$cheek_id);
    if($run_query)
    {
      while($row=mysqli_fetch_assoc($run_query)){
        $sid=$row['stu_id'];
        $s_name=$row['first_name'];
        $s=$row['sex'];
        $em=$row['email'];
        $ph=$row['phone'];
        $fac=$row['faculty'];
        $dep=$row['department'];
        $strm=$row['stream'];
        $img=$row['image'];
        $save="INSERT into non_cafe(stu_id, first_name, sex, email, phone, faculty, department, stream, image, ac_year, status, payment, payment_date) VALUES ('$sid', '$s_name', '$s', '$em','$ph', '$fac', '$dep', '$strm', '$img', NOW(), '$stat','$py', NOW())";
        $result=mysqli_query($conn,$save);   
        if($result){
          echo "<script>alert('Data saved sucess fully!')</script>";
          echo"<script>window.open('dtu_cafe_adminpage.php','_self')</script>";
        }
        else
          echo '<script>alert("The data Are not inserted")</script>';
        echo"<script>window.open('dtu_cafe_adminpage.php','_self')</script>";
      }
    }
    else
      echo '<script>alert("The Id Are not found at Student data")</script>';
    echo"<script>window.open('dtu_cafe_adminpage.php','_self')</script>"; 

  }
}
?>
<!--....................................... None cafe student Registration .....................................???-->
<?php
if(isset($_POST['save_acount']))
{
 $un=$_POST['username'];
 $pd=$_POST['password'];
 $ut=$_POST['usertype'];
 $check_data = "SELECT * FROM authentication WHERE username = '$un'";
 $run=mysqli_query($conn,$check_data);
 if(mysqli_num_rows($run)>0)
 {
  echo"<script> alert ('The user Acount is registered before this time')</script>";
  echo"<script>window.open('dtu_cafe_admin.php','_self')</script>";
}
else
 $query="INSERT INTO authentication (username,password,usertype) VALUES ('$un','$pd','$ut')" ;
if(mysqli_query($conn,$query)){
  echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('The user Acount you enter is saved successfully')</script></b></h3></body>";
  echo" <script>window.open('dtu_cafe_admin.php','_self')</script>";
   //echo "<body ><br><h3 style='color:cyan;'><b> INFORMATION IS SAVED</b></h3></body>";
}
else  echo "<body ><br><h3 style='color:cyan;'><b>hello User the qeury is invalid</b></h3></body>";
}
?>
<!--........................................Insert time boundary.........................................-->
<?php
if(isset($_POST['time']))
{
 $un=$_POST['type'];
 $pd=$_POST['start_time'];
 $ut=$_POST['deadline'];
 $check_data = "SELECT * FROM time_boundary WHERE type = '$un'";
 $run=mysqli_query($conn,$check_data);
 if(mysqli_num_rows($run)>0)
 {
  echo"<script> alert ('The Time is registered before this time')</script>";
  echo"<script>window.open('dtu_cafe_admin.php','_self')</script>";
}
else{
 $query="INSERT INTO time_boundary (type,start_time,deadline) VALUES ('$un','$pd','$ut')" ;
 if(mysqli_query($conn,$query)){
  echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('The Time you enter is saved successfully')</script></b></h3></body>";
  echo" <script>window.open('dtu_cafe_admin.php','_self')</script>";
   //echo "<body ><br><h3 style='color:cyan;'><b> INFORMATION IS SAVED</b></h3></body>";
}
else  echo "<body ><br><h3 style='color:cyan;'><b>hello User the qeury is invalid</b></h3></body>";
}
}
?>
      <!--........................................Insert time boundary.........................................?????-->