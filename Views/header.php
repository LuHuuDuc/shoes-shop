<header>
    <input type="hidden" value="<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : "" ?>"
        class="countCart">
    <div id="load">
        <img src="img/load.gif">
    </div>

    <div class="logo" onclick="window.location='index.php'">
        <div class="content">
            <img src="img/logo.png" alt="">
            <p>Lư Hữu Đức</p>
        </div>
    </div>

    <div class="navbar">
        <div class="item" @click="showMenu()">
            <i class="fa-solid fa-bars"></i>
            <span>Menu</span>
        </div>
        <div class="item">
            <form action="index.php?action=search" method="POST">
                <input type="text" id="inputSearch"
                    onclick="document.querySelector('#inputSearch').classList.add('active');" name="valueSearch"
                    placeholder="Enter product name">
                <button name="search">Search</button>
            </form>
        </div>
        <div class="item" @click="showCart()">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>Cart</span>
        </div>
    </div>

    <div class="menu" id="menu">
        <i class="fa-solid fa-xmark" @click="hideMenu()"></i>
        <ul>
            <li><a href="index.php"><i class="fa-solid fa-house"></i> Home</a></li>
            <li><a href="index.php?action=product"><i class="fa-solid fa-shop"></i> Product</a></li>
            <li><a href="index.php?action=about"><i class="fa-solid fa-address-card"></i> About</a></li>
            <li><a href="index.php?action=contact"><i class="fa-solid fa-phone"></i> Contact</a></li>
            <?php
                if(isset($_SESSION['ROLE']) && $_SESSION['ROLE'] != "User"):
            ?>
            <li><a href="index.php?action=statistics"><i class="fa-solid fa-filter"></i> Statistics</a></li>
            <li><a href="index.php?action=admin"><i class="fa-solid fa-user-shield"></i> Admin</a></li>
            <?php
                endif;
            echo !isset($_SESSION['ID_ACCOUNT']) ? '<li class="login" @click="showFormLogin()"><a><i class="fa-solid fa-user"></i> Login</a></li>' :
                '<li>
                    <button @click="showProfile()" class="btnLogout"><i class="fa-solid fa-user"></i> Account</button>
                </li>
                <li>
                    <form method="POST">
                        <button class="btnLogout" name="logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                    </form>
                </li>
                ';
            ?>
        </ul>
    </div>

    <div class="menu-click-right">
        <div class="menu-item" onclick="window.location.reload()">Refresh</div>
        <div class="menu-item" onclick="window.location='index.php'">Home</div>
        <div class="menu-item" onclick="window.location='index.php?action=product'">Product</div>
        <div class="menu-item" onclick="window.location='index.php?action=about'">About</div>
        <div class="menu-item" onclick="window.location='index.php?action=contact'">Contact</div>
    </div>

    <div class="button-change-background" @click="change_bg()">
        <input type="button" class="btn">
        <div class="button-slide"></div>
    </div>

    <div class="form-login">
        <i class="fa-solid fa-xmark" @click="hideFormLogin()"></i>
        <div class="grid-login">
            <div class="item">
                <img src="img/img-login.jpg">
            </div>
            <div class="item">
                <form method="POST" class="form-info-login">
                    <h1>Login</h1>
                    <div class="user">
                        <label class="label_user" for="btn_user">User</label>
                        <input name="userLogin" type="text" id="btn_user" minlength="1" maxlength="20"
                            onclick="document.querySelector('.label_user').classList.add('active')" v-model="user"
                            require oninput="document.querySelector('.label_user').classList.add('active')"
                            value="">
                    </div>
                    <div class="password">
                        <label class="label_password" for="btn_password">Password</label>
                        <input name="passwordLogin" type="password" id="btn_password" minlength="1" maxlength="20"
                            onclick="document.querySelector('.label_password').classList.add('active')"
                            v-model="password" require
                            oninput="document.querySelector('.label_password').classList.add('active')"
                            value="">
                        <i class="fa-solid fa-eye" @click="showPassword()"></i>
                    </div>
                    <a class="btnGetPassword" @click="showFormForgetPassword()">You forgot your password?</a>
                    <div class="btn-login">
                        <button name="btnLogin">Login</button>
                        <button type="button" class="btn-regis" @click="showRegis()">Register</button>
                    </div>
                </form>
                <form method="POST" class="form-register">
                    <h1>Register</h1>
                    <div class="name">
                        <label class="label_name" for="btn_name">Name</label>
                        <input name="nameRegister" type="text" id="btn_name" minlength="6" maxlength="20"
                            onclick="document.querySelector('.label_name').classList.add('active');" v-model="name"
                            require oninput="document.querySelector('.label_name').classList.add('active')">
                    </div>
                    <div class="user">
                        <label class="label-user" for="btn-user">User</label>
                        <input name="userRegister" type="text" id="btn-user" minlength="6" maxlength="20"
                            onclick="document.querySelector('.label-user').classList.add('active');" v-model="user"
                            require oninput="document.querySelector('.label-user').classList.add('active')">
                    </div>
                    <div class="password">
                        <label class="label_passwor" for="btn_passwor">Password</label>
                        <input name="passwordRegister" type="text" id="btn_passwor" minlength="6" maxlength="20"
                            onclick="document.querySelector('.label_passwor').classList.add('active');"
                            v-model="password" require
                            oninput="document.querySelector('.label_passwor').classList.add('active')">
                    </div>
                    <div class="confirm-password">
                        <label class="label_confirm_password" for="btn_confirm_password">Confirm Password</label>
                        <input name="confirmPasswordRegister" type="text" id="btn_confirm_password" minlength="6"
                            maxlength="20"
                            onclick="document.querySelector('.label_confirm_password').classList.add('active');"
                            v-model="confirmPassword" require
                            oninput="document.querySelector('.label_confirm_password').classList.add('active')">
                    </div>
                    <div class="phone">
                        <label class="label_phone" for="btn_phone">Phone</label>
                        <input name="phoneRegister" type="text" id="btn_phone"
                            onclick="document.querySelector('.label_phone').classList.add('active');" v-model="phone"
                            require oninput="document.querySelector('.label_phone').classList.add('active')">
                    </div>
                    <div class="email">
                        <label class="label_email" for="btn_email">Email</label>
                        <input name="emailRegister" type="email" id="btn_email" maxlength="50"
                            onclick="document.querySelector('.label_email').classList.add('active');" v-model="email"
                            require oninput="document.querySelector('.label_email').classList.add('active')">
                    </div>
                    <div class="address">
                        <label class="label_address" for="btn_address">Address</label>
                        <input name="addressRegister" type="text" onclick="document.querySelector('.label_address').classList.add('active');"
                            v-model="address" require
                            oninput="document.querySelector('.label_address').classList.add('active')">
                    </div>
                    <button class="btn-register" name="btnRegister">Register</button>
                    <button type="button" class="btn-back-login" @click="backLogin()">Login</button>
                </form>
                <form method="POST" class="form-forget">
                    <h1>Forget Password</h1>
                    <div class="email <?php echo isset($_SESSION['emailForget']) ? "none" : "" ?>">
                        <label class="label_email_forget" for="btn_email_forget">Email</label>
                        <input name="emailForget" type="email" id="btn_email_forget" maxlength="20"
                            onclick="document.querySelector('.label_email_forget').classList.add('active')"
                            require oninput="document.querySelector('.label_email_forget').classList.add('active')"
                            value="<?php echo isset($_SESSION['emailForget']) ? $_SESSION['emailForget'] : "" ?>">
                    </div>
                    <?php
                    if(isset($_SESSION['emailForget'])) :
                    ?>
                    <div class="email <?php echo isset($_SESSION['result']) ? "none" : "" ?>">
                        <label class="label_auth_code" for="btn_auth_code">Enter Auth Code</label>
                        <input name="codeAuth" type="text" id="btn_auth_code" maxlength="20"
                            onclick="document.querySelector('.label_auth_code').classList.add('active')"
                            require oninput="document.querySelector('.label_auth_code').classList.add('active')"
                            value="<?php echo isset($_SESSION['result']) && $_SESSION['result'] ? $_SESSION['codeAuth'] : ""  ?>">
                    </div>
                    <?php
                    endif;
                    if(isset($_SESSION['result'])):
                        echo "<script>
                        window.addEventListener('load', (event) => {
                            document.querySelector('.label_auth_code').classList.add('active')
                            document.querySelector('.label_email_forget').classList.add('active')
                        });
                        </script>";
                    ?>
                    <div class="password">
                        <label class="label_password_new" for="btn_password_new">Password</label>
                        <input name="passwordNew" type="text" id="btn_password_new" minlength="6" maxlength="20"
                            onclick="document.querySelector('.label_password_new').classList.add('active');"
                            require
                            oninput="document.querySelector('.label_password_new').classList.add('active')"
                            value="">
                    </div>
                    <div class="confirm-password">
                        <label class="label_confirm_password_new" for="btn_confirm_password_new">Confirm Password</label>
                        <input name="confirmPasswordNew" type="text" id="btn_confirm_password_new" minlength="6"
                            maxlength="20"
                            onclick="document.querySelector('.label_confirm_password_new').classList.add('active');"
                            require
                            oninput="document.querySelector('.label_confirm_password_new').classList.add('active')"
                            value="">
                    </div>
                    <?php
                    endif;
                    ?>
                    <button class="btn-verify-email" name="btnForget">Enter</button>
                    <button name="backLogin" class="btn-back-login">Back</button>
                </form>
            </div>
        </div>
    </div>

    <div class="alert-error">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-error">
            <i class="fa-solid fa-circle-exclamation"></i> Error...
        </div>
        <div class="desc-alert-error">
            Please add product to cart
        </div>
        <div class="line-alert-error">

        </div>
    </div>

    <div class="alert-error-login">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-error-login">
            <i class="fa-solid fa-circle-exclamation"></i> Error...
        </div>
        <div class="desc-alert-error-login">
            Please enter login information
        </div>
        <div class="line-alert-error-login">

        </div>
    </div>

    <div class="alert-success-login">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-success-login">
            <i class="fa-solid fa-circle-check"></i> Success...
        </div>
        <div class="desc-alert-success-login">
            Congratulations, you have successfully logged in
        </div>
        <div class="line-alert-success-login">

        </div>
    </div>

    <div class="alert-fail-login">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-fail-login">
            <i class="fa-solid fa-circle-exclamation"></i> Fail...
        </div>
        <div class="desc-alert-fail-login">
            Incorrect account and password information
        </div>
        <div class="line-alert-fail-login">

        </div>
    </div>

    <div class="alert-logout">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-fail-login">
            <i class="fa-solid fa-circle-check"></i> Success...
        </div>
        <div class="desc-alert-logout">
            Congratulations, you have successfully logged out
        </div>
        <div class="line-alert-logout">

        </div>
    </div>

    <div class="alert-register-fail">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-exclamation"></i> Fail...
        </div>
        <div class="desc-alert-register">
            Registration information already exists
        </div>
        <div class="line-alert-register"></div>
    </div>

    <div class="alert-register-fail1">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-exclamation"></i> Fail...
        </div>
        <div class="desc-alert-register">
            User already exists
        </div>
        <div class="line-alert-register1"></div>
    </div>

    <div class="alert-register-fail2">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-exclamation"></i> Fail...
        </div>
        <div class="desc-alert-register">
            Phone number already exists
        </div>
        <div class="line-alert-register2"></div>
    </div>

    <div class="alert-register-fail3">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-exclamation"></i> Fail...
        </div>
        <div class="desc-alert-register">
            Email already exists
        </div>
        <div class="line-alert-register3"></div>
    </div>

    <div class="alert-register-fail4">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-exclamation"></i> Fail...
        </div>
        <div class="desc-alert-register">
            User and email already exist
        </div>
        <div class="line-alert-register4"></div>
    </div>

    <div class="alert-register-fail5">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-exclamation"></i> Fail...
        </div>
        <div class="desc-alert-register">
            User and number phone already exist
        </div>
        <div class="line-alert-register5"></div>
    </div>

    <div class="alert-register-fail6">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-exclamation"></i> Fail...
        </div>
        <div class="desc-alert-register">
            Number phone and email already exist
        </div>
        <div class="line-alert-register6"></div>
    </div>

    <div class="alert-register-fail0">
        <i class="fa-solid fa-xmark" ></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-exclamation"></i> Fail...
        </div>
        <div class="desc-alert-register">
            Please enter register information
        </div>
        <div class="line-alert-register0"></div>
    </div>

    <div class="alert-register-success">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-check"></i> Success...
        </div>
        <div class="desc-alert-register">
            Congratulations, you have successfully registered and logged in
        </div>
        <div class="line-alert-register-success"></div>
    </div>

    <div class="alert-update-success">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-check"></i> Success...
        </div>
        <div class="desc-alert-register">
            Successfully updated
        </div>
        <div class="line-alert-update-success"></div>
    </div>

    <div class="alert-verify-info-fail">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-exclamation"></i> Fail...
        </div>
        <div class="desc-alert-register">
            Please enter full information
        </div>
        <div class="line-verify-info-fail"></div>
    </div>

    <div class="alert-verify-info-sc">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-check"></i> Success...
        </div>
        <div class="desc-alert-register">
            Congratulations on your successful order
        </div>
        <div class="line-verify-info-sc"></div>
    </div>

    <div class="alert-change-password">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-check"></i> Success...
        </div>
        <div class="desc-alert-register">
            Congratulations on your successful order
        </div>
        <div class="line-change-password"></div>
    </div>

    <div class="alert-error-search">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-exclamation"></i> Sorry...
        </div>
        <div class="desc-alert-register">
            Can't find it
        </div>
        <div class="line-error-search"></div>
    </div>

    <div class="alert-error-email-forget">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-exclamation"></i> Error...
        </div>
        <div class="desc-alert-register">
            Please enter your email
        </div>
        <div class="line-error-email-forget"></div>
    </div>

    <div class="alert-error-email-forget1">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-exclamation"></i> Error...
        </div>
        <div class="desc-alert-register">
        Email does not match any account
        </div>
        <div class="line-error-email-forget1"></div>
    </div>

    <div class="alert-error-codeAuth-forget">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-exclamation"></i> Error...
        </div>
        <div class="desc-alert-register">
        Please enter the confirmation code
        </div>
        <div class="line-error-codeAuth-forget"></div>
    </div>

    <div class="alert-error-codeAuth-forget1">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-exclamation"></i> Error...
        </div>
        <div class="desc-alert-register">
        Verification code is incorrect
        </div>
        <div class="line-error-codeAuth-forget1"></div>
    </div>

    <div class="alert-error-passwordNew">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-exclamation"></i> Error...
        </div>
        <div class="desc-alert-register">
            Please enter full information
        </div>
        <div class="line-error-passwordNew"></div>
    </div>

    <div class="alert-error-passwordNew1">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-exclamation"></i> Error...
        </div>
        <div class="desc-alert-register">
            Confirmation password does not match
        </div>
        <div class="line-error-passwordNew1"></div>
    </div>

    <div class="alert-error-register-validation">
        <i class="fa-solid fa-xmark"></i>
        <div class="header-alert-register">
            <i class="fa-solid fa-circle-exclamation"></i> Error...
        </div>
        <div class="desc-alert-register">
            Phone number is not in the correct format
        </div>
        <div class="line-error-register-validation"></div>
    </div>

    <div class="profile">
        <div class="item">
            <button @click="showProfileInfo()">Profile</button>
            <button @click="showHistory()">History</button>
        </div>
        <div class="item">
            <i class="fa-solid fa-xmark" @click="hideProfile()"></i>
            <div class="profile-info">
                <div class="avatar">
                    <img src="img/img-comment.png">
                    <div>Role: <?php echo isset($_SESSION['ROLE']) ? $_SESSION['ROLE'] : "" ?></div>
                </div>
                <div class="info-account">
                    <table>
                        <tr>
                            <td>Name:</td>
                            <td><?php echo isset($_SESSION['NAME']) ? $_SESSION['NAME'] : "" ?></td>
                        </tr>
                        <tr>
                            <td>Number Phone:</td>
                            <td><?php echo isset($_SESSION['PHONE']) ? $_SESSION['PHONE'] : "" ?></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><?php if(isset($_SESSION['EMAIL'])) echo $_SESSION['EMAIL'] ?></td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td><?php echo isset($_SESSION['ADDRESS']) ? $_SESSION['ADDRESS'] : "" ?></td>
                        </tr>
                    </table>
                    <button type="submit" @click="showEditProfile()" class="btnEditProfile">Edit</button>
                </div>
            </div>
            <div class="history-info">
                <table>
                    <tr>
                        <th>Stt</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                    <?php
                        if(isset($_SESSION['ID_ACCOUNT'])):
                            $limit = 8;
                            $i = 0;
                            $countProduct = $cart -> countHistory($_SESSION['ID_ACCOUNT']);
                            while($set = $countProduct -> fetch()){
                                $totalProduct =  $set['TOTAL'];
                            }
                            if($totalProduct > 0):
                            $numberPage =  $totalProduct/$limit;
                            $d = 0;
                            while($d < $numberPage){
                                if(isset($_POST['pageHistory'.$d.''])){
                                    $index = $limit*$d;
                                    echo
                                    "<script>
                                    window.addEventListener('load', (event) => {
                                        document.querySelector('.profile').classList.add('active');
                                        document.querySelector('.profile-info').classList.add('active');
                                        document.querySelector('.history-info').classList.add('active');
                                    });
                                    </script>";
                                    break;
                                }
                                else{
                                    $index = 0;
                                }
                                $d++;
                            }
                            $result = $cart -> getHistory($_SESSION['ID_ACCOUNT'], $limit, $index);
                            while($set = $result -> fetch()):
                                $i++;
                    ?>
                    <tr>
                        <td><?php echo $i+$index?></td>
                        <td><?php echo $set['NAME_PURCHASE'] ?></td>
                        <td><?php echo "0".$set['PHONE_PURCHASE'] ?></td>
                        <td><?php echo $set['ADDRESS_PURCHASE'] ?></td>
                        <td><?php echo number_format($set['TOTAL']) ?>đ</td>
                        <td><?php echo $set['DATE'] ?></td>
                    </tr>
                    <?php
                            endwhile;
                        endif;
                            echo $i == 0 ? 
                            '<tr>
                                <td style="height: 500px; font-size: 30px" colspan="6">You are not buying</td>
                            </tr>' : "";
                        endif;
                    ?>
                </table>
                <div class="navigation-history">
                <form method="post">
                <?php
                if($totalProduct > $limit):
                    $c = 0;
                    while($c < $numberPage):
                ?>
                    <button name='pageHistory<?php echo $c ?>'><?php ++$c; echo $c ?></button>
                <?php
                    endwhile;
                endif;
                ?>
                </form>
                </div>
            </div>
        </div>
    </div>

    <div class="form-edit-info-account">
        <i class="fa-solid fa-xmark" @click="hideEditProfile()"></i>
        <form method="POST">
            <h1>Edit Account</h1>
            <table>
                <tr>
                    <td>Role:</td>
                    <td><?php echo isset($_SESSION['ROLE']) ? $_SESSION['ROLE'] : ""?></td>
                </tr>
                <tr>
                    <td>Username:</td>
                    <td><?php echo isset($_SESSION['USERNAME']) ? $_SESSION['USERNAME'] : ""?></td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="nameEdit"
                            value="<?php echo isset($_SESSION['NAME']) ? $_SESSION['NAME'] : "" ?>"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="text" name="passwordEdit" minlength="6" maxlength="20"
                            value="<?php echo isset($_SESSION['PASSWORD']) ? $_SESSION['PASSWORD'] : "" ?>"></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="number" name="phoneEdit"
                            value="<?php echo isset($_SESSION['PHONE']) ? $_SESSION['PHONE'] : "" ?>"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="email" name="emailEdit"
                            value="<?php echo isset($_SESSION['EMAIL']) ? $_SESSION['EMAIL'] : "" ?>"></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td>
                        <input type="text" name="addressEdit"
                            value="<?php echo isset($_SESSION['ADDRESS']) ? $_SESSION['ADDRESS'] : "" ?>">
                    </td>
                </tr>
            </table>
            <button type="submit" name="updateProfile" class="updateProfile">Update</button>
        </form>
    </div>

    <div class="cart">
        <form method="POST">
            <?php
                $count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                ?>
            <i class="fa-solid fa-xmark" @click="hideCart()"></i>
            <div class="grid-cart">
                <div class="item">
                    <table>
                        <tr>
                            <th>Stt</th>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                        <?php
                                $i = 0;
                                $numberPage =  $count/5;
                                $limit = 5;
                                $d = 0;
                                while($d < $numberPage){
                                    if(isset($_POST["pageCart".$d.""])){
                                        $index = $d*$limit;
                                        $end = $d*$limit + $limit;
                                        echo "<script>
                                        window.addEventListener('load', (event) => {
                                            document.querySelector('.cart').classList.add('active')
                                        });
                                        </script>";
                                        break;
                                    }
                                    else{
                                        $index = 0;
                                        $end = 5;
                                    }
                                    $d++;
                                }
                                if (isset($_SESSION['cart'])):
                                    for($o = $index; $o < $end; $o++):
                                        if($o >= $count) break;
                                        $i++;
                                ?>
                            <input name="start" type="hidden" value="<?php echo $index ?>">
                            <input name="end" type="hidden" value="<?php echo $end?>">
                        <tr>
                            <td><?php echo $i+$index ?></td>
                            <td><?php echo $_SESSION['cart'][$o]['NAME_PRODUCT'] ?><br><span><?php echo number_format($_SESSION['cart'][$o]['PRICE_PRODUCT']) ?>đ
                                    - <?php echo $_SESSION['cart'][$o]['COLOR'] ?> -
                                    <?php echo $_SESSION['cart'][$o]['SIZE'] ?></span></td>
                            <td><a href="index.php?action=detail&id=<?php echo $_SESSION['cart'][$o]['ID_PRODUCT'] ?>"><img
                                        src="img/<?php echo $_SESSION['cart'][$o]['IMG'] ?>"></a></td>
                            <td><input type="number" value="<?php echo $_SESSION['cart'][$o]['QUANTITY'] ?>"
                                    max="<?php echo $_SESSION['cart'][$o]['INVENTORY'] ?>" name="quantityNew[]"
                                    class="cart-input-quantity"></td>
                            <td><?php echo number_format($_SESSION['cart'][$o]['TOTAL']) ?>đ</td>
                            <td>
                                <a
                                    href="index.php?&Key=<?php echo $o ?>&ID=<?php echo $_SESSION['cart'][$o]['ID_PRODUCT'] ?>&Color=<?php echo $_SESSION['cart'][$o]['COLOR'] ?>&Size=<?php echo $_SESSION['cart'][$o]['SIZE'] ?>"><button
                                        type="button">Delete</button></a>
                            </td>
                        </tr>
                        <?php
                                    endfor;
                                endif;
                                ?>
                    </table>
                    <div class="navigation-cart">
                        <?php
                                if($count > $limit):
                                    $c = 0;
                                    while($c < $numberPage):
                        ?>
                        <button name='pageCart<?php echo $c ?>'><?php ++$c; echo $c ?></button>
                        <?php
                                    endwhile;
                                endif;                     
                        ?>
                    </div>
                </div>
                <div class="item">
                    <?php
                        $temporary = $cart -> getTotalPrice();
                        $totalQuantity = $cart -> countCart();
                        isset($_POST['discountCode']) ? $_SESSION['discountCode'] = $_POST['discountCode'] : "";
                        isset($_SESSION['discountCode']) ? $totalCart = $cart -> getTotalCart($_SESSION['discountCode']) : $totalCart = $cart -> getTotalCart("");

                        ?>
                    <table>
                        <tr>
                            <th><button class="updateAllCart" name="updateAllCart">Update</button></th>
                            <th><button class="deleteAllCart" name="deleteAllCart">Delete All</button></th>
                        </tr>
                        <tr>
                            <td>Temporary:</td>
                            <td><?php echo number_format($temporary) ?>đ</td>
                        </tr>
                        <tr>
                            <td>Delivery To:</td>
                            <td>
                                <select name="addressCart" class="selectAddress">
                                    <option <?php echo $_SESSION['ADDRESS']=="TP.Hồ Chí Minh" ? "selected" : "";?>
                                        value="TP.Hồ Chí Minh">TP.Hồ Chí Minh</option>
                                    <option <?php echo $_SESSION['ADDRESS']=="Tiền Giang" ? "selected" : "";?>
                                        value="Tiền Giang">Tiền Giang</option>
                                    <option <?php echo $_SESSION['ADDRESS']=="Khác" ? "selected" : "";?> value="Khác">
                                        Khác</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Transport Fee:</td>
                            <td>+<?php echo $_SESSION['ADDRESS']=="TP.Hồ Chí Minh" ? '15,000' : ($_SESSION['ADDRESS']=="Tiền Giang" ? '25,000' : '35,000')  ?>đ
                            </td>
                        </tr>
                        <tr>
                            <td>Vat:</td>
                            <td>+10%</td>
                        </tr>
                        <tr>
                            <td>Discount:</td>
                            <td><?php echo isset($_SESSION['discountCode']) ? "-10%" : "0"  ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input name="discountCode"
                                    value="<?php echo isset($_SESSION['discountCode']) ? $_SESSION['discountCode'] : "" ?>"
                                    type="text" class="discountCart" placeholder="Discount Code"></td>
                        </tr>
                        <tr>
                            <td>Number Product:</td>
                            <td><?php echo $totalQuantity ?></td>
                        </tr>
                        <tr>
                            <td>Total Money:</td>
                            <td><?php echo number_format($totalCart) ?>đ</td>
                        </tr>
                        <tr>
                            <td colspan="2"><button class="btnBuyNow" type="button" @click="showVerifyInfo()">Buy
                                    Now</button></td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div>

    <div class="form-verify-info">
        <form method="post">
            <i class="fa-solid fa-xmark" @click="hideVerifyInfo()"></i>
            <h1>Order Information</h1>
            <table>
                <tr>
                    <td>Recipient's Name:</td>
                    <td><input type="text" name="namePurchase"
                            value="<?php if(isset($_SESSION['NAME_PURCHASE'])) echo $_SESSION['NAME_PURCHASE']; elseif(isset($_SESSION['NAME'])) echo $_SESSION['NAME'];?>">
                    </td>
                </tr>
                <tr>
                    <td>Recipient's Phone Number:</td>
                    <td><input type="number" name="phonePurchase"
                            value="<?php if(isset($_SESSION['PHONE_PURCHASE'])) echo $_SESSION['PHONE_PURCHASE']; elseif(isset($_SESSION['PHONE'])) echo $_SESSION['PHONE'];?>">
                    </td>
                </tr>
                <tr>
                    <td>Delivery Address:</td>
                    <td><input type="text" name="addressPurchase"
                            value="<?php if(isset($_SESSION['ADDRESS_PURCHASE'])) echo $_SESSION['ADDRESS_PURCHASE']; elseif(isset($_SESSION['ADDRESS'])) echo $_SESSION['ADDRESS'];?>">
                    </td>
                </tr>
                <?php
                    if(isset($_SESSION['USERNAME'])):
                ?>
                <tr>
                    <td>Order Account:</td>
                    <td><?php echo $_SESSION['USERNAME'] ?></td>
                </tr>
                <tr>
                    <td>Order Phone Number:</td>
                    <td><?php echo $_SESSION['PHONE'] ?></td>
                </tr>
                <tr>
                    <td>Order Email:</td>
                    <td><?php echo $_SESSION['EMAIL'] ?></td>
                </tr>
                <?php
                    endif;
                ?>
            </table>
            <button name="btnOder">Oder Now</button>
        </form>
    </div>

    <div class="verify-purchase">
        <form method="post">
            <button style="background-color: transparent;" name="CancelTransaction"><i
                    class="fa-solid fa-xmark"></i></button>
        </form>
        <form method="POST">
            <div class="header-verify-purchase">
                <div @click="verifyPurchase()">Verify Purchase Information</div>
                <div @click="cartValidation()">Cart Validation</div>
            </div>
            <div class="content-verify-purchase">
                <div class="info-verify-purchase">
                    <table>
                        <tr>
                            <td>Recipient's Name:</td>
                            <td><?php echo isset($_SESSION['NAME_PURCHASE']) ? $_SESSION['NAME_PURCHASE'] : ""?></td>
                        </tr>
                        <tr>
                            <td>Recipient's Phone Number:</td>
                            <td><?php echo isset($_SESSION['PHONE_PURCHASE']) ? $_SESSION['PHONE_PURCHASE'] : ""?></td>
                        </tr>
                        <tr>
                            <td>Delivery Address:</td>
                            <td><?php echo isset($_SESSION['ADDRESS_PURCHASE']) ? $_SESSION['ADDRESS_PURCHASE'] : ""?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="cartValidation">
                    <table>
                        <tr>
                            <th>Stt</th>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                        <?php
                                $i = 0;
                                $limit = 4;
                                $d = 0;
                                while($d < $numberPage){
                                    if(isset($_POST["pageVerifyPurchase".$d.""])){
                                        $index = $d*$limit;
                                        $end = $d*$limit + $limit;
                                        echo "<script>
                                        window.addEventListener('load', (event) => {
                                            document.querySelector('.verify-purchase').classList.add('active')
                                            document.querySelector('.verify-purchase').classList.add('change')
                                            document.querySelector('.info-verify-purchase').classList.add('active')
                                            document.querySelector('.cartValidation').classList.add('active')
                                        });
                                        </script>";
                                        break;
                                    }
                                    else{
                                        $index = 0;
                                        $end = $limit;
                                    }
                                    $d++;
                                }
                                if (isset($_SESSION['cart'])):
                                    for($o = $index; $o < $end; $o++):
                                        if($o >= $count) break;
                                        $i++;
                        ?>
                        <tr>
                            <td><?php echo $i+$index ?></td>
                            <td><?php echo $_SESSION['cart'][$o]['NAME_PRODUCT'] ?><br><span><?php echo number_format($_SESSION['cart'][$o]['PRICE_PRODUCT']) ?>đ
                                    - <?php echo $_SESSION['cart'][$o]['COLOR'] ?> -
                                    <?php echo $_SESSION['cart'][$o]['SIZE'] ?></span></td>
                            <td><a href="index.php?action=detail&id=<?php echo $_SESSION['cart'][$o]['ID_PRODUCT'] ?>"><img
                                        src="img/<?php echo $_SESSION['cart'][$o]['IMG'] ?>"></a></td>
                            <td><?php echo $_SESSION['cart'][$o]['QUANTITY'] ?></td>
                            <td><?php echo number_format($_SESSION['cart'][$o]['TOTAL']) ?>đ</td>
                            <?php
                                endfor;
                            endif;
                            ?>
                    </table>
                    <div class="navigation-verifyPurchase">
                        <?php
                                if($count > $limit):
                                    $c = 0;
                                    while($c < $numberPage):
                        ?>
                        <button name='pageVerifyPurchase<?php echo $c ?>'><?php ++$c; echo $c ?></button>
                        <?php
                                    endwhile;
                                endif;                     
                        ?>
                    </div>
                </div>
            </div>
            <div class="footer-verify-purchase">
                <button name="VerifyPurchase">Order Confirmation</button>
                <button type="button" @click="editVerifyPurchase()">Edit</button>
            </div>
        </form>
    </div>

    <?php
    if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0):
    ?>
    <div class="form-rating">
        <form method="POST">
            <div class="header-rating">
                <img src="img/<?php echo $_SESSION['cart'][0]['IMG'] ?>">
                <p><?php echo $_SESSION['cart'][0]['NAME_PRODUCT'] ?></p>
            </div>
            <div class="content-rating">
                <p>Your review</p>
                <input class="none" type="radio" name="rating" id="rating1" value="1">
                <input class="none" type="radio" name="rating" id="rating2" value="2">
                <input class="none" type="radio" name="rating" id="rating3" value="3">
                <input class="none" type="radio" name="rating" id="rating4" value="4">
                <input class="none" type="radio" name="rating" id="rating5" value="5">
                <label for="rating1">
                    <i @click="rating(1)" class="fa-solid fa-star"></i>
                </label>
                <label for="rating2">
                    <i @click="rating(2)" class="fa-solid fa-star"></i>
                </label>
                <label for="rating3">
                    <i @click="rating(3)" class="fa-solid fa-star"></i>
                </label>
                <label for="rating4">
                    <i @click="rating(4)" class="fa-solid fa-star"></i>
                </label>
                <label for="rating5">
                    <i @click="rating(5)" class="fa-solid fa-star"></i>
                </label>
                <button name="ratingProduct">Send</button>
            </div>
        </form>
    </div>
    <?php
    endif;
    ?>

    <div class="menu-contact">
        <div class="facebook">
            <a href="https://www.facebook.com/"><img src="img/facebook.png"></a>
        </div>
        <div class="zalo">
            <a href="https://zalo.me/pc"><img src="img/zalo.svg"></a>
        </div>
        <div class="gmail">
            <a href="https://www.google.com/intl/vi/gmail/about/"><img src="img/gmail.png"></a>
        </div>
        <div class="hidden">
            <img src="img/phone.png">
        </div>
    </div>
</header>