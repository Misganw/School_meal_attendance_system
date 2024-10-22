  <!DOCTYPE html>
  <html lang="en">
  <?php
  session_start();
  include('database_conn.php');
  if($_SESSION['usertype']!='2'){
    header("Location: http://localhost/dtu/smics");
  }
  ?>
  <?php
  if(isset($_GET['delete_useracount'])){
    $user_id=$_GET['username'];
    $query="DELETE from authentication where username = '$user_id'";
    $result=mysqli_query($conn,$query);
    if($result){
      echo '<script>alert("data deleted Successfully")</script>';
    }
    else
      echo '<script>alert("not deleted")</script>';
  }
  if(isset($_GET['delete_earnedid'])){
    $user_id=$_GET['stu_id'];
    $query="DELETE from id_issued where stu_id = '$user_id'";
    $result=mysqli_query($conn,$query);
    if($result){
      echo '<script>alert("data deleted Successfully")</script>';
    }
    else
      echo '<script>alert("not deleted")</script>';
  }
  if(isset($_GET['delete_not_earnedid'])){
    $user_id=$_GET['stu_id'];
    $query="DELETE from id_reearned where stu_id = '$user_id'";
    $result=mysqli_query($conn,$query);
    if($result){
      echo '<script>alert("data deleted Successfully")</script>';
    }
    else
      echo '<script>alert("not deleted")</script>';

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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <script type="text/javascript" src=vendor/jquery/jquery.min.js></script>
    <script type="text/javascript" src="lang_translate.js"></script>
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css"  rel="stylesheet">
    <link href="vendor/datatables-responsive/dataTables.responsive.css"  rel="stylesheet">
    <link href="vendor/datatables/css/dataTables.bootstrap.min.css"  rel="stylesheet">
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
    </style>
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
    function printContent_idearned(ell){
      var restorepage=document.body.innerHTML;
      var printcontent = document.getElementById(ell).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
  </script>
  <script type="text/javascript">
    function printContent_idearned_dep(ell){
      var restorepage=document.body.innerHTML;
      var printcontent = document.getElementById(ell).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
  </script>
  <script type="text/javascript">
    function printContent_i(ell){
      var restorepage=document.body.innerHTML;
      var printcontent = document.getElementById(ell).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
  </script>
  <script type="text/javascript">
    function printContent_idearned_ye(ell){
      var restorepage=document.body.innerHTML;
      var printcontent = document.getElementById(ell).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
  </script>
  <script type="text/javascript">
    function printContent_idearned_h(ell){
      var restorepage=document.body.innerHTML;
      var printcontent = document.getElementById(ell).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
  </script>
  <script type="text/javascript">
    function printContent_idearned_not(ell){
      var restorepage=document.body.innerHTML;
      var printcontent = document.getElementById(ell).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
  </script>
  <script type="text/javascript">
    function printContent_idearned_dep_not(ell){
      var restorepage=document.body.innerHTML;
      var printcontent = document.getElementById(ell).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
  </script>
  <script type="text/javascript">
    function printContent_idearned_ye_not(ell){
      var restorepage=document.body.innerHTML;
      var printcontent = document.getElementById(ell).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
  </script>
  <script type="text/javascript">
    function printContent_idearned_h_not(ell){
      var restorepage=document.body.innerHTML;
      var printcontent = document.getElementById(ell).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
  </script>
  <script type="text/javascript">
    function printContent_faculty_recreate(ell){
      var restorepage=document.body.innerHTML;
      var printcontent = document.getElementById(ell).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
  </script>
  <script type="text/javascript">
    function printContent_dep_recreate(ell){
      var restorepage=document.body.innerHTML;
      var printcontent = document.getElementById(ell).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
  </script>
  <script type="text/javascript">
    function printContent_ye_recreate(ell){
      var restorepage=document.body.innerHTML;
      var printcontent = document.getElementById(ell).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
  </script>
  <script type="text/javascript">
    function printContent_h_recreate(ell){
      var restorepage=document.body.innerHTML;
      var printcontent = document.getElementById(ell).innerHTML;
      document.body.innerHTML = printcontent;
      window.print();
      document.body.innerHTML = restorepage;
    }
  </script>
</head>
<body  style="background-image:; font-family: times ">
  <div style="background-color: " class="container">
   <nav style="max-heigt:100px;background-color:#20416c;color:white; position:;" class="navbar navbar-default ">
    <div class="container-fluid"></div>
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>    
      <a ><img class="img-round img-responsive" style="max-height:60px;padding-top:2px" src="img/dtu_cafe_logo.png" /></a>    
    </div>
    <div  class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul style="margin-right:9px;display:block" class="nav navbar-nav navbar-right">
        <li><a style="color:white;font-size:14px;font-family:italic" href="dtu_student_registration.php"><p class="lang" key="home">Home </p></a></li>
        <li><a style="color:white;font-size:14px;font-family:italic" href=""><p><b class="lang" key="logedas">Loged As:- </b>
          <?php echo ' '.$_SESSION["username"].'';?></p></a></li>
          <li><a style="color:white;font-size:14px;font-family:italic" href="logout_user.php"  title="click for edit" onclick="return confirm('Are you sure to leave from the system?')"><p class="lang" key="logout">Logout</p></a></li>
          <li><a style="color:white;font-size:14px;font-family:italic" href="#editModal" data-toggle="modal"><p class="lang" key="change password">Change Password</p></a></li>
          <li> <a style="color:white;font-size:14px;" href="#gbar" data-toggle="collapse"><span class="   glyphicon glyphicon-barcode"></span>&nbsp; <b class="lang" key="create id">Create id</b></a> 
          </li>
          <li> <a style="color:white;font-size:14px;" href="#report" data-toggle="collapse"><span class="   glyphicon glyphicon-eye-open"></span>&nbsp; <b class="lang" key="generate report">Report</b></a> 
          </li>
          <li class=""><a style="color:white;font-size:14px;font-family:italic" href=""><p><b>
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
      </div>
      <!--container-->
      <div style="background-color: " class="container">
        <div style="">
          <div style="margin-top:20px;" class="panel panel-primary">
           <center> <h3 style="font-size: 18px;color:#0066ff" class="panel-title"><b class="lang" key="adtusmics"> የደብረ ታቦር ዩኒቨርሲቲ ዘመናዊ ካርድ ስርአት</b>&nbsp;&nbsp;&nbsp;<img style= "height: 70px; width: 70px" src="img/dtu_logo.png">&nbsp;&nbsp;&nbsp;<b class="lang" key="dtusmics">Debre Tabor University Smart ID Card System (SMICS for DTU)</b>
            <!--<p><img class="img-responsive"src="img/dtusmalogo.png"></p>-->
          </h3>
        </center>
      </div>
    </div>
  </div> 
  <!-- ////////////////// Change Password ////////////////////-->
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
      if($passrow[3]=$hash_opass && $hash_npass=$hash_cpass){
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
 ?>   <!-- ////////// Change Password //////////////????-->
 <!-- ................ barcode generation...........................-->
 <div id="gbar" class="panel-collapse collapse">
  <div class="container">
    <div class="panel panel-primary">
     <div class="panel-body">
       <div class="col-lg-3">
        <a style="text-decoration:none" href="#issue_view" data-toggle="collapse"><span class="glyphicon glyphicon-eye-open"></span>&nbsp; <b class="lang" key="earned id">earnd id</b></a>
      </div>
      <div class="col-lg-3">
        <a style="text-decoration:none" href="#not_issue_view" data-toggle="collapse"><span class="glyphicon glyphicon-eye-open"></span>&nbsp; <b class="lang" key="not earned id"> Not earned id</b></a>
      </div>
      <div class="col-lg-2"><i class="fa fa-bell fa-fw"></i> Create ID</div>
      <div class="col-lg-4">                   
        <form action="dtu_student_registration.php" method="POST">
          <div class="input-group custom-search-form">
            <input type="text" class="form-control" name="stu_id" placeholder="Search..." autofocus>
            <span class="input-group-btn">
              <button class="btn btn-default" name="check_stu_id" type="submit">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<!--..................... ID Generation................-->
<?php
if(isset($_POST['check_stu_id']))
{
  $stid=$_POST['stu_id'];
  ?>
  <div class="container">
    <div class="panel panel-primary">
     <div class="panel-body">
      <div class="row">
        <div class="col-lg-8">
          <?php
          $qry=mysqli_query($conn,"SELECT * from stu_data where stu_id='$stid' AND status='1' ");
          if($qry)
          {
            $session=$_SESSION['username'];
            while ($myrow=mysqli_fetch_assoc($qry)) {
              extract($myrow);
              ?>
              <div style="position:absolute" id="print_id">
               <table id="" class="display nowrap" style="width:60px; hight:40px;position:absolute">
                <thead>
                  <tr>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="width:60%" colspan="2"><img src="img/id_header.jpg" style="max-width:375px"></td>
                  </tr>
                  <tr>
                   <td style="width:70%; hight:60%">
                    <?php echo '<b>Full Name : '.$myrow['first_name'].'</b>'; ?>
                    <?php echo '<br>';?>
                    <?php echo '<b>Department : '.$myrow['department'].'</b>'; ?>
                    <?php echo '<br>';?>
                    <?php
                    $Today=date('d:m:y');
                    ?>
                    <?php echo '<b>Issue date : '.$Today.'</b>'; ?>  
                    <?php echo '<br>';?>
                    <?php echo '<br>';?>
                  </td>
                  <td style="width:28%" rowspan="2">
                    <?php echo '<img style="max-width:220px;max-height:115px" src="data:image;base64,'.$myrow["image"].'" />'; ?>
                  </td>
                </tr>
                <tr>
                  <td style="width:70%; hight:30%" >
                    <?php
                    $text=$myrow['stu_id'];
                    echo "<img src='barcode.php?codetype=Code128&size=40&text=".$text."&print=true'/>";
                    ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-lg-4">
         <?php
         $fn=$myrow['first_name'];
         $se=$myrow['sex'];
         $em=$myrow['email'];
         $ph=$myrow['phone'];
         $fa=$myrow['faculty'];
         $dep=$myrow['department'];
         $strm=$myrow['stream'];
         $ye=$myrow['year'];
//$acy=$myrow['ac_year'];
         $stat=$myrow['status'];
         $check=mysqli_query($conn,"SELECT * from id_issued WHERE stu_id='$stid' AND status='1'");
         $count=mysqli_num_rows($check);
         if($count>0)
         {
          ?>
          <br>
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <h3 style="color:red">Data is not entered into earned table because Id card is already Created!.so you can't print id, to resolve please inactive student status</h3>
          </div>
          <?php

        }
        else
        {
          ?>
          <button onclick="printContent('print_id')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button> 
          <?php
          $qr=mysqli_query($conn,"SELECT * from id_issued where stu_id='$stid' AND status=0");
          $countt=mysqli_num_rows($qr);
          if($countt>0)
          {
            $qrr=mysqli_query($conn,"UPDATE id_issued set status=1  where stu_id='$stid' ");
            ?>
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <h3 style="color:green">Data changed and student statuse activated. so you can print id</h3>
            </div>
            <?php
          }
          else
          {
            $query=mysqli_query($conn,"INSERT into id_issued (stu_id, first_name, sex, email, phone, faculty, department, stream, year, ac_year, status, user, ec) VALUES ('$stid','$fn','$se','$em','$ph','$fa','$dep','$strm','$ye',NOW(),'$stat', '$session', NOW())");
            if($query)
            {
             echo '<script>alert("Id cared Created seccussfully")';
           }
           else
           {
            ?>
            <div class="alert alert-warning">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <h3 style="color:green">Id card is not Created!</h3>
            </div>
            <?php
          }
        }
      }
    }
  }
  else
  {
    ?>
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert"></button>
      <h3 style="color:green">There is no such type of id!</h3>
    </div>
    <?php
  }
  ?>
</div>
</div>
</div>
</div>
</div>
<?php
}
?>
<!--..../.................... ID genaeration..........-->

<!--.......view id Issued Student...............-->
<div class="container">
  <div  style="color:" class="panel-collapse collapse" id="issue_view">
    <div class="panel panel-primary">
      <div class="panel-body">
        <?php
        $result = mysqli_query($conn,"SELECT * FROM id_issued ");
        $num_rows = mysqli_num_rows($result);

        echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
        ?>
        <table width="100%" class="table table-striped table-bordered table-hover" id="id_issued">
          <thead>
            <tr>
              <th class="lang" key="id">Student Id</th>
              <th class="lang" key="full name">Full Name</th>
              <th class="lang" key="sex">Sex</th>
              <th class="lang" key="department">Department</th>
              <th class="lang" key="year">Year</th>
              <th class="lang" key="ac_year">Ac_Year</th>
              <th class="lang" key="user">User</th> 
              <th class="lang" key="status">Status</th>
            </tr>
          </thead>
          <tbody>
           <?php
                //include('database_conn.php');
           $check_data = "SELECT * FROM id_issued ORDER BY first_name ASC ";
           $run=mysqli_query($conn,$check_data);
           if(mysqli_num_rows($run)>0)
           {
            $sess=$_SESSION['username'];
            while($row = mysqli_fetch_assoc($run))
            { 
              extract($row);
              $std=$row['stu_id'];
              ?>
              <tr>
               <td><?php echo ''.$row['stu_id'].''; ?></td>
               <td><?php echo ''.$row['first_name'].''; ?> </td>
               <td><?php echo ''.$row['sex'].''; ?></td>
               <td><?php echo ''.$row['department'].''; ?></td>
               <td><?php echo ''.$row['year'].' '; ?></td>
               <td><?php echo ''.$row['ac_year'].''; ?></td>
               <td><?php echo ''.$row["user"].'';?></td>
               <td>
                <form clas="form-horizontal" action="dtu_student_registration.php" method="post">
                  <select style="width: 25px" name="stu_id">
                    <option value="<?php echo $row['stu_id'];?>"><?php echo $row['stu_id'];?> </option>; 
                  </select>
                  &nbsp;&nbsp;&nbsp;
                  <?php
                  $query="SELECT status FROM id_issued where stu_id='$std'";
                  $result=mysqli_query($conn,$query);
                  if($result){
                   $st=mysqli_fetch_array($result);
                   if($st['status'] ==1){
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
                  <button type="submit" name="changes_earnedid"><span class='glyphicon glyphicon-edit' area-hidden='true'></span></button>
                </div> 
              </form>
              <?php
              if(isset($_POST['changes_earnedid'])){
                $std=$_POST['stu_id'];
                $st=$_POST['status'];
                $q=mysqli_query($conn,"UPDATE id_issued SET  status='$st'  WHERE stu_id='$std'");
                if($q){
                  echo '<script>alert("changed")</script>';
                  echo"<script>window.open('dtu_student_registration.php','_self')</script>";
                }
                else
                  echo '<script>alert("Not changed")</script>';
                echo"<script>window.open('dtu_student_registration.php','_self')</script>";
              }
              ?>
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
</div>
</div>
</div>
</div>
<!--........view id Issued Student...............-->

<!--./.......view id not Issued Student...............-->
<div class="container">
  <div  style="color:" class="panel-collapse collapse" id="not_issue_view">
    <div class="panel panel-primary">
      <div class="panel-body">
        <?php
        $query=mysqli_query($conn,"SELECT * from  stu_data as sd WHERE not exists(SELECT * from id_issued as idi where sd.stu_id=idi.stu_id) " );
        $c=mysqli_num_rows($query);
        echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
        &nbsp;  <strong> $c    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
        ?>
        <table width="100%" class="table table-striped table-bordered table-hover" id="id_not_issued">
          <thead>
            <tr>
              <th class="lang" key="id">Student Id</th>
              <th class="lang" key="full name">Full Name</th>
              <th class="lang" key="sex">Sex</th>
              <th class="lang" key="department">Department</th>
              <th class="lang" key="year">Year</th>
              <th class="lang" key="ac_year">Ac_Year</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query=mysqli_query($conn,"SELECT * from  stu_data as sd WHERE not exists(SELECT * from id_issued as idi where sd.stu_id=idi.stu_id) " );
            $c=mysqli_num_rows($query);
            if($c>0)
            {
              $sess=$_SESSION['username']; 
              while ($mrow=mysqli_fetch_assoc($query)) { 
                extract($mrow);
                ?>
                <tr>
                 <td><?php echo ''.$mrow['stu_id'].''; ?></td>
                 <td><?php echo ''.$mrow['first_name'].''; ?> </td>
                 <td><?php echo ''.$mrow['sex'].''; ?></td>
                 <td><?php echo ''.$mrow['department'].''; ?></td>
                 <td><?php echo ''.$mrow['year'].' '; ?></td>
                 <td><?php echo ''.$mrow['ac_year'].''; ?></td>  
               </tr>
               <?php
             }
           }
           else
             echo 'data not avialabel';
           ?>  
         </div>
       </tbody>
     </table>
   </div>
 </div>
</div>
</div>
<!--./.......view id not Issued Student...............-->

<!-- ................ barcode generation..................??????-->

<!-- .........Report................................-->
<div class="container">
  <div  style="color:" class="panel-collapse collapse" id="report">
    <div class="panel panel-primary">
      <div class="panel-body">
        <div class="col-lg-12">
          <ul id="myTab" class="nav nav-tabs">
            <li><a class="lang" key="report of earned id" data-target="#demo" class="btn btn-primary" data-parent="#acordion" data-toggle="tab"><span class="glyphicon glyphicon-print"></span>&nbsp;Report of earned id</a >  </li>
            <li><a class="lang" key="report of not earned id" data-target="#dem" class="btn btn-primary" data-parent="#acordion" data-toggle="tab"><span class="glyphicon glyphicon-print"></span>&nbsp;Report of not earned id</a> </li>
            <li class="active"><a class="lang" key="create losted id" data-target="#de" class="btn btn-primary" data-parent="#acordion" data-toggle="tab"><span class="glyphicon glyphicon-barcode"></span>&nbsp;Create losted id</a>  </li>
            <li><a class="lang" key="view recreated id" data-target="#d" class="btn btn-primary" data-parent="#acordion" data-toggle="tab"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;View Recreated Id</a >  </li>
          </ul>
          <div id="myTabContent" class="tab-content">
            <!-- .......tab content for id earnd..............,..-->
            <div style="background-color: white" class="tab-pane fade" id="demo">
              <div class="row">
                <aside>
                  <div class="col-md-6">
                    <div class="form-group">
                      <h4 class="lang" key="faculty">Faculty</h4>
                    </div>
                    <form action="dtu_student_registration.php" method="POST">
                      <div class="form-group">
                        <div class="input-group custom-search-form">
                          <select class="form-control" name="faculty" placeholder="Search..." autofocus>
                            <option class="lang" key="select faculty"  value="">select faculty here</option>
                            <?php
                            $query="SELECT * from faculty where status=1 ORDER BY faculty ASC";
                            $res = mysqli_query($conn,$query);
                            if($res){
                              $count=mysqli_num_rows($res);
                              if($count>=1){
                                while($row=mysqli_fetch_assoc($res)){

                                 ?>
                                 <option value="<?php echo $row['faculty'];?>"><?php echo $row['faculty'];?> </option>;
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
                          <button class="btn btn-default" name="by_faculty" type="submit">
                            <i class="fa fa-search"></i>
                          </button>
                        </span>
                      </div>
                    </div>
                  </form>
                  <div class="form-group">
                    <h4 class="lang" key="department">Department</h4>
                  </div>
                  <form action="dtu_student_registration.php" method="POST">
                    <div class="form-group">
                      <div class="input-group custom-search-form">
                        <select class="form-control" name="department" placeholder="Search..." autofocus>
                          <option class="lang" key="select department"  value="">select Department here</option>
                          <?php
                          $query="SELECT * from department ORDER BY department ASC";
                          $res = mysqli_query($conn,$query);
                          if($res){
                            $count=mysqli_num_rows($res);
                            if($count>=1){
                              while($row=mysqli_fetch_assoc($res)){

                               ?>
                               <option value="<?php echo $row['department'];?>"><?php echo $row['department'];?> </option>;
                               <?php

                             }
                           }
                           else{
                            echo '<option value="">Department is not available';
                          }
                        }
                        ?>
                      </select>
                      <span class="input-group-btn">
                        <button class="btn btn-default" name="by_department" type="submit">
                          <i class="fa fa-search"></i>
                        </button>
                      </span>
                    </div>
                  </div>
                </form> 
                <div class="form-group">
                  <h4 class="lang" key="year">Year</h4>
                </div>
                <form action="dtu_student_registration.php" method="POST">
                  <div class="form-group">
                    <div class="input-group custom-search-form">
                      <select class="form-control" name="year" placeholder="Search..." autofocus>
                        <option value="">Select Year here</option>
                        <option value="1">I Year</option>
                        <option value="2">II Year</option>
                        <option value="3">III Year</option>
                        <option value="4">IV Year</option>
                        <option value="5">V Year</option>
                        <option value="6">VI year</option>
                        <option value="7">VII year</option>
                      </select>
                      <span class="input-group-btn">
                        <button class="btn btn-default" name="by_year" type="submit">
                          <i class="fa fa-search"></i>
                        </button>
                      </span>
                    </div>
                  </div>
                </form>
              </div>
            </aside>
            <div class="col-md-6">
             <form action="dtu_student_registration.php" method="POST">
              <div class="form-group">
                <h4 class="lang" key="faculty">Faculty</h4>
              </div>
              <div class="form-group">
                <select name="faculty" class="form-control" onChange="change_faculty_id()" id="facultylist_id" required>
                  <option class="lang" key="select faculty"  value="">select faculty here</option>
                  <?php
                  //include('database_conn.php');
                  $query="SELECT * from faculty where status=1 ORDER BY faculty ASC";
                  $res = mysqli_query($conn,$query);
                  if($res){
                    $count=mysqli_num_rows($res);
                    if($count>=1){
                      while($row=mysqli_fetch_assoc($res)){

                       ?>
                       <option value="<?php echo $row['faculty'];?>"><?php echo $row['faculty'];?> </option>;
                       <?php 
                     }
                   }
                   else{
                    echo '<option value="">faculty is not available';
                  }
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <h4 class="lang" key="department">Department</h4>
            </div>
            <div class="form-group">
              <div id="dep_id">
                <select class="form-control" name="department" placeholder="Search..." autofocus>
                </select>
              </div>
            </div>
            <div class="form-group">
              <h4 class="lang" key="year">Year</h4>
            </div>
            <div class="form-group">
              <div class="input-group custom-search-form">
                <select class="form-control" name="year" placeholder="Search..." autofocus>
                  <option value="">Select Year here</option>
                        <option value="1">I Year</option>
                        <option value="2">II Year</option>
                        <option value="3">III Year</option>
                        <option value="4">IV Year</option>
                        <option value="5">V Year</option>
                        <option value="6">VI year</option>
                        <option value="7">VII year</option>
                </select>
                <span class="input-group-btn">
                  <button class="btn btn-default" name="by_whole" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--../ .......tab content for id earnd..............,..-->

    <!-- .......tab content for id not earnd..............,..-->
    <div style="background-color: white" class="tab-pane fade" id="dem">
      <div class="row">
        <aside>
          <div class="col-md-6">
            <div class="form-group">
              <h4 class="lang" key="faculty">Faculty</h4>
            </div>
            <form action="dtu_student_registration.php" method="POST">
              <div class="form-group">
                <div class="input-group custom-search-form">
                  <select class="form-control" name="faculty" placeholder="Search..." autofocus>
                    <option class="lang" key="select faculty"  value="">select faculty here</option>
                    <?php
                    $query="SELECT * from faculty where status=1 ORDER BY faculty ASC";
                    $res = mysqli_query($conn,$query);
                    if($res){
                      $count=mysqli_num_rows($res);
                      if($count>=1){
                        while($row=mysqli_fetch_assoc($res)){

                         ?>
                         <option value="<?php echo $row['faculty'];?>"><?php echo $row['faculty'];?> </option>;
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
                  <button class="btn btn-default" name="by_faculty_not" type="submit">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </div>
          </form>
          <div class="form-group">
            <h4 class="lang" key="department">Department</h4>
          </div>
          <form action="dtu_student_registration.php" method="POST">
            <div class="form-group">
              <div class="input-group custom-search-form">
                <select class="form-control" name="department" placeholder="Search..." autofocus>
                  <option class="lang" key="select department"  value="">select Department here</option>
                  <?php
                  $query="SELECT * from department ORDER BY department ASC";
                  $res = mysqli_query($conn,$query);
                  if($res){
                    $count=mysqli_num_rows($res);
                    if($count>=1){
                      while($row=mysqli_fetch_assoc($res)){

                       ?>
                       <option value="<?php echo $row['department'];?>"><?php echo $row['department'];?> </option>;
                       <?php 
                     }
                   }
                   else{
                    echo '<option value="">Department is not available';
                  }
                }
                ?>
              </select>
              <span class="input-group-btn">
                <button class="btn btn-default" name="by_department_not" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </div>
        </form> 
        <div class="form-group">
          <h4 class="lang" key="year">Year</h4>
        </div>
        <form action="dtu_student_registration.php" method="POST">
          <div class="form-group">
            <div class="input-group custom-search-form">
              <select class="form-control" name="year" placeholder="Search..." autofocus>
                <option value="">Select Year here</option>
                        <option value="1">I Year</option>
                        <option value="2">II Year</option>
                        <option value="3">III Year</option>
                        <option value="4">IV Year</option>
                        <option value="5">V Year</option>
                        <option value="6">VI year</option>
                        <option value="7">VII year</option>
              </select>
              <span class="input-group-btn">
                <button class="btn btn-default" name="by_year_not" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </div>
        </form>
      </div>
    </aside>
    <div class="col-md-6">
     <form action="dtu_student_registration.php" method="POST">
      <div class="form-group">
        <h4 class="lang" key="faculty">Faculty</h4>
      </div>
      <div class="form-group">
        <select name="faculty" class="form-control" onChange="change_faculty_id_not()" id="facultylist_id_not" required>
          <option class="lang" key="select faculty"  value="">select faculty here</option>
          <?php
          $query="SELECT * from faculty where status=1 ORDER BY faculty ASC";
          $res = mysqli_query($conn,$query);
          if($res){
            $count=mysqli_num_rows($res);
            if($count>=1){
              while($row=mysqli_fetch_assoc($res)){
               ?>
               <option value="<?php echo $row['faculty'];?>"><?php echo $row['faculty'];?> </option>;
               <?php 
             }
           }
           else{
            echo '<option value="">faculty is not available';
          }
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <h4 class="lang" key="department">Department</h4>
    </div>
    <div class="form-group">
      <div id="dep_id_not">
        <select class="form-control" name="department" placeholder="Search..." autofocus>
        </select>
      </div>
    </div>
    <div class="form-group">
      <h4 class="lang" key="year">Year</h4>
    </div>
    <div class="form-group">
      <div class="input-group custom-search-form">
        <select class="form-control" name="year" placeholder="Search..." autofocus>
          <option value="">Select Year here</option>
                        <option value="1">I Year</option>
                        <option value="2">II Year</option>
                        <option value="3">III Year</option>
                        <option value="4">IV Year</option>
                        <option value="5">V Year</option>
                        <option value="6">VI year</option>
                        <option value="7">VII year</option>
        </select>
        <span class="input-group-btn">
          <button class="btn btn-default" name="by_whole_not" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </div>
  </form>
</div>
</div>
</div>
<!--../ .......tab content for id not earnd..............,..-->

<!-- .......tab content for id inserting recreating..............,..-->
<div style="background-color: white" class="tab-pane fade" id="de">
  <div class="row">
    <div class=" col-lg-offset-0 col-md-4">
     <div class="form-group">
      <h4 class="lang" key="search student">Search student</h4>
    </div>
    <div class="form-group">
      <form action="dtu_student_registration.php" method="POST">
       <div class="input-group custom-search-form">
        <input type="text" class="form-control" name="stu_id" placeholder="Search..." autofocus>
        <span class="input-group-btn">
          <button class="btn btn-default" name="recheck_id" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
  </div>
</div>
</div>
</div>
<div class="row">
  <?php
  if(isset($_POST['recheck_id']))
  {
    $stu=$_POST['stu_id'];
    $query=mysqli_query($conn,"SELECT * from id_issued where stu_id='$stu' AND status='0' ");
    if(mysqli_num_rows($query)>0)
    {
      while ($row=mysqli_fetch_assoc($query)) 
      {
       extract($row);
       ?>
       <form action="dtu_student_registration.php" method="POST">
        <div class="col-md-4">
          <div class="form-group">
            <h4 class="lang" key="full name">Full Name</h4>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="first_name" value="<?php echo ''.$row['first_name'].''; ?>" required>
          </div>
          <div class="form-group">
            <h4 class="lang" key="sex">Sex</h4>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="sex" value="<?php echo ''.$row['sex'].''; ?>" required>
          </div>
          <div class="form-group">
            <h4 class="lang" key="email">Email</h4>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" value="<?php echo ''.$row['email'].''; ?>" required>
          </div>
          <div class="form-group">
            <h4 class="lang" key="phone">Phone number</h4>
          </div>
          <div class="form-group">
            <input type="text" name="phone" class="form-control" value="<?php echo ''.$row['phone'].''; ?>" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <h4 class="lang" key="faculty">Faculty</h4>
          </div>
          <div class="form-group">
            <input type="text" name="faculty" class="form-control" value="<?php echo ''.$row['faculty'].''; ?>" required>
          </div>
          <div class="form-group">
            <h4 class="lang" key="department">Department</h4>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="department" value="<?php echo ''.$row['department'].''; ?>" required>
          </div>
          <div class="form-group">
            <h4 class="lang" key="stream">Specialization</h4>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="stream" value="<?php echo ''.$row['stream'].''; ?>" >
          </div>
          <div class="form-group">
            <h4 class="lang" key="year">Year</h4>
          </div>
          <div class="form-group">
            <select class="form-control" name="year" placeholder="Search..." autofocus>
              <option value="">Select Year here</option>
                        <option value="1">I Year</option>
                        <option value="2">II Year</option>
                        <option value="3">III Year</option>
                        <option value="4">IV Year</option>
                        <option value="5">V Year</option>
                        <option value="6">VI year</option>
                        <option value="7">VII year</option>
            </select>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <h4 class="lang" key="id">Student Id</h4>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="stu_id" value="<?php echo ''.$row['stu_id'].''; ?>" >
          </div>
          <div class="form-group">
            <h4 class="lang" key="description">Description</h4>
          </div>
          <div class="form-group">
            <select class="form-control" name="description" placeholder="Search..." autofocus>
              <option value="">Select Description here</option>
              <option value="Losted">Losted</option>
              <option value="Stollen">Stollen</option>
              <option value="Broaken">Broaken</option>
              <option value="Fade out">Fade out</option>
            </select>
          </div>
          <div class="form-group">
            <h4 class="lang" key="payment">Payment</h4>
          </div>
          <div class="form-group">
            <div class="input-group custom-search-form">
              <input type="text" class="form-control" name="payment" autofocus>
              <span class="input-group-btn">
                <button class="btn btn-default" name="regenerat_id" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </div>
        </div>
      </form>
      <?php
    }
  }
  else
  {
    echo '<script>alert("first deactivate specified student")';
    echo"<script>window.open('dtu_student_registration.php','_self')</script>";
  }
}
?>
</div>
<?php
if(isset($_POST['regenerat_id']))
{
  $user=$_SESSION['username'];
  $stid=$_POST['stu_id']; 
  $fn=$_POST['first_name']; 
  $se=$_POST['sex']; 
  $em=$_POST['email']; 
  $ph=$_POST['phone']; 
  $fac=$_POST['faculty']; 
  $dep=$_POST['department']; 
  $strm=$_POST['stream']; 
  $ye=$_POST['year'];  
  $desc=$_POST['description'];  
  $pay=$_POST['payment']; 
  $query= mysqli_query($conn,"INSERT into regenerated_id (stu_id, first_name, sex, email, phone, faculty, department, stream, year, ac_year, ec, description, user, payment) VALUES ('$stid', '$fn', '$se', '$em', '$ph', '$fac', '$dep', '$strm',   '$ye', NOW(), NOW(), '$desc', '$user', '$pay')");
  if($query)
  {
    echo '<script>alert("Data Entered Successfully!")</script>';
  }
  else
  {
    echo '<script>alert("Data not Entered please try again!")</script>';
  }
}
?>
<!--../ .......tab content for id inserting recreating..............,..--> 

<!-- .......tab content for Regenerating ID..............,..-->
<div style="background-color: white" class="tab-pane fade" id="d">
  <div class="row">
    <aside>
      <div class="col-md-6">
        <div class="form-group">
          <h4 class="lang" key="faculty">Faculty</h4>
        </div>
        <form action="dtu_student_registration.php" method="POST">
          <div class="form-group">
            <div class="input-group custom-search-form">
              <select class="form-control" name="faculty" placeholder="Search..." autofocus>
                <option class="lang" key="select faculty"  value="">select faculty here</option>
                <?php
                $query="SELECT * from faculty where status=1 ORDER BY faculty ASC";
                $res = mysqli_query($conn,$query);
                if($res){
                  $count=mysqli_num_rows($res);
                  if($count>=1){
                    while($row=mysqli_fetch_assoc($res)){

                     ?>
                     <option value="<?php echo $row['faculty'];?>"><?php echo $row['faculty'];?> </option>;
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
              <button class="btn btn-default" name="by_faculty_recreate" type="submit">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </div>
      </form>
      <div class="form-group">
        <h4 class="lang" key="department">Department</h4>
      </div>
      <form action="dtu_student_registration.php" method="POST">
        <div class="form-group">
          <div class="input-group custom-search-form">
            <select class="form-control" name="department" placeholder="Search..." autofocus>
              <option class="lang" key="select department"  value="">select Department here</option>
              <?php
              $query="SELECT * from department ORDER BY department ASC";
              $res = mysqli_query($conn,$query);
              if($res){
                $count=mysqli_num_rows($res);
                if($count>=1){
                  while($row=mysqli_fetch_assoc($res)){

                   ?>
                   <option value="<?php echo $row['department'];?>"><?php echo $row['department'];?> </option>;
                   <?php

                 }
               }
               else{
                echo '<option value="">Department is not available';
              }
            }
            ?>
          </select>
          <span class="input-group-btn">
            <button class="btn btn-default" name="by_department_recreate" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </div>
    </form> 
    <div class="form-group">
      <h4 class="lang" key="year">Year</h4>
    </div>
    <form action="dtu_student_registration.php" method="POST">
      <div class="form-group">
        <div class="input-group custom-search-form">
          <select class="form-control" name="year" placeholder="Search..." autofocus>
                        <option value="1">I Year</option>
                        <option value="2">II Year</option>
                        <option value="3">III Year</option>
                        <option value="4">IV Year</option>
                        <option value="5">V Year</option>
                        <option value="6">VI year</option>
                        <option value="7">VII year</option>
          </select>
          <span class="input-group-btn">
            <button class="btn btn-default" name="by_year_recreate" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </div>
    </form>
  </div>
</aside>
<div class="col-md-6">
 <form action="dtu_student_registration.php" method="POST">
  <div class="form-group">
    <h4 class="lang" key="faculty">Faculty</h4>
  </div>
  <div class="form-group">
   <select name="faculty" class="form-control" onChange="change_faculty_id_recreate()" id="facultylist_id_recreate" required>
    <option class="lang" key="select faculty"  value="">select faculty here</option>
    <?php
    $query="SELECT * from faculty where status=1 ORDER BY faculty ASC";
    $res = mysqli_query($conn,$query);
    if($res){
      $count=mysqli_num_rows($res);
      if($count>=1){
        while($row=mysqli_fetch_assoc($res)){

         ?>
         <option value="<?php echo $row['faculty'];?>"><?php echo $row['faculty'];?> </option>;
         <?php

       }
     }
     else{
      echo '<option value="">faculty is not available';
    }
  }
  ?>
</select>
</div>
<div class="form-group">
  <h4 class="lang" key="department">Department</h4>
</div>
<div class="form-group">
  <div id="dep_id_recreate">
    <select class="form-control"  autofocus>
    </select>
  </div>
</div>
<div class="form-group">
  <h4 class="lang" key="year">Year</h4>
</div>
<div class="form-group">
  <div class="input-group custom-search-form">
    <select class="form-control" name="year" placeholder="Search..." autofocus>
      <option value="">Select Year here</option>
                        <option value="1">I Year</option>
                        <option value="2">II Year</option>
                        <option value="3">III Year</option>
                        <option value="4">IV Year</option>
                        <option value="5">V Year</option>
                        <option value="6">VI year</option>
                        <option value="7">VII year</option>
    </select>
    <span class="input-group-btn">
      <button class="btn btn-default" name="by_whole_recreate" type="submit">
        <i class="fa fa-search"></i>
      </button>
    </span>
  </div>
</div>
</form>
</div>
</div>
</div>    
<!--../ .......tab content for Regenerating ID..............,..-->

</div>
</div>
</div>
</div>
</div>
</div>
<!-- ./.........Report................................-->

<!-- ..........Report printing id earned by Faculity............-->
<?php
if(isset($_POST['by_faculty']))
{
  $earned_fac=$_POST['faculty'];
  ?>
  <div class="container">
   <div class="panel panel-primary">
     <div class="panel-body">
      <div class="row">
        <div class="col-md-2">
         <button onclick="printContent_idearned('printidearned_by_faculty')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
       </div>
     </div>
     <div id="printidearned_by_faculty">
      <?php
      echo '<center><h3 class="lang" key="using faculty">Id earned. Displayed using Faculty</h3> </center>';
      $Today=date('y:m:d');
      $new=date('l, F d, Y',strtotime($Today));
      echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
      echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
      $result = mysqli_query($conn,"SELECT * FROM id_issued WHERE faculty='$earned_fac' AND status='1' AND ec=(SELECT MAX(ec) from id_issued)");
      $num_rows = mysqli_num_rows($result);
      echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
      ?> 
      <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
        <thead>
          <tr>
            <th class="lang" key="id">Student Id</th>
            <th class="lang" key="full name">Full Name</th>
            <th class="lang" key="sex">Sex</th>
            <th class="lang" key="department">Department</th>
            <th class="lang" key="year">Year</th>
            <th class="lang" key="ac_year">Ac_Year</th>
          </tr>
        </thead>
        <tbody>
         <?php
                //include('database_conn.php');
         $check_data = "SELECT * FROM id_issued where faculty='$earned_fac' AND status='1' AND ec=(SELECT MAX(ec) from id_issued) ORDER BY first_name ASC ";
         $run=mysqli_query($conn,$check_data);
         if(mysqli_num_rows($run)>0)
         {
          while($row = mysqli_fetch_assoc($run))
          { 
            extract($row);
            $std=$row['stu_id'];
            ?>
            <tr>
             <td><?php echo ' '.$row['stu_id'].' '; ?></td>
             <td><?php echo ' '.$row['first_name'].' '; ?> </td>
             <td><?php echo ' '.$row['sex'].' '; ?></td>
             <td><?php echo ' '.$row['department'].' '; ?></td>
             <td><?php echo ' '.$row['year'].' '; ?></td>
             <td><?php echo ' '.$row['ac_year'].' '; ?></td>
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
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing id earned by faculty...............-->

<!-- ..........Report printing id earned by department............-->
<?php
if(isset($_POST['by_department']))
{
  $earned_dep=$_POST['department'];
  ?>
  <div class="container">
   <div class="panel panel-primary">
     <div class="panel-body">
      <div class="row">
        <div class="col-md-2">
         <button onclick="printContent_idearned_dep('printidearned_by_department')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
       </div>
     </div>
     <div id="printidearned_by_department">
      <?php
      echo '<center><h3>Id earned. Displayed using Department</h3> </center>';
      $Today=date('y:m:d');
      $new=date('l, F d, Y',strtotime($Today));
      echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
      echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
      $result = mysqli_query($conn,"SELECT * FROM id_issued WHERE department='$earned_dep' AND status='1' AND ec=(SELECT max(ec) from id_issued) ");
      $num_rows = mysqli_num_rows($result);
      echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
      ?> 
      <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
        <thead>
          <tr>
            <th class="lang" key="id">Student Id</th>
            <th class="lang" key="full name">Full Name</th>
            <th class="lang" key="sex">Sex</th>
            <th class="lang" key="department">Department</th>
            <th class="lang" key="year">Year</th>
            <th class="lang" key="ac_year">Ac_Year</th>
          </tr>
        </thead>
        <tbody>
         <?php
                //include('database_conn.php');
         $check_data = "SELECT * FROM id_issued where department='$earned_dep' AND status='1' AND ec=(SELECT max(ec) from id_issued) ORDER BY first_name ASC ";
         $run=mysqli_query($conn,$check_data);
         if(mysqli_num_rows($run)>0)
         {
          while($row = mysqli_fetch_assoc($run))
          { 
            extract($row);
            $std=$row['stu_id'];
            ?>
            <tr>
             <td><?php echo ' '.$row['stu_id'].' '; ?></td>
             <td><?php echo ' '.$row['first_name'].' '; ?> </td>
             <td><?php echo ' '.$row['sex'].' '; ?></td>
             <td><?php echo ' '.$row['department'].' '; ?></td>
             <td><?php echo ' '.$row['year'].' '; ?></td>
             <td><?php echo ' '.$row['ac_year'].' '; ?></td>
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
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing id earned by department...............-->

<!-- ..........Report printing id earned by year............-->
<?php
if(isset($_POST['by_year']))
{
  $earned_ye=$_POST['year'];
  ?>
  <div class="container">
   <div class="panel panel-primary">
     <div class="panel-body">
      <div class="row">
        <div class="col-md-2">
         <button onclick="printContent_idearned_ye('printidearned_by_year')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
       </div>
     </div>
     <div id="printidearned_by_year">
      <?php
      echo '<center><h3>Id earned. Displayed using Year</h3> </center>';
      $Today=date('y:m:d');
      $new=date('l, F d, Y',strtotime($Today));
      echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
      echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
      $result = mysqli_query($conn,"SELECT * FROM id_issued WHERE year='$earned_ye' AND status='1' AND ec=(SELECT max(ec) from id_issued) ");
      $num_rows = mysqli_num_rows($result);
      echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
      ?> 
      <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
        <thead>
          <tr>
            <th class="lang" key="id">Student Id</th>
            <th class="lang" key="full name">Full Name</th>
            <th class="lang" key="sex">Sex</th>
            <th class="lang" key="department">Department</th>
            <th class="lang" key="year">Year</th>
            <th class="lang" key="ac_year">Ac_Year</th>
          </tr>
        </thead>
        <tbody>
         <?php
                //include('database_conn.php');
         $check_data = "SELECT * FROM id_issued where year='$earned_ye' AND status='1' AND ec=(SELECT max(ec) from id_issued) ORDER BY first_name ASC ";
         $run=mysqli_query($conn,$check_data);
         if(mysqli_num_rows($run)>0)
         {
          while($row = mysqli_fetch_assoc($run))
          { 
            extract($row);
            $std=$row['stu_id'];
            ?>
            <tr>
             <td><?php echo ' '.$row['stu_id'].' '; ?></td>
             <td><?php echo ' '.$row['first_name'].' '; ?> </td>
             <td><?php echo ' '.$row['sex'].' '; ?></td>
             <td><?php echo ' '.$row['department'].' '; ?></td>
             <td><?php echo ' '.$row['year'].' '; ?></td>
             <td><?php echo ' '.$row['ac_year'].' '; ?></td>
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
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing id earned by year...............-->

<!-- ..........Report printing id earned by whole............-->
<?php
if(isset($_POST['by_whole']))
{
  $earned_fac=$_POST['faculty'];
  $earned_dep=$_POST['department'];
  $earned_ye=$_POST['year'];
  ?>
  <div class="container">
   <div class="panel panel-primary">
     <div class="panel-body">
      <div class="row">
        <div class="col-md-2">
         <button onclick="printContent_idearned_h('printidearned_by_h')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
       </div>
     </div>
     <div id="printidearned_by_h">
      <?php
      echo '<center><h3>Id earned. Displayed using Faculty, Department and Year</h3> </center>';
      $Today=date('y:m:d');
      $new=date('l, F d, Y',strtotime($Today));
      echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
      echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
      $result = mysqli_query($conn,"SELECT * FROM id_issued WHERE department='$earned_dep' AND year='$earned_ye' AND status='1' AND ec=(SELECT max(ec) from id_issued) ");
      $num_rows = mysqli_num_rows($result);
      echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
      ?> 
      <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
        <thead>
          <tr>
            <th class="lang" key="id">Student Id</th>
            <th class="lang" key="full name">Full Name</th>
            <th class="lang" key="sex">Sex</th>
            <th class="lang" key="department">Department</th>
            <th class="lang" key="year">Year</th>
            <th class="lang" key="ac_year">Ac_Year</th>
          </tr>
        </thead>
        <tbody>
         <?php
                //include('database_conn.php');
         $check_data = "SELECT * FROM id_issued where department='$earned_dep' AND year='$earned_ye' AND status='1' AND ec=(SELECT max(ec) from id_issued) ORDER BY first_name ASC ";
         $run=mysqli_query($conn,$check_data);
         if(mysqli_num_rows($run)>0)
         {
          while($row = mysqli_fetch_assoc($run))
          { 
            extract($row);
            $std=$row['stu_id'];
            ?>
            <tr>
             <td><?php echo ' '.$row['stu_id'].' '; ?></td>
             <td><?php echo ' '.$row['first_name'].' '; ?> </td>
             <td><?php echo ' '.$row['sex'].' '; ?></td>
             <td><?php echo ' '.$row['department'].' '; ?></td>
             <td><?php echo ' '.$row['year'].' '; ?></td>
             <td><?php echo ' '.$row['ac_year'].' '; ?></td>
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
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing id earned by whole...............-->

<!-- ..........Report printing id note earned by Faculity............-->
<?php
if(isset($_POST['by_faculty_not']))
{
  $earned_fac=$_POST['faculty'];
  ?>
  <div class="container">
   <div class="panel panel-primary">
     <div class="panel-body">
      <div class="row">
        <div class="col-md-2">
         <button onclick="printContent_idearned_not('printidearned_by_faculty_not')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
       </div>
     </div>
     <div id="printidearned_by_faculty_not">
      <?php
      echo '<center><h3>Id not earned. Displayed using Faculty</h3> </center>';
      $Today=date('y:m:d');
      $new=date('l, F d, Y',strtotime($Today));
      echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
      echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
      $query=mysqli_query($conn,"SELECT * from  stu_data as sd WHERE not exists(SELECT * from id_issued as idi where sd.stu_id=idi.stu_id) AND faculty='$earned_fac' AND ec=(SELECT MAX(ec) from stu_data) " );
      $c=mysqli_num_rows($query);
      echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp;  <strong> $c    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
      ?> 
      <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
        <thead>
          <tr>
            <th class="lang" key="id">Student Id</th>
            <th class="lang" key="full name">Full Name</th>
            <th class="lang" key="sex">Sex</th>
            <th class="lang" key="department">Department</th>
            <th class="lang" key="year">Year</th>
            <th class="lang" key="ac_year">Ac_Year</th>
          </tr>
        </thead>
        <tbody>
         <?php
                //include('database_conn.php');
         $query=mysqli_query($conn,"SELECT * from  stu_data as sd WHERE not exists(SELECT * from id_issued as idi where sd.stu_id=idi.stu_id) AND faculty='$earned_fac' AND ec=(SELECT MAX(ec) from stu_data) ORDER BY first_name ASC " );
         $c=mysqli_num_rows($query);
         if($c>0)
         {
          $sess=$_SESSION['username']; 
          while ($mrow=mysqli_fetch_assoc($query)) { 
            extract($mrow);
            ?>
            <tr>
             <td><?php echo ''.$mrow['stu_id'].''; ?></td>
             <td><?php echo ''.$mrow['first_name'].''; ?> </td>
             <td><?php echo ''.$mrow['sex'].''; ?></td>
             <td><?php echo ''.$mrow['department'].''; ?></td>
             <td><?php echo ''.$mrow['year'].' '; ?></td>
             <td><?php echo ''.$mrow['ac_year'].''; ?></td>  
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
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing id note earned by faculty...............-->

<!-- ..........Report printing id note earned by department............-->
<?php
if(isset($_POST['by_department_not']))
{
  $earned_dep=$_POST['department'];
  ?>
  <div class="container">
   <div class="panel panel-primary">
     <div class="panel-body">
      <div class="row">
        <div class="col-md-2">
         <button onclick="printContent_idearned_dep_not('printidearned_by_department_not')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
       </div>
     </div>
     <div id="printidearned_by_department_not">
      <?php
      echo '<center><h3>Id not earned. Displayed using Department</h3> </center>';
      $Today=date('y:m:d');
      $new=date('l, F d, Y',strtotime($Today));
      echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
      echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
      $query=mysqli_query($conn,"SELECT * from  stu_data as sd WHERE not exists(SELECT * from id_issued as idi where sd.stu_id=idi.stu_id) AND department='$earned_dep' AND ec=(SELECT MAX(ec) from stu_data) " );
      $num_rows = mysqli_num_rows($query);
      echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
      ?> 
      <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
        <thead>
          <tr>
            <th class="lang" key="id">Student Id</th>
            <th class="lang" key="full name">Full Name</th>
            <th class="lang" key="sex">Sex</th>
            <th class="lang" key="department">Department</th>
            <th class="lang" key="year">Year</th>
            <th class="lang" key="ac_year">Ac_Year</th>
          </tr>
        </thead>
        <tbody>
         <?php
         $query=mysqli_query($conn,"SELECT * from  stu_data as sd WHERE not exists(SELECT * from id_issued as idi where sd.stu_id=idi.stu_id) AND department='$earned_dep' AND ec=(SELECT MAX(ec) from stu_data) ORDER BY first_name ASC " );
         if(mysqli_num_rows($query)>0)
         {
          while($row = mysqli_fetch_assoc($query))
          { 
            extract($row);
            $std=$row['stu_id'];
            ?>
            <tr>
             <td><?php echo ' '.$row['stu_id'].' '; ?></td>
             <td><?php echo ' '.$row['first_name'].' '; ?> </td>
             <td><?php echo ' '.$row['sex'].' '; ?></td>
             <td><?php echo ' '.$row['department'].' '; ?></td>
             <td><?php echo ' '.$row['year'].' '; ?></td>
             <td><?php echo ' '.$row['ac_year'].' '; ?></td>
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
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing id note earned by department...............-->

<!-- ..........Report printing id note earned by year............-->
<?php
if(isset($_POST['by_year_not']))
{
  $earned_ye=$_POST['year'];
  ?>
  <div class="container">
   <div class="panel panel-primary">
     <div class="panel-body">
      <div class="row">
        <div class="col-md-2">
         <button onclick="printContent_idearned_ye_not('printidearned_by_year_not')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
       </div>
     </div>
     <div id="printidearned_by_year_not">
      <?php
      echo '<center><h3>Id not earned.Displayed using Year</h3> </center>';
      $Today=date('y:m:d');
      $new=date('l, F d, Y',strtotime($Today));
      echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
      echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
      $query=mysqli_query($conn,"SELECT * from  stu_data as sd WHERE not exists(SELECT * from id_issued as idi where sd.stu_id=idi.stu_id) AND year='$earned_ye' AND ec=(SELECT MAX(ec) from stu_data) " );
      $num_rows = mysqli_num_rows($query);
      echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
      ?> 
      <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
        <thead>
          <tr>
            <th class="lang" key="id">Student Id</th>
            <th class="lang" key="full name">Full Name</th>
            <th class="lang" key="sex">Sex</th>
            <th class="lang" key="department">Department</th>
            <th class="lang" key="year">Year</th>
            <th class="lang" key="ac_year">Ac_Year</th>
          </tr>
        </thead>
        <tbody>
         <?php
                //include('database_conn.php');
         $query=mysqli_query($conn,"SELECT * from  stu_data as sd WHERE not exists(SELECT * from id_issued as idi where sd.stu_id=idi.stu_id) AND year='$earned_ye' AND ec=(SELECT MAX(ec) from stu_data) ORDER BY first_name ASC " );
         if(mysqli_num_rows($query)>0)
         {
          while($row = mysqli_fetch_assoc($query))
          { 
            extract($row);
            $std=$row['stu_id'];
            ?>
            <tr>
             <td><?php echo ' '.$row['stu_id'].' '; ?></td>
             <td><?php echo ' '.$row['first_name'].' '; ?> </td>
             <td><?php echo ' '.$row['sex'].' '; ?></td>
             <td><?php echo ' '.$row['department'].' '; ?></td>
             <td><?php echo ' '.$row['year'].' '; ?></td>
             <td><?php echo ' '.$row['ac_year'].' '; ?></td>
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
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing id note earned by year...............-->

<!-- ..........Report printing id note earned by whole............-->
<?php
if(isset($_POST['by_whole_not']))
{
  $earned_fac=$_POST['faculty'];
  $earned_dep=$_POST['department'];
  $earned_ye=$_POST['year'];
  ?>
  <div class="container">
   <div class="panel panel-primary">
     <div class="panel-body">
      <div class="row">
        <div class="col-md-2">
         <button onclick="printContent_idearned_h_not('printidearned_by_h_not')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
       </div>
     </div>
     <div id="printidearned_by_h_not">
      <?php
      echo '<center><h3>Id not earned. Displayed using Faculty, Department and Year</h3> </center>';
      $Today=date('y:m:d');
      $new=date('l, F d, Y',strtotime($Today));
      echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
      echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
      $query=mysqli_query($conn,"SELECT * from  stu_data as sd WHERE not exists(SELECT * from id_issued as idi where sd.stu_id=idi.stu_id) AND faculty='$earned_fac' AND department='$earned_dep' AND year='$earned_ye' AND ec=(SELECT MAX(ec) from stu_data) " );
      $num_rows = mysqli_num_rows($query);
      echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
      ?> 
      <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
        <thead>
          <tr>
            <th class="lang" key="id">Student Id</th>
            <th class="lang" key="full name">Full Name</th>
            <th class="lang" key="sex">Sex</th>
            <th class="lang" key="department">Department</th>
            <th class="lang" key="year">Year</th>
            <th class="lang" key="ac_year">Ac_Year</th>
          </tr>
        </thead>
        <tbody>
         <?php
         $query=mysqli_query($conn,"SELECT * from  stu_data as sd WHERE not exists(SELECT * from id_issued as idi where sd.stu_id=idi.stu_id) AND faculty='$earned_fac' AND department='$earned_dep' AND year='$earned_ye' AND ec=(SELECT MAX(ec) from stu_data) ORDER BY first_name ASC" );
         if(mysqli_num_rows($query)>0)
         {
          while($row = mysqli_fetch_assoc($query))
          { 
            extract($row);
            $std=$row['stu_id'];
            ?>
            <tr>
             <td><?php echo ' '.$row['stu_id'].' '; ?></td>
             <td><?php echo ' '.$row['first_name'].' '; ?> </td>
             <td><?php echo ' '.$row['sex'].' '; ?></td>
             <td><?php echo ' '.$row['department'].' '; ?></td>
             <td><?php echo ' '.$row['year'].' '; ?></td>
             <td><?php echo ' '.$row['ac_year'].' '; ?></td>
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
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing id note earned by whole...............-->

<!-- ..........Report printing losted and recreated id by Faculity............-->
<?php
if(isset($_POST['by_faculty_recreate']))
{
  $earned_fac=$_POST['faculty'];
  ?>
  <div class="container">
   <div class="panel panel-primary">
     <div class="panel-body">
      <div class="row">
        <div class="col-md-2">
         <button onclick="printContent_faculty_recreate('print_by_faculty_recreate')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
       </div>
     </div>
     <div id="print_by_faculty_recreate">
      <?php
      echo '<center><h3>Regenerated Id Displayed using Faculty</h3> </center>';
      $Today=date('y:m:d');
      $new=date('l, F d, Y',strtotime($Today));
      echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
      echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
      $result = mysqli_query($conn,"SELECT * FROM regenerated_id WHERE faculty='$earned_fac'  AND ec=(SELECT MAX(ec) from regenerated_id)");
      $num_rows = mysqli_num_rows($result);
      echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
      ?> 
      <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
        <thead>
          <tr>
            <th class="lang" key="id">Student Id</th>
            <th class="lang" key="full name">Full Name</th>
            <th class="lang" key="sex">Sex</th>
            <th class="lang" key="department">Department</th>
            <th class="lang" key="year">Year</th>
            <th class="lang" key="ac_year">Ac_Year</th>
          </tr>
        </thead>
        <tbody>
         <?php
                //include('database_conn.php');
         $check_data = "SELECT * FROM regenerated_id where faculty='$earned_fac' AND ec=(SELECT MAX(ec) from regenerated_id) ORDER BY first_name ASC ";
         $run=mysqli_query($conn,$check_data);
         if(mysqli_num_rows($run)>0)
         {
          while($row = mysqli_fetch_assoc($run))
          { 
            extract($row);
            $std=$row['stu_id'];
            ?>
            <tr>
             <td><?php echo ' '.$row['stu_id'].' '; ?></td>
             <td><?php echo ' '.$row['first_name'].' '; ?> </td>
             <td><?php echo ' '.$row['sex'].' '; ?></td>
             <td><?php echo ' '.$row['department'].' '; ?></td>
             <td><?php echo ' '.$row['year'].' '; ?></td>
             <td><?php echo ' '.$row['ac_year'].' '; ?></td>
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
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.....Report printing losted and recreated id by faculty...............-->

<!-- ..........Report printing losted and recreated id by department............-->
<?php
if(isset($_POST['by_department_recreate']))
{
  $earned_dep=$_POST['department'];
  ?>
  <div class="container">
   <div class="panel panel-primary">
     <div class="panel-body">
      <div class="row">
        <div class="col-md-2">
         <button onclick="printContent_dep_recreate('print_by_department_recreate')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
       </div>
     </div>
     <div id="print_by_department_recreate">
      <?php
      echo '<center><h3>Regenerated Id Displayed using Department</h3> </center>';
      $Today=date('y:m:d');
      $new=date('l, F d, Y',strtotime($Today));
      echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
      echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
      $result = mysqli_query($conn,"SELECT * FROM regenerated_id WHERE department='$earned_dep' AND ec=(SELECT max(ec) from regenerated_id) ");
      $num_rows = mysqli_num_rows($result);
      echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
      ?> 
      <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
        <thead>
          <tr>
            <th class="lang" key="id">Student Id</th>
            <th class="lang" key="full name">Full Name</th>
            <th class="lang" key="sex">Sex</th>
            <th class="lang" key="department">Department</th>
            <th class="lang" key="year">Year</th>
            <th class="lang" key="ac_year">Ac_Year</th>
          </tr>
        </thead>
        <tbody>
         <?php
         $check_data = "SELECT * FROM regenerated_id where department='$earned_dep' AND ec=(SELECT max(ec) from regenerated_id) ORDER BY first_name ASC ";
         $run=mysqli_query($conn,$check_data);
         if(mysqli_num_rows($run)>0)
         {
          while($row = mysqli_fetch_assoc($run))
          { 
            extract($row);
            $std=$row['stu_id'];
            ?>
            <tr>
             <td><?php echo ' '.$row['stu_id'].' '; ?></td>
             <td><?php echo ' '.$row['first_name'].' '; ?> </td>
             <td><?php echo ' '.$row['sex'].' '; ?></td>
             <td><?php echo ' '.$row['department'].' '; ?></td>
             <td><?php echo ' '.$row['year'].' '; ?></td>
             <td><?php echo ' '.$row['ac_year'].' '; ?></td>
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
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing losted and recreated id by department............-->

<!-- ..........Report printing losted and recreated id by year............-->
<?php
if(isset($_POST['by_year_recreate']))
{
  $earned_ye=$_POST['year'];
  ?>
  <div class="container">
   <div class="panel panel-primary">
     <div class="panel-body">
      <div class="row">
        <div class="col-md-2">
         <button onclick="printContent_ye_recreate('print_by_year_recreate')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
       </div>
     </div>
     <div id="print_by_year_recreate">
      <?php
      echo '<center><h3>Regenreated Id Displayed using Year</h3> </center>';
      $Today=date('y:m:d');
      $new=date('l, F d, Y',strtotime($Today));
      echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
      echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
      $result = mysqli_query($conn,"SELECT * FROM regenerated_id WHERE year='$earned_ye' AND ec=(SELECT max(ec) from regenerated_id) ");
      $num_rows = mysqli_num_rows($result);
      echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
      ?> 
      <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
        <thead>
          <tr>
            <th class="lang" key="id">Student Id</th>
            <th class="lang" key="full name">Full Name</th>
            <th class="lang" key="sex">Sex</th>
            <th class="lang" key="department">Department</th>
            <th class="lang" key="year">Year</th>
            <th class="lang" key="ac_year">Ac_Year</th>
          </tr>
        </thead>
        <tbody>
         <?php
         $check_data = "SELECT * FROM regenerated_id where year='$earned_ye' AND ec=(SELECT max(ec) from regenerated_id) ORDER BY first_name ASC ";
         $run=mysqli_query($conn,$check_data);
         if(mysqli_num_rows($run)>0)
         {
          while($row = mysqli_fetch_assoc($run))
          { 
            extract($row);
            $std=$row['stu_id'];
            ?>
            <tr>
             <td><?php echo ' '.$row['stu_id'].' '; ?></td>
             <td><?php echo ' '.$row['first_name'].' '; ?> </td>
             <td><?php echo ' '.$row['sex'].' '; ?></td>
             <td><?php echo ' '.$row['department'].' '; ?></td>
             <td><?php echo ' '.$row['year'].' '; ?></td>
             <td><?php echo ' '.$row['ac_year'].' '; ?></td>
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
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing losted and recreated id by year...............-->

<!-- ..........Report printing losted and recreated id by whole............-->
<?php
if(isset($_POST['by_whole_recreate']))
{
  $earned_fac=$_POST['faculty'];
  $earned_dep=$_POST['department'];
  $earned_ye=$_POST['year'];
  ?>
  <div class="container">
   <div class="panel panel-primary">
     <div class="panel-body">
      <div class="row">
        <div class="col-md-2">
         <button onclick="printContent_h_recreate('print_by_h_recreate')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
       </div>
     </div>
     <div id="print_by_h_recreate">
      <?php
      echo '<center><h3>Regenerated Id Displayed using Faculty, Department and Year</h3> </center>';
      $Today=date('y:m:d');
      $new=date('l, F d, Y',strtotime($Today));
      echo '<center><strong>Date of Report: '.$new.'</strong> </center>';
      echo '<center><strong>Name of Reporter:  '.$_SESSION["username"].'</strong> </center>';
      $result = mysqli_query($conn,"SELECT * FROM regenerated_id WHERE department='$earned_dep' AND year='$earned_ye' AND ec=(SELECT max(ec) from regenerated_id) ");
      $num_rows = mysqli_num_rows($result);
      echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
      &nbsp;  <strong> $num_rows    <b class='lang' key='student avialable'> Students are Available in the Databse</b><strong>";
      ?> 
      <table width="100%" class="table table-striped table-bordered table-hover table-responsive" id="dataTables-active">
        <thead>
          <tr>
            <th class="lang" key="id">Student Id</th>
            <th class="lang" key="full name">Full Name</th>
            <th class="lang" key="sex">Sex</th>
            <th class="lang" key="department">Department</th>
            <th class="lang" key="year">Year</th>
            <th class="lang" key="ac_year">Ac_Year</th>
          </tr>
        </thead>
        <tbody>
         <?php
                //include('database_conn.php');
         $check_data = "SELECT * FROM regenerated_id where department='$earned_dep' AND year='$earned_ye' AND ec=(SELECT max(ec) from regenerated_id) ORDER BY first_name ASC ";
         $run=mysqli_query($conn,$check_data);
         if(mysqli_num_rows($run)>0)
         {
          while($row = mysqli_fetch_assoc($run))
          { 
            extract($row);
            $std=$row['stu_id'];
            ?>
            <tr>
             <td><?php echo ' '.$row['stu_id'].' '; ?></td>
             <td><?php echo ' '.$row['first_name'].' '; ?> </td>
             <td><?php echo ' '.$row['sex'].' '; ?></td>
             <td><?php echo ' '.$row['department'].' '; ?></td>
             <td><?php echo ' '.$row['year'].' '; ?></td>
             <td><?php echo ' '.$row['ac_year'].' '; ?></td>
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
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
<?php
}
?>
<!-- ./.........Report printing losted and recreated by whole...............-->

<!-- ///////// Student Registration ///////////////-->
<div style="background-color: " class="container">
 <div style="opacity" class="panel panel-primary">
  <div style="opacity; font-family: times; color: #0066cc" class="panel-body" >
    <div class="form-group">
      <center><h3 class="lang" key="student registration" style="color:">Student Registration Form</h3></center>
    </div>
    <form action="s_s_data.php" method="POST" enctype="multipart/form-data" name="registration_info" onsubmit="return take()">
      <div  class="col-lg-6">
        <div class="form-group">
          <label class="lang" key="id"  for="email">Student Id:</label>
          <input type="text" name="stu_id" class="form-control" id="email" required>
        </div>
        <div class="form-group">
          <label class="lang" key="full name"  for="pwd">Full Name:</label>
          <input type="text" name="first_name" class="form-control" id="pwd" required>
        </div>
        <div class="form-group">
          <label class="lang" key="sex"  for="email">Sex:</label>
        </div>
        <div class="form-group">
          <label class="checkbox-inline">
            <input  type="radio" name="sex" id="sexm" value="M" required> <b class="lang" key="male" >Male</b>
          </label>
          <label class="checkbox-inline">
            <input  type="radio" name="sex" id="sexf" value="F" required><b class="lang" key="female" > Female</b>
          </label>
        </div>
        <div class="form-group">
          <label class="lang" key="email"  for="pwd"> Email:</label>
          <input type="email" name="email" class="form-control" id="pwd" required>
        </div>
        <div class="form-group">
          <label class="lang" key="phone"  for="pwd">Mobile Number:</label>
          <input type="text" name="phone" class="form-control" id="pwd" required>
        </div>
      </div>
      <div class="col-lg-6">

        <div class="form-group">
          <label class="lang" key="select faculty"  for="email">Select The Faculty</label>
          <?php
          ?>
          <select name="faculty" class="form-control" onChange="change_faculty()" id="facultylist" required>
            <option class="lang" key="select faculty"  value="">select faculty here</option>

            <?php
            $query="SELECT * from faculty where status=1 ORDER BY faculty ASC";
            $res = mysqli_query($conn,$query);
            if($res){
              $count=mysqli_num_rows($res);
              if($count>=1){
                while($row=mysqli_fetch_assoc($res)){

                 ?>
                 <option value="<?php echo $row['faculty'];?>"><?php echo $row['faculty'];?> </option>;
                 <?php

               }
             }
             else{
              echo '<option value="">faculty is not available';
            }
          }
          ?>
        </select>
      </div>
      <div class="form-group">

        <label class="lang" key="select department"  for="email">Select The Department</label>
        <div id="dep">
          <select  class="form-control" required>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="lang" key="select stream"  for="email">Select The Specialization</label>
        <div id="strm">
          <select class="form-control">
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="email">Select The Year(Bach)</label>
        <select name="year" class="form-control" required>
         <option>I Year</option>
         <option>II Year</option>
         <option>III Year</option>
         <option>IV Year</option>
         <option>V Year</option>
         <option>VI Year</option>
         <option>VII Year</option>
       </select>
     </div>
     <div class="form-group">
      <label class="lang" key="upload photo"  for="inputfile">Upload Photo</label>
      <div class="fileupload fileupload-new" data-provides="fileupload">
        <div class="fileupload-new thumbnail" style="width: 300px; height: 250px;"><img src="asset/image/images.jpeg" alt="" />
        </div>
        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 400px; max-height: 300px; line-height: 20px;">
        </div>
        <div>
          <span class="btn btn-file btn-primary"><span class="fileupload-new"><b class="lang" key="select image" >Select image</b></span><span class="fileupload-exists"><b class="lang" key="change" >Change</b></span>
          <input type="file" name="image" /></span>
          <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><b class="lang" key="remove" >Remove</b></a>
        </div>
      </div>
    </div>
    <div class="form-group">
      <center>
        <button type="submit" name="insert_studata" class="btn btn-success"><i class="fa fa-sign-in"></i>&nbsp;<b class="lang" key="save acount" >Save Data</b></button>
        <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;<b class="lang" key="cancle" >Cancel</b></button>
      </center>
    </div>
  </div>
</form>
</div>
</div>
</div>
<!-- ///////////// Student Registration //////////////////??????-->
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
    <form class="form-horizontal" method="POST" action="dtu_student_registration.php">
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
<div class="container">
  <div class="footer-top-area" style="background-image:url('img/dtu_meal_attendance.png'); background-color:white; opacity: 1.5">
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
</div>
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
<script src="js/script.slider.js"></script>
<!-- table js -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/js/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
<script src="vendor/bootstrap/js/bootstrap-fileupload.js"></script>
<script>
  $(document).ready(function() {
    $('#id_issued').DataTable({
      responsive: true
    });
    $('#id_not_issued').DataTable({
      responsive: true
    });
  });
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
  $(function () {
    $('#myTab li:eq(1) a').tab('show');
  });
</script>
<script>
  $(function () { $('#myModal').modal({
    keyboard: true
  })
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
</body>
</html>