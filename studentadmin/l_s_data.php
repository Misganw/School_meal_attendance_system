<?php
session_start();
include ('database_conn.php');
if($_SESSION['usertype']!='1'){
  header("Location: http://localhost/school_meal");
}
error_reporting(false)
?>
<!-- .....................................................Book  Registration....................................-->
<?php
if(isset($_POST['insert_bookdata']))

{
  $sd=$_POST['b_serial'];
  $fn=$_POST['b_name'];
  $em = $_POST['b_auther'];
  $ph = $_POST['b_edition'];
  $f=$_POST['faculty'];
  $dep=$_POST['department'];
  $strm=$_POST['stream'];
  $y=$_POST['year'];
  $check_student = "SELECT * FROM book_table WHERE b_serial = '$sd'";
  $run=mysqli_query($conn,$check_student);
  if(mysqli_num_rows($run)>0)
  {
    echo"<script> alert ('Book registered before')</script>";
    echo"<script>window.open('dtu_library_admin.php','_self')</script>";
  }
  else{
   $query=mysqli_query($conn,"INSERT INTO book_table (b_serial,b_name ,b_auther, b_edition, faculty,department,stream,year,ac_year) VALUES ('$sd','$fn','$em','$ph', '$f','$dep','$strm','$y', NOW())") ;
   if($query){
    echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('The data you enter is Registered successfully')</script></b></h3></body>";
    echo"<script>window.open('dtu_library_admin.php','_self')</script>";
  }
  else
   echo "hello misganaw the qeury is invalid </br> ";
}
}
?>
<!-- .....................................................Book  Registration....................................?????-->
<!-- ...................................... Book Borrowing for student.......................................-->
<?php
if(isset($_POST['borrow']))
{
  $stid = $_POST['stu_id'];
  $serial = $_POST['b_serial'];
  $dd = $_POST['deadline'];
  $check_student = "SELECT * FROM book_table WHERE b_serial = '$serial'";
  $run=mysqli_query($conn,$check_student );
  if($run)
  {
    while($row=mysqli_fetch_assoc($run)){
      $bs=$row['b_serial'];
      $b_name=$row['b_name'];
      $be=$row['b_edition'];
      $cheek_id = "SELECT * FROM stu_data where stu_id = '$stid'";
      $run_query=mysqli_query($conn,$cheek_id);
      if($run_query)
      {
        while($row=mysqli_fetch_assoc($run_query)){
          $sid=$row['stu_id'];
          $s_name=$row['first_name'];
          $fac=$row['department'];
          $save="INSERT into student_borrow (b_serial,b_name, b_edition, stu_id, first_name, department, b_date, deadline) VALUES ('$serial',
          '$b_name','$be','$stid', '$s_name', '$fac', NOW(),'$dd')";
          $result=mysqli_query($conn,$save);   
          if($result){
            echo "<script>alert('Data saved sucess fully!')</script>";
            echo"<script>window.open('dtu_library_bookborrowing.php','_self')</script>";
          }
          else 
            echo '<script>alert("The data Are not inserted")</script>';
          echo"<script>window.open('book_borrowing.php','_self')</script>";  
        }
      }
      else
        echo '<script>alert("The Student Id Are not found at Student data")</script>';
      echo"<script>window.open('book_borrowing.php','_self')</script>"; 
    }
  }
  else
    echo '<script>alert("The Book Id Are not found at Book data")</script>';
  echo"<script>window.open('book_borrowing.php','_self')</script>"; 
}
?>
<!-- ......................................Book Borrowing for Student.......................................?????-->
<!-- ...................................... Book Borrowing for staff.......................................-->
<?php
if(isset($_POST['staff_borrow']))
{
  $stid = $_POST['stu_id'];
  $serial = $_POST['b_serial'];
  $dd = $_POST['deadline'];
  $check_student = "SELECT * FROM book_table WHERE b_serial = '$serial'";
  $run=mysqli_query($conn,$check_student );
  if($run)
  {
    while($row=mysqli_fetch_assoc($run)){
      $bs=$row['b_serial'];
      $b_name=$row['b_name'];
      $be=$row['b_edition'];
      $cheek_id = "SELECT * FROM staff_table where stu_id = '$stid'";
      $run_query=mysqli_query($cheek_id);
      if($run_query)
      {
        while($row=mysqli_fetch_assoc($run_query)){
          $sid=$row['stu_id'];
          $s_name=$row['first_name'];
          $fac=$row['department'];
          $save="INSERT into staff_borrow (b_serial,b_name, b_edition, stu_id, first_name, department, b_date, deadline) VALUES ('$serial',
          '$b_name','$be','$stid', '$s_name', '$fac', NOW(),'$dd')";
          $result=mysqli_query($conn,$save);   
          if($result){
            echo "<script>alert('Data saved sucess fully!')</script>";
            echo"<script>window.open('dtu_library_bookborrowing.php','_self')</script>";
          }
          else 
            echo '<script>alert("The data Are not inserted")</script>';
          echo"<script>window.open('staffbook_borrowing.php','_self')</script>";  
        }
      }
      else
        echo '<script>alert("The Student Id Are not found at Student data")</script>';
      echo"<script>window.open('staffbook_borrowing.php','_self')</script>"; 
    }
  }
  else
    echo '<script>alert("The Book Id Are not found at Book data")</script>';
  echo"<script>window.open('staffbook_borrowing.php','_self')</script>"; 
}
?>
<!-- ......................................Book Borrowing for Staffs.......................................?????-->

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
<!--....................................... Device Ragistration for employees  .....................................???-->

