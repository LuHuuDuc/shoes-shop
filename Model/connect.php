<?php
    class connect{
        var $db = null;

        function __construct(){
            $dsn = "mysql:host=localhost;dbname=shoes";
            $user = "root";
            $password = "";
            
            $this -> db = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
        }

        function getList($select){
            $result = $this -> db -> query($select);
            return $result;
        }

        function getDetail($select){
            $result = $this -> db -> query($select);
            $result = $result -> fetch();
            return $result;
        }
    }
?>