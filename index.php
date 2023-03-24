<?php
    session_start();
    include 'Model/file.php';
    include 'Model/connect.php';
    $db = new connect();
    include 'Model/product.php';
    $product = new product();
    include 'Model/comment.php';
    $cmt = new comment();
    include 'Model/cart.php';
    $cart = new cart();
    include 'Model/account.php';
    $account = new account();
    include 'Model/addcmt.php';
    include 'Model/addCart.php';
    include 'Model/login.php';
    include 'Model/register.php';
    include 'Model/manager.php';
    include "simplexlsxgen-master/src/SimpleXLSXGen.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lư Hữu Đức</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body id="app">
    <?php
    
    //header
    include './Views/header.php';
    
    //main
    include './Controller/controller.php';

    //footer
    include './Views/footer.php';
    ?>
</body>

</html>
<script>
window.addEventListener("load", (event) => {
    document.querySelector("#load").style.display = "none";
});
document.addEventListener("contextmenu", function(event) {
    event.preventDefault();
    document.querySelector(".menu-click-right").style.display = "block";
    document.querySelector(".menu-click-right").style.left = event.x + "px";
    document.querySelector(".menu-click-right").style.top = event.y + "px";
});
document.addEventListener("click", function(event) {
    document.querySelector(".menu-click-right").style.display = "none";
});
document.addEventListener("keydown", function(KeyboardEvent) {
    if (KeyboardEvent.keyCode == 27) {
        document.querySelector(".menu").classList.remove("active");
        document.querySelector(".cart").classList.remove("active");
        document.querySelector(".label_user").classList.remove("active");
        document.querySelector(".label_password").classList.remove("active");
        document.querySelector(".label-user").classList.remove("active");
        document.querySelector(".label_passwor").classList.remove("active");
        document.querySelector(".label_confirm_password").classList.remove("active");
        document.querySelector(".label_phone").classList.remove("active");
        document.querySelector(".label_email").classList.remove("active");
        document.querySelector(".label_address").classList.remove("active");
        document.querySelector(".form-register").classList.remove("active");
        document.querySelector(".form-info-login").classList.remove("active");
        document.querySelector(".form-login").classList.remove("active");
        document.querySelector(".profile").classList.remove("active");
        document.querySelector(".profile-info").classList.remove("active");
        document.querySelector(".history-info").classList.remove("active");
        document.querySelector(".form-edit-info-account").classList.remove("active");
        document.querySelector(".form-verify-info").classList.remove("active");
        document.querySelector(".verify-purchase").classList.remove("change");
        document.querySelector(".info-verify-purchase").classList.remove("active");
        document.querySelector(".cartValidation").classList.remove("active");
        document.querySelector(".verify-purchase").classList.remove("active");
        document.body.style.width = "100%";
        document.body.style.marginLeft = "0";
    }
});

const app = Vue.createApp({
    data() {
        return {
            ktUCMT: 0,
            ktBackground: 0,
            price: 0,
            name: "",
            user: "",
            password: "",
            confirmPassword: "",
            phone: "",
            email: "",
            address: "",
            actual: "",
            checkPurchase: true,
        };
    },

    methods: {
        showEditCMT() {
            if (this.ktUCMT % 2 == 0) {
                setTimeout(function deplay() {
                    document.querySelector(".textareaUpdate").classList.toggle("active");
                }, 400);
                this.ktUCMT++;
            } else {
                document.querySelector(".textareaUpdate").classList.toggle("active");
                this.ktUCMT++;
            }
            document.querySelector(".comment").classList.toggle("active");
        },

        showDescContent() {
            document.querySelector(".content-desc-detail p").style.display = "block";
        },

        hideDescContent() {
            document.querySelector(".content-desc-detail p").style.display = "none";
        },

        showDecs() {
            document.querySelector(".content-desc-detail").classList.toggle("active");
            if (
                document.querySelector(".content-desc-detail p").style.display == "block"
            ) {
                document.querySelector(".title-desc-detail i").style.transform = "rotate(0deg)";
                this.hideDescContent();
            } else {
                document.querySelector(".title-desc-detail i").style.transform = "rotate(-90deg)";
                setTimeout(this.showDescContent(), 1000);
            }
        },

        addNumber() {
            document.querySelector(".number-product-detail").value++;
        },

        minusNumber() {
            if (document.querySelector(".number-product-detail").value == 0) {
                document.querySelector(".number-product-detail").value;
            } else {
                document.querySelector(".number-product-detail").value--;
            }
        },

        showMenu() {
            document.querySelector(".menu").classList.add("active");
            document.body.style.width = "80%";
            document.body.style.marginLeft = "20%";
        },

        hideMenu() {
            document.querySelector(".menu").classList.remove("active");
            document.body.style.width = "100%";
            document.body.style.marginLeft = "0";
        },

        change_bg() {
            this.ktBackground++;
            document.querySelector(".button-slide").classList.toggle("active");
            document.body.style.transitionDelay = "0.3s";

            if (this.ktBackground % 2 != 0) {
                document.body.style.background = "url('img/img1.jpg')";
                document.body.style.backgroundSize = "cover";
                document.body.style.backgroundPosition = "center";
                document.body.style.backgroundAttachment = "fixed";
            } else {
                document.body.style.background = "url('img/img.jpg')";
                document.body.style.backgroundSize = "cover";
                document.body.style.backgroundPosition = "center";
                document.body.style.backgroundAttachment = "fixed";
            }
        },

        showPassword() {
            if (document.querySelector("#btn_password").type == "text") {
                document.querySelector("#btn_password").type = "password";
            } else {
                document.querySelector("#btn_password").type = "text";
            }
        },

        showFormLogin() {
            document.querySelector(".form-login").classList.add("active");
            document.querySelector(".menu").classList.remove("active");
            document.querySelector(".form-register").classList.remove("active");
            document.querySelector(".form-info-login").classList.remove("active");
            document.body.style.width = "100%";
            document.body.style.marginLeft = "0";
            this.hideAllForm();
        },

        hideAllForm() {
            this.name = "";
            this.user = "";
            this.password = "";
            this.confirmPassword = "";
            this.phone = "";
            this.address = "";
            this.email = "";
            document.querySelector(".label_user").classList.remove("active");
            document.querySelector(".label_password").classList.remove("active");
            document.querySelector(".label-user").classList.remove("active");
            document.querySelector(".label_passwor").classList.remove("active");
            document.querySelector(".label_confirm_password") List.remove("active");
            document.querySelector(".label_phone").classList.remove("active");
            document.querySelector(".label_email").classList.remove("active");
            document.querySelector(".label_address").classList.remove("active");
            document.querySelector(".form-forget").classList.remove("active")
        },

        hideFormLogin() {
            this.hideAllForm();
            document.querySelector(".form-login").classList.remove("active");
            setTimeout(() => {
                document.querySelector(".form-info-login").classList.add("active");
            }, 300);
            document.querySelector(".form-register").classList.remove("active");
            document.querySelector('.form-forget').classList.add('active')
        },

        showRegis() {
            this.hideAllForm();
            document.querySelector(".form-info-login").classList.add("active");
            document.querySelector(".form-register").classList.add("active");
        },

        backLogin() {
            this.hideAllForm();
            document.querySelector(".form-info-login").classList.remove("active");
            document.querySelector(".form-register").classList.remove("active");
            document.querySelector(".form-forget").classList.remove("active")
        },
        showFormForgetPassword() {
            document.querySelector(".form-info-login").classList.add("active")
            document.querySelector(".form-forget").classList.add("active")
        },

        showCart() {
            if (document.querySelector(".countCart").value == 0) {
                document.querySelector(".alert-error").classList.add("active");
                document.querySelector(".line-alert-error").classList.add("active");
                setTimeout(this.hideAlertError, 2800);
            } else {
                document.querySelector(".cart").classList.add("active");
            }
        },

        hideCart() {
            document.querySelector(".cart").classList.remove("active");
        },

        hideAlertError() {
            document.querySelector(".alert-error").classList.remove("active");
            document.querySelector(".line-alert-error").classList.remove("active");
        },

        showProfile() {
            document.querySelector(".profile").classList.add("active");
            document.querySelector(".history-info").classList.remove("active");
            document.querySelector(".menu").classList.remove("active");
            document.body.style.width = "100%";
            document.body.style.marginLeft = "0";
        },

        hideProfile() {
            document.querySelector(".profile").classList.remove("active");
            document.querySelector(".profile-info").classList.remove("active");
            document.querySelector(".history-info").classList.remove("active");
        },

        showHistory() {
            document.querySelector(".profile-info").classList.add("active");
            document.querySelector(".history-info").classList.add("active");
        },

        showProfileInfo() {
            document.querySelector(".profile-info").classList.remove("active");
            document.querySelector(".history-info").classList.remove("active");
        },

        showEditProfile() {
            document.querySelector(".form-edit-info-account").classList.add("active");
            this.hideProfile();
        },

        hideEditProfile() {
            document.querySelector(".form-edit-info-account").classList.remove("active");
        },

        showVerifyInfo() {
            this.hideCart();
            document.querySelector(".form-verify-info").classList.add("active");
        },

        hideVerifyInfo() {
            document.querySelector(".form-verify-info").classList.remove("active");
        },

        cartValidation() {
            this.checkPurchase = false;
            document.querySelector(".verify-purchase").classList.add("change");
            document.querySelector(".info-verify-purchase").classList.add("active");
            document.querySelector(".cartValidation").classList.add("active");
        },

        verifyPurchase() {
            this.checkPurchase = true;
            document.querySelector(".verify-purchase").classList.remove("change");
            document.querySelector(".info-verify-purchase") classList.remove("active");
            document.querySelector(".cartValidation").classList.remove("active");
        },

        editVerifyPurchase() {
            if (this.checkPurchase) {
                document.querySelector(".form-verify-info").classList.add("active");
            } else {
                document.querySelector(".cart").classList.add("active");
            }
        },

        rating(e) {
            let star = document.querySelectorAll(".content-rating i");
            for (let i = 0; i < star.length; i++) {
                i < e ?
                    (star[i].style.color = "#FFFF00") :
                    (star[i].style.color = "#fff");
            }
        }
    },

    computed: {},
}).mount("#app")
</script>