<?php
session_start();
$_SESSION['login'] = 0;
session_destroy();
header( 'Location: http://localhost/school_meal' );
?>