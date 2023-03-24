<?php
    class comment{
        function __construct()
        {
            
        }

        function getComment($id){
            $db = new connect();
            $query = "SELECT `ID_COMMENT`, `ID_ACCOUNT`, `EMAIL`, `CONTENT` FROM `comment` where ID_PRODUCT = $id";
            $result = $db ->getList($query);
            return $result;
        }
        function getQuery($query){
            $db = new connect();
            $result = $db ->getList($query);
            return $result;
        }

        function getReply($id){
            $db = new connect();
            $query = "SELECT `EMAIL`, `CONTENT` FROM `comment` where REPLY = $id";
            $result = $db ->getList($query);
            return $result;
        }

    }
?>