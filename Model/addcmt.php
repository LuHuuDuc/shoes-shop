<?php
        if (isset($_POST['buttonCMT'])) {
            //id tài khoản bình luận
            $idAcount = isset($_SESSION['ID_ACCOUNT']) ? $_SESSION['ID_ACCOUNT'] : "";

            //id sản phẩm được comment
            $idProduct = $_GET['id'];

            //email nào được dùng để comment
            $email = isset($_SESSION['EMAIL']) ? $_SESSION['EMAIL'] : $_POST['emailCMT'];

            //chuyển email về định dạng chữ thường
            $email = strtolower($email);

            //lấy nội dung bình luận
            $content = $_POST['contentCMT'];

            //ràng buộc điều kiện
            if($content == "" || $content == null || $email == null || $email == ""){
                echo "<script>alert('Vui lòng nhập đầy đủ thông tin')</script>";
            }
            else{
                $select = "INSERT INTO `comment` (`ID_ACCOUNT`, `ID_PRODUCT`, `EMAIL`, `CONTENT`) VALUES ('$idAcount', '$idProduct', '$email', '$content');";
                $cmt->getQuery($select);
            }
        }
        if (isset($_GET['idcmt'])) {

            //lấy id sản phẩm để show đúng bình luận được bình luận trên sản phẩm
            $id = $_GET['idcmt'];

            //câu truy vấn dùng để lấy danh sách bình luận
            $select = "DELETE FROM comment WHERE ID_COMMENT = $id";
            $select1 = "DELETE FROM comment WHERE REPLY = $id";
            $cmt->getQuery($select);
            $cmt->getQuery($select1);
        }
        if (isset($_POST['btnUpdate'])) {

            //id comment nào được cập nhật
            $id_cmt = $_POST['idCMT'];

            //nội dung cần cập nhật
            $contentUD = $_POST['contentUD'];

            //ràng buộc điều kiện
            // nếu nội dung rỗng, xóa bình luận
            if($contentUD == ""){
                $select = "DELETE FROM comment WHERE ID_COMMENT = $id_cmt";
            }
            else{
                $select = "UPDATE comment SET CONTENT = '$contentUD' WHERE ID_COMMENT = $id_cmt;";
            }
            $cmt->getQuery($select);
        }

        if(isset($_POST['btnReply'])){
            //trả lời cho comment nào
            $id_cmt = $_POST['idCMT'];

            //nội dung như thế nào
            $content = $_POST['contentUD'];

            //id tài khoản trả lời bình luận
            $idAccount = $_SESSION["ID_ACCOUNT"];

            //email trả lời bình luận
            $email = $_SESSION['EMAIL'];

            if($content == null || $content == ""){
                echo "<script>alert('Vui lòng nhập đầy đủ thông tin')</script>";
            }
            else{
                $select = "INSERT INTO `comment` (`ID_ACCOUNT`, `ID_PRODUCT`, `EMAIL`, `CONTENT`, `REPLY`) VALUES ('$idAccount', 'NULL', '$email', '$content', '$id_cmt')";
                $cmt->getQuery($select);
            }
        }
?>