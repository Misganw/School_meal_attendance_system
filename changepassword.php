   <?php
   session_start();
   include ('database_conn.php');
   if($_SESSION['usertype']!='14'){
    header("Location: http://localhost/dtu/smics");
  }
  ?>
  <?php
  if(isset($_POST['change'])){
            //$oldpass=$_POST['o_password'];
           //$newpass=$_POST['n_password'];
    $user_name=$_SESSION['username'] ;
    $opass=$_POST['o_password'];
    $npass=$_POST['n_password'];
    $cpass=$_POST['c_password'];

    $qr=mysqli_query($conn,"SELECT password FROM user_acount WHERE username=' $user_name' ") or die("error"); 
    $passrow=mysqli_fetch_row($qr);
                //$spass=$row['password'];
    if($passrow[0]==$opass && $npass==  $cpass){
      $query=mysqli_query($conn,"UPDATE user_acount SET password ='$npass' WHERE username ='$user_name' ");
      if($query){
        echo '<script>alert("You Modify Your Password Successfully")</script>';
      }
      else{
       echo '<script>alert("You do not Modify Your Password Try again")</script>';
     }
   }
   else echo "error";
 }
 ?>
 <!--login form-->
 <form class="form-horizontal" method="POST" action="changepassword.php">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Old password:</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="email" placeholder="Enter Old Pssword" name="o_password" autofocus="autofocus" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">New Password:</label>
    <div class="col-sm-8">          
      <input type="password" class="form-control" id="n_password" placeholder="Enter New password" name="n_password">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Confirm Password:</label>
    <div class="col-sm-8">          
      <input type="password" class="form-control" id="c_password" placeholder="Confirm password" name="c_password">
    </div>
  </div>
  <div class="form-group">        

  </div>
  <div class="form-group">        
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="change" class="btn btn-success"><i class="fa fa-sign-in"></i>&nbsp;Change</button>
      <button type="reset" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>&nbsp;Cancel</button>
    </div>
  </div>
</form>
    <!--login form-->