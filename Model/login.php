<?php
    include "PHPMailer-master/src/PHPMailer.php";
    include "PHPMailer-master/src/Exception.php";
    include "PHPMailer-master/src/OAuth.php";
    include "PHPMailer-master/src/POP3.php";
    include "PHPMailer-master/src/SMTP.php";
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if(isset($_POST['btnLogin'])){
        $user = $_POST['userLogin'];
        $password = $_POST['passwordLogin'];
        if($user == "" || $password == ""){
            echo "<script>
            window.addEventListener('load', (event) => {
                document.querySelector('.form-login').classList.add('active');
                document.querySelector('.alert-error-login').classList.add('active');
                document.querySelector('.line-alert-error-login').classList.add('active');
                setTimeout(function(){
                    document.querySelector('.alert-error-login').classList.remove('active');
                    document.querySelector('.line-alert-error-login').classList.remove('active');
                }, 2800)
              });
            </script>";
        }
        else{
            $passwordPro = md5($password);
            $result = $account->login($user, $passwordPro);
            
            if($result == true){
                $_SESSION['ID_ACCOUNT'] = $result['ID_ACCOUNT'];
                $_SESSION['NAME'] = $result['NAME'];
                $_SESSION['USERNAME'] = $result['USER'];
                $_SESSION['PASSWORD'] = $password;
                $_SESSION['PHONE'] = $result['PHONE'];
                $_SESSION['EMAIL'] = $result['EMAIL'];
                $_SESSION['ADDRESS'] = $result['ADDRESS'];
                $_SESSION['ROLE'] = $result['ROLE'];
                echo "<script>
                window.addEventListener('load', (event) => {
                    document.querySelector('.alert-success-login').classList.add('active');
                    document.querySelector('.line-alert-success-login').classList.add('active');
                    setTimeout(function(){
                        document.querySelector('.alert-success-login').classList.remove('active');
                        document.querySelector('.line-alert-success-login').classList.remove('active');
                    }, 2800)
                  });
                </script>";
            }
            else if($result == false){
                echo "<script>
                window.addEventListener('load', (event) => {
                    document.querySelector('.form-login').classList.add('active');
                    document.querySelector('.alert-fail-login').classList.add('active');
                    document.querySelector('.line-alert-fail-login').classList.add('active');
                    setTimeout(function(){
                        document.querySelector('.alert-fail-login').classList.remove('active');
                        document.querySelector('.line-alert-fail-login').classList.remove('active');
                    }, 2800)
                  });
                </script>";
            }
        }
    }

    if(isset($_POST['logout'])){
        echo "<script>
        window.addEventListener('load', (event) => {
            document.querySelector('.alert-logout').classList.add('active');
            document.querySelector('.line-alert-logout').classList.add('active');
            setTimeout(function(){
                document.querySelector('.alert-logout').classList.remove('active');
                document.querySelector('.line-alert-logout').classList.remove('active');
            }, 2800)
        });
        </script>";
        
        unset($_SESSION['ID_ACCOUNT']);
        unset($_SESSION['USERNAME']);
        unset($_SESSION['PASSWORD']);
        unset($_SESSION['ROLE']);
        unset($_SESSION['NAME']);
        unset($_SESSION['EMAIL']);
        unset($_SESSION['PHONE']);
        unset($_SESSION['cart']);
        unset($_SESSION['NAME_PURCHASE']);
        unset($_SESSION['PHONE_PURCHASE']);
        unset($_SESSION['ADDRESS_PURCHASE']);
    }

    if(isset($_POST['updateProfile'])){
        if($_POST['nameEdit'] == "" || $_POST['passwordEdit'] == "" || $_POST['phoneEdit'] == "" || $_POST['emailEdit'] == "" || $_POST['addressEdit'] == ""){
            echo "<script>
                        window.addEventListener('load', (event) => {
                            document.querySelector('.alert-verify-info-fail').classList.add('active');
                            document.querySelector('.line-verify-info-fail').classList.add('active');
                            setTimeout(() =>{
                                document.querySelector('.alert-verify-info-fail').classList.remove('active');
                                document.querySelector('.line-verify-info-fail').classList.remove('active');
                            },2800)
                            document.querySelector('.form-edit-info-account').classList.add('active');
                        });
                        </script>";
        }
        else{
            $passProtect = md5($_POST['passwordEdit']);
            $account-> editProfile( $_POST['nameEdit'] ,$_SESSION['ID_ACCOUNT'], $passProtect, $_POST['phoneEdit'], $_POST['emailEdit'], $_POST['addressEdit']);

            $_SESSION['NAME'] = $_POST['nameEdit'];
            $_SESSION['ADDRESS'] = $_POST['addressEdit'];
            $_SESSION['PASSWORD'] = $_POST['passwordEdit'];
            $_SESSION['EMAIL'] = $_POST['emailEdit'];
            $_SESSION['PHONE'] = $_POST['phoneEdit'];

            echo "<script>
                        window.addEventListener('load', (event) => {
                            document.querySelector('.alert-update-success').classList.add('active');
                            document.querySelector('.line-alert-update-success').classList.add('active');
                            setTimeout(() =>{
                                document.querySelector('.alert-update-success').classList.remove('active');
                                document.querySelector('.line-alert-update-success').classList.remove('active');
                            },2800)
                        });
                        </script>";

        }
    }

    if(isset($_POST['btnForget'])){
        $result = $account -> checkEmail($_POST['emailForget']);

        if($_POST['emailForget'] == ""){
            echo "<script>
                        window.addEventListener('load', (event) => {
                            document.querySelector('.alert-error-email-forget').classList.add('active');
                            document.querySelector('.line-error-email-forget').classList.add('active');
                            setTimeout(() =>{
                                document.querySelector('.alert-error-email-forget').classList.remove('active');
                                document.querySelector('.line-error-email-forget').classList.remove('active');
                            },2800)
                            document.querySelector('.form-login').classList.add('active');
                            document.querySelector('.form-register').classList.remove('active');
                            document.querySelector('.form-info-login').classList.add('active');
                            document.querySelector('.form-forget').classList.add('active')
                        });
                        </script>";
        }
        else if($result){
            if(!isset($_SESSION['emailForget'])){
                isset($_SESSION['codeAuth']) ? "" : $_SESSION['codeAuth'] = mt_rand(100000, 999999);    
                $_SESSION['emailForget'] = $_POST['emailForget'];

                $mail = new PHPMailer(true);
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'PHPMailer.LHD@gmail.com';
                $mail->Password = 'rhfprxvacwlznhra';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                $mail->setFrom('lhd.vie@gmail.com', 'ADIDAS Support');
                $mail->addAddress($_POST["emailForget"], $result[0]);
                $mail->isHTML(true);
                $mail->Subject = '(no-reply)';
                $mail->Body = 
                '<div style="width: 500px; padding: 20px; margin: auto; margin-top: 0; background: linear-gradient(to top right, #cc99ff, #ff99ff); border-radius: 10px; color: #fff; overflow: hidden;">
                <style>
                    @import url("https://fonts.googleapis.com/css2?family=Lobster&display=swap");
                </style>
                    <div class="content">
                        <img style="width: 100px; margin: 10px; " src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Adidas_Logo.svg/2560px-Adidas_Logo.svg.png">
                        <h1 style="text-align: center; color: #000; font-size: 30px; font-weight: bold;">ADIDAS TIỀN GIANG</h1>
            <p style="font-weight: bold; margin-left: 30px; color: #000; font-size: 16px;" class="content-p">Dear you</p>
            <p style="font-weight: bold; margin-left: 30px; color: #000; font-size: 16px;" class="content-p">Mã xác thực của bạn là: <span style="color: brown;">'.$_SESSION['codeAuth'].'</span></p>
                    </div>
                 </div>';
                $mail->send();

                $_SESSION['check'] = 1;

                echo "<script>
                window.addEventListener('load', (event) => {
                    document.querySelector('.form-login').classList.add('active');
                    document.querySelector('.form-register').classList.remove('active');
                    document.querySelector('.form-info-login').classList.add('active');
                    document.querySelector('.form-forget').classList.add('active')
                });
                </script>";
            }
            elseif($_SESSION['check'] == 1){
                if($_POST['codeAuth'] == ""){
                    echo "<script>
                    window.addEventListener('load', (event) => {
                        document.querySelector('.alert-error-codeAuth-forget').classList.add('active');
                        document.querySelector('.line-error-codeAuth-forget').classList.add('active');
                        setTimeout(() =>{
                            document.querySelector('.alert-error-codeAuth-forget').classList.remove('active');
                            document.querySelector('.line-error-codeAuth-forget').classList.remove('active');
                        },2800)
                        document.querySelector('.form-login').classList.add('active');
                        document.querySelector('.form-register').classList.remove('active');
                        document.querySelector('.form-info-login').classList.add('active');
                        document.querySelector('.form-forget').classList.add('active')
                    });
                    </script>";
                }
                elseif($_SESSION['codeAuth'] != $_POST['codeAuth']){
                    echo "<script>
                    window.addEventListener('load', (event) => {
                        document.querySelector('.alert-error-codeAuth-forget1').classList.add('active');
                        document.querySelector('.line-error-codeAuth-forget1').classList.add('active');
                        setTimeout(() =>{
                            document.querySelector('.alert-error-codeAuth-forget1').classList.remove('active');
                            document.querySelector('.line-error-codeAuth-forget1').classList.remove('active');
                        },2800)
                        document.querySelector('.form-login').classList.add('active');
                        document.querySelector('.form-register').classList.remove('active');
                        document.querySelector('.form-info-login').classList.add('active');
                        document.querySelector('.form-forget').classList.add('active')
                    });
                    </script>";
                }
                else{
                    $_SESSION['result'] = true;
                    $_SESSION['check'] = 2;
                    echo "<script>
                    window.addEventListener('load', (event) => {
                        document.querySelector('.form-login').classList.add('active');
                        document.querySelector('.form-register').classList.remove('active');
                        document.querySelector('.form-info-login').classList.add('active');
                        document.querySelector('.form-forget').classList.add('active')
                    });
                    </script>";
                }
            }
            elseif($_SESSION['check'] == 2){
                if($_POST['passwordNew'] == "" || $_POST['confirmPasswordNew'] == ""){
                    echo "<script>
                    window.addEventListener('load', (event) => {
                        document.querySelector('.alert-error-passwordNew').classList.add('active');
                        document.querySelector('.line-error-passwordNew').classList.add('active');
                        setTimeout(() =>{
                            document.querySelector('.alert-error-passwordNew').classList.remove('active');
                            document.querySelector('.line-error-passwordNew').classList.remove('active');
                        },2800)
                        document.querySelector('.form-login').classList.add('active');
                        document.querySelector('.form-register').classList.remove('active');
                        document.querySelector('.form-info-login').classList.add('active');
                        document.querySelector('.form-forget').classList.add('active')
                    });
                    </script>";
                }
                elseif($_POST['passwordNew'] == $_POST['confirmPasswordNew']){
                    $account -> changPassword($_SESSION['emailForget'], md5($_POST['passwordNew']));
                    unset($_SESSION['codeAuth']);
                    unset($_SESSION['emailForget']);
                    unset($_SESSION['result']);
                    unset($_SESSION['check']);
                    echo "<script>
                    window.addEventListener('load', (event) => {
                        document.querySelector('.alert-change-password').classList.add('active');
                        document.querySelector('.line-change-password').classList.add('active');
                        setTimeout(() =>{
                            document.querySelector('.alert-change-password').classList.remove('active');
                            document.querySelector('.line-change-password').classList.remove('active');
                        },2800)
                        document.querySelector('.form-login').classList.add('active');
                        document.querySelector('.form-register').classList.remove('active');
                        document.querySelector('.form-info-login').classList.remove('active');
                        document.querySelector('.form-forget').classList.remove('active')
                    });
                    </script>";
                }
                else{
                    echo "<script>
                    window.addEventListener('load', (event) => {
                        document.querySelector('.alert-error-passwordNew1').classList.add('active');
                        document.querySelector('.line-error-passwordNew1').classList.add('active');
                        setTimeout(() =>{
                            document.querySelector('.alert-error-passwordNew1').classList.remove('active');
                            document.querySelector('.line-error-passwordNew1').classList.remove('active');
                        },2800)
                        document.querySelector('.form-login').classList.add('active');
                        document.querySelector('.form-register').classList.remove('active');
                        document.querySelector('.form-info-login').classList.add('active');
                        document.querySelector('.form-forget').classList.add('active')
                    });
                    </script>";

                }
            }
        }
        else{
            echo "<script>
                        window.addEventListener('load', (event) => {
                            document.querySelector('.alert-error-email-forget1').classList.add('active');
                            document.querySelector('.line-error-email-forget1').classList.add('active');
                            setTimeout(() =>{
                                document.querySelector('.alert-error-email-forget1').classList.remove('active');
                                document.querySelector('.line-error-email-forget1').classList.remove('active');
                            },2800)
                            document.querySelector('.form-login').classList.add('active');
                            document.querySelector('.form-register').classList.remove('active');
                            document.querySelector('.form-info-login').classList.add('active');
                            document.querySelector('.form-forget').classList.add('active')
                        });
                        </script>";
        }
    }
    if(!isset($_POST['btnForget'])){
        unset($_SESSION['codeAuth']);
        unset($_SESSION['emailForget']);
        unset($_SESSION['result']);
        unset($_SESSION['check']);
    }
    if(isset($_POST['backLogin'])){
        unset($_SESSION['codeAuth']);
        unset($_SESSION['emailForget']);
        unset($_SESSION['result']);
        unset($_SESSION['check']);
        echo "<script>
            window.addEventListener('load', (event) => {
                document.querySelector('.form-login').classList.add('active');
                document.querySelector('.form-register').classList.remove('active');
                document.querySelector('.form-info-login').classList.remove('active');
                document.querySelector('.form-forget').classList.remove('active')
            });
        </script>";
    }

?>