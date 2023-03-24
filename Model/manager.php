<?php
    if(isset($_GET['action']) && $_GET['action'] == "admin" &&
        isset($_GET['act']) && $_GET['act'] == "account" &&
        isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "DELETE FROM account WHERE ID_ACCOUNT = $id";
            $db -> getList($query);
            echo "<script>window.location='index.php?action=admin#account-manager'</script>";
    }

    if(isset($_GET['action']) && $_GET['action'] == "admin" &&
        isset($_GET['act']) && $_GET['act'] == "product" &&
        isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "DELETE FROM product WHERE ID_PRODUCT = $id";
            $db -> getList($query);
            echo "<script>window.location='index.php?action=admin#product-manager'</script>";
    }

    if(isset($_GET['action']) && $_GET['action'] == "admin" &&
        isset($_GET['act']) && $_GET['act'] == "purchase" &&
        isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "DELETE FROM purchase_history WHERE ID_HISTORY = $id";
            $db -> getList($query);
            echo "<script>window.location='index.php?action=admin#history-purchase'</script>";
    }

    if(isset($_GET['action']) && $_GET['action'] == "admin" &&
        isset($_GET['act']) && $_GET['act'] == "cart" &&
        isset($_GET['id'])){
            $id = $_GET['id'];
            $query = "DELETE FROM cart WHERE ID_CART = $id";
            $db -> getList($query);
            echo "<script>window.location='index.php?action=admin#history-cart'</script>";
    }

    if(isset($_POST['managerAddAccount'])){
        $name = $_POST['nameUser'];
        $user = $_POST['accountUser'];
        $pass = $_POST['passwordUser'];
        $phone = $_POST['phoneUser'];
        $email = $_POST['emailUser'];
        $address = $_POST['addressUser'];
        $role = $_POST['role'];

        $checkUser = $account -> checkUser($user);
        $checkPhone = $account -> checkPhone($user);
        $checkEmail = $account -> checkEmail($user);

        $regex = "/(84|0[3|5|7|8|9])+([0-9]{8})\b/";
        $checkValidatePhone = preg_match($regex, $phone);

        if($name == "" || $user == "" || $pass == "" || 
            $phone == "" || $email == "" || $address == ""){
                echo "<script>
                window.addEventListener('load', (event) => {
                    document.querySelector('.alert-register-fail0').classList.add('active');
                    document.querySelector('.line-alert-register0').classList.add('active');
                    setTimeout(function(){
                        document.querySelector('.alert-register-fail0').classList.remove('active');
                        document.querySelector('.line-alert-register0').classList.remove('active');
                    }, 2800)
                });
                </script>";
        }

        else{
            if($checkUser == true  && $checkPhone == true && $checkEmail == true){
                echo "<script>
                    window.addEventListener('load', (event) => {
                        document.querySelector('.alert-register-fail').classList.add('active');
                        document.querySelector('.line-alert-register').classList.add('active');
                        setTimeout(function(){
                            document.querySelector('.alert-register-fail').classList.remove('active');
                            document.querySelector('.line-alert-register').classList.remove('active');
                        }, 2800)
                    });
                    </script>";
            }
            else if($checkUser == true && $checkPhone == false && $checkEmail == false){
                echo "<script>
                    window.addEventListener('load', (event) => {
                        document.querySelector('.alert-register-fail1').classList.add('active');
                        document.querySelector('.line-alert-register1').classList.add('active');
                        setTimeout(function(){
                            document.querySelector('.alert-register-fail1').classList.remove('active');
                            document.querySelector('.line-alert-register1').classList.remove('active');
                        }, 2800)
                    });
                    </script>";
            }
            else if($checkPhone == true && $checkUser == false && $checkEmail == false){
                echo "<script>
                    window.addEventListener('load', (event) => {
                        document.querySelector('.alert-register-fail2').classList.add('active');
                        document.querySelector('.line-alert-register2').classList.add('active');
                        setTimeout(function(){
                            document.querySelector('.alert-register-fail2').classList.remove('active');
                            document.querySelector('.line-alert-register2').classList.remove('active');
                        }, 2800)
                    });
                    </script>";
            }
            else if($checkEmail == true && $checkUser == false && $checkPhone == false){
                echo "<script>
                    window.addEventListener('load', (event) => {
                        document.querySelector('.alert-register-fail3').classList.add('active');
                        document.querySelector('.line-alert-register3').classList.add('active');
                        setTimeout(function(){
                            document.querySelector('.alert-register-fail3').classList.remove('active');
                            document.querySelector('.line-alert-register3').classList.remove('active');
                        }, 2800)
                    });
                    </script>";
            }
            else if($checkUser == true && $checkEmail == true && $checkPhone == false){
                echo "<script>
                    window.addEventListener('load', (event) => {
                        document.querySelector('.alert-register-fail4').classList.add('active');
                        document.querySelector('.line-alert-register4').classList.add('active');
                        setTimeout(function(){
                            document.querySelector('.alert-register-fail4').classList.remove('active');
                            document.querySelector('.line-alert-register4').classList.remove('active');
                        }, 2800)
                    });
                    </script>";
            }
            else if($checkUser == true && $checkPhone == true && $checkEmail == false){
                echo "<script>
                    window.addEventListener('load', (event) => {
                        document.querySelector('.alert-register-fail5').classList.add('active');
                        document.querySelector('.line-alert-register5').classList.add('active');
                        setTimeout(function(){
                            document.querySelector('.alert-register-fail5').classList.remove('active');
                            document.querySelector('.line-alert-register5').classList.remove('active');
                        }, 2800)
                    });
                    </script>";
            }
            else if($checkPhone == true && $checkEmail == true && $checkUser == false){
                echo "<script>
                window.addEventListener('load', (event) => {
                    document.querySelector('.alert-register-fail6').classList.add('active');
                    document.querySelector('.line-alert-register6').classList.add('active');
                    setTimeout(function(){
                        document.querySelector('.alert-register-fail6').classList.remove('active');
                        document.querySelector('.line-alert-register6').classList.remove('active');
                    }, 2800)
                });
                </script>";
            }
            else if(!$checkValidatePhone){
                echo "<script>
                window.addEventListener('load', (event) => {
                    document.querySelector('.alert-error-register-validation').classList.add('active');
                    document.querySelector('.line-error-register-validation').classList.add('active');
                    setTimeout(function(){
                        document.querySelector('.alert-error-register-validation').classList.remove('active');
                        document.querySelector('.line-error-register-validation').classList.remove('active');
                    }, 2800)
                });
                </script>";
            }
            else{
                $protectedpass = md5($pass);
                $account -> registerManager($name, $user, $protectedpass, $phone, $email, $address, $role);
                echo "<script>window.location='index.php?action=admin'</script>";

            }
        }
    }
    
    if(isset($_POST['managerUpdateAccount'])){
        $id = $_GET['id'];
        $name = $_POST['nameUser'];
        $user = $_POST['accountUser'];
        $pass = $_POST['passwordUser'];
        $phone = $_POST['phoneUser'];
        $email = $_POST['emailUser'];
        $address = $_POST['addressUser'];
        $role = $_POST['role'];

        $regex = "/(84|0[3|5|7|8|9])+([0-9]{8})\b/";
        $checkValidatePhone = preg_match($regex, $phone);

        if($name == "" || $user == "" || 
            $phone == "" || $email == "" || $address == ""){
                echo "<script>
                window.addEventListener('load', (event) => {
                    document.querySelector('.alert-register-fail0').classList.add('active');
                    document.querySelector('.line-alert-register0').classList.add('active');
                    setTimeout(function(){
                        document.querySelector('.alert-register-fail0').classList.remove('active');
                        document.querySelector('.line-alert-register0').classList.remove('active');
                    }, 2800)
                });
                </script>";
        }

        else{
            if(!$checkValidatePhone){
                echo "<script>
                window.addEventListener('load', (event) => {
                    document.querySelector('.alert-error-register-validation').classList.add('active');
                    document.querySelector('.line-error-register-validation').classList.add('active');
                    setTimeout(function(){
                        document.querySelector('.alert-error-register-validation').classList.remove('active');
                        document.querySelector('.line-error-register-validation').classList.remove('active');
                    }, 2800)
                });
                </script>";
            }
            else{
                $protectedpass = md5($pass);
                if($pass == ""){
                    $account -> editAccountManager($id ,$name, $user, $phone, $email, $address, $role);
                    echo "<script>window.location='index.php?action=admin'</script>";
                }
                else{
                    $account -> editAccountManagerAll($id ,$name, $user, $protectedpass, $phone, $email, $address, $role);
                    echo "<script>window.location='index.php?action=admin'</script>";
                }
            }
        }
    }

    if(isset($_POST['managerUpdateProduct'])){
        $id = $_GET['id'];
        $name = $_POST['name_Product'];
        $price = $_POST['price_Product'];
        $size1 = $_POST['size1_Product'];
        $size2 = $_POST['size2_Product'];
        $size3 = $_POST['size3_Product'];
        $color1 = $_POST['color1_Product'];
        $color2 = $_POST['color2_Product'];
        $desc = $_POST['desc_Product'];
        $inventory = $_POST['inventory_Product'];
        $price_sale = $_POST['price_Product'];
        $brand = $_POST['brand_Product'];
        $img1 = $_FILES['img1_Product']['name'];
        $img2 = $_FILES['img2_Product']['name'];

        $result1 = uploadImage($_FILES['img1_Product']);
        $result2 = uploadImage($_FILES['img2_Product']);

        if($size1 == $size2 || $size1 == $size3 || $size2 == $size3){
            echo "<script> alert('Chọn size không hợp lệ') </script>";
        }
        else if($color1 == $color2){
            echo "<script> alert('Chọn màu không hợp lệ') </script>";
        }
        else if($price < $price_sale){
            echo "<script> alert('Nhập giá giảm không hợp lệ') </script>";
        }
        else{
            if($img1 == "" && $img2 == ""){
                $query="UPDATE product SET NAME_PRODUCT = '$name', PRICE_PRODUCT = '$price', SIZE_1 = '$size1', SIZE_2 = '$size2', SIZE_3 = '$size3', COLOR_1 = '$color1', COLOR_2 = '$color2', DESC_SHORT = '$desc', INVENTORY = '$inventory', PRICE_SALE='$price_sale', BRAND='$brand' WHERE ID_PRODUCT = '$id'";
                $db -> getList($query);
                echo "<script>window.location='index.php?action=admin'</script>";
            }
            else if($img != "" && $img2 == ""){
                if($result1){
                    $query="UPDATE product SET NAME_PRODUCT = '$name', PRICE_PRODUCT = '$price', SIZE_1 = '$size1', SIZE_2 = '$size2', SIZE_3 = '$size3', COLOR_1 = '$color1', COLOR_2 = '$color2', IMG_1 = '$img1', DESC_SHORT = '$desc', INVENTORY = '$inventory', PRICE_SALE='$price_sale', BRAND='$brand' WHERE ID_PRODUCT = '$id'";
                    $db -> getList($query);
                    echo "<script>window.location='index.php?action=admin'</script>";
                }
                else{
                    echo "<script>alert('Hình ảnh không hợp lệ')</script>";
                }
            }
            else if($img1 == "" && $img2 != ""){
                if($result2){
                    $query="UPDATE product SET NAME_PRODUCT = '$name', PRICE_PRODUCT = '$price', SIZE_1 = '$size1', SIZE_2 = '$size2', SIZE_3 = '$size3', COLOR_1 = '$color1', COLOR_2 = '$color2', IMG_2 = '$img2', DESC_SHORT = '$desc', INVENTORY = '$inventory', PRICE_SALE='$price_sale', BRAND='$brand' WHERE ID_PRODUCT = '$id'";
                    $db -> getList($query);
                    echo "<script>window.location='index.php?action=admin'</script>";
                }
                else{
                    echo "<script>alert('Hình ảnh không hợp lệ')</script>";
                }
            }
            else{
                if($result1 && $result2){
                    $query="UPDATE product SET NAME_PRODUCT = '$name', PRICE_PRODUCT = '$price', SIZE_1 = '$size1', SIZE_2 = '$size2', SIZE_3 = '$size3', COLOR_1 = '$color1', COLOR_2 = '$color2', IMG_1 = '$img1', IMG_2 = '$img2', DESC_SHORT = '$desc', INVENTORY = '$inventory', PRICE_SALE='$price_sale', BRAND='$brand' WHERE ID_PRODUCT = '$id'";
                    $db -> getList($query);
                    echo "<script>window.location='index.php?action=admin'</script>";
                }
                else{
                    echo "<script>alert('Hình ảnh không hợp lệ')</script>";
                }
            }
        }
    }

    if(isset($_POST['managerAddProduct'])){
        $name = $_POST['name_Product'];
        $price = $_POST['price_Product'];
        $size1 = $_POST['size1_Product'];
        $size2 = $_POST['size2_Product'];
        $size3 = $_POST['size3_Product'];
        $color1 = $_POST['color1_Product'];
        $color2 = $_POST['color2_Product'];
        $desc = $_POST['desc_Product'];
        $inventory = $_POST['inventory_Product'];
        $price_sale = $_POST['price_sale_Product'];
        $brand = $_POST['brand_Product'];
        $img1 = $_FILES['img1_Product']['name'];
        $img2 = $_FILES['img2_Product']['name'];

        $result1 = uploadImage($_FILES['img1_Product']);
        $result2 = uploadImage($_FILES['img2_Product']);

        if($size1 == $size2 || $size1 == $size3 || $size2 == $size3){
            echo "<script> alert('Chọn size không hợp lệ') </script>";
        }
        else if($color1 == $color2){
            echo "<script> alert('Chọn màu không hợp lệ') </script>";
        }
        else if($price < $price_sale){
            echo "<script> alert('Nhập giá giảm không hợp lệ') </script>";
        }
        else{
            if($result1 && $result2){
                $query = "INSERT INTO product(NAME_PRODUCT, PRICE_PRODUCT, SIZE_1, SIZE_2, SIZE_3, COLOR_1, COLOR_2, IMG_1, IMG_2, DESC_SHORT, SELL_NUMBER, INVENTORY, PRICE_SALE, BRAND, RATE)
                VALUES('$name', '$price', '$size1', '$size2', '$size3', '$color1', '$color2', '$img1', '$img2', '$desc', 0, '$inventory', '$price_sale', '$brand', 0)";
                $db -> getList($query);
                echo "<script>window.location='index.php?action=admin'</script>";
            }
            else if($result1 && !$result2){
                $query = "INSERT INTO product(NAME_PRODUCT, PRICE_PRODUCT, SIZE_1, SIZE_2, SIZE_3, COLOR_1, COLOR_2, IMG_1, IMG_2, DESC_SHORT, SELL_NUMBER, INVENTORY, PRICE_SALE, BRAND, RATE)
                VALUES('$name', '$price', '$size1', '$size2', '$size3', '$color1', '$color2', '$img1', '$img2', '$desc', 0, '$inventory', '$price_sale', '$brand', 0)";
                $db -> getList($query);
                echo "<script>window.location='index.php?action=admin'</script>";
            }
            else{
                echo "<script> alert('Hình không hợp lệ') </script>";
            }
        }

    }

?>