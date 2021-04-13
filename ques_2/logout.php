<?php

    session_start();
    session_unset();
    session_destroy();
    header("location: ques2.php");
    die("Can't Log Our");


?>