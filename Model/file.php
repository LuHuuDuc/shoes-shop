<?php
    function uploadImage($img){
        $dir = "img/";
        $file =$dir.basename($img['name']);
        $imgType = strtoupper(pathinfo($file, PATHINFO_EXTENSION));

        if(!file_exists($file)){
            if($imgType!=="JPG" && $imgType!=="PNG" && $imgType!=="JPEG" && $imgType!=="GIF"){
                return false;
            }
            else{
                move_uploaded_file($img['tmp_name'], $file);
                return true;
            }
        }
    }
?>