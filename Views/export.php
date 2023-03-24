<?php
if($_SESSION['ROLE'] == "Manager" || $_SESSION['ROLE'] == "Admin 6"){
    $data = [
        ['ID ACCOUNT', 'NAME', 'USER', 'PASSWORD', 'PHONE', 'EMAIL', 'ADDRESS', 'ROLE']
    ];
    $result = $account -> getAccount();
    while($set = $result -> fetch()){
        array_push($data, [$set['ID_ACCOUNT'], $set['NAME'], $set['USER'], $set['PASSWORD'], $set['PHONE'], $set['EMAIL'], $set['ADDRESS'], $set['ROLE']]);
    }
    $xlsx = Shuchkin\SimpleXLSXGen::fromArray( $data );
    $xlsx->saveAs('export/DanhSachAccount.xlsx');

    echo "<script> alert('Export Thành công') </script>";
    echo "<script>window.location='index.php?action=admin'</script>";
}
else{
    echo "<script> alert('Bạn không có quyền sử dụng chức năng này') </script>";
    echo "<script>window.location='index.php?action=admin'</script>";
}
?>