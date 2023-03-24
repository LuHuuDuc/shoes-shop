<?php
    if(isset($_POST['btnRegister'])){
        $account = new account();
        $name = $_POST['nameRegister'];
        $userRegister = $_POST['userRegister'];
        $passwordRegister = $_POST['passwordRegister'];
        $confirmPasswordRegister = $_POST['confirmPasswordRegister'];
        $phoneRegister = $_POST['phoneRegister'];
        $emailRegister = $_POST['emailRegister'];
        $addressRegister = $_POST['addressRegister'];
        $checkUser = $account -> checkUser($userRegister);
        $checkPhone = $account -> checkPhone($phoneRegister);
        $checkEmail = $account -> checkEmail($emailRegister);
        $regex = "/(84|0[3|5|7|8|9])+([0-9]{8})\b/";
        $checkValidatePhone = preg_match($regex, $phoneRegister);

        if($userRegister == "" || $passwordRegister == "" || $confirmPasswordRegister == "" || $phoneRegister == "" || $emailRegister == "" || $addressRegister == "" || $name == ""){
            echo "<script>
                window.addEventListener('load', (event) => {
                    document.querySelector('.form-register').classList.add('active');
                    document.querySelector('.form-info-login').classList.add('active');
                    document.querySelector('.form-login').classList.add('active');
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
                        document.querySelector('.form-register').classList.add('active');
                        document.querySelector('.form-info-login').classList.add('active');
                        document.querySelector('.form-login').classList.add('active');
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
                        document.querySelector('.form-register').classList.add('active');
                        document.querySelector('.form-info-login').classList.add('active');
                        document.querySelector('.form-login').classList.add('active');
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
                        document.querySelector('.form-register').classList.add('active');
                        document.querySelector('.form-info-login').classList.add('active');
                        document.querySelector('.form-login').classList.add('active');
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
                        document.querySelector('.form-register').classList.add('active');
                        document.querySelector('.form-info-login').classList.add('active');
                        document.querySelector('.form-login').classList.add('active');
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
                        document.querySelector('.form-register').classList.add('active');
                        document.querySelector('.form-info-login').classList.add('active');
                        document.querySelector('.form-login').classList.add('active');
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
                        document.querySelector('.form-register').classList.add('active');
                        document.querySelector('.form-info-login').classList.add('active');
                        document.querySelector('.form-login').classList.add('active');
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
                    document.querySelector('.form-register').classList.add('active');
                    document.querySelector('.form-info-login').classList.add('active');
                    document.querySelector('.form-login').classList.add('active');
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
                    document.querySelector('.form-register').classList.add('active');
                    document.querySelector('.form-info-login').classList.add('active');
                    document.querySelector('.form-login').classList.add('active');
                    document.querySelector('.alert-error-register-validation').classList.add('active');
                    document.querySelector('.line-error-register-validation').classList.add('active');
                    setTimeout(function(){
                        document.querySelector('.alert-error-register-validation').classList.remove('active');
                        document.querySelector('.line-error-register-validation').classList.remove('active');
                    }, 2800)
                });
                </script>";
            }
            else if($checkUser == false  && $checkPhone == false && $checkEmail == false && $passwordRegister  == $confirmPasswordRegister && $checkValidatePhone){
               $protectedPassword = md5($passwordRegister);
               $result =  $account -> register($name, $userRegister, $protectedPassword, $phoneRegister, $emailRegister, $addressRegister);
               $_SESSION['ID_ACCOUNT'] = $result['ID_ACCOUNT'];
               $_SESSION['NAME'] = $result['NAME'];
               $_SESSION['USERNAME'] = $result['USER'];
               $_SESSION['PASSWORD'] = $passwordRegister;
               $_SESSION['PHONE'] = $result['PHONE'];
               $_SESSION['EMAIL'] = $result['EMAIL'];
               $_SESSION['ADDRESS'] = $result['ADDRESS'];
               $_SESSION['ROLE'] = $result['ROLE'];
               echo "<script>
                window.addEventListener('load', (event) => {
                    document.querySelector('.alert-register-success').classList.add('active');
                    document.querySelector('.line-alert-register-success').classList.add('active');
                    setTimeout(function(){
                        document.querySelector('.alert-register-success').classList.remove('active');
                        document.querySelector('.line-alert-register-success').classList.remove('active');
                    }, 2800)
                });
                </script>";
            }
        }

    }
?>