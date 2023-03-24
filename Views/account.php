<?php
    if(isset($_POST["importExcel"])){
        $fileName = $_FILES["excel"]["name"];
		$fileExtension = explode('.', $fileName);
        $fileExtension = strtolower(end($fileExtension));
		$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

		$targetDirectory = "import/" . $newFileName;
		move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

		error_reporting(0);
		ini_set('display_errors', 0);

		require 'excelReader/excel_reader2.php';
		require 'excelReader/SpreadsheetReader.php';

		$reader = new SpreadsheetReader($targetDirectory);

        foreach($reader as $key => $row){
            $name = $row[0];
            $user = $row[1];
            $pass = $row[2];
            $phone = $row[3];
            $email = $row[4];
            $address = $row[5];
            $role = $row[6];

            $protectedPass = md5($pass);
            $account -> registerManager($name, $user, $protectedPass, $phone, $email, $address, $role);
        }
        echo "<script>window.location='index.php?action=admin'</script>";
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result =  $account -> getAccountID($id);
        $name = $result['NAME'];
        $user = $result['USER'];
        $pass = $result['PASSWORD'];
        $phone = $result['PHONE'];
        $email = $result['EMAIL'];
        $address = $result['ADDRESS'];
        $role = $result['ROLE'];
    }

    if(isset($_POST['importExcel'])){
        $file_name = $_FILES['excel']['name'];
        $checkFile = checkExcel($_FILES['excel']);

        if(!$checkFile){
            echo "<script>alert('Không đúng định dạng excel')</script>";
        }
        else{
            
        }
    }
?>
<div class="container-manager-account">
    <h1 class="title-manager-account">Add Account</h1>
    <form method="post">
        <label for="user">User Name</label>
        <input required minlength="6" maxlength="20" id="user" name='nameUser' type="text" minlength="6" maxlength="20"
            value="<?php echo isset($name) ? $name : "" ?>">

        <label for="Account">Account</label>
        <input required minlength="6" maxlength="20" id="Account" name='accountUser' type="text" minlength="6"
            maxlength="20" value="<?php echo isset($user) ? $user : "" ?>">

        <label for="Password">Password</label>
        <input <?php echo isset($id) ? '' : 'required' ?> minlength="6" maxlength="20" id="Password" name='passwordUser'
            type="text" minlength="6" maxlength="20">

        <label for="Phone">Phone</label>
        <input required minlength="9" maxlength="12" id="Phone" name="phoneUser" type="text" minlength="9"
            maxlength="11" value="<?php echo isset($phone) ? '0'.$phone : "" ?>">

        <label for="Email">Email</label>
        <input required id="Email" name="emailUser" type="email" minlength="6" maxlength="30"
            value="<?php echo isset($email) ? $email : "" ?>">

        <label for="Address">Address</label>
        <input required minlength="6" id="Address" name="addressUser" type="text" minlength="6" maxlength="50"
            value="<?php echo isset($address) ? $address : "" ?>">

        <label for="">Role</label>
        <select name="role">
            <option <?php isset($role) && $role=="Manager" ? "selected" : "" ?> value="Manager">Manager</option>
            <option <?php isset($role) && $role=="Admin 1" ? "selected" : "" ?> value="Admin 1">Admin 1(Chỉ được xem bảng account)</option>
            <option <?php isset($role) && $role=="Admin 2" ? "selected" : "" ?> value="Admin 2">Admin 2(Chỉ được xem các bảng)</option>
            <option <?php isset($role) && $role=="Admin 3" ? "selected" : "" ?> value="Admin 3">Admin 3(Chỉ xóa được bảng product)</option>
            <option <?php isset($role) && $role=="Admin 4" ? "selected" : "" ?> value="Admin 4">Admin 4(Chỉ được cập nhật bảng product)</option>
            <option <?php isset($role) && $role=="Admin 5" ? "selected" : "" ?> value="Admin 5">Admin 5(Chỉ được xem lịch sử mua hàng và giỏ hàng)</option>
            <option <?php isset($role) && $role=="Admin 6" ? "selected" : "" ?> value="Admin 6">Admin 6(Chỉ được export)</option>
            <option <?php isset($role) && $role=="Admin 7" ? "selected" : "" ?> value="Admin 7">Admin 7(Chỉ được xóa bảng account)</option>
            <option <?php isset($role) && $role=="User" ? "selected" : "" ?> value="User">User</option>
        </select>

        <?php
            if(isset($_GET['id'])){
                echo "<button name='managerUpdateAccount'>Update Now</button> <br>";
            }
            else{
                echo "<button name='managerAddAccount'>Add Now</button> <br>";
            }
        ?>
    </form>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="excel">
        <button name="importExcel">Import Now</button> <br>
    </form>
</div>