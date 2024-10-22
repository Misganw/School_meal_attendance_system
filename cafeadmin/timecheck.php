  <?php
    
       include('database_conn.php');
           $qry=mysqli_query($conn,"SELECT start_time, deadline from time_boundary WHERE type='dinner' ");
              if($qry){
              while ($myrow = mysqli_fetch_assoc($qry))
    {
      $st=$myrow['start_time'];
       $dt=$myrow['deadline'];
  if($st < DATE('h:i:s a') AND $dt > DATE('h:i:s a')){
       echo "the time is not pass";
       }
       else
        echo "the time is already pass";
       }
     }
      if(isset($_POST['time_dinner'])){
     $t=$_POST['type'];
    $st=$_POST['start_time'];
    $dl=$_POST['deadline'];
   $qry=mysqli_query($conn,"INSERT INTO time_boundary (type, start_time, deadline) VALUES ('$t', $st','$dl')");
   if($qry){
    ?>
     <div class="alert alert-success alert-dismissible" rol="alert">
                <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
              <strong> Time Boundary Inserted Successfully</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
               &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
               &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br> <br> 
              To close Success Message Press The  X  sign to the right side 
              </div>
    <?php
   }
   else
    echo "No Insertion";
  }
    ?>
    
<form action="timecheck.php" method="POST" >
              <div class="form-group">
                 <label for="starttime">Select Time Boundary type:</label>
              <input type="text" name="type" placeholder="Enter time_boundary type..." id="starttime"> 
            </div>
              <div class="form-group">
                 <label for="starttime">Starting Time:</label>
              <input type="text" name="start_time" placeholder="Enter Starting Time..." id="starttime"> 
            </div>
            <div class="form-group">
                 <label for="endtime">Ending Time:</label>
              <input type="text" name="deadline" placeholder="Enter Ending Time..." id="endtime">
            </div>
               <div class="form-group">
            <div class="col-lg-6">
              <button type="submit" name="time_dinner" class="btn btn-success"> <span class="glyphicon glyphicon-save"></span> Save Time </button>
              
            </div>
          </div>
          <div class="form-group">
             <div class="col-lg-6">
            <button type="reset" name="" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp; Cancle</button>
          </div>
        </div>
           </form>


