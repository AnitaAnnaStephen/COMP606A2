<!-- Page to register multiple functions -->
<?php

spl_autoload_register(function ($class_name) {
    include 'classes/'.$class_name.'.php';
});

?>