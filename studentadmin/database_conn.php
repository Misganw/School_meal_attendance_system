<?php
$conn = mysqli_connect('localhost','root','r00tme1221') or die ("The connectin is failed");
mysqli_select_db($conn,"meal"  ) or die ("The database not connected");
?> 