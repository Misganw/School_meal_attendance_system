    <!DOCTYPE html>

    <html lang="en">
    <?php
    error_reporting(false)
    ?>
    <?php
    session_start();
    include('database_conn.php');
    if($_SESSION['usertype']!='6'){
      header("Location: http://localhost/school_meal");
    }
    ?>

    <!-- /////////////////////////////////////////Check Maximum Date////////////////////////////////////////////////// -->
    <?php

    ?>
    <!-- /////////////////////////////////////////Check Maximum Date////////////////////////////////////////////////// -->
    <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="">
     <meta name="author" content="">

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
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="vendor/datatables-plugins/dataTables.bootstrap.css"  rel="stylesheet">
    <link href="vendor/datatables-responsive/dataTables.responsive.css"  rel="stylesheet">
    <link href="vendor/bootstrap/css/bootstrap-fileupload.min.css" rel="stylesheet" type="text/css">
    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
    <script type="text/javascript" src=lang_translate.js></script>
    <!-- End WOWSlider.com HEAD section -->
    <style type="text/css">
      .header{
        height:100px;
      }
      input[type=text] {
       /* width: auto;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        background-color: white;
        background-image: url('searchicon.png');
        background-position: 10px 10px; 
        background-repeat: no-repeat;
        padding: 12px 20px 12px 40px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;*/
      }

      input[type=text]:focus {
        width: 100%;
      }

      ul.wysihtml5-toolbar > li
      {
        position: relative;
      }
      
      
      .header{
        height:100px;
      }
      input[type=text] {
      }

      input[type=text]:focus {
        width: 100%;
      }
    </style>
  </head>
  <body style="background-image:; font-family: times">
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
        <li><a style="color:white;font-size:16px;font-family:italic" href="dtu_cafe_meal.php"><p class="lang" key="home">Home </p></a></li>
        <li><a style="color:white;font-size:16px;font-family:italic" href=""><p><b class="lang" key="logedas">Loged As:- </b>
          <?php echo ''.$_SESSION["username"].'';?></p></a></li>
          <li><a style="color:white;font-size:16px;font-family:italic" href="logout_user.php" title="click for Logout" onclick="return confirm('Are you sure to leave from the system?')"><p class="lang" key="logout">Logout</p></a></li>
          <li class=""><a style="color:white;font-size:16px;font-family:italic" href=""><p><b>
            <?php
                /*date_default_timezone_set("Africa/Addis_ababa");
                echo "<em>".date('Y/m/d ')."</em><br><br>";*/
                echo "ቀን:-  ";
                $Today=date('y:m:d');
                $new=date('l, F d, Y',strtotime($Today));
                echo $new;
                ?>
              </b></p></a></li>              
            </ul>
          </div>

        </nav>
        <!--container-->
        <div style="margin-top:20px;" class="panel panel-success">
         <center> <h3 style="font-size: 20px;color:#006633" class="panel-title"> <b class="lang" key="amharic">Schools Meal Attendance</b>  &nbsp;&nbsp;&nbsp;<img style= "height: 70px; width: 70px" src="../setting/<?php echo $logo?>">&nbsp;&nbsp;&nbsp;<b class="lang" key="english"> Managment System</b>
          <!--<p><img class="img-responsive"src="img/dtusmalogo.png"></p>-->
        </h3>
      </center>
    </div>
    <hr>
    <!--<div style="padding-top:0px"class="container">-->
    <!--HEADER 1-->

    <div class="row">
     <aside style="display:block">
       <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading" style="background-color: #00cc99">
            <h3 class="panel-title">መታወቂያ ቁጥር ማንበቢያ</h3>
          </div>
          <div class="panel-body">
            <!-- time ////////////////////////////////////////////////boundaryfield-->
            <div class="panel-group" id="accordion">
              <!--time counter///////////////////////////////////////////////-->

              <!--authentication/////////////////////////////////////////// #############form-->
              <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #00cc99">
                  <p  class="panel-title">እባከዎትን የተማሪዉን መለያ ቁጥር ያስገቡ</p>
                </div>
                <div style="color:blue" class="panel-body">
                 <!--employee//////////////////////////////////////registration form-->
                 <form method="POST" action="dtu_cafe_meal_lunch.php">
                  <div class="form-group">
                    <label class="lang" key="student id with barcode" for="impid"> Student Id With Barecode:</label>
                    <span class="glyphicon glyphicon-user"></span>
                    <input id="impid" type="text" class="form-control" name="stu_id" placeholder="የተማሪዉን መለያ ቁትር ያስገቡ" autofocus="autofocus">
                  </div>

                  <div class="col-lg-6">
                    <div class="form-group">     
                     <button type="submit" name="tick_lunch" class="btn btn-success btn-block">
                      <span class="glyphicon glyphicon-save"></span> አስገባ/ቢ </button>
                    </div> 
                  </div>
                  <div class="col-lg-6">     
                    <div class="form-group">
                     <button type="reset" name="update_studata" class="btn btn-danger btn-block">
                      <span class="glyphicon glyphicon-backward"></span> አፅዳ/ጅ</button> 
                    </div>
                  </div> 
                </form> 

                <!--employee//////////////////////////////////////registration form-->
              </div>
            </div>
          </div> 
          <!-- time ////////////////////////////////////////////////boundaryfield-->
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #00cc99">
          <h3 class="panel-title">Slide Show</h3>
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

  <div class="col-md-8">
    <div class="panel panel-default ">
      <div class="panel-heading" style="background-color: #00cc99">
        <h3 class="panel-title">የተማሪዎች  ምግብ ቤት መቆጣጠሪያ ገፅ</h3>
      </div>
      <div style="height:600px; color:white;overflow:scroll; background-color: " class="panel-body">
        <?php
    /////////////////////////////////////////////////////////////////////////////
        if(isset($_POST['tick_lunch']))
        {
          $user_name = $_POST['stu_id'];
          $qr=mysqli_query($conn,"SELECT * from stu_data WHERE status='0' AND stu_id='$user_name' ");
          if(mysqli_num_rows($qr)>0)
          {
           ?>
           <div class="alert alert-danger alert-dismissible" rol="alert">
            <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
            <h1 style="color: red"> ተማሪው/ዋ አቋርጧል/ጣለች ወይንም እስከመጨረሻው ተባሯል/ራለች (The Student is either withdrawal or dismiss)</h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br><br>
          </div>
          <embed src="beep.mp3" autostart="true" loop="true" width="" height="" style="opacity: 0.001"></embed>
          <?php 
        } 
        else
        {
         $qry=mysqli_query($conn,"SELECT start_time, deadline from time_boundary WHERE type='lunch' ");
         if($qry)
         {
          while ($myrow = mysqli_fetch_assoc($qry))
          {
            $st=$myrow['start_time'];
            $dt=$myrow['deadline'];
            date_default_timezone_set('Africa/Nairobi');
            if($st < date('h:i:s') AND $dt > date('h:i:s'))
            {
              $check_student = "SELECT * FROM stu_data WHERE stu_id = '$user_name'";
              $run=mysqli_query($conn,$check_student);
              if(mysqli_num_rows($run)>0)
              {
               $existance_of_id="SELECT stu_id from non_cafe where stu_id='$user_name' ";
               $check=mysqli_query($conn,$existance_of_id);
               if(mysqli_num_rows($check)>0)
               {
                ?>
                <div class="alert alert-danger alert-dismissible" rol="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
                  <h1 style="color: red"> ተማሪው/ዋ የምግብ አገልግሎት ተጠቃሚ አይደለም/ለችም (The Student are Non Cafe)</h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br><br>
                </div>
                <embed src="beep.mp3" autostart="true" loop="true" width="" height="" style="opacity: 0.001"></embed>
                <?php    
              }
              else
              {
               $existance_of_id="SELECT stu_id,d_date from lunch where stu_id='$user_name' AND d_date=DATE(NOW()) ";
               $check=mysqli_query($conn,$existance_of_id);
               if(mysqli_num_rows($check)>0){
                ?>
                <!--///////////// For Lunch Error Notification ///////////////////////////////////////////////-->  
                <div class="alert alert-danger alert-dismissible" rol="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
                  <h1 style="color:red"> ዛሬ ከዚህ በፊት ተጠቅመዋል</h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br><br>
                  ይሄን ለማትፋት ከቀኝ በኩል ከላይ ማህዘኑ ላይ ያለዉን  የ ኤቅስ (X) ምልክት መጫን ይችላሉ
                  
                  <?php
                  $qry=mysqli_query($conn,"SELECT s.stu_id,s.first_name,s.school,s.image,l.stu_id,l.d_date FROM stu_data s, lunch l WHERE s.stu_id='$user_name' AND l.stu_id='$user_name' AND  l.d_date=DATE(NOW()) ");
                  if($qry)
                  {
                    while ($myrow = mysqli_fetch_assoc($qry))
                    {
                     $sd=$myrow['stu_id'];
                     $fn=$myrow['first_name'];
                     $f=$myrow['school'];
                     $img=$myrow['image'];
                     ?>
                     <table class="table table-bordered table-responsive">
                      <tr>
                        <td><label class="control-label"> <b class="lang" key="photo">Student Photo</b></label></td>
                        <td>
                          <div class="col-lg-4">
                           <div style="background-color" class="btn btn-file btn-success" >
                            <img src="../photo/<?php echo $img;?>"  controls width='250' height='235' ></div>
                          </div> 
                        </td>
                      </tr>
                      <tr>
                        <td><label class="control-label"><b class="lang" key="id">Student Id:</b></label></td>
                        <td><?php echo $sd; ?> </td>
                      </tr>
                      <tr>
                        <td><label class="control-label"> <b class="lang" key="full name">Full Name:</b></label></td>
                        <td><?php echo $fn; ?> </td>
                      </tr> 
                      <tr>
                        <td><label class="control-label"><b class="lang" key="faculty">School:</b></label></td>
                        <td><?php echo $f; ?> </td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <center><a class="btn btn-danger" href="dtu_cafe_meal.php"> <span class="glyphicon glyphicon-backward"></span><b <b class="lang" key="return to home page">>Back To Meal Attendance  Page </b></a></center>
                        </td>
                      </tr>
                    </table>
                    <embed src="beep.mp3" autostart="true" loop="true" width="" height="" style="opacity: 0.001"></embed>
                    <?php
                  }
                }  
                ?>
                
              </div>
              <!--/////// For Lunch Error Notification  //////////////////////-->        
              <?php
            }
            else
            {
             $qry=mysqli_query($conn,"SELECT * FROM stu_data WHERE stu_id='$user_name' ");
             if($qry)
             {
              while ($myrow = mysqli_fetch_assoc($qry))
              {
               $fname=$myrow['first_name'];
               $dep=$myrow['grade'];
               $user=$_SESSION['username'];
             }
           }
           $query = mysqli_query($conn,"insert into lunch (stu_id, first_name, grade, cafe_no,d_date) values ('$user_name', '$fname', '$dep', '$user',NOW())");
           if($query)
           {
            ?>
            <!--//////////////////////////////////////////For Lunch Success Notification//////////-->
            <div class="alert alert-success alert-dismissible" rol="alert">
              <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
              <strong><h1 style="color:blue">መልካም ምሳ (ቁርስ) </h1></strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br><br>
              ይሄን ለማትፋት ከቀኝ በኩል ከላይ ማህዘኑ ላይ ያለዉን  የ ኤቅስ (X) ምልክት መጫን ይችላሉ 
              <?php
              $qry=mysqli_query($conn,"SELECT stu_id,first_name,school,image FROM stu_data WHERE stu_id='$user_name' ");
              if($qry)
              {
                while ($myrow = mysqli_fetch_assoc($qry))
                {
                 $sd=$myrow['stu_id'];
                 $fn=$myrow['first_name'];
                 $f=$myrow['school'];
                 $img=$myrow['image'];
                 ?>
                 
                 <table class="table table-bordered table-responsive">
                   <tr>
                    <td><label class="control-label"><b class="lang" key="photo"> Student Photo</b></label></td>
                    <td>
                      <div class="col-lg-4">
                        <div class="btn btn-file btn-success" >
                          <img src="../photo/<?php echo $img;?>"  controls width='250' height='235'></div>
                        </div> 
                      </td>
                    </tr>
                    <tr>
                      <td><label class="control-label"><b class="lang" key="id">Student Id:</b></label></td>
                      <td><?php echo $sd; ?> </td>
                    </tr>
                    <tr>
                      <td><label class="control-label"> <b class="lang" key="full name">Full Name:</b></label></td>
                      <td><?php echo $fn; ?> </td>
                    </tr> 
                    <tr>
                      <td><label class="control-label"><b class="lang" key="faculty">school:</b></label></td>
                      <td><?php echo $f; ?> </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <center><a class="btn btn-danger" href="dtu_cafe_meal.php"> <span class="glyphicon glyphicon-backward"></span><b class="lang" key="back to home page">Back To Meal Attendance Page</b> </a></center>
                      </td>
                    </tr>
                  </table>
                  <?php
                }
              }  
              ?>
            </div>
            <!--//////////////////////////////////////////For Lunch Success Notification//////////-->
            <?php
          }
          else
          {
            ?>
            <div class="alert alert-danger alert-dismissible" rol="alert">
              <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
              <strong class="lang" key="student id not insert in lunch table"> The Student is Not Registered into Lunch Table</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br><br>
              ይሄን ለማትፋት ከቀኝ በኩል ከላይ ማህዘኑ ላይ ያለዉን  የ ኤቅስ (X) ምልክት መጫን ይችላሉ 
            </div>
            <?php
          }
      // echo"<script>window.open('dtu_cafe_meal.php','_self')</script>";
        }
      }
    }
    else{
      ?>
      <div class="alert alert-danger alert-dismissible" rol="alert">
        <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
        <h1> ተማሪዉ/ዋ ከ ተማሪዎች ማህደር ዉስጥ የለም/ችም</h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br><br>
        ይሄን ለማትፋት ከቀኝ በኩል ከላይ ማህዘኑ ላይ ያለዉን  የ ኤቅስ (X) ምልክት መጫን ይችላ
      </div>
      <embed src="beep.mp3" autostart="true" loop="true" width="" height="" style="opacity: 0.001"></embed>
      <?php
    }
  }
  else
  {
    ?>
    <div class="alert alert-danger alert-dismissible" rol="alert">
      <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
      <h1 style="color: red"> ይህ የመመገቢያ ሰዓት አይደለም (This is Not Time for  Meal)</h1>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br><br>
    </div>
    <?php
  }
}
}
}
}

    //////////////////////////////////////////////////////
mysqli_close();
?>
<div style="" id="myTabContent" class="tab-content">

  <!--////////// For Electronic Mail /////////////////////////////////////////////////////-->
  <div class="tab-pane fade" id="email">
    <div class="row">
      <!--time counter///////////////////////////////////////////////-->
      <div class="col-lg-12">
        <div class="panel panel-success">
         <div style="" class="panel-heading">
          <p>DTU Student Meal Attendance Page</p>
        </div>
        <div style="color:blue"class="panel-body">
        </div>
      </div>
    </div>
    <!--time counter///////////////////////////////////////////////-->
  </div>

  <!--authentication/////////////////////////////////////////// #############form-->
  <div class="row">
   <div class="col-lg-12">
    <div class="panel panel-info">
      <div class="panel-header">
        <p style="background-color:#FF00FF" class="panel-title">Asign Employee for Cafeterria working</p>
      </div>
      <div style="color:blue"class="panel-body">
       <!--employee//////////////////////////////////////registration form-->
       <form method="POST" action="dtu_cafe_meal.php">
        <div class="form-group">
          <label for="impid"> Student Id With Barecode:</label>
          <span class="glyphicon glyphicon-user"></span>
          <input id="impid" type="text" class="form-control" name="stu_id" placeholder="Enter employee id" autofocus="autofocus">
        </div>

        <div class="col-lg-6">
          <div class="form-group">     
            <input type="submit" name="tick_breakfast" class="btn btn-success btn-md btn-block" value="Take Attendance" >
          </div> 
        </div>
        <div class="col-lg-6">     
          <div class="form-group">
            <input type="reset"class="btn btn-danger btn-md btn-block">  
          </div>
        </div> 
      </form> 
    </div>
  </div>
</div>
</div>
</div>
<!--///////////////// For Electronic Mail /////////////////////////////////////////////////////-->
</div>
</div>
</div>
<script>
  $(function () {
    $('#myTab li:eq(1) a').tab('show');
  });
</script>
</div>
</div>
<!--</div>-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  $(function () { $('#myModal').modal({
    keyboard: true
  })});
</script> 
<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

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
<script src="../js/script.slider.js"></script>
<!-- table js -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/js/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

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

</body>
</html>