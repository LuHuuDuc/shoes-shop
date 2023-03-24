<?php
    class cart{
        function __construct(){

        }

        function addCart($idProduct, $nameProduct, $priceProduct, $colorProduct, $sizeProduct, $imgProduct, $quantityProduct, $totalProduct, $inventory, $sell_number){

            $item = array(
                "ID_PRODUCT" => $idProduct,
                "NAME_PRODUCT" => $nameProduct,
                "PRICE_PRODUCT" => $priceProduct,
                "SIZE" => $sizeProduct,
                "COLOR" => $colorProduct,
                "IMG" => $imgProduct,
                "QUANTITY" => $quantityProduct,
                "TOTAL" => $totalProduct,
                "INVENTORY" => $inventory,
                "SELL_NUMBER" => $sell_number
            );

            $_SESSION['cart'][] = $item;

        }

        function removeCart($index, $product, $color, $size){
            if($_SESSION['cart'][$index]['ID_PRODUCT'] == $product && $_SESSION['cart'][$index]['COLOR'] == $color && $_SESSION['cart'][$index]['SIZE'] == $size){
                array_splice($_SESSION['cart'], $index, 1);
            }
        }

        function getTotalPrice(){
            $result = 0;
            if(isset($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $key => $value){
                    $result += $value['TOTAL'];
                }
            }
            return $result;
        }

        function getTotalCart($discount){
            $result = $this -> getTotalPrice();
            $result *= 1.1;
            $result += $_SESSION['ADDRESS']=="TP.Hồ Chí Minh" ? 15000 : ($_SESSION['ADDRESS']=="Tiền Giang" ? 25000 : 35000);
            $result *= $discount=="522003" ? 0.9 : 1;
            $_SESSION['TOTAL_CART'] = $result;
            return $result;

        }

        function countCart(){
            $result = 0;
            if(isset($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $key => $value){
                    $result += $value['QUANTITY'];
                }
            }
            return $result;
        }

        function getHistory($idAccount, $limit, $index){
            $db = new connect();
            $query = "SELECT `NAME_PURCHASE`, `PHONE_PURCHASE`, `ADDRESS_PURCHASE`, `TOTAL`, `DATE` FROM `purchase_history` WHERE ID_ACCOUNT = $idAccount LIMIT $limit OFFSET $index";
            $result = $db ->getList($query);
            return $result;
        }

        function getHistoryAll(){
            $db = new connect();
            $query = "SELECT * FROM purchase_history";
            $result = $db ->getList($query);
            return $result;
        }

        function countHistory($idAccount){
            $db = new connect();
            $query = "SELECT COUNT(ID_ACCOUNT) AS TOTAL FROM purchase_history WHERE ID_ACCOUNT='$idAccount';";
            $result = $db ->getList($query);
            return $result;
        }

        function CheckCart($idAccount){
            $db = new connect();
            $query = "SELECT `ID_CART` FROM `cart` WHERE ID_ACCOUNT = $idAccount ORDER BY `ID_CART` DESC";
            $result = $db ->getList($query);
            $result = $result -> fetch();
            return $result;
        }

        function getAllCart(){
            $db = new connect();
            $query = "SELECT * FROM cart";
            $result = $db ->getList($query);
            return $result;
        }

        function Statistics($star, $end){
            $db = new connect();
            $query = "SELECT NAME_PRODUCT, SUM(QUANTITY) as QUANTITY FROM cart WHERE DATE BETWEEN '$star' AND '$end' GROUP BY NAME_PRODUCT;";
            $result = $db ->getList($query);
            return $result;
        }
    }
?>