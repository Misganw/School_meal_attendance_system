<!-- /////////////////////////////////////////////// php for Breakfast Report ////////////////////////////////////////////////-->
<?php
session_start();
if(isset($_POST['from'], $_POST['to']))
{
  include('database_conn.php');
  $query= mysqli_query($conn,"SELECT * FROM breakfast WHERE d_date BETWEEN '".$_POST['from']."' AND '".$_POST['to']."'");
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
   <?php echo '<center><br><strong><em>Breakfast Report from</em>:  '.$_POST["from"].' To '.$_POST["to"].'</strong> </center>';?>
   <?php
   echo "<center>";
   echo " <strong> $num_rows    Students Are Available between The specified Date in Breakfast data<strong>";
   echo "</center>";
   ?>
   <center>
     <table class="table table-striped table-bordered table-hover table-responsive">
      <tr>
        <th>Id</th>
        <th>Date</th>
      </tr>
      <?php
      while($row = mysqli_fetch_assoc($query)){
        //echo $row ;
        ?>
        <tr>
          <td> <?php echo $row['stu_id'];?> </td>
          <td> <?php echo $row['d_date'];?> </td>
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
<!-- /////////////////////////////////////////////// php for Breakfast Report ////////////////////////////////////////////////-->

<!-- /////////////////////////////////////////////// php for Lunch Report ////////////////////////////////////////////////-->
<?php
if(isset($_POST['from_lunch'], $_POST['to_lunch'])){
  $query= mysqli_query($conn,"SELECT * FROM lunch WHERE d_date BETWEEN '".$_POST['from_lunch']."' AND '".$_POST['to_lunch']."'");
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
          <th>Date</th>
        </tr>
        <?php
        while($row = mysqli_fetch_assoc($query)){
        //echo $row ;
          ?>
          <tr>
            <td> <?php echo $row['stu_id'];?> </td>
            <td> <?php echo $row['d_date'];?> </td>
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

<!-- /////////////////////////////////////////////// php for Dinner Report ////////////////////////////////////////////////-->
<?php
if(isset($_POST['from_dinner'], $_POST['to_dinner'])){
  $query= mysqli_query($conn,"SELECT * FROM dinner WHERE d_date BETWEEN '".$_POST['from_dinner']."' AND '".$_POST['to_dinner']."'");
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
     <?php echo '<center><strong><em>Name of Reporter</em>:  '.$_SESSION["username"].'</strong></center>';?>
     <?php echo '<br><center><strong><em>Dinner Report from</em>:  '.$_POST["from_dinner"].' To '.$_POST["to_dinner"].'</strong></center>';?>
   </div>
   <?php
   echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
   <strong> $num_rows    Students Are Available between The specified Date in Dinner data<strong>";

    ?>
    <center>
      <table class="table table-striped table-bordered table-hover table-responsive">
        <tr>
          <th>Id</th>
          <th>Date</th>
        </tr>
        <?php
        while($row = mysqli_fetch_assoc($query)){
        //echo $row ;
          ?>
          <tr>
            <td> <?php echo $row['stu_id'];?> </td>
            <td> <?php echo $row['d_date'];?> </td>
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
<!-- /////////////////////////////////////////////// php for Dinner Report ////////////////////////////////////////////////-->