<?php
session_start();
// echo $_SESSION['loginCheck'];
session_destroy();
header('location:index.php')
//echo "hello";

?>