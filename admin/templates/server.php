<?php
    session_start();
    $_SESSION['import']['products'] = array();
    
    array_push($_SESSION['import']['products'], array("name","time","total"));
    array_push($_SESSION['import']['products'], array("name","time","total"));
    array_push($_SESSION['import']['products'], array("name","time","total"));

    print_r($_SESSION['import']['products'][1][1]);
    
?>