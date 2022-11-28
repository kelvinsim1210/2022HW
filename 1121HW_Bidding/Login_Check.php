<?php
    session_start();
    if(!isset($_SESSION["User_Id"])) {
        echo false;
    }
    else {
        echo true;
    }
?>