
<!-- Clearing session on Logout -->
<?php 
    session_start();
    session_destroy();//closing session
    header("Location: Login.php");//redirecting to login page

?>