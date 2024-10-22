   <html>
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="">
     <meta name="author" content="">

     <title>ደብረ ታቦር ዩኒቨርሲቲ</title>
     <link href="asset/image/ice_screenshot_20170511-212540.png" rel="icon">
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


     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="vendor/bootstrap/css/bootstrap-fileupload.min.css" rel="stylesheet" type="text/css">
        <style>
          ul.wysihtml5-toolbar > li
          {
            position: relative;
          }

        </style>
      </head>
    </head>
    <body>
      <!-- Modal -->
      <div class="modal fade" id="editModal_gatway" tabindex="-1" role="dialog"
      aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div style="background-color:#ff4d94" class="modal-header">
            <button type="button" class="close"
            data-dismiss="modal" aria-hidden="true">
            &times;
          </button>
          <h4 class="modal-title" id="myModalLabel">
            Please Enter your Userename and Password
          </h4>
        </div>
        <div class="modal-body">
          <?php
          if(isset($_POST['edit_status'])){
           $st=$_POST['status'];
           $q=mysqli_query($conn,"UPDATE stu_id SET  status='$st' WHERE stu_id='$st'");
           if($q){
            echo "changed";
          }
        }
        ?>  
        <?php
        if(isset($_GET['edit_status'])){
          $user_id=$_GET['edit_status'];
          $query="SELECT * FROM stu_data where stu_id= '$user_id'";
          $result=mysqli_query($conn,$query); 
          if($result){
            while ($myrow = mysqli_fetch_assoc($result))
            {
              ?>
              <form method="POST" action="change_status.php" enctype="multipart/form-data" class="form-horizontal">
               <table class="table table-bordered table-responsive">
                 <tr>
                  <td><label class="control-label">Status</label></td>
                  <td>
                   <div class="col-lg-5">
                     <div class="form-group">
                      <label class="checkbox-inline">Status</label>
                      <!-- /////////////////////////////////// Active And Inactive User ///////////////////////////////////////////-->
                      <?php
                      $query="SELECT status FROM stu_id where stu_id='$user_id'";
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
                    <!-- /////////////////////////////////// Active And Inactive User ///////////////////////////////////////////-->
                  </div>
                </div>
                <div class="col-lg-7">
                  <div class="form-group">
                    <label class="checkbox-inline">
                      <input  type="radio" name="status" id="sexm" value="1" required> Activate
                    </label>
                    <label class="checkbox-inline">
                      <input  type="radio" name="status" id="sexf" value="0" required> Deactivate
                    </label>
                  </div>
                </div>
              </td>
            </tr>

            <tr>
              <td colspan="2">
                <center><button type="submit" name="edit_status" class="btn btn-primary">
                  <span class="glyphicon glyphicon-save"></span> Update </button>

                  <a class="btn btn-danger" href="staffbook_borrowing.php"> <span class="glyphicon glyphicon-backward"></span> Cancel </a>
                </center>
              </td>
            </tr> 
          </table>
        </form>
        <?php
      }
    }
  }
  ?>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default"
  data-dismiss="modal">Close
</button>
</div>
</div><!-- /.modal-content -->
</div><!-- /.modal -->
</div>
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
<script src="js/script.slider.js"></script>
<script src="vendor/bootstrap/js/bootstrap-fileupload.js"></script>
<!-- table js -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/js/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
</script>
</body>
</html>