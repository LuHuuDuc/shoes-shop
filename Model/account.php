<?php
    class account{
        function __construct(){}

        function getAccount(){
            $db = new connect();
            $query = "SELECT * FROM account";
            $result = $db -> getList($query);
            return $result;
        }

        function getAccountID($id){
            $db = new connect();
            $query = "SELECT * FROM account WHERE ID_ACCOUNT = $id";
            $result = $db -> getList($query);
            $result = $result -> fetch();
            return $result;
        }

        function login($userLogin, $passwordLogin){
            $db = new connect();
            $query = "SELECT * FROM account WHERE USER = '$userLogin' AND PASSWORD = '$passwordLogin'";
            $result = $db -> getList($query);
            $result = $result -> fetch();
            return $result;
        }

        function checkUser($userRegister){
            $db = new connect();
            $checkUser = "SELECT `USER` FROM account WHERE USER = '$userRegister'";
            $user = $db -> getList($checkUser);
            $user = $user -> fetch();
            return $user;
        }

        function checkPhone($phoneRegister){
            $db = new connect();
            $checkPhone = "SELECT `PHONE` FROM account WHERE PHONE = '$phoneRegister'";
            $phone = $db -> getList($checkPhone);
            $phone = $phone -> fetch();
            return $phone;
        }

        function checkEmail($emailRegister){
            $db = new connect();
            $checkEmail = "SELECT `USER` FROM account WHERE EMAIL = '$emailRegister'";
            $email = $db -> getList($checkEmail);
            $email = $email -> fetch();
            return $email;
        }

        function changPassword($email, $newPassword){
            $db = new connect();
            $query = "UPDATE account SET PASSWORD = '$newPassword' WHERE EMAIL = '$email'";
            $db -> getList($query);
        }

        function register($name ,$userRegister, $protectedPassword, $phoneRegister, $emailRegister, $addressRegister){
            $db = new connect();
            $register = "INSERT INTO account(NAME, USER, PASSWORD, PHONE, EMAIL, ADDRESS, ROLE) 
            VALUES('$name' ,'$userRegister', '$protectedPassword', '$phoneRegister', '$emailRegister', '$addressRegister', 'User')";
            $db -> getList($register);
            $result = $this -> login($userRegister, $protectedPassword);
            return $result;
        }

        function registerManager($name ,$userRegister, $protectedPassword, $phoneRegister, $emailRegister, $addressRegister, $role){
            $db = new connect();
            $register = "INSERT INTO account(NAME, USER, PASSWORD, PHONE, EMAIL, ADDRESS, ROLE) 
            VALUES('$name' ,'$userRegister', '$protectedPassword', '$phoneRegister', '$emailRegister', '$addressRegister', '$role')";
            $db -> getList($register);
            $result = $this -> login($userRegister, $protectedPassword);
            return $result;
        }

        function editAccountManagerAll($id ,$name ,$user, $pass, $phone, $email, $address, $role){
            $db = new connect();
            $query = "UPDATE account SET `NAME` = '$name', `USER` = '$user', `PASSWORD` = '$pass', `PHONE` = '$phone', `EMAIL`='$email', `ADDRESS`='$address', `ROLE` = '$role' WHERE `ID_ACCOUNT` = '$id'";
            $db -> getList($query);
        }

        function editAccountManager($id ,$name ,$user, $phone, $email, $address, $role){
            $db = new connect();
            $query = "UPDATE account SET `NAME` = '$name', `USER` = '$user', `PHONE` = '$phone', `EMAIL`='$email', `ADDRESS`='$address', `ROLE` = '$role' WHERE `ID_ACCOUNT` = '$id'";
            $db -> getList($query);
        }

        function editProfile($nameEdit ,$idAccount ,$passNew, $phoneNew, $emailNew, $addressNew){
            $db = new connect();
            $query = "UPDATE account SET `NAME` = '$nameEdit' ,`PASSWORD` = '$passNew', `PHONE` = '$phoneNew', `EMAIL` = '$emailNew', `ADDRESS` = '$addressNew' WHERE `ID_ACCOUNT` = '$idAccount'";
            $db -> getList($query);
        }
    }
?>