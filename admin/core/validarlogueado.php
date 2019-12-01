<?php
if(!isset($_SESSION['UserID']) or !isset($_SESSION['UserName'])){
    header('Location: index.php?a=login');
} ?>