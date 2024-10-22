<!-- /////////////////////////////////////////////// php for Breakfast Report ////////////////////////////////////////////////-->
<?php
error_reporting(false)
?>
<?php
include('database_conn.php');
session_start();

?>


<!-- /////////////////////////////////////////////// php for Lunch Report ////////////////////////////////////////////////-->
<?php
if(isset($_POST['from_lunch'], $_POST['to_lunch'])){
  $query= mysqli_query($conn,"SELECT stu_id, first_name, grade, COUNT(*) FROM lunch WHERE d_date BETWEEN '".$_POST['from_lunch']."' AND '".$_POST['to_lunch']."' GROUP BY stu_id");
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
    <div class="form-group">
     <?php echo ' <center><strong><em>Name of Reporter</em>:  '.$_SESSION["username"].'</strong> </center>';?>
     <?php echo '<br> <center><strong><em>Luch Report from</em>:  '.$_POST["from_lunch"].' To '.$_POST["to_lunch"].'</strong> </center>';?>
   </div>

   <?php
   echo "<center>";
   echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
   <strong> $num_rows    Students Are Available between The specified Date in Lunch data<strong>";
    echo "</center>";
    ?>
    <center>
      <table class="table table-striped table-bordered table-hover table-responsive">
        <tr>
          <th>Id</th>
          <th>Full Name</th>
          <th>Grade</th>
          <th>Total Meal</th>
        </tr>
        <?php
        while($row = mysqli_fetch_assoc($query)){
        //echo $row ;
          ?>
          <tr>
            <td> <?php echo $row['stu_id'];?> </td>
            <td> <?php echo $row['first_name'];?> </td>
            <td> <?php echo $row['grade'];?> </td>
            <td> <?php echo $row['COUNT(*)'];?> </td>
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
<!-- /////////////////////////////////////////////// php for Lunch Report ////////////////////////////////////////////////-->
