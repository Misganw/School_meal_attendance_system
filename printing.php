<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include ('database_conn.php');
if($_SESSION['usertype']!='0'){
  header("Location: http://localhost/dtu/smics");
}
?>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<body>
  <h3>
   <button onclick="printContent('printing')"> Print Report</button>
 </h3>
 <?php
      $query="SELECT * FROM staff_id_issued where status='0'";
      $result=mysqli_query($conn,$query);
      if($result)
      {
        while ($myrow=mysqli_fetch_assoc($result)) 
        {
          extract($myrow);

          ?> 
 <div id="printing">
    <center>
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
                <td style="width:60%" colspan="2"><img src="img/id_header.jpg" style="max-width:375px"></td>
              </tr>
              <tr>
                <td style="width:70%; height:60%">
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
              <td style="width:70%; height:30%" >
                <?php
                $text=$myrow['stu_id'];
                echo "<img src='test_barcode.php?codetype=Code128&size=40&text=".$text."&print=true'/>";
                ?>
              </td>
            </tr> 
          </center>     
        </tbody>
      </table>

      <hr style="font-weight: 15px;color: blue;width: 32%">
      <?php
    }
  }
  ?>
</center>
</div>

</body>
</html>
