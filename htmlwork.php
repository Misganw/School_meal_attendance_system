<?php
session_start();
include ('database_conn.php');
error_reporting(false)
?>
<div id="source-html">

 <center>
   <?php
              //include('database_conn.php');
   $result = mysqli_query($conn,"SELECT * FROM stu_data");
   $num_rows = mysqli_num_rows($result);

   echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
   &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";

   ?>
   <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables">
    <thead>
      <tr>
        <th class="lang" key="id">Student Id</th>
        <th class="lang" key="full name">Full Name</th>
        <th class="lang" key="sex">Sex</th>
        <th class="lang" key="faculty">Faculty</th>
        <th class="lang" key="year">Year</th>
        <th class="lang" key="ac_year">Ac_Year</th>
        <th class="lang" key="status">Students status</th>                                     
        <th class="lang" key="action">Action</th>
      </tr>
    </thead>
    <tbody>

     <?php
                //include('database_conn.php');
     $check_data = "SELECT * FROM stu_data ORDER BY first_name ASC ";
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
         <td><?php echo ''.$row['faculty'].''; ?></td>
         <td><?php echo ''.$row['year'].''; ?></td>
         <td><?php echo ''.$row['ac_year'].''; ?></td>
         <form clas="form-horizontal" action="student_service_support.php" method="post">
          <td>
            <select style="width: 25px" name="stu_id">
              <option value="<?php echo $row['stu_id'];?>"><?php echo $row['stu_id'];?> </option>; 
            </select>
            &nbsp;&nbsp;&nbsp;
            <?php
            $query="SELECT status FROM stu_data where stu_id='$std'";
            $result=mysqli_query($conn,$query);
            if($result){
             $st=mysqli_fetch_array($result);
             if($st['status'] ==1)
             {
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
          $q=mysqli_query($conn,"UPDATE stu_data SET  status='$st'  WHERE stu_id='$std'");
          if($q){
            echo '<script>alert("changed")</script>';
            echo"<script>window.open('student_service_support.php','_self')</script>";
          }
          else
            echo '<script>alert("Not changed")</script>';
          echo"<script>window.open('student_service_support.php','_self')</script>";
        }
        ?>
      </td> 
      <td>
        <div class='btn-group' rol='group' area-level='.....'>
          <a href="view_and_edit_data.php?view_stuid=<?php echo $row['stu_id' ]; ?> " data-toggle="modal" class="btn btn-success btn-sm"> <span class='glyphicon glyphicon-eye-open'></span></a>
          <a class="btn btn-info btn-sm edit-data" href="view_and_edit_data.php?edit_stuid=<?php echo $row['stu_id' ]; ?>" title="click for edit" onclick="return confirm('Are you sure edit this item?')"><span class='glyphicon glyphicon-edit' area-hidden='true'></span></a>
          <a class="btn btn-danger btn-sm" href="?delete_stuid=<?php echo $row['stu_id']; ?>" title="click for delete" onclick="return confirm('Are you sure to remove this customer?')"><span class='glyphicon glyphicon-trash'></span></a>
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
</center>
</div>
<div class="content-footer">
 <button id="btn-export" onclick="exportHTML();">Export to
  word doc</button>
</div>
<script>
  function exportHTML(){
   var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' "+
   "xmlns:w='urn:schemas-microsoft-com:office:word' "+
   "xmlns='http://www.w3.org/TR/REC-html40'>"+
   "<head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";
   var footer = "</body></html>";
   var sourceHTML = header+document.getElementById("source-html").innerHTML+footer;

   var source = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(sourceHTML);
   var fileDownload = document.createElement("a");
   document.body.appendChild(fileDownload);
   fileDownload.href = source;
   fileDownload.download = 'document.doc';
   fileDownload.click();
   document.body.removeChild(fileDownload);
 }
</script>