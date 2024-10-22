<!-- //////////////////// php for non cafe Report /////////////////////-->
<?php
error_reporting(false)
?>
<?php
include('database_conn.php');
session_start();
if($_SESSION['usertype']!=5){
  header("Location: http://localhost/dtu/dtu_cafe_adminpage.php");
}
if(isset($_POST['from_n'], $_POST['to_n'])){
  $query= mysqli_query($conn,"SELECT * FROM non_cafe WHERE ac_year BETWEEN '".$_POST['from_n']."' AND '".$_POST['to_n']."'");
  if( $query){
   ?>
   <?php 
   $num_rows = mysqli_num_rows($query);
   ?>
   <?php
   $Today=date('y:m:d');
   $new=date('l, F d, Y',strtotime($Today));
   echo '<center><strong><em>Date of Report</em>:</strong> </center>';
   echo '<center><strong><em>'.$new.'</em>:</strong> </center>';
   ?>
   <?php echo '<center><strong><em>Name of Reporter</em>:  '.$_SESSION["username"].'</strong> </center>';?>
   <?php echo '<center><br><strong><em>Non Cafe Student Report from</em>:  '.$_POST["from_n"].' To '.$_POST["to_n"].'</strong> </center>';?>
   <?php
   echo "<center>";
   echo " <strong> $num_rows    Students Are Available between The specified Date in Non cafe data<strong>";
   echo "</center>";
   ?>
   <center>
     <table class="table table-striped table-bordered table-hover table-responsive">
      <tr>
        <th>Student Id</th>
        <th>Full Name</th>
        <th>Faculty</th>
        <th>Department</th>
        <th>Sex</th>
        <th>Registered Date</th>
      </tr>
      <?php
      while($row = mysqli_fetch_assoc($query)){
        //echo $row ;
        ?>
        <tr>
          <td> <?php echo $row['stu_id'];?> </td>
          <td> <?php echo $row['first_name'];?> </td>
          <td> <?php echo $row['faculty'];?> </td>
          <td> <?php echo $row['department'];?> </td>
          <td> <?php echo $row['sex'];?> </td>
          <td> <?php echo $row['ac_year'];?> </td>
        </tr>
        <?php
      }
      ?>
    </table>
  </center>
  <?php
}
}
?>
<!-- /////php for Breakfast Report ////////////////////////////////////////-->
