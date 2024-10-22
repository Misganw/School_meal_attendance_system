  <!DOCTYPE html>
  <html lang="en">
  
  <?php
  session_start();
  include('database_conn.php');
  if($_SESSION['usertype']!='5'){
    header("Location: http://localhost/school_meal");
  }
  ?>
  <?php
  if(isset($_GET['delete_useracount'])){
    $user_id=$_GET['username'];
    $query="delete from authentication where username = '$user_id'";
    $result=mysqli_query($conn,$query);
    if($result){
      echo '<script>alert("the data deleted successful")</script>';
    }
    else
     echo '<script>alert("Data not deleted")</script>';

 }
 ?>
 <?php
 if(isset($_GET['delete_ncsid'])){
  $id=$_GET['delete_ncsid'];
  $query="delete from non_cafe where stu_id = '$id'";
  $result=mysqli_query($conn,$query);
  if($result){
    echo '<script>alert("the data deleted successful")</script>';
  }
  else
   echo '<script>alert("Data not deleted ")</script>';

}
if(isset($_GET['delete_stuid'])){
  $id=$_GET['delete_stuid'];
  $query="delete from stu_data where stu_id = '$id'";
  $result=mysqli_query($conn,$query);
  if($result){
    echo '<script>alert("the data deleted successful")</script>';
  }
  else
   echo '<script>alert("Data not deleted")</script>';

}


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

  <!-- Start WOWSlider.com HEAD section -->
  <link rel="stylesheet" type="text/css" href="engine1/style.css" />
  <script type="text/javascript" src="engine1/jquery.js"></script>
  <!-- End WOWSlider.com HEAD section -->
  <style type="text/css">
    .header{
      height:100px;
    }
    input[type=text] {

    }

    input[type=text]:focus {
      width: 100%;
    }
    .mySlides {display:none}

    /* Slideshow container */
    .slideshow-container {
      max-width: 1000px;
      position: relative;
      margin: auto;
    }

    /* Caption text */
    .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
      height: 13px;
      width: 13px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }

    .active {
      background-color: #717171;
    }
  </style>
  <script type="text/javascript">
    function printContent(el){
      var restorepage=document.body.innerHTML;
      var printcontent = document.getElementById(el).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
  </script>
</head>
<body style="background-color:; font-family: times">
  <nav style="max-heigt:100px;background-color:#191970; color:white" class="navbar navbar-default ">
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
        <li><a style="color:white;font-size:16px;font-family:italic;background-color: #191970" href="dtu_cafe_adminpage.php"><p class="lang" key="home">Home </p></a></li>
        <li><a style="color:white;background-color:#191970; font-size:16px;font-family:italic" title="click for edit" onclick="return confirm('Are you sure to leave from the system?')"><p><em class="lang" key="logedas">Loged As:- </em>
          <?php echo ''.$_SESSION["username"].'';?></p></a></li>
          <li><a style="color:white;font-size:16px;font-family:italic" href="logout_user.php" title="click for Logout" onclick="return confirm('Are you sure to leave from the system?')"><p class="lang" key="logout">Logout</p></a></li>
          <li><a style="color:white;font-size:16px;font-family:italic" href="#editModal" data-toggle="modal"><p class="lang" key="change password">Change Password</p></a></li>
          <li class=""><a style="color:white; background-color:#191970; font-size:16px;font-family:italic"><p><b>
            <?php
              /*date_default_timezone_set("Africa/Addis_ababa");
              echo "<em>".date('Y/m/d ')."</em><br><br>";*/
              echo "<b class='lang' key='date'>Date :- </b> ";
              $Today=date('y:m:d');
              $new=date('l, F d, Y',strtotime($Today));
              echo $new;
              ?>
            </b></p></a></li>            
          </ul>
        </div>
      </nav>
      <!--container-->
      <div style="margin-top:20px;" class="panel panel-default">
       <center> 
         <h3 style="font-size: 20px;color:#006633" class="panel-title"> <b class="lang" key="amharic">Schools Meal Attendance</b>  &nbsp;&nbsp;&nbsp;<img style= "height: 70px; width: 70px" src="../setting/<?php echo $logo?>">&nbsp;&nbsp;&nbsp;<b class="lang" key="english"> Managment System</b>
          <!--<p><img class="img-responsive"src="img/dtusmalogo.png"></p>-->
        </h3>
      </center>
    </div>
    <hr>
    <!--<div style="padding-top:0px"class="container">-->
    <!--HEADER 1-->
    <div class="row">
      <aside style="display:block">
        <div class="col-md-3">
          <div style="background-color: " class="panel panel-default">
            <div class="panel-heading" style="background-color: #00cc99">
              <h3 class="panel-title"><b class="lang" key="time boundary setting">Time Boundary Setting</b></h3>
            </div>
            <div class="panel-body">

              <!-- ......................................Editing time boundary................................................-->
              <div style="" class="panel-group" id="accordion">
                <div class="panel panel-default">
                  <div class="panel-heading">

                    <button data-toggle="collapse" data-parent="#accordion"  class="btn btn-success btn-md btn-block" data-target="#collapse4"><span class="glyphicon glyphicon-collapse-down"></span><b class="lang" key="edit time boundary">Edit Time Boundary Setting </b></button>
                  </div>
                  <div id="collapse4" class="panel-collapse collapse">
                    <div class="panel-body">
                     <form action="dtu_cafe_adminpage.php" method="POST" >
                      <div class="form-group">
                       <label class="lang" key="select time boundary type" for="starttime">Select Time Boundary type:</label>
                     </div>
                     <div class="form-group">
                       <select id="starttime" type="text" name="type" placeholder="please select time boundary" class="form-control" required>
                         <option class="lang" key="select time boundary" value="">Select Time boundary</option>
                         <option class="lang" key="lunch" value="lunch">lunch</option>
                       </select>
                     </div>
                     <div class="form-group">
                       <label class="lang" key="starting time" for="starttime">Starting Time:</label>
                     </div>
                     <div class="form-group">
                      <input class="form-control" type="text" name="start_time" class="input-small" data-format="hh:mm  A" placeholder="Enter Starting Time..." id="t3" required>
                    </div>
                    <div class="form-group">
                     <label class="lang" key="ending time" for="endtime">Ending Time:</label>
                   </div>
                   <div class="form-group">
                    <input class="form-control" type="text" name="deadline" class="input-small" data-format="hh:mm A" placeholder="Enter Ending Time..." id="t4" required>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-6">
                      <button type="submit" name="edit_time" class="btn btn-success">
                        <span class="glyphicon glyphicon-save"></span> <b class="lang" key="save acount">Edit Time </b></button>
                        
                      </div>
                    </div>
                    <div class="form-group">
                     <div class="col-lg-6">
                      <button type="reset" name="" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp; <b class="lang" key="cancle">Cancel</b></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div> 
        <!-- ...............................Editing time boundary.............................................................??????-->

      </div>
    </div>


    <div style="background-color:;" class="panel panel-default">
      <div class="panel-heading" style="background-color: #00cc99">
        <h3 class="panel-title"><b class="lang" key="slide show">Slide Show</b></h3>
      </div>
      <div class="panel-body">
        <!-- Start WOWSlider.com BODY section -->
        <div id="wowslider-container1">
          <div class="ws_images"><ul>
            <li><img src="data1/images/chrysanthemum.jpg" alt="Chrysanthemum" title="Chrysanthemum" id="wows1_0"/></li>
            <li><img src="data1/images/desert__copy.jpg" alt="Desert - Copy" title="Desert - Copy" id="wows1_1"/></li>
            <li><img src="data1/images/hydrangeas.jpg" alt="Hydrangeas" title="Hydrangeas" id="wows1_2"/></li>
            <li><img src="data1/images/koala.jpg" alt="Koala" title="Koala" id="wows1_3"/></li>
            <li><a href="http://wowslider.com/vi"><img src="data1/images/lighthouse.jpg" alt="carousel slider" title="Lighthouse" id="wows1_4"/></a></li>
            <li><img src="data1/images/penguins.jpg" alt="Penguins" title="Penguins" id="wows1_5"/></li>
          </ul></div>
          <div class="ws_bullets"><div>
            <a href="#" title="Chrysanthemum"><span><img src="data1/tooltips/chrysanthemum.jpg" alt="Chrysanthemum"/>1</span></a>
            <a href="#" title="Desert - Copy"><span><img src="data1/tooltips/desert__copy.jpg" alt="Desert - Copy"/>2</span></a>
            <a href="#" title="Hydrangeas"><span><img src="data1/tooltips/hydrangeas.jpg" alt="Hydrangeas"/>3</span></a>
            <a href="#" title="Koala"><span><img src="data1/tooltips/koala.jpg" alt="Koala"/>4</span></a>
            <a href="#" title="Lighthouse"><span><img src="data1/tooltips/lighthouse.jpg" alt="Lighthouse"/>5</span></a>
            <a href="#" title="Penguins"><span><img src="data1/tooltips/penguins.jpg" alt="Penguins"/>6</span></a>
          </div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com/vi">jquery carousel</a> by WOWSlider.com v8.2</div>
          <div class="ws_shadow"></div>
        </div> 

        <script type="text/javascript" src="engine1/wowslider.js"></script>
        <script type="text/javascript" src="engine1/script.js"></script>
        <!-- End WOWSlider.com BODY section -->
      </div>
    </div>
  </div>
</aside>
<!-- Modal -->

<!-- Modal -->

<div class="col-md-9">

  <div  class="panel panel-default">
    <div class="panel-heading" style="background-color:#00cc99;"">
      <ul id="myTab" class="nav nav-tabs">
        <li><a href="#report" data-toggle="tab"><strong class="lang" key="generate cafe user report"> Generate Report</a></strong></li>  
        <li><a href="#delete_meal" data-toggle="tab"><strong class="lang" key="">Delete one month meal attendance</a></strong></li>    
      </ul>
    </div>
    <div style="height:800px;color:black; overflow:scroll;background-color:;" class="panel-body">

      <!-- ///////// Change Password //////////////-->
      <?php
      if(isset($_POST['change'])){
        $password = "{SSHA}sNPmYlrgdn2ilaU7ByklSuXNlclqdQ==";
        function hash_password($password)
        {
          $salt='dtu';
          return '{SSHA}'.base64_encode(sha1($password.$salt,TRUE).$salt);
        }
        $user_name=$_SESSION['username'] ;
        $opass=$_POST['password'];
        $hash_opass=hash_password($opass);
        $npass=$_POST['n_password'];
        $hash_npass=hash_password($npass);
        $cpass=$_POST['c_password'];
        $hash_cpass=hash_password($cpass);

        $qr=mysqli_query($conn,"SELECT * FROM user_acount WHERE username='$user_name' ") or die("error"); 
        if($qr){
          $passrow=mysqli_fetch_row($qr);
          $rr=$passrow[3];
                //$spass=$row['password'];
          
            // echo $hash_opass;
            // echo '<br>';
            //  echo $rr;

          if($passrow[3]==$hash_opass AND $hash_npass==$hash_cpass){
            $query=mysqli_query($conn,"UPDATE user_acount SET password ='$hash_npass' WHERE username ='$user_name' ");
            if($query){
              echo '<script>alert("You Modify Your Password Successfully")</script>';
            }
            else{
             echo '<script>alert("You do not Modify Your Password Try again")</script>';
           }
         }
         else echo '<script> alert("There is no muched password")</script>' ;
       }
     }
     ?>   <!-- ////////////////////////////////////////////////// Change Password /////////////////////////////////////////////????-->



     <!--................Edite time boundary...................-->
     <?php
     if(isset($_POST['edit_time']))
     {
       $un=$_POST['type'];
       $pd=$_POST['start_time'];
       $ut=$_POST['deadline'];
       $query="UPDATE time_boundary SET start_time='$pd',deadline='$ut' WHERE type='$un' " ;
       if(mysqli_query($conn,$query)){
        echo"<body ><br><h3 style='color:cyan;'><b><script> alert ('The Time are Updated successfully')</script></b></h3></body>";
        echo" <script>window.open('dtu_cafe_adminpage.php','_self')</script>";
   //echo "<body ><br><h3 style='color:cyan;'><b> INFORMATION IS SAVED</b></h3></body>";
      }
      else  echo '<body ><br><h3 style="color:cyan;"><b><script>alert("hello User the qeury is invalid")</script></b></h3></body>';
    }
    ?>
    <!--...............Edit time boundary..............?????-->


    <div id="myTabContent" class="tab-content">




      <!--..............Delete meal...........-->
      <div  style="background-color: white" class="tab-pane fade" id="delete_meal">   
       <?php
       ?>
       <div class="form-group">
         <h4> Delete Meal attendance between the  date range</h4>
       </div>
       <div class="col-md-4">
        <div class="form-group">
         <input type="date" name="d_date" id="from_del_meal" class="form-control" placeholder="From Date">
       </div>
     </div>
     <div class="col-md-4">
      <div class="form-group">
       <input type="date" name="t_date" id="to_del_meal" class="form-control" placeholder="From Date">
     </div>
   </div>
   <div class="col-md-2">
    <div class="form-group">
      <button type="" name="del_meal" id="del_meal" class="btn btn-success" ><span class="glyphicon glyphicon-trash"></span>&nbsp; <b>Delete Meal</b></button>
    </div>
  </div>



  <div class="clearfix"></div>
  <br>
</div>
<?php
$cdate=date("y-m-d");
$query=mysqli_query($conn,"SELECT * FROM lunch where d_date=(SELECT MIN(d_date) from lunch)");
if($query)
{
 while($row=mysqli_fetch_array($query))
 {
  $dat=$row['d_date'];
  $ddl=strtotime($dat);
  $td=strtotime($cdate);
  $diff=$td-$ddl;
  $x=abs(floor($diff/(60*60*24)));
  if($x>30)
  {
    $del_b=mysqli_query($conn,"DELETE FROM breakfast");
    $del_l=mysqli_query($conn,"DELETE FROM lunch");
    $del_d=mysqli_query($conn,"DELETE FROM dinner");
  }
}
}
?>
<!--.........Delete meal..........??????-->





<!--..........Report........................-->
<div  style="background-color: white" class="tab-pane fade" id="report">   
  <ul id="myTab" class="nav nav-tabs">
    <li><a data-target="#dem" class="btn btn-success" data-parent="" data-toggle="tab"><b class="lang" key="generate report for lunch">Generate Report for Lunch</b></a >  </li>
  </ul>
  <div id="myTabContent" class="tab-content">
    <div style="background-color:white;" id="dem" class="tab-pane fade">
      <!-- /////////////  Lunch Report Tab ///////////////////-->
      <?php
      ?>
      <div class="form-group">
        <h4 class="lang" key="generate report for lunch between the date range"> Generate report for Lunch between the date range</h4>
      </div>
      <div class="col-md-4">
        <div class="form-group">
         <input type="date" name="from_lunch" id="from_lunch" class="form-control" placeholder="From Date">
       </div>
     </div>
     <div class="col-md-4">
       <div class="form-group">
        <input type="date" name="to_lunch" id="to_lunch" class="form-control" placeholder="To Date">
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <button type="" name="range_lunch" id="range_lunch" class="btn btn-success" ><span class="glyphicon glyphicon-search"></span> &nbsp; <b class="lang" key="pick data">Pick Data</b></button>
      </div>
    </div>
    <div class="col-md-2">
     <button onclick="printContent('printing_lunch')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button> 
   </div>
   <div class="clearfix"></div>
   <br>
   <div id="printing_lunch">
    <div id="div_lunch">

    </div>
  </div>
  <!-- /////////////////////////////  Lunch Report Tab /////////-->
</div>
<div style="background-color:white;" id="de" class="tab-pane fade">
  <!-- //////////////////////  breakfast Report Tab //////////-->
  <?php
  ?>
  <div class="form-group">
   <h4 class="lang" key="generate report for breakfast between the date range"> Generate report for Breakfast between the date range</h4>
 </div>
 <div class="col-md-4">
  <div class="form-group">
   <input type="date" name="from" id="from" class="form-control" placeholder="From Date">
 </div>
</div>
<div class="col-md-4">
 <div class="form-group">
  <input type="date" name="to" id="to" class="form-control" placeholder="To Date">
</div>
</div>
<div class="col-md-2">
  <div class="form-group">
    <button type="" name="range" id="range" class="btn btn-success" ><span class="glyphicon glyphicon-search"></span> &nbsp; <b class="lang" key="pick data">Pick Data</b></button>
  </div>
</div>
<div class="col-md-2">
 <button onclick="printContent('printing')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button> 
</div>
<div class="clearfix"></div>
<br>
<div id="printing">
  <div id="purchase_order">

  </div>
</div>
<!-- ///////////////  breakfast Report Tab /////////////////////-->
</div>
</div>
</div>
<!--...................Report............................??????-->

</div>

<!--..............Manage fasting Student...........-->
<?php 
?>
<hr>
<!--........Media Contents ..........................--> 

<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="img/cafe1.jpg"
      alt="Generic placeholder thumbnail">
    </div>
    <div class="caption">
      <h3 class="lang" key="about time modification">About time modification</h3>
      <p class="lang" key="basic clue for manipulation of time boundary">Here user can View basic clue about manipulation of time boundary of breakfast, lunch and dinner</p>
      <p>
        <a class="lang" key="click here to expand and read more" data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="color: #006633">
          Click here to exapand and read more
        </a>
        <div id="collapse1" class="panel-collapse collapse ">
          <div class="panel-body">
           <!-- ................................General notes.......................-->
           <center> <h3 class="lang" key="basic clue" style="color: #4080fb; background-color: ">Basic Clues</h3><center>
            <ol style="color: black; float: left" class="text-left">
              <li> &nbsp;Admin only allowed to change the time boundary for special case</li><br>
              <li>&nbsp; Breakfast, lunch or dinner time may be started late at this time to compensate unused tme admin can change the time boundary as neccessery</li><br>
              <li >&nbsp;For example cafeteria may used for specific task like meeting or as inviglation at this time lunch or dinner time may lag, so admin can adjust time boundary </li><br>
              <li >&nbsp; While modifying time boundary admin should observe weather the time mach with workstation computer time counting system or not</li><br>
              <br>
            </ol>
            <!--..................................  General Notes.....................-->
          </div>
        </div>
      </p>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="img/cafe1.jpg"
      alt="Generic placeholder thumbnail">
    </div>
    <div class="caption">
      <h3 class="lang" key="about non cafe">About Non cafe students</h3>
      <p class="lang" key="basic clue for manipulation of non cafe student">Here user can View basic clue about manipulation of Non cafe Student data.</p>
      <p>
        <a class="lang" key="click here to expand and read more" data-toggle="collapse" data-parent="#accordion" href="#collapse2" style="color: #006633">
          Click here to exapand and read more
        </a>
        <div id="collapse2" class="panel-collapse collapse ">
          <div class="panel-body">
           <!-- ................................General notes.......................-->
           <center> <h3 class="lang" key="basic clue" style="color: #4080fb; background-color: ">Basic Clues</h3><center>
            <ol style="color: black; float: left" class="text-left">
              <li> &nbsp; Registering Non cafe students are the responsibility of cafeteria admin or student service director</li><br>
              <li>&nbsp; While registering non cafe students be remind that there have not any type of mistake</li><br>
              <li > &nbsp; manipulating non cafe students data also the responsibility of cafeteria admin or student service director</li><br>
              <li >&nbsp; If any student want to be cafe user he/she can possibly, the only task is modifying student status from non cafe to cafe serve</li><br>
              <br>
            </ol>
            <!--..................................  General Notes.....................-->
          </div>
        </div>
      </p>
    </div>
  </div>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="img/cafe1.jpg"
      alt="Generic placeholder thumbnail">
    </div>
    <div class="caption">
      <h3 class="lang" key="about withdrawal and fieldtrip student">About Withdrawal or field trip Students</h3>
      <p class="lang" key="basic clue for withdrawal and fieldtrip student">Here user can view basic clue about withdrawal or field trip students.</p>
      <p>
        <a class="lang" key="click here to expand and read more" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="color: #006633">
          Click here to exapand and read more
        </a>
        <div id="collapseOne" class="panel-collapse collapse ">
          <div class="panel-body">
           <!-- ................................General notes.......................-->
           <center> <h3 class="lang" key="basic clue" style="color: #4080fb; background-color: ">Basic Clues</h3><center>
            <ol style="color: black; float: left" class="text-left">
              <li> &nbsp; Withdrawal or field trip student are deactivated from Student service side </li><br>
              <li>&nbsp;Any withdrawal student are not tolerated by management or ticker</li><br>
              <li > &nbsp; Field trip students are deactivated their status in the system until their returning date that means, if one field trip student came back and try to use cafeteria beyond setteled time he/she is not allowed to use</li><br>
            </ol>
            <!--........... General Notes.....................-->
          </div>
        </div>
      </p>
    </div>
  </div>
</div>
<!--.......Media Contents ..................?????--> 
</div>
</div>
<!--..password change  Modal....................... -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div style="background-color:#00ff80" class="modal-header">
      <button type="button" class="close"
      data-dismiss="modal" aria-hidden="true">
      &times;
    </button>
    <h4 class="modal-title" id="myModalLabel">
      <b class="lang" key="please eyoanp">Please Enter your Old and New Password</b>
    </h4>
  </div>
  <div class="modal-body">

    <!--login form-->
    <form class="form-horizontal" method="POST" action="dtu_cafe_adminpage.php">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email"><em class="lang" key="old password">Old Password:</em></label>
        <div class="col-sm-8">
          <input type="password" class="form-control" id="email" placeholder="Enter Old Pssword" name="password" autofocus="autofocus" >
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd"><em class="lang" key="new password">New Password:</em></label>
        <div class="col-sm-8">          
          <input type="password" class="form-control" id="n_password" placeholder="Enter New password" name="n_password">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd"><em class="lang" key="new password">Confirm Password:</em></label>
        <div class="col-sm-8">          
          <input type="password" class="form-control" id="c_password" placeholder="Confirm password" name="c_password">
        </div>
      </div>
      <div class="form-group">        

      </div>
      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="change" class="btn btn-success"><i class="fa fa-sign-in"></i>&nbsp;<b class="lang" key="change">Change</b></button>
          <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;<b class="lang" key="cancle">Cancel</b></button>
        </div>
      </div>
    </form>
    <!--login form-->
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default"
    data-dismiss="modal"><b class="lang" key="close">Close</b>
  </button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal -->
</div>
<!--.........................password change  Modal.......................???????? -->

</div>
</div>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>

<!-- Morris Charts JavaScript -->
<script src="vendor/raphael/raphael.min.js"></script>
<script src="vendor/morrisjs/morris.min.js"></script>
<script src="data/morris-data.js"></script>
<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>
<script src="js/bxslider.min.js"></script>
<script src="js/script.slider.js"></script>
<script>
  <script src="vendor/bootstrap/js/bootstrap-fileupload.js"></script>
  <!-- table js -->
  <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/js/dataTables.bootstrap.min.js"></script>
  <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
  <!-- table js -->


  <script>
    $(document).ready(function() {
      $('#fasting').DataTable({
        responsive: true
      });
    });
  </script>
  <script>
          // ////////////////////////////////////    javascript for None cafe   //////////////////////////////////// 
          $(document).ready(function(){
              // $.datepicker.setDefaults({
              //   dateFormat:'yy-mm-dd'
              //     });
              $(function(){
                $("#from_n").datepicker();
                $("#to_n").datepicker();
              });
              $('#range_nn').click(function(){
                var from=$('#from_n').val();
                var to=$('#to_n').val();
                if(from!='' && to!=''){
                  $.ajax({
                   url:"range_n.php",
                   method:"POST",
                   data:{from_n:from,to_n:to},
                   success:function(data)
                   {
                    $('#div_nn').html(data);
                  }
                });
                }
                else
                {
                  alert("Please Select The Data");
                }
              });

            });
     // //javascript for Non cafe  //////////////////////////////////// 
   </script>
   <script>
          // //////////    javascript for breakfast   /// 
          $(document).ready(function(){
              // $.datepicker.setDefaults({
              //   dateFormat:'yy-mm-dd'
              //     });

              // $(function(){
              //   $("#from").datepicker();
              //   $("#to").datepicker();
              // });
              $('#range').click(function(){
                var from=$('#from').val();
                var to=$('#to').val();
                if(from!='' && to!=''){
                  $.ajax({
                   url:"range.php",
                   method:"POST",
                   data:{from:from,to:to},
                   success:function(data)
                   {
                    $('#purchase_order').html(data);
                  }
                });
                }
                else
                {
                  alert("Please Select The Data");
                }
              });

            });
     // ////////////////////////////////////    javascript for breakfast   
   </script>
   <script>
          // ////////////////////////////////////    javascript for Lunch   
          $(document).ready(function(){
              // $.datepicker.setDefaults({
              //   dateFormat:'yy-mm-dd'
              //     });

              // $(function(){
              //   $("#from_lunch").datepicker();
              //   $("#to_lunch").datepicker();
              // });
              $('#range_lunch').click(function(){
                var from=$('#from_lunch').val();
                var to=$('#to_lunch').val();
                if(from!='' && to!=''){
                  $.ajax({
                   url:"range.php",
                   method:"POST",
                   data:{from_lunch:from,to_lunch:to},
                   success:function(data)
                   {
                    $('#div_lunch').html(data);
                  }
                });
                }
                else
                {
                  alert("Please Select The Data");
                }
              });

            });
     // ////////////////////////////////////    javascript for Lunch   //////////////////////////////////// 
   </script>
   
   <script type="text/javascript">
     function change_faculty(){
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET","ajax.php?faculty_id="+document.getElementById("facultylist").value,false);
      xmlhttp.send(null);
      document.getElementById("dep").innerHTML = xmlhttp.responseText;
    }
  </script>
  <script type="text/javascript">

    function change_department(){
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.open("GET","ajax.php?department_id="+document.getElementById("departmentlist").value,false);
      xmlhttp.send(null);
      document.getElementById("strm").innerHTML = xmlhttp.responseText;
    }
  </script>
  <script>
          // ////////////////////////////////////    javascript for Dinner   //////////////////////////////////// 
          $(document).ready(function(){
              // $.datepicker.setDefaults({
              //   dateFormat:'yy-mm-dd'
              //     });

              // $(function(){
              //   $("#from_dinner").datepicker();
              //   $("#to_dinner").datepicker();
              // });
              $('#del_meal').click(function(){
                var from=$('#from_del_meal').val();
                var to=$('#to_del_meal').val();
                if(from!='' && to!=''){
                  $.ajax({
                   url:"delete_meal.php",
                   method:"POST",
                   data:{from_del_meal:from,to_del_meal:to},
                   success:function(data)
                   {
                     alert("Meal delated");
                   }
                 });
                }
                else
                {
                  alert("Please Select The Data");
                }
              });

            });
     // ////////////////////////////////////    javascript for Dinner  //////////////////////////////////// 
   </script>

   <script src="js/clockface.js"></script>
   <script type="text/javascript">
    $(function(){
      $('#t1').clockface();  
    });
  </script>
  <script type="text/javascript">
    $(function(){
      $('#t2').clockface();  
    });
  </script>
  <script type="text/javascript">
    $(function(){
      $('#t3').clockface();  
    });
  </script>
  <script type="text/javascript">
    $(function(){
      $('#t4').clockface();  
    });
  </script>
  <script>
    $(function () {
      $('#myTab li:eq(1) a').tab('show');
    });
  </script>
  <script>
    $(function () { $('#myModal').modal({
      keyboard: true
    })});
  </script> 
  <script>
    $(document).ready(function() {
      $('#dataTables-modal').DataTable({
        responsive: true
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#dataTables-active').DataTable({
        responsive: true
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#dataTables-inactive').DataTable({
        responsive: true
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#ncsdataTables').DataTable({
        responsive: true
      });
    });
  </script>
</body>
</html>