<?php

session_start();

unset($_SESSION['isLoggedIn']);
unset($_SESSION['email']);
echo"<script>alert('Logout Succesfull');location.href = 'login.php';</script>";
?>