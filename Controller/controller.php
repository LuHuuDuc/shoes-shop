<?php
    $ctrl = "main";
    if(isset($_GET['action'])){
        $ctrl = $_GET['action'];
    }
    include './Views/'.$ctrl.'.php';
?>