<?php
    $_SESSION['ADDRESS'] = "TP.Hồ Chí Minh";
    if(isset($_POST['addCart'])){
        $idProduct = $_GET['id'];
        $result = $product -> getProductID($idProduct);
        $quantityProduct = $_POST['quantity'] == "" ? 1 : $_POST['quantity'];
        $nameProduct = $result['NAME_PRODUCT'];
        $inventory = $result['INVENTORY'];
        $sell_number = $result['SELL_NUMBER'];
        $sizeProduct = $_POST['size'];
        $priceProduct = $result['PRICE_SALE'] > 0 ? $result['PRICE_SALE'] : $result['PRICE_PRODUCT'];
        $colorProduct = $_POST['color'] == 0 ? $result['COLOR_1'] : $result['COLOR_2'];
        $imgProduct = $_POST['color'] == 0 ? $result['IMG_1'] : $result['IMG_2'];
        $totalProduct = $priceProduct*$quantityProduct;
        $cart -> addCart($idProduct, $nameProduct, $priceProduct, $colorProduct,  $sizeProduct, $imgProduct, $quantityProduct, $totalProduct, $inventory, $sell_number);

        foreach($_SESSION['cart'] as $key => $item){
            foreach($_SESSION['cart'] as $key1 => $item1){
                if($item['ID_PRODUCT']==$item1['ID_PRODUCT'] && $item['COLOR']==$item1['COLOR'] && $item['SIZE']==$item1['SIZE'] && $key1 > $key){
                    $_SESSION['cart'][$key]['QUANTITY'] += $_SESSION['cart'][$key1]['QUANTITY'];
                    $_SESSION['cart'][$key]['TOTAL'] += $_SESSION['cart'][$key1]['TOTAL'];
                    array_splice($_SESSION['cart'], $key1, 1);
                }
            }
        }
    }

    if(isset($_GET['Key']) && isset($_GET['ID']) && isset($_GET['Color']) && isset($_GET['Size'])){
        $cart -> removeCart($_GET['Key'], $_GET['ID'], $_GET['Color'], $_GET['Size']);
        echo count($_SESSION['cart']) > 0 ?
        "<script>
        window.addEventListener('load', (event) => {
            document.querySelector('.cart').classList.add('active')
        });
        </script>" : "";
    }

    if(isset($_POST['deleteAllCart'])){
        array_splice($_SESSION['cart'], 0, count($_SESSION['cart']));
        echo "<Script>window.location='index.php'</Script>";
    }

    if(isset($_POST['updateAllCart'])){
        $_SESSION['ADDRESS'] = $_POST['addressCart'];
        $arrQuantity = $_POST['quantityNew'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        for($key = $start; $key < $end; $key++){
            if($key >= count($_SESSION['cart'])) break;
            $_SESSION['cart'][$key]['QUANTITY'] = $arrQuantity[$key];
            $_SESSION['cart'][$key]['TOTAL'] = $arrQuantity[$key]*$_SESSION['cart'][$key]['PRICE_PRODUCT'];
        }
        for($key = $start; $key < $end; $key++){
            if($key >= count($_SESSION['cart'])) break;
            $_SESSION['cart'][$key]['QUANTITY'] == 0 ? array_splice($_SESSION['cart'], $key, 1) && $key-- : "";
        }
        $countCart = count($_SESSION['cart']);
        echo $countCart > 0 && !isset($_SESSION['NAME_PURCHASE']) ?
            "<script>
            window.addEventListener('load', (event) => {
                document.querySelector('.cart').classList.add('active')
            });
            </script>" : "";
    }
    echo isset($_SESSION['NAME_PURCHASE']) && isset($_SESSION['PHONE_PURCHASE']) && isset($_SESSION['ADDRESS_PURCHASE']) && count($_SESSION['cart']) > 0 ?
            "<script>
                window.addEventListener('load', (event) => {
                    document.querySelector('.verify-purchase').classList.add('active')
                    document.querySelector('.info-verify-purchase').classList.remove('active')
                    document.querySelector('.cartValidation').classList.remove('active')
                });
                </script>" : "";

    if(isset($_POST['buyNow'])){
        $idProduct = $_GET['id'];
        $result = $product -> getProductID($idProduct);
        $quantityProduct = $_POST['quantity'] == "" ? 1 : $_POST['quantity'];
        $nameProduct = $result['NAME_PRODUCT'];
        $priceProduct = $result['PRICE_SALE'] > 0 ? $result['PRICE_SALE'] : $result['PRICE_PRODUCT'];
        $colorProduct = $_POST['color'] == 0 ? $result['COLOR_1'] : $result['COLOR_2'];
        $imgProduct = $_POST['color'] == 0 ? $result['IMG_1'] : $result['IMG_2'];
        $sizeProduct = $_POST['size'];
        $inventory = $result['INVENTORY'];
        $sell_number = $result['SELL_NUMBER'];
        $totalProduct = $priceProduct*$quantityProduct;
        $cart -> addCart($idProduct, $nameProduct, $priceProduct, $colorProduct,  $sizeProduct, $imgProduct, $quantityProduct, $totalProduct, $inventory, $sell_number);

        foreach($_SESSION['cart'] as $key => $item){
            foreach($_SESSION['cart'] as $key1 => $item1){
                if($item['ID_PRODUCT']==$item1['ID_PRODUCT'] && $item['COLOR']==$item1['COLOR'] && $item['SIZE']==$item1['SIZE'] && $key1 > $key){
                    $_SESSION['cart'][$key]['QUANTITY'] += $_SESSION['cart'][$key1]['QUANTITY'];
                    $_SESSION['cart'][$key]['TOTAL'] += $_SESSION['cart'][$key1]['TOTAL'];
                    array_splice($_SESSION['cart'], $key1, 1);
                }
            }
        }

        echo "<script>
        window.addEventListener('load', (event) => {
            document.querySelector('.cart').classList.add('active')
            document.querySelector('.verify-purchase').classList.add('change')
            document.querySelector('.info-verify-purchase').classList.add('active')
            document.querySelector('.cartValidation').classList.add('active')
        });
        </script>";
    }
    

    if(isset($_POST['btnOder'])){
        $namePurchase = $_POST['namePurchase'];
        $phonePurchase = $_POST['phonePurchase'];
        $addressPurchase = $_POST['addressPurchase'];
        if($namePurchase == "" || $phonePurchase == "" || $addressPurchase == ""){
            echo "<script>
            window.addEventListener('load', (event) => {
                document.querySelector('.form-verify-info').classList.add('active')
                document.querySelector('.alert-verify-info-fail').classList.add('active');
                document.querySelector('.line-verify-info-fail').classList.add('active');
                setTimeout(function(){
                    document.querySelector('.alert-verify-info-fail').classList.remove('active');
                    document.querySelector('.line-verify-info-fail').classList.remove('active');
                }, 2800)
            });
            </script>";
        }
        else{
            $_SESSION['NAME_PURCHASE'] = $namePurchase;
            $_SESSION['PHONE_PURCHASE'] = $phonePurchase;
            $_SESSION['ADDRESS_PURCHASE'] = $addressPurchase;
            echo "<script>
            window.addEventListener('load', (event) => {
                document.querySelector('.verify-purchase').classList.add('active')
                document.querySelector('.verify-purchase').classList.remove('change')
                document.querySelector('.info-verify-purchase').classList.remove('active')
                document.querySelector('.cartValidation').classList.remove('active')
            });
            </script>";
        }
    }

    if(isset($_POST['VerifyPurchase'])){
        $idAccount = isset($_SESSION['ID_ACCOUNT']) ? $_SESSION['ID_ACCOUNT'] : 0;
        $date = date('Y/n/j H:i:s');
        $arrCart = array();
        $listID = "";

        if(isset($_SESSION['NAME_PURCHASE'])){
            $namePurchase = $_SESSION['NAME_PURCHASE'];
            $phonePurchase = $_SESSION['PHONE_PURCHASE'];
            $addressPurchase = $_SESSION['ADDRESS_PURCHASE'];
            foreach($_SESSION['cart'] as $key => $item){
                $idProduct = $_SESSION['cart'][$key]["ID_PRODUCT"];
                $nameProduct = $_SESSION['cart'][$key]["NAME_PRODUCT"];
                $priceProduct = $_SESSION['cart'][$key]["PRICE_PRODUCT"];
                $imgProduct = $_SESSION['cart'][$key]["IMG"];
                $quantityProduct = $_SESSION['cart'][$key]["QUANTITY"];
                $colorProduct = $_SESSION['cart'][$key]["COLOR"];
                $sizeProduct = $_SESSION['cart'][$key]["SIZE"];
                $totalProduct = $_SESSION['cart'][$key]["TOTAL"];
    
                $query = "INSERT INTO `cart`(`ID_ACCOUNT`, `ID_PRODUCT`, `NAME_PRODUCT`, `PRICE`, `IMG`, `QUANTITY`, `COLOR`, `SIZE`, `TOTAL`, `DATE`)
                VALUES ('$idAccount', '$idProduct', '$nameProduct', '$priceProduct', '$imgProduct', '$quantityProduct', '$colorProduct', '$sizeProduct','$totalProduct', '$date')";
                $db -> getList($query);
                
                $result = $cart -> CheckCart($idAccount);
                $idCart = $result['ID_CART'];
                array_push($arrCart, $idCart);
    
            }

            foreach($arrCart as $key => $item){
                $listID .= $item." ";
            }

            $total = $_SESSION['TOTAL_CART'];
            $history = "INSERT INTO `purchase_history`(`ID_CART`, `ID_ACCOUNT`, `NAME_PURCHASE`, `PHONE_PURCHASE`, `ADDRESS_PURCHASE`, `TOTAL`, `DATE`)
            VALUES ('$listID', '$idAccount', '$namePurchase', ' $phonePurchase', '$addressPurchase', '$total', '$date')";
            $db -> getList($history);
        }

        unset($_SESSION['NAME_PURCHASE']);
        unset($_SESSION['PHONE_PURCHASE']);
        unset($_SESSION['ADDRESS_PURCHASE']);
        unset($_SESSION['TOTAL_CART']);
        unset($_SESSION['discountCode']);
        
        echo "<script>
        window.addEventListener('load', (event) => {
            document.querySelector('.form-rating').classList.add('active');
            document.querySelector('.alert-verify-info-sc').classList.add('active');
            document.querySelector('.line-verify-info-sc').classList.add('active');
            setTimeout(function(){
                document.querySelector('.alert-verify-info-sc').classList.remove('active');
                document.querySelector('.line-verify-info-sc').classList.remove('active');
            }, 2800)
        });
        </script>";
    }

    if(isset($_POST['ratingProduct']) && count($_SESSION['cart']) > 0){
        $idProduct = $_SESSION['cart'][0]['ID_PRODUCT'];
        $result = $product -> getProductID($idProduct);

        $rateCart = $_POST['rating'];
        $quantityCart = $_SESSION['cart'][0]['QUANTITY'];
        $inventory = $_SESSION['cart'][0]['INVENTORY'] - $quantityCart;
        $sell_number = $_SESSION['cart'][0]['SELL_NUMBER'] + $quantityCart;

        $rateOld = $result["RATE"];
        $sellOld = $result["SELL_NUMBER"];

        $rateNew = ($rateCart*$quantityCart + $rateOld*$sellOld) / ($quantityCart + $sellOld);

        $product -> updateProduct($idProduct, $inventory, $sell_number, $rateNew);
        array_splice($_SESSION['cart'], 0, 1);
        echo "<script>
        window.addEventListener('load', (event) => {
            document.querySelector('.form-rating').classList.add('active');
        });
        </script>";
    }

    if(isset($_POST['CancelTransaction'])){
        unset($_SESSION['NAME_PURCHASE']);
        unset($_SESSION['PHONE_PURCHASE']);
        unset($_SESSION['ADDRESS_PURCHASE']);
        echo "<script>window.location='index.php'</script>";
    }

?>