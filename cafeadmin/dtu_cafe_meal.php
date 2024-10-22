    <!DOCTYPE html>

    <html lang="en">
    <?php
    session_start();
    include('database_conn.php');
    if($_SESSION['usertype']!='6'){
      header("Location: http://localhost/school_meal");
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
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Start WOWSlider.com HEAD section -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">

      <link rel="stylesheet" type="text/css" href="engine1/style.css" />
      <script type="text/javascript" src="engine1/jquery.js"></script>
      <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
      <script type="text/javascript" src=lang_translate.js></script>
      <!-- Custom CSS -->
      <link href="dist/css/sb-admin-2.css" rel="stylesheet">

      <!-- Morris Charts CSS -->
      <link href="vendor/morrisjs/morris.css" rel="stylesheet">
      <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
      </style>
      <style>
        @media print {
          .control-group {
            display: none;
          }
        }
        .slideshow-container1 {
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
        .dot1 {
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

        /* Fading animation */
        .fade {
          -webkit-animation-name: fade;
          -webkit-animation-duration: 6s;
          animation-name: fade;
          animation-duration: 6s;
        }

        @-webkit-keyframes fade {
          from {opacity: .4} 
          to {opacity: 1}
        }

        @keyframes fade {
          from {opacity: .4} 
          to {opacity: 1}
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
          .text {font-size: 11px}
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
            <li><a style="color:white;font-size:16px;font-family:italic; background-color: #191970" href="dtu_cafe_meal.php"><p><span class="glyphicon glyphicon-home"></span>&nbsp;<b class="lang" key="home">Home</b> </p></a></li>
            <li><a style="color:white;background-color:#191970; font-size:16px;font-family:italic" title="click for edit" onclick="return confirm('Are you sure to leave from the system?')"><p><b class="lang" key="logedas">Loged As:-</b> 
              <?php echo ''.$_SESSION["username"].'';?></p></a></li>
              <li><a style="color:white;font-size:16px;font-family:italic" href="logout_user.php" title="click for Logout" onclick="return confirm('Are you sure to leave from the system?')"><p class="lang" key="logout">Logout</p></a></li>
              <li><a style="color:white;font-size:16px;font-family:italic" href="#editModal" data-toggle="modal"><p class="lang" key="change password">Change Password</p></a></li>
              <li class=""><a style="color:white; background-color:#191970; font-size:16px;font-family:italic"><p><b>
                <?php
              /*date_default_timezone_set("Africa/Addis_ababa");
              echo "<em>".date('Y/m/d ')."</em><br><br>";*/
              echo " <b class='lang' key='date'>Date :-</b>  ";
              $Today=date('y:m:d');
              $new=date('l, F d, Y',strtotime($Today));
              echo $new;
              ?>
            </b></p></a></li>            
          </ul>
        </div>
      </nav>
      <!--container-->
      <div style=" margin-top: 0px" class="panel panel-success" ></div>
      <!--container-->
      <div style="margin-top:20px;" class="panel panel-default">
       <center> <h3 style="font-size: 20px;color:#006633" class="panel-title"> <b class="lang" key="amharic">Schools Meal Attendance</b>  &nbsp;&nbsp;&nbsp;<img style= "height: 70px; width: 70px" src="../setting/<?php echo $logo?>">&nbsp;&nbsp;&nbsp;<b class="lang" key="english"> Managment System</b>
        <!--<p><img class="img-responsive"src="img/dtusmalogo.png"></p>-->
      </h3>
    </center>
  </div>
  

  <!--<div style="padding-top:0px"class="container">-->
  <!--HEADER 1-->

  <div class="row">
   <aside style="display:block">
     <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading" style="background-color: #00cc99">
          <h3  class="panel-title">Task List</h3>
        </div>
        <div class="panel-body">
          <!-- time ////////////////////////////////////////////////boundaryfield-->
          <a href="dtu_cafe_meal_lunch.php" style="text-decoration:none"><button class="btn btn-success btn-md btn-block" >Meal Attendance<button></a>
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
              <li><img src="data1/images/dtupeople.jpg" alt="dtupeople" title="dtupeople" id="wows1_6"/></li>
              <li><img src="data1/images/dtulogo2.jpg" alt="dtulogo2" title="dtulogo2" id="wows1_7"/></li>
              <li><img src="data1/images/beuty.jpg" alt="beuty" title="beuty" id="wows1_8"/></li>
            </ul></div>
            <div class="ws_bullets"><div>
              <a href="#" title="Chrysanthemum"><span><img src="data1/tooltips/chrysanthemum.jpg" alt="Chrysanthemum"/>1</span></a>
              <a href="#" title="Desert - Copy"><span><img src="data1/tooltips/desert__copy.jpg" alt="Desert - Copy"/>2</span></a>
              <a href="#" title="Hydrangeas"><span><img src="data1/tooltips/hydrangeas.jpg" alt="Hydrangeas"/>3</span></a>
              <a href="#" title="Koala"><span><img src="data1/tooltips/koala.jpg" alt="Koala"/>4</span></a>
              <a href="#" title="Lighthouse"><span><img src="data1/tooltips/lighthouse.jpg" alt="Lighthouse"/>5</span></a>
              <a href="#" title="Penguins"><span><img src="data1/tooltips/penguins.jpg" alt="Penguins"/>6</span></a>
              <a href="#" title="dtupeople"><span><img src="data1/tooltips/dtupeople.jpg" alt="dtupeople"/>7</span></a>
              <a href="#" title="dtulogo"><span><img src="data1/tooltips/dtulogo2.jpg" alt="dtulogo2"/>8</span></a>
              <a href="#" title="beuty"><span><img src="data1/tooltips/beuty.jpg" alt="beuty"/>9</span></a>
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
  
  <!-- ////////////////////////////////////////////////// Change Password ///////////////////////////////////////////////-->
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
      if($passrow[3]==$hash_opass && $hash_npass==$hash_cpass){
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
 <div class="col-md-8">

  <div  class="panel panel-default">
    <div class="panel-heading" style="background-color: #00cc99">
      <h3 class="panel-title">የተማሪዎች  ምግብ ቤት ሰዓት መቆጣጠሪያ እና ማረጋገጫ ገፅ</h3>
    </div>
    <div style="height:600px; color:white;overflow:scroll; background-color: #f5f5f0" class="panel-body">
     <!-- ///////////////////////////////////////  Report ///////////////////////////////////////////////////////////////-->
     <!-- ................................General notes.......................-->
     <center> <h3 class="lang" key="basic clue" style="color: #4080fb; background-color: ">Basic Clues</h3><center>
      <ol style="color: black; float: left" class="text-left">
        <li class="lang" key="n1"> &nbsp; Students have to show their Digital ID infront of Reader machine inline to the machine to be read by the reader and send to the database </li><br>
        <li class="lang" key="n2">&nbsp; Ticker have to observe weather the students show their ID to the machine or not</li><br>
        <li class="lang" key="n3"> &nbsp; If one ticker miss the correct time boundaary the system show invalid time range notification</li><br>
        <li class="lang" key="n4">&nbsp; If the student come again to feed the system show red background with student full information and sound notification</li><br>
        <li class="lang" key="n5">&nbsp; The ticker no need of interaction with the system or machine after starting </li><br>
        <li class="lang" key="n6">&nbsp; If barcode of a given student Id fade out the machine does not read, so it is the responsibility of ticker to tell for changing Id card </li><br>
        <li class="lang" key="n7">&nbsp; The system does not recognize Id of withdrawal, fired or field trip students, so ticker have to take care for this case</li><br>
      </ol>
      <!--..................................  General Notes.....................-->
      <div id="myTabContent" class="tab-content">
        <div  style="color:black" class="tab-pane fade" id="report">   
          <ul id="myTab" class="nav nav-tabs">
            <li><a data-target="#demo" class="btn btn-danger" data-parent="#acordion" data-toggle="tab">Generat Report for Dinner</a >  </li>
            <li><a data-target="#dem" class="btn btn-danger" data-parent="#acordion" data-toggle="tab">Generat Report for Lunch</a >  </li>
            <li><a data-target="#de" class="btn btn-danger" data-parent="#acordion" data-toggle="tab">Generat Report for Breakfast</a >  </li>
          </ul>
          <div id="myTabContent" class="tab-content">

            <div class="tab-pane fade" id="demo">
             <!-- /////////////////////////////////////////////////////  Dinner Report Tab ///////////////////////////////-->
             <?php
           /* $conn = mysql_connect('localhost','root','') or die ("The connectin is failed");
            mysql_select_db("stu_meal",$conn) or die ("The database not connected");
              $query= mysql_query("SELECT * FROM breakfast");
              if($query){
              }*/
              ?>
              <div class="form-group">
                <label><h4> Generate weekly report for Dinner between the date range</h4></lebel>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                   <input type="text" name="from_dinner" id="from_dinner" class="form-control" placeholder="From Date">
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="form-group">
                  <input type="text" name="to_dinner" id="to_dinner" class="form-control" placeholder="To Date">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <button type="" name="range_dinner" id="range_dinner" class="btn btn-success" >Pick Data</button>
                </div>
              </div>
              <div class="col-md-2">
               <button onclick="printContent('printing_dinner')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button> 
             </div>
             <div class="clearfix"></div>
             <br>
             <div id="printing_dinner">
              <div id="div_dinner">
                
              </div>
            </div>
            <!-- /////////////////////////////////////////////////////  Dinner Report Tab ///////////////////////////////-->
          </div>
          <div id="dem" class="tab-pane fade">
           
            <!-- /////////////////////////////////////////////////////  Lunch Report Tab ///////////////////////////////-->
            <?php
           /* $conn = mysql_connect('localhost','root','') or die ("The connectin is failed");
            mysql_select_db("stu_meal",$conn) or die ("The database not connected");
              $query= mysql_query("SELECT * FROM breakfast");
              if($query){
              }*/
              ?>
              <div class="form-group">
                <label><h4> Generate weekly report for Lunch between the date range</h4></lebel>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                   <input type="text" name="from_lunch" id="from_lunch" class="form-control" placeholder="From Date">
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="form-group">
                  <input type="text" name="to_lunch" id="to_lunch" class="form-control" placeholder="To Date">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <button type="" name="range_lunch" id="range_lunch" class="btn btn-success" ><span class="glyphicon glyphicon-search"></span> &nbsp; Pick Data</button>
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
            <!-- /////////////////////////////////////////////////////  Lunch Report Tab ///////////////////////////////-->
          </div>
          <div id="de" class="tab-pane fade">
            <!-- /////////////////////////////////////////////////////  breakfast Report Tab ///////////////////////////////-->
            <?php
           /* $conn = mysql_connect('localhost','root','') or die ("The connectin is failed");
            mysql_select_db("stu_meal",$conn) or die ("The database not connected");
              $query= mysql_query("SELECT * FROM breakfast");
              if($query){
              }*/
              ?>
              <div class="form-group">
                <label><h4> Generate weekly report for Breakfast between the date range</h4></lebel>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                   <input type="text" name="from" id="from" class="form-control" placeholder="From Date">
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="form-group">
                  <input type="text" name="to" id="to" class="form-control" placeholder="To Date">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <button type="" name="range" id="range" class="btn btn-success" >Pick Data</button>
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
            <!-- /////////////////////////////////////////////////////  breakfast Report Tab ///////////////////////////////-->
          </div>
        </div>
      </div>
      <!-- ///////////////////////////////////////  Report ///////////////////////////////////////////////////////////////-->

      <!-- /////////////////////////////////////// email Tabe ///////////////////////////////////////////////////////////-->
      <div id="myTabContent" class="tab-content">  
       <div  style="color:black" class="tab-pane fade" id="email">
        <ul id="myTab" class="nav nav-tabs">
          <li><a data-target="#send" class="btn btn-danger" data-parent="#acordion" data-toggle="tab">Send Data To Email</a >  </li>
          <li><a data-target="#view" class="btn btn-danger" data-parent="#acordion" data-toggle="tab">View Data from Email</a >  </li>
        </ul>
        <!-- //////////////////////////////////////////////////////////////////////// Sending email Data /////////////////////////////////////////////////////////-->
        <div id="myTabContent" class="tab-content">  
          <div class="tab-pane fade" id="send">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <h3 class="panel-title">
                  Email Services
                </h3> 
              </div>
              <div class="panel-body">
                <!-- ////////////////////////////////////////////////////// Send Email php//////////////////////////////////////////////////////////////////////////////-->

                <?php 
                if(isset($_POST['send']))
                {
                  $file = rand(1000,100000)."-".$_FILES['myfile']['name'];
                  $file_loc = $_FILES['myfile']['tmp_name'];
                  $file_size = $_FILES['myfile']['size'];
                  $file_type = $_FILES['myfile']['type'];
                  $folder="files/$file ";
                  $tar=$_SESSION['username'];
                  $send=$_POST['reciever'];
                  $stat=$_POST['file_title'];
                  $ds=$_POST['description'];
// new file size in KB
                  $new_size = $file_size/10240;
// new file size in KB
// make file name in lower case
                  $new_file_name = strtolower($file);
// make file name in lower case
                  $final_file=str_replace(' ','-',$new_file_name);
                  if(move_uploaded_file($file_loc,$folder.$final_file))
                  {
                    $sql="INSERT INTO file_upload(sender,reciever,file_title,description,myfile,type)
                    VALUES('$tar','$send','$stat', '$ds','$folder','$file_type')";
                    mysqli_query($conn,$sql);
                    ?>
                    <script>
                      alert('Your Data Sent successfully now it is ready to view');
                      window.location.href='dtu_cafe_meal.php?success';
                    </script>
                    <?php
                  }
                  else
                  {
                    ?>
                    <script>
                      alert('error while Sending file, You do not allowed to attach more than 10 Mb');
                      window.location.href='dtu_cafe_meal.php?fail';
                    </script>
                    <?php
                  }
                }
                mysqli_close($conn);
                ?>
                <!-- ////////////////////////////////////////////////////// Send Email php//////////////////////////////////////////////////////////////////////////////???-->
                <form action="dtu_cafe_meal.php" method="POST" enctype="multipart/form-data" name="registration_info" onsubmit="return take()">

                  <div class="form-group">
                    <label for="email">To:</label>
                    <input type="text" name="reciever" class="form-control" id="email" required>
                  </div>
                  <div class="form-group">
                    <label for="email">File Title:</label>
                    <input type="text" name="file_title" class="form-control" id="email" required>
                  </div>
                  <div class="form-group">
                    <label for="name">Enter some text As you want</label>
                    <textarea type="text" class="form-control" name="description" rows="4"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="name">Attach File Here</label>
                    <input  type="file" name="myfile"/><br><br>
                  </div>
                  <div class="form-group">        
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" name="send" class="btn btn-success"><i class="fa fa-sign-in"></i>&nbsp;Send</button>
                      <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove">&nbsp;</span>Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- //////////////////////////////////////////////////////////////////////// Sending email Data /////////////////////////////////////////////////////////???-->

        <!-- //////////////////////////////////////////////////////////////////////// View email Data /////////////////////////////////////////////////////////-->
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade" id="view">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <h3 class="panel-title">
                  Email Services
                </h3> 
              </div>
              <div style="overflow:scroll" class="panel-body">

                <!-- ////////////////////////////////////////////////////// view Email php//////////////////////////////////////////////////////////////////////////////-->
                <table width="100%" class="table table-striped " id="dataTables-modal">
                  <thead>
                    <tr>
                      <th>Sender</th>
                      <th>Reciever</th>
                      <th>File Title</th>
                      <th>Description</th>
                      <th>File Path</th>
                      <th>File Type</th>
                      <th>Posted Date</th>
                      <th>Downloads</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                   
                   $user_name=$_SESSION['username'];
                   $check_data = "SELECT * FROM file_upload WHERE reciever ='$user_name' ORDER BY p_date ASC ";
                   $run=mysqli_query($conn,$check_data);
                   if(mysqli_num_rows($run)>0)
                   {
                    while($row = mysqli_fetch_assoc($run))
                    { 
                      $sender= $row['sender'];
                      $reciever= $row['reciever'];
                      $file_title= $row['file_title'];
                      $description= $row['description'];
                      $file= $row['myfile'];
                      $type= $row['type'];
                      $date= $row['p_date'];
                      
                      ?>
                      <tr>
                       <td style="overflow:hide"><?php echo ''.$row['sender'].''; ?></td>
                       <td style="overflow:hide"> <?php echo ''.$row['reciever'].''; ?> </td>
                       <td style="overflow:hide"><?php echo ''.$row['file_title'].'';?></td>
                       <td style="overflow:hide"><?php echo ''.$row['description'].'';?></td>
                       <td style="overflow:hide"><?php echo ''.$row['myfile'].'';?></td>
                       <td style="overflow:hide"><?php echo ''.$row['type'].'';?></td>
                       <td style="overflow:hide"><?php echo ''.$row['p_date'].'';?></td>
                       <td style="overflow:hide"><a href="download_file.php?download=$file">View File</a></td>
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
                      <strong> Data is Not Avialable Please try Again</strong> 
                    </div>
                    <?php      
                  }         
                  ?> 
                </tbody>
              </table> 
              <!-- //////////////////// view Email php ////////////??-->
            </div>
          </div>
        </div>
      </div>
      <!-- ////// view email Data ///////////////////////////////???-->
    </div>
    
    <!-- /////////////////////////////////////// email Tabe ////???-->



  </div>
</div>

<?php
if(isset($_POST['tick_breakfast'])){
  $user_name = $_POST['stu_id'];
  $check_student = "SELECT * FROM stu_data WHERE stu_id = '$user_name'";
  $run=mysqli_query($conn,$check_student);
  if(mysqli_num_rows($run)>0)
  {
   $existance_of_id="SELECT stu_id,d_date from breakfast where stu_id='$user_name' AND DATE(d_date)=DATE(NOW()) ";
   $check=mysqli_query($conn,$existance_of_id);
   if(mysqli_num_rows($check)>0){
    ?>
    <div class="alert alert-danger alert-dismissible" rol="alert">
      <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
      <strong> The Student have had a breakfast</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br><br>
      <!--For Breakfast Notification////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->  
      <?php
      $qry=mysqli_query($conn,"SELECT s.stu_id,s.first_name,s.faculty,s.image,b.stu_id,b.d_date FROM stu_data s, breakfast b WHERE s.stu_id='$user_name' AND b.stu_id='$user_name' AND  DATE(b.d_date)=DATE(NOW())");
      if($qry){
        while ($myrow = mysqli_fetch_assoc($qry))
        {
         $sd=$myrow['stu_id'];
         $fn=$myrow['first_name'];
         $f=$myrow['faculty'];
         $img=$myrow['image'];
         ?>
         
         <table class="table table-bordered table-responsive">
          <tr>
            <td><label class="control-label"> Student Photo</label></td>
            <td>
              <div class="col-lg-4">
               <div class="btn btn-file btn-success" >
                 <?php echo '<img width="250" height="235" src="data:image;base64,'.$myrow["image"].'" />'; ?></div>
               </div> 
             </td>
           </tr>
           

           <tr>
            <td><label class="control-label">Tiker_Id:</label></td>
            <td><?php echo $sd; ?> </td>
          </tr>
          
          <tr>
            <td><label class="control-label">First_Name:</label></td>
            <td><?php echo $fn; ?> </td>
          </tr> 
          <tr>
            <td><label class="control-label">Faculty:</label></td>
            <td><?php echo $f; ?> </td>
          </tr>
          <tr>
            <td colspan="2">
              
              
              <center><a class="btn btn-danger" href="dtu_cafe_meal.php"> <span class="glyphicon glyphicon-backward"></span>Back To Meal Attendance  Page </a></center>
              
            </td>
          </tr>
          
        </table>

        <?php
      }
    }  
    ?>
    <!--////////For Breakfast Notification////////////////////-->
  </div>
  <?php
}
else{
  $query = mysqli_query($conn,"insert into breakfast (stu_id,d_date) values ('$user_name',NOW())");
    //$res = mysql_query($query,$conn);
  if($query){
    ?>
    <!--//////////////////////////////////////////For Breakfast Success Notification///////////////////////////-->
    <div class="alert alert-success alert-dismissible" rol="alert">
      <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
      <strong> The Student is Allowed for Breakfast</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br><br>
      To close Success Message Press The  X  sign to the right side 
      <?php
      $qry=mysqli_query($conn,"SELECT stu_id,first_name,faculty,image FROM stu_data WHERE stu_id='$user_name' ");
      if($qry){
        while ($myrow = mysqli_fetch_assoc($qry))
        {
         $sd=$myrow['stu_id'];
         $fn=$myrow['first_name'];
         $f=$myrow['faculty'];
         $img=$myrow['image'];
         ?>
         
         <table class="table table-bordered table-responsive">
          
           <tr>
            <td><label class="control-label"> Student Photo</label></td>
            <td>
              <div class="col-lg-4">
                <div class="btn btn-file btn-success" >
                 <?php echo '<img width="250" height="235" src="data:image;base64,'.$myrow["image"].'" />'; ?></div>
               </div> 
             </td>
           </tr>
           
           <tr>
            <td><label class="control-label">Student Id:</label></td>
            <td><?php echo $sd; ?> </td>
          </tr>
          
          <tr>
            <td><label class="control-label">First Name:</label></td>
            <td><?php echo $fn; ?> </td>
          </tr> 
          <tr>
            <td><label class="control-label">Faculty:</label></td>
            <td><?php echo $f; ?> </td>
          </tr>
          <tr>
            <td colspan="2">
              
              
              <center><a class="btn btn-danger" href="dtu_cafe_meal.php"> <span class="glyphicon glyphicon-backward"></span>Back To Meal Attendance Page </a></center>
              
            </td>
          </tr>
          
        </table>

        <?php
      }
    }  
    ?>
  </div>
  <!--//////////////////////////////////////////For Breakfast Success Notification/////////////////////////////////////////////////////////////////////-->
  <?php
}
else{
  ?>
  <div class="alert alert-danger alert-dismissible" rol="alert">
    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
    <strong> The Student Id is not inserted into breakfast table</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br><br>
    To close Success Message Press The  X  sign to the right side 
  </div>
  <?php
}
}

}
else{
  ?>
  <div class="alert alert-danger alert-dismissible" rol="alert">
    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
    <strong> The Student are Not found in The system Database</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br><br>
    To close Success Message Press The  X  sign to the right side 
  </div>
  <?php
       //echo"<script>window.open('dtu_cafe_meal.php','_self')</script>";
}
}

    ///////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_POST['tick_lunch'])){
  $user_name = $_POST['stu_id'];

  $check_student = "SELECT * FROM stu_data WHERE stu_id = '$user_name'";
  $run=mysqli_query($conn,$check_student);
  if(mysqli_num_rows($run)>0)
  {
   $existance_of_id="SELECT stu_id,d_date from lunch where stu_id='$user_name' AND DATE(d_date)=DATE(NOW()) ";
   $check=mysqli_query($conn,$existance_of_id);
   if(mysqli_num_rows($check)>0){
    ?>
    <!--/////////////////////////////////////// For Lunch Error Notification ///////////////////////////////////-->  
    <div class="alert alert-danger alert-dismissible" rol="alert">
      <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
      <strong> The Student have hade a lunch</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br><br>
      
      
      <?php
      $qry=mysqli_query($conn,"SELECT s.stu_id,s.first_name,s.faculty,s.image,l.stu_id,l.d_date FROM stu_data s, lunch l WHERE s.stu_id='$user_name' AND l.stu_id='$user_name' AND  DATE(l.d_date)=DATE(NOW()) ");
      if($qry){
        while ($myrow = mysqli_fetch_assoc($qry))
        {
         $sd=$myrow['stu_id'];
         $fn=$myrow['first_name'];
         $f=$myrow['faculty'];
         $img=$myrow['image'];
         ?>
         <table class="table table-bordered table-responsive">
           <tr>
            <td><label class="control-label"> Student Photo</label></td>
            <td>
              <div class="col-lg-4">
                <div class="btn btn-file btn-success" >
                  <?php echo '<img width="250" height="235" src="data:image;base64,'.$myrow["image"].'" />'; ?></div>
                </div> 
              </td>
            </tr>
            

            <tr>
              <td><label class="control-label">Tiker_Id:</label></td>
              <td><?php echo $sd; ?> </td>
            </tr>
            
            <tr>
              <td><label class="control-label">First_Name:</label></td>
              <td><?php echo $fn; ?> </td>
            </tr> 
            <tr>
              <td><label class="control-label">Faculty:</label></td> 
              <td><?php echo $f; ?> </td>
            </tr>
            <tr>
              <td colspan="2">
                
                
                <center><a class="btn btn-danger" href="dtu_cafe_meal.php"> <span class="glyphicon glyphicon-backward"></span>Back To Meal Attendance Page </a></center>
                
              </td>
            </tr>
            
          </table>

          <?php
        }
      }  
      ?>
      
    </div>
    <!--//////////////////////////////////////////// For Lunch Error Notification  /////////////////////////-->        
    <?php
  }
  else{
    $query = mysqli_query($conn,"insert into lunch (stu_id,d_date) values ('$user_name',NOW())");
    //$res = mysql_query($query,$conn);
    if($query){
      ?>
      <!--//////////////////////////////////////////For Lunch Success Notification//////////////////////////////////////////-->
      <div class="alert alert-success alert-dismissible" rol="alert">
        <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
        <strong> The Student is Allowed for Lunch</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br><br>
        To close Success Message Press The  X  sign to the right side 
        <?php
        $qry=mysqli_query($conn,"SELECT stu_id,first_name,faculty,image FROM stu_data WHERE stu_id='$user_name' ");
        if($qry){
          while ($myrow = mysqli_fetch_assoc($qry))
          {
           $sd=$myrow['stu_id'];
           $fn=$myrow['first_name'];
           $f=$myrow['faculty'];
           $img=$myrow['image'];
           ?>
           
           <table class="table table-bordered table-responsive">
            
             <tr>
              <td><label class="control-label"> Student Photo</label></td>
              <td>
                <div class="col-lg-4">
                  <div class="btn btn-file btn-success" >
                   <?php echo '<img width="250" height="235" src="data:image;base64,'.$myrow["image"].'" />'; ?></div>
                 </div> 
               </td>
             </tr>
             
             <tr>
              <td><label class="control-label">Student Id:</label></td>
              <td><?php echo $sd; ?> </td>
            </tr>
            
            <tr>
              <td><label class="control-label">First Name:</label></td>
              <td><?php echo $fn; ?> </td>
            </tr> 
            <tr>
              <td><label class="control-label">Faculty:</label></td>
              <td><?php echo $f; ?> </td>
            </tr>
            <tr>
              <td colspan="2">
                
                
                <center><a class="btn btn-danger" href="dtu_cafe_meal.php"> <span class="glyphicon glyphicon-backward"></span>Back To Meal Attendance Page </a></center>
                
              </td>
            </tr>
            
          </table>

          <?php
        }
      }  
      ?>
    </div>
    <!--//////////////////////////////////////////For Lunch Success Notification///////////////////////////////////-->
    <?php
  }
  else{
    ?>
    <div class="alert alert-danger alert-dismissible" rol="alert">
      <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
      <strong> The Student is Not Registered into Lunch Table</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br><br>
      To close Success Message Press The  X  sign to the right side 
    </div>
    <?php
  }
      // echo"<script>window.open('dtu_cafe_meal.php','_self')</script>";
}
}
else{
  ?>
  <div class="alert alert-danger alert-dismissible" rol="alert">
    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
    <strong> The Student are Not Present in the Syste Database</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br><br>
    To close Success Message Press The  X  sign to the right side 
  </div>
  <?php
}
}

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if(isset($_POST['tick_dinner'])){
  $user_name = $_POST['stu_id'];
  $check_student = "SELECT * FROM stu_data WHERE stu_id = '$user_name'";
  $run=mysqli_query($conn,$check_student);
  if(mysqli_num_rows($run)>0)
  {
   $existance_of_id="SELECT stu_id, d_date from dinner where stu_id='$user_name' AND DATE(d_date) = DATE(NOW())";
   $check=mysqli_query($conn,$existance_of_id);
   if(mysqli_num_rows($check)>0){
    ?>

    <!--////////////////////////////////////////////////// For Dinner  error Notification //////////////////////////////////////////////////////////////////////-->  
    <div class="alert alert-danger alert-dismissible" rol="alert">
      <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
      <strong> The Student have had a Dinner</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br><br>

      <?php
      $qry=mysqli_query($conn,"SELECT s.stu_id,s.first_name,s.faculty,s.image,d.stu_id,d.d_date FROM stu_data s, dinner d WHERE s.stu_id='$user_name' AND  d.stu_id='$user_name' AND  DATE(d.d_date)=DATE(NOW()) ");
      if($qry){
        while ($myrow = mysqli_fetch_assoc($qry))
        {
         $sd=$myrow['stu_id'];
         $fn=$myrow['first_name'];
         $f=$myrow['faculty'];
         $img=$myrow['image'];
         ?>
         
         <table class="table table-bordered table-responsive">
          <tr>
            <td><label class="control-label"> Student Photo</label></td>
            <td>
              <div class="col-lg-4">
               <div class="btn btn-file btn-success" >
                <?php echo '<img width="250" height="235" src="data:image;base64,'.$myrow["image"].'" />'; ?></div>
              </div> 
            </td>
          </tr>
          

          <tr>
            <td><label class="control-label">Student Id:</label></td>
            <td><?php echo $sd; ?> </td>
          </tr>
          
          <tr>
            <td><label class="control-label">First Name:</label></td>
            <td><?php echo $fn; ?> </td>
          </tr> 
          <tr>
            <td><label class="control-label">Faculty:</label></td>
            <td><?php echo $f; ?> </td>
          </tr>
          <tr>
            <td colspan="2">
              
              
              <center><a class="btn btn-danger" href="dtu_cafe_meal.php"> <span class="glyphicon glyphicon-backward"></span>Back To Meal Attendance Page </a></center>
              
            </td>
          </tr>
          
        </table>

        <?php
      }
    }  
    ?>
    
  </div>
  <!--//////////////////////////////////////////For Dinner Error Notification/////////////////////////////////////-->           
  <?php
}
else{
  $query = mysqli_query($conn,"insert into dinner (stu_id,d_date) values ('$user_name',NOW())");
    //$res = mysql_query($query,$conn);
  if($query){
    ?>
    <!--//////////////////////////////////////////For Dinner Success Notification/////////////////////////////////////////-->   
    <div class="alert alert-success alert-dismissible" rol="alert">
      <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
      <strong> The Student is Allowed for Dinner</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br><br>
      To close Success Message Press The  X  sign to the right side 
      <?php
      $qry=mysqli_query($conn,"SELECT stu_id,first_name,faculty,image FROM stu_data WHERE stu_id='$user_name' ");
      if($qry){
        while ($myrow = mysqli_fetch_assoc($qry))
        {
         $sd=$myrow['stu_id'];
         $fn=$myrow['first_name'];
         $f=$myrow['faculty'];
         $img=$myrow['image'];
         ?>
         
         <table class="table table-bordered table-responsive">
          
           <tr>
            <td><label class="control-label"> Student Photo</label></td>
            <td>
              <div class="col-lg-4">
                <div class="btn btn-file btn-success" >
                 <?php echo '<img width="250" height="235" src="data:image;base64,'.$myrow["image"].'" />'; ?></div>
               </div> 
             </td>
           </tr>
           
           <tr>
            <td><label class="control-label">Student Id:</label></td>
            <td><?php echo $sd; ?> </td>
          </tr>
          
          <tr>
            <td><label class="control-label">First Name:</label></td>
            <td><?php echo $fn; ?> </td>
          </tr> 
          <tr>
            <td><label class="control-label">Faculty:</label></td>
            <td><?php echo $f; ?> </td>
          </tr>
          <tr>
            <td colspan="2">
              
              
              <center><a class="btn btn-danger" href="dtu_cafe_meal.php"> <span class="glyphicon glyphicon-backward"></span>Back To Meal Attendance Page </a></center>
              
            </td>
          </tr>
          
        </table>

        <?php
      }
    }  
    ?>
  </div>
  <!--//////////////////////////////////////////For Dinner Success Notification/////////////////////////////////////////-->              
  <?php
}
else{
  ?>
  <div class="alert alert-danger alert-dismissible" rol="alert">
    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
    <strong> The Student Id is not inserted into Dinner table</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br><br>
    To close Success Message Press The  X  sign to the right side 
  </div>
  <?php
}
}

}
else{
  ?>
  <div class="alert alert-danger alert-dismissible" rol="alert">
    <button type="button" class="close" data-dismiss="alert" aria-lebel="Close"><span area-hidden="true">&times;</span></button>
    <strong> The Student are Not found in The system Database</strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br><br>
    To close Success Message Press The  X  sign to the right side 
  </div>
  <?php
       //echo"<script>window.open('dtu_cafe_meal.php','_self')</script>";
}
}
?>
<div style=""id="myTabContent" class="tab-content">

  <!-- //////////////////////////////////////////////////////////////////////////// for breakfast page //////////////////////////////-->
  <?php
  ?>
  <div class="tab-pane fade" id="home">
    <?php
    /*}
    else
      echo '<script>alert("This Is Not the Time for break fast, So wait")</script>';
    }
      */?>
    </div>
    <!-- /////////////////////////////////////////////////////// for breakfast page //////////////////////////////-->

    <!--authentication ///////////////////////////////#############form-->

    <div class="tab-pane fade" id="ios">
      <!--student//////////////////////////////////////////registration collapse22222222222222222-->
      


      <!--student//////////////////////////////////////////registration collapse3333333333-->
    </div>
    <div class="tab-pane fade" id="dinner">
      <!--student//////////////////////////////////////////registration collapse22222222222222222-->
      
    </div>
    <!--/////////////////////////////////// For Electronic Mail /////////////////////////////////////////////////////-->
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
<!--////////////////////////// For Electronic Mail /////////////////////////////////////////////////////-->
</div>
</div>
</div>
</div>
</div>
<!--</div>-->
<!--.........................password change  Modal....................... -->
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
    <form class="form-horizontal" method="POST" action="dtu_cafe_meal.php">
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
<!--...password change  Modal.......................???????? -->

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

<!-- Morris Charts JavaScript -->
<script src="vendor/raphael/raphael.min.js"></script>
<script src="vendor/morrisjs/morris.min.js"></script>
<script src="data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>
<script src="js/bxslider.min.js"></script>
<script src="js/script.slider.js"></script>
<script>
  $(function () { $('#myModal').modal({
    keyboard: true
  })});
</script> 
<script>
  $(function () {
    $('#myTab li:eq(1) a').tab('show');
  });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>

<script>
          // ////////////////////////////////////    javascript for breakfast   //////////////////////////////////// 
          $(document).ready(function(){
            $.datepicker.setDefaults({
              dateFormat:'yy-mm-dd'
            });
            $(function(){
              $("#from").datepicker();
              $("#to").datepicker();
            });
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
     // ////////////////////////////////////    javascript for breakfast   //////////////////////////////////// 
   </script>
   <script>
          // ////////////////////////////////////    javascript for Lunch   //////////////////////////////////// 
          $(document).ready(function(){
            $.datepicker.setDefaults({
              dateFormat:'yy-mm-dd'
            });
            $(function(){
              $("#from_lunch").datepicker();
              $("#to_lunch").datepicker();
            });
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
   <script>
          // ////////////////////////////////////    javascript for Dinner   //////////////////////////////////// 
          $(document).ready(function(){
            $.datepicker.setDefaults({
              dateFormat:'yy-mm-dd'
            });
            $(function(){
              $("#from_dinner").datepicker();
              $("#to_dinner").datepicker();
            });
            $('#range_dinner').click(function(){
              var from=$('#from_dinner').val();
              var to=$('#to_dinner').val();
              if(from!='' && to!=''){
                $.ajax({
                 url:"range.php",
                 method:"POST",
                 data:{from_dinner:from,to_dinner:to},
                 success:function(data)
                 {
                  $('#div_dinner').html(data);
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
   
   <script>
    $(document).ready(function() {
      $('#dataTables-example').DataTable({
        responsive: true
      });
    });
  </script>
</body>
</html>