
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('database_conn.php');
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
    <link href="setting/<?php echo $logo?>" rel="icon">
    <?php
  }
  ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
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
	<script type="text/javascript" src=lang_translate.js></script>
	<!-- Start WOWSlider.com HEAD section -->
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
	<!-- End WOWSlider.com HEAD section -->

	<style type="text/css">
		.header{
			height:100px;
		}
	</style>
</head>

<?php
$conn = mysqli_connect('localhost','root','r00tme1221') or die ("The connectin is failed");
mysqli_select_db($conn, "meal") or die ("The database not connected");
if(isset($_POST['login']))
{

	$user_name = mysqli_real_escape_string($conn, $_POST['username']);
	$pass = mysqli_real_escape_string($conn, $_POST['password']);
	$_SESSION['username']=$user_name;
	$query = "SELECT * from user_acount where username='$user_name' and password='".hash_password($pass)."' ";
	$res = mysqli_query($conn, $query); 
	if(mysqli_num_rows($res)>0)
	{
		while($row=mysqli_fetch_assoc($res))
		{
			$utype=$row['usertype'];
			$_SESSION['usertype']=$utype;
			if(isset($_SESSION['usertype']))
			{
				$query="SELECT status FROM user_acount where username='$user_name'";
				$result=mysqli_query( $conn, $query);

				if($result)
				{
					$st=mysqli_fetch_array($result);

					if($st['status']==1)
					{
						if($_SESSION['usertype']==1)
						{
							header( 'Location: http://localhost/school_meal/studentadmin/student_service_admin.php' );
							$_SESSION['login'] = 1;
						}

						else if($_SESSION['usertype']==2)
						{
							header( 'Location: http://localhost/school_meal/student_service_support.php' );
							$_SESSION['login'] = 1;
						}
						else if($_SESSION['usertype']==5)
						{
							header( 'Location: http://localhost/school_meal/cafeadmin/dtu_cafe_adminpage.php' );
							$_SESSION['login'] = 1;
						}

						else if($_SESSION['usertype']==6)
						{
							header( 'Location: http://localhost/school_meal/cafeadmin/dtu_cafe_meal.php' );
							$_SESSION['login'] = 1;
						}
						else
						{
							echo '<script>alert("Oops! Invalid Authorization!")</script>';
						}
					}

					else
					{
						echo '<script>alert("Your status is not Activated You have to Ask your Admin")</script>';
					}
				}
			}
		}
	}

	else
	{
		if (!isset($_SESSION["attempts"]))
		{
			$_SESSION["attempts"] = 1;
			$_SESSION["attempts"]++;
		}

		if ($_SESSION["attempts"]>2)
		{
			echo '<script> alert ( "Your Attempt is failed two times. Hence, your account is locked. Please contact with admin" )</script>';
		}
		else
		{
			echo '<script> alert ( "Oops!!! Invalid User. Try the correct one! " )</script>';
		}

	}
	$_SESSION['login'] = 0;
}
      //  $passs = "{SSHA}sNPmYlrgdn2ilaU7ByklSuXNlclqdQ==";
function hash_password($pass)
{
	$salt='dtu';
	return '{SSHA}'.base64_encode(sha1($pass.$salt,TRUE).$salt);
}
?>
<body style="background-color:#ebebe0">
	<!--..................................LANGUAGE TRANSLATOR...............-->
<!--   <div id="google_translate_element"></div>
  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE},'google_translate_element');
    }
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->
<!--..................................LANGUAGE TRANSLATOR...........??????-->
<!--container-->

<div style="padding-top:14px" class="container">
	<!--HEADER 1-->
	<nav style="max-heigt:100px;background-color: #006633;color:white" class="navbar navbar-default ">
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
				<li class=""><a style="color:white;font-size:16px;font-family:italic" href=""><p><b>
					<?php
                /*date_default_timezone_set("Africa/Addis_ababa");
                echo "<em>".date('Y/m/d ')."</em><br><br>";*/
                echo "<b class='lang' key='date'>Date :-</b>  ";
                $Today=date('y:m:d');
                $new=date('l, F d, Y',strtotime($Today));
                echo $new;
                
                ?>
            </b></p></a></li>
        </ul>
    </div>
</nav>
<div class="panel panel-default">
	<div class="panel-heading" style="background-color:  #00cc99">
		<center> <h3 class="panel-title" ><div class="lang" key="welcome">Welcome to Shools Meal Attendance System to start please press Login </div></h3></center>
	</div>
	<div style="background-color:#b3ffd9" class="panel-body">
		<center>
			<div class="col-lg-5">
				<h3 style="color:#ff0066; padding-top: 25px"> <div class="lang" key="smart">Meal Attendance system</div> </h3>
			</div>
			<div class="col-lg-2">
				<img src="img/dtu_logo.png">
			</div>
			<div class="col-lg-5">
				<h3 style="color:#ff0066;padding-top: 25px"> <div class="lang" key="dt"> For Schools</div></h3>
			</div>
		</center>
	</div>
	<div style="margin-top:10px" class="row">
	<center>
		<div class="lang" key="please"> Please Enter your Userename and Password</div>
			<!--login form-->
			<form class="form-horizontal" method="POST" action="index.php">
			<div class="col-sm-offset-2 col-sm-8">
				<div class="form-group">

					<label class="control-label" for="email">
						<div class="lang" key="ema">Email(User Name):</div></label>
						
							<input type="text" class="form-control" id="email" placeholder="Enter email or username" name="username" autofocus="autofocus" >
					</div>
	<div class="form-group">
		<label class="control-label for="pwd"><div class="lang" key="password">Password:</div></label> 
			<input type="password" class="form-control" id="pwd" autocomplete="none" placeholder="Enter password" name="password"
			id="password">
  </div>    
  </div> 
  <div class="form-group">        
  	<div class="col-sm-12">
  		<button type="submit" name="login" class="btn btn-success"><i class="fa fa-sign-in"></i>&nbsp;<div class="lang" key="login">login</div></button>
  		<button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove">&nbsp;</span><div class="lang" key="close">Cancle</div></button>
  	</div>
  </div>
</form>
<!--login form-->
</center>
</div>
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog"
aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">

</div><!-- /.modal -->
</div>

</div>
<center>      


	<div class="footer-social" >
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
					<p align="right" >&copy; 2010   School ID and Meal Attendance System| All Rights are Reserved </p>
				</div>
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
<script type="text/javascript" src=vendor/jquery/jquery.min.js></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Morris Charts CSS -->
<link href="vendor/morrisjs/morris.css" rel="stylesheet">
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="vendor/bootstrap/css/bootstrap-fileupload.min.css" rel="stylesheet" type="text/css">
<!-- End WOWSlider.com HEAD section -->
<script type="text/javascript"> 
	var pass=document.getElementById("password")
	pass.addEventListener('keyup', function(){
		checkPassword(pass.value)
	})
	function checkPassword(password){
		var strengthbar=ducument.getElementById("strength")
		var strength=0;
		if(password.match(/[a-zA-Z0-9][a-zA-Z0-9]+/)){
			strength +=1
		}
		if(password.match(/[~<>?]+/){
			strength +=1
		}
		if(password.match(/[!@$%^&()#<>?]+/){
			strength +=1
		}
		if(password.length>)
			strength +=1
		switch(strength){
			case 0:
			strengthbar.value=20;
			break
			case 1:
			strengthbar.value=40;
			break
			case 2:
			strengthbar.value=60;
			break  
			case 3:
			strengthbar.value=80;
			break
			case 4:
			strengthbar.value=100;
			break      
		}
	}
</script>
</body>

</html>