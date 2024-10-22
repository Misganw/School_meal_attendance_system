<!DOCTYPE html>
<html>
<?php
session_start();
include ('database_conn.php');
if($_SESSION['usertype']!='1'){
  header("Location: http://localhost/school_meal");
}
error_reporting(false)
?>
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

  <!-- Start WOWSlider.com HEAD section -->
  <link rel="stylesheet" type="text/css" href="engine1/style.css" />
  <script type="text/javascript" src="engine1/jquery.js"></script>
  <!-- MetisMenu CSS -->
  <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
  <script type="text/javascript" src=vendor/jquery/jquery.min.js></script>
  <script type="text/javascript" src=lang_translate.js></script>
  <!-- Custom CSS -->
  <link href="dist/css/sb-admin-2.css" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="vendor/morrisjs/morris.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <link href="vendor/datatables-plugins/dataTables.bootstrap.css"  rel="stylesheet">
  <link href="vendor/datatables-responsive/dataTables.responsive.css"  rel="stylesheet">
  <link href="vendor/datatables/css/dataTables.bootstrap.min.css"  rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap-fileupload.min.css" rel="stylesheet" type="text/css">
  <!-- Start WOWSlider.com HEAD section -->
  <link rel="stylesheet" type="text/css" href="engine1/style.css" />
  <script type="text/javascript" src="engine1/jquery.js"></script>
  <!-- End WOWSlider.com HEAD section -->
  <style>
    ul.wysihtml5-toolbar > li
    {
      position: relative;
    }


  </style>
  <style type="text/css">
   table.center{
    width: 70%
    margin-left: 15%;
    margin-right: 15%;
  } 
</style>
</head>
<body style="background-color: white">
	<?php

	?>
	<div class="container">
    <div class="row">
      <aside>
        <div class="col-md-6">
          <div class="form-group">
            <h4 class="lang" key="">School</h4>
          </div>
          <form action="print_student_id.php" method="POST">
            <div class="form-group">
              <div class="input-group custom-search-form">
                <select class="form-control" name="school" placeholder="Search..." >
                  <option class="lang" key="select faculty"  value="">select School here</option>
                  <?php
                  $query="SELECT * from setting ORDER BY name ASC";
                  $res = mysqli_query($conn,$query);
                  if($res){
                    $count=mysqli_num_rows($res);
                    if($count>=1)
                    {
                      while($row=mysqli_fetch_assoc($res)){

                       ?>
                       <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?> </option>;
                       <?php

                     }
                   }
                   else{
                    echo '<option value="">faculty is not available';
                  }
                }
                ?>
              </select>
              <span class="input-group-btn">
                <button class="btn btn-success" name="by_school" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </div>
        </form>

        <div class="form-group">
          <h4 class="lang" key="department">Grade</h4>
        </div>
     <form action="print_student_id.php" method="POST">
        <div class="form-group">
          <div class="input-group custom-search-form">
            <select class="form-control" name="grade" placeholder="Search...">
             <option>Select Grade</option>
              <option value="0">Grade 0</option>
              <option value="1">Grade 1</option>
              <option value="2">Grade 2</option>
              <option value="3">Grade 3</option>
              <option value="4">Grade 4</option>
              <option value="5">Grade 5</option>
              <option value="6">Grade 6</option>
              <option value="7">Grade 7</option>
              <option value="8">Grade 8</option>
              <option value="9">Grade 9</option>
              <option value="10">Grade 10</option>
              <option value="11">Grade 11</option>
              <option value="12">Grade 12</option>
           </select>
          <span class="input-group-btn">
            <button class="btn btn-success" name="by_grade" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </div>
    </form> 
    <div class="form-group">
      <h4 class="lang" key="year">Section</h4>
    </div>
    <form action="print_student_id.php" method="POST">
      <div class="form-group">
        <div class="input-group custom-search-form">
          <input type="text" name="section" class="form-control"  placeholder="Enter section (Example: A,B,C....)">
          <span class="input-group-btn">
            <button class="btn btn-success" name="by_section" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </div>
    </form>
    </div>
  </aside>
 <div class="col-md-6">
 <form action="print_student_id.php" method="POST">
  <div class="form-group">
    <h4 class="lang" key="school">School</h4>
  </div>
  <div class="form-group">
    <select name="school" class="form-control" >
      <option class="lang" key="select school"  value="">select school here</option>
      <?php
      $query="SELECT * from setting ORDER BY name ASC";
      $res = mysqli_query($conn,$query);
      if($res){
        $count=mysqli_num_rows($res);
        if($count>=1){
          while($row=mysqli_fetch_assoc($res)){
           ?>
           <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?> </option>;
           <?php 
         }
       }
       else{
        echo '<option value="">school is not available';
      }
    }
    ?>
  </select>
</div>
<div class="form-group">
  <h4 class="lang" key="grade">grade</h4>
</div>
<div class="form-group">
     <select class="form-control" name="grade" placeholder="Search grade...">
    <option>Select Grade</option>
    <option value="0">Grade 0</option>
    <option value="1">Grade 1</option>
    <option value="2">Grade 2</option>
    <option value="3">Grade 3</option>
    <option value="4">Grade 4</option>
    <option value="5">Grade 5</option>
    <option value="6">Grade 6</option>
    <option value="7">Grade 7</option>
    <option value="8">Grade 8</option>
    <option value="9">Grade 9</option>
    <option value="10">Grade 10</option>
    <option value="11">Grade 11</option>
    <option value="12">Grade 12</option>
    </select>
</div>
<div class="form-group">
  <h4 class="lang" key="year">Section</h4>
</div>
<div class="form-group">
  <div class="input-group custom-search-form">
    <input type="text" name="section" class="form-control"  placeholder="Enter section (Example: A,B,C....)">
    <span class="input-group-btn">
      <button class="btn btn-success" name="by_whole" type="submit">
        <i class="fa fa-search"></i>
      </button>
    </span>
  </div>
</div>
</form>
</div>
</div>
<div class="row">
  <div class="col-md-2">
    <button onclick="printContent('print_id')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
  </div>
  <div class="col-md-2">
   <a class="btn btn-primary" key="" href="student_id_manipulation.php" class="btn btn-primary">Back</a >
   </div>
 </div>
 <div id="print_id">
  <center>
    <!--print id by Faculty-->
    <?php
    if(isset($_POST['by_school']))
    {
      $fac=$_POST['school'];
      $query="SELECT * FROM stu_data where ec=(select MAX(ec)) AND school='$fac' AND status='1'";
      $result=mysqli_query($conn,$query);
      if($result)
      {
        while ($myrow=mysqli_fetch_assoc($result)) 
        {
          extract($myrow);

          ?> 
          <table id="center" class="display nowrap" style="width:60px; height:40px">
            <thead>
             <tr>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <center>
              <tr>
                <td style="width:60%" colspan="2"><img src="../img/id_header.jpg" style="max-width:340px"></td>
              </tr>
              <tr>
                <td style="width:60%" colspan="2"><?php echo '<b>Full Name : '.$myrow['first_name'].'</b>'; ?></td>
              </tr>
              <tr>
                <td style="width:60%" colspan="2"><?php echo '<b>Grade : '.$myrow['grade'].'</b>'; ?></td>
              </tr>
              <tr>
                <td style="width:70%; height:60%">
                  <?php
                  $Today=date('d:m:y');
                  ?>
                  <?php echo '<b>Issue date : '.$Today.'</b>'; ?>  
                  <?php echo '<br>';?>
                  <?php echo '<br>';?>
                </td>
                <td style="width:28%" rowspan="2">
                <img src="../photo/<?php echo $myrow['image']?>" style="max-width:220px;max-height:115px"  />
               </td>
             </tr>
             <tr>
              <td style="width:70%; height:30%" >
                <?php
                $text=$myrow['stu_id'];
                echo "<img src='barcode.php?codetype=Code128&size=40&text=".$text."&print=true'/>";
                ?>
              </td>
            </tr> 
          </center>     
        </tbody>
      </table>

      <hr style="font-weight: 3px;color: blue;width: 32%">
      <?php
    }
  }
}
?>
<!--print id by Faculty//-->

    <!--print id by department-->
    <?php
    if(isset($_POST['by_grade']))
    {
      $dep=$_POST['grade'];
      $query="SELECT * FROM stu_data WHERE grade='$dep' and ec=(select MAX(ec))  AND status='1'";
      $result=mysqli_query($conn,$query);
      if($result)
      {
        while ($myrow=mysqli_fetch_assoc($result)) 
        {
          extract($myrow);

          ?> 
          <table id="center" class="display nowrap" style="width:60px; height:40px">
            <thead>
             <tr>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <center>
              <tr>
                <td style="width:60%" colspan="2"><img src="../img/id_header.jpg" style="max-width:340px"></td>
              </tr>
              <tr>
                <td style="width:60%" colspan="2"><?php echo '<b>Full Name : '.$myrow['first_name'].'</b>'; ?></td>
              </tr>
              <tr>
                <td style="width:60%" colspan="2"><?php echo '<b>Grade : '.$myrow['grade'].'</b>'; ?></td>
              </tr>
              <tr>
                <td style="width:70%; height:60%">
                  <?php
                  $Today=date('d:m:y');
                  ?>
                  <?php echo '<b>Issue date : '.$Today.'</b>'; ?>  
                  <?php echo '<br>';?>
                  <?php echo '<br>';?>
                </td>
                <td style="width:28%" rowspan="2">
                <img src="../photo/<?php echo $myrow['image']?>" style="max-width:220px;max-height:115px"  /> 
               </td>
             </tr>
             <tr>
              <td style="width:70%; height:30%" >
                <?php
                $text=$myrow['stu_id'];
                echo "<img src='barcode.php?codetype=Code128&size=40&text=".$text."&print=true'/>";
                ?>
              </td>
            </tr> 
          </center>     
        </tbody>
      </table>

      <hr style="font-weight: 3px;color: blue;width: 32%">
      <?php
    }
  }
}
?>
<!--print id by department//-->

    <!--print id by year-->
    <?php
    if(isset($_POST['by_section']))
    {
      $y=$_POST['section'];
      $query="SELECT * FROM stu_data where section='$y' AND ec=(select MAX(ec)) AND status='1'";
      $result=mysqli_query($conn,$query);
      if($result)
      {
        while ($myrow=mysqli_fetch_assoc($result)) 
        {
          extract($myrow);

          ?> 
          <table id="center" class="display nowrap" style="width:60px; height:40px">
            <thead>
             <tr>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <center>
              <tr>
                <td style="width:60%" colspan="2"><img src="../img/id_header.jpg" style="max-width:340px"></td>
              </tr>
              <tr>
                <td style="width:60%" colspan="2"><?php echo '<b>Full Name : '.$myrow['first_name'].'</b>'; ?></td>
              </tr>
              <tr>
                <td style="width:60%" colspan="2"><?php echo '<b>Grade: '.$myrow['grade'].'</b>'; ?></td>
              </tr>
              <tr>
                <td style="width:70%; height:60%">
                  <?php
                  $Today=date('d:m:y');
                  ?>
                  <?php echo '<b>Issue date : '.$Today.'</b>'; ?>  
                  <?php echo '<br>';?>
                  <?php echo '<br>';?>
                </td>
                <td style="width:28%" rowspan="2">
                <img src="../photo/<?php echo $myrow['image']?>" style="max-width:220px;max-height:115px"  /> 
               </td>
             </tr>
             <tr>
              <td style="width:70%; height:30%" >
                <?php
                $text=$myrow['stu_id'];
                echo "<img src='barcode.php?codetype=Code128&size=40&text=".$text."&print=true'/>";
                ?>
              </td>
            </tr> 
          </center>     
        </tbody>
      </table>

      <hr style="font-weight: 3px;color: blue;width: 32%">
      <?php
    }
  }
}
?>
<!--print id by year//-->

    <!--print id by Faculty, department and year-->
    <?php
    if(isset($_POST['by_whole']))
    {
      $fac=$_POST['school'];
      $dep=$_POST['grade'];
      $y=$_POST['section'];
      $query="SELECT * FROM stu_data where ec=(select MAX(ec)) AND school='$fac' AND grade='$dep' AND section='$y' AND status='1'";
      $result=mysqli_query($conn,$query);
      if($result)
      {
        while ($myrow=mysqli_fetch_assoc($result)) 
        {
          extract($myrow);

          ?> 
          <table id="center" class="display nowrap" style="width:60px; height:40px">
            <thead>
             <tr>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <center>
              <tr>
                <td style="width:60%" colspan="2"><img src="../img/id_header.jpg" style="max-width:340px"></td>
              </tr>
              <tr>
                <td style="width:60%" colspan="2"><?php echo '<b>Full Name : '.$myrow['first_name'].'</b>'; ?></td>
              </tr>
              <tr>
                <td style="width:60%" colspan="2"><?php echo '<b>Department : '.$myrow['department'].'</b>'; ?></td>
              </tr>
              <tr>
                <td style="width:70%; height:60%">
                  <?php
                  $Today=date('d:m:y');
                  ?>
                  <?php echo '<b>Issue date : '.$Today.'</b>'; ?>  
                  <?php echo '<br>';?>
                  <?php echo '<br>';?>
                </td>
                <td style="width:28%" rowspan="2">
                 <img src="../photo/<?php echo $myrow['image']?>" style="max-width:220px;max-height:115px"  />
               </td>
             </tr>
             <tr>
              <td style="width:70%; height:30%" >
                <?php
                $text=$myrow['stu_id'];
                echo "<img src='barcode.php?codetype=Code128&size=40&text=".$text."&print=true'/>";
                ?>
              </td>
            </tr> 
          </center>     
        </tbody>
      </table>

      <hr style="font-weight: 3px;color: blue;width: 32%">
      <?php
    }
  }
}
?>
<!--print id by faculty, department and year//-->
</center>
</div>
</div>

<script type="text/javascript">
  function printContent(el){
    var restorepage=document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
  }
</script>
  <link rel="stylesheet" href="css/bootstrap.min.css">
<!-- jQuery -->

<script src="jquery/jquery.min.js"></script>

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
<!-- table js -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/js/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
<script src="vendor/bootstrap/js/bootstrap-fileupload.js"></script>
<script>
  function printContent(id)
  {
   var html="<html>";
   html+= document.getElementById(id).innerHTML;
   html+="</html>";
   var printWin = window.open('','','left=800,top=100,width=475,height=300,toolbar=600,scrollbars=,status  =0');
   printWin.document.write(html);
   printWin.document.close();
   printWin.focus();
   printWin.print();
   printWin.close();
 }
</script>
<script type="text/javascript">
 function change_faculty(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","pcajax.php?faculty_id="+document.getElementById("facultylist").value,false);
  xmlhttp.send(null);
  document.getElementById("dep").innerHTML = xmlhttp.responseText;
}
</script>

<script type="text/javascript">
  function change_department(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","pcajax.php?department_id="+document.getElementById("departmentlist").value,false);
    xmlhttp.send(null);
    document.getElementById("strm").innerHTML = xmlhttp.responseText;
  }
</script>

<!--...... JavaScript for Id earned Data ..............-->
<script type="text/javascript">
 function change_faculty_id(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","pcajax.php?faculty_id_id="+document.getElementById("facultylist_id").value,false);
  xmlhttp.send(null);
  document.getElementById("dep_id").innerHTML = xmlhttp.responseText;
}
</script>
<!--....../. JavaScript for Id Data ..............-->

<!--...... JavaScript for Id not earned earnrd Data ..............-->
<script type="text/javascript">
 function change_faculty_id_not(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","pcajax.php?faculty_id_id_not="+document.getElementById("facultylist_id_not").value,false);
  xmlhttp.send(null);
  document.getElementById("dep_id_not").innerHTML = xmlhttp.responseText;
}
</script>
<!--....../. JavaScript for Id not earned Data ..............-->
<!--...... JavaScript for Id recreatedData ..............-->
<script type="text/javascript">
 function change_faculty_id_recreate(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","pcajax.php?faculty_id_recreate="+document.getElementById("facultylist_id_recreate").value,false);
  xmlhttp.send(null);
  document.getElementById("dep_id_recreate").innerHTML = xmlhttp.responseText;
}
</script>
<!--....../. JavaScript for Id recreated Data ..............-->

<script>
  $(document).ready(function() {
    $('#id_print').DataTable({
      responsive: true
    });
  });
</script>

</body>
</html> 