<?php
    class product{
        function __construct(){

        }

        function getProductNew(){
            $db = new connect();
            $query = "SELECT `ID_PRODUCT`, `NAME_PRODUCT`, `PRICE_PRODUCT`, `IMG_1`, `DESC_SHORT`, `PRICE_SALE`, `BRAND`, `RATE` FROM `product` ORDER BY ID_PRODUCT DESC LIMIT 4;";
            $result = $db ->getList($query);
            return $result;
        }

        function getProductBest(){
            $db = new connect();
            $query = "SELECT `ID_PRODUCT`, `NAME_PRODUCT`, `PRICE_PRODUCT`, `IMG_1`, `DESC_SHORT`, `PRICE_SALE`, `BRAND`, `RATE` FROM `product` ORDER BY SELL_NUMBER DESC LIMIT 4;";
            $result = $db ->getList($query);
            return $result;
        }

        function getOriginals($limit, $index){
            $db = new connect();
            $query = "SELECT `ID_PRODUCT`, `NAME_PRODUCT`, `PRICE_PRODUCT`, `IMG_1`, `DESC_SHORT`, `PRICE_SALE`, `BRAND`, `RATE` FROM `product` WHERE DESC_SHORT LIKE '%Originals' limit $limit OFFSET $index;";
            $result = $db ->getList($query);
            return $result;
        }

        function getSportswear($limit, $index){
            $db = new connect();
            $query = "SELECT `ID_PRODUCT`, `NAME_PRODUCT`, `PRICE_PRODUCT`, `IMG_1`, `DESC_SHORT`, `PRICE_SALE`, `BRAND`, `RATE` FROM `product` WHERE DESC_SHORT LIKE '%Sportswear' limit $limit OFFSET $index;";
            $result = $db ->getList($query);
            return $result;
        }

        function getRunning($limit, $index){
            $db = new connect();
            $query = "SELECT `ID_PRODUCT`, `NAME_PRODUCT`, `PRICE_PRODUCT`, `IMG_1`, `DESC_SHORT`, `PRICE_SALE`, `BRAND`, `RATE` FROM `product` WHERE DESC_SHORT LIKE '%Chạy' limit $limit OFFSET $index;";
            $result = $db ->getList($query);
            return $result;
        }

        function getTennis($limit, $index){
            $db = new connect();
            $query = "SELECT `ID_PRODUCT`, `NAME_PRODUCT`, `PRICE_PRODUCT`, `IMG_1`, `DESC_SHORT`, `PRICE_SALE`, `BRAND`, `RATE` FROM `product` WHERE DESC_SHORT LIKE '%Quần vợt' limit $limit OFFSET $index;";
            $result = $db ->getList($query);
            return $result;
        }

        function getProductID($id){
            $db = new connect();
            $query = "SELECT * FROM `product` WHERE ID_PRODUCT=$id";
            $result = $db ->getDetail($query);
            return $result;
        }

        function getProduct(){
            $db = new connect();
            $query = "SELECT * FROM `product`";
            $result = $db ->getList($query);
            return $result;
        }

        function getSearch($valueSearch, $index, $order, $min, $max){
            $db = new connect();
            $query = "SELECT `ID_PRODUCT`, `NAME_PRODUCT`, `PRICE_PRODUCT`, `IMG_1`, `DESC_SHORT`, `PRICE_SALE`, `BRAND`, `RATE` FROM `product` WHERE NAME_PRODUCT LIKE '%$valueSearch%' AND PRICE_PRODUCT BETWEEN $min AND $max ORDER BY PRICE_PRODUCT $order LIMIT 8 OFFSET $index";
            $result = $db ->getList($query);
            return $result;
        }

        function updateProduct($idProduct, $inventoryNew, $sellNumberNew, $rateNew){
            $db = new connect();
            $query = "UPDATE `product` SET `INVENTORY` = '$inventoryNew', `SELL_NUMBER` = '$sellNumberNew', `RATE` = '$rateNew' WHERE `ID_PRODUCT` = '$idProduct'";
            $db ->getList($query);
        }

        function countProduct(){
            $db = new connect();
            $query = "SELECT COUNT(ID_PRODUCT) AS TOTAL FROM product;";
            $result = $db ->getList($query);
            return $result;
        }

        function countOriginals(){
            $db = new connect();
            $query = "SELECT COUNT(ID_PRODUCT) AS TOTAL FROM product WHERE DESC_SHORT LIKE '%Originals';";
            $result = $db ->getList($query);
            return $result;
        }

        function countRunning(){
            $db = new connect();
            $query = "SELECT COUNT(ID_PRODUCT) AS TOTAL FROM product WHERE DESC_SHORT LIKE '%Chạy';";
            $result = $db ->getList($query);
            return $result;
        }

        function countSportswear(){
            $db = new connect();
            $query = "SELECT COUNT(ID_PRODUCT) AS TOTAL FROM product WHERE DESC_SHORT LIKE '%Sportswear';";
            $result = $db ->getList($query);
            return $result;
        }

        function countTennis(){
            $db = new connect();
            $query = "SELECT COUNT(ID_PRODUCT) AS TOTAL FROM product WHERE DESC_SHORT LIKE '%Quần vợt';";
            $result = $db ->getList($query);
            return $result;
        }

    }
?>