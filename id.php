 <?php include ('database_conn.php');?>
 <?php
 $Today=date('y:m:d');
 $new=date('l, F d, Y',strtotime($Today));
 ?>


 <?php 
 $q=mysqli_query($conn,"SELECT * from setting LIMIT 1");
 while($rr=mysqli_fetch_assoc($q))
 {
    $logo=$rr['image'];
    $n=$rr['name'];
  
}
  ?>
 <!DOCTYPE html>
 <html>
 <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>card Design</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='card.css'>

    <script src='main.js'></script>
    <style type="text/css">
        *
        {
            margin: 00px;
            padding:00px;

        }

        .container
        {
            height: 100vh;
            width:100%;
            justify-content: space-evenly;
            align-items: center;
            display: flex;
        }




    </style>
</head>
<body>
    <div class="col-md-2">
     <button onclick="printContent('print')"><img src="img/th.jpeg" width="55" height="30"  style="alignment-adjust:middle"/></button>
 </div>
 <div id="print">
    <div class="container">
     <div id="print">
    <?php
    $qry=mysqli_query($conn,"SELECT * from stu_data where status='1' ");
    if($qry)
    {
     $count = 1;
     while ($myrow=mysqli_fetch_assoc($qry)) 
     {
        $img=$myrow['image'];
      extract($myrow);
      ?>
        <div style="height: auto;width:270px;box-shadow:  ;border-radius:2.5px;
        transition:ease-in-out .3s;">

        <div style="height: 100px;width:270px;
        background:linear-gradient(to left,#00b09b,#191970);
        border-radius: 10px;">
        <center>
            <h3 style="background-size: 100%;position: relative;color: white;"><?php echo $n ?> School</h3>
        </center>
        </div>
        <img src="photo/<?php echo $img?>" style="
        width:100px;
        height: 110px;
        background-size: 100%;
        position: relative;
        border-radius: 50px;
        left: 85px;
        top:-50px;" >
        <div class="cardContain" style=" text-align: center;">
        <center>
        <td style="width:auto; height:60%">
            <h4 style="position: relative;top:-30px;bottom:00px;"><?php echo '<b>'.$myrow['first_name'].'</b>'; ?></h4>
            <p style="position: relative;top:-10px;"><?php echo '<b>grade : '.$myrow['grade'].'</b>'; ?></p>
            <p style="position: relative;top:-10px;"><?php echo '<b>Issue date : '.$Today.'</b>'; ?> </p>
            </td>
            </center>
            <?php
              $text=$myrow['stu_id'];
              echo "<img src='barcode.php?codetype=Code128&size=40&text=".$text."&print=true'/>";
              ?>
        </div>
    </div>
    <hr>
    <?php
}
}
    ?>
</div>
</div>
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
</body>
</html>