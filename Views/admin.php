<?php
    if(!isset($_SESSION['ROLE']) || isset($_SESSION['ROLE']) && $_SESSION['ROLE'] == "User"){
        echo "<h1 class='errorAdmin'>You can not access this page</h1>";
    }
    if(isset($_SESSION['ROLE']) && $_SESSION['ROLE'] != "User"):
?>
<h1 class="title-manager">Manager</h1>
<p class="content-manager">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio inventore dolorem modi
    deleniti ut facere temporibus
    non adipisci dignissimos consequuntur!</p>
<div class="container-manager">
    <div class="left">

        <?php if($_SESSION['ROLE'] != "Admin 5"): ?>
        <div class="account-manager">
            <h1 id="account-manager">Account</h1>
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>USER</th>
                        <th>PHONE</th>
                        <th>EMAIL</th>
                        <th>ADDRESS</th>
                        <th>ROLE</th>
                        <th>
                            <?php if($_SESSION['ROLE'] != "Admin 1" && $_SESSION['ROLE'] != "Admin 2" && $_SESSION['ROLE'] != "Admin 3" && $_SESSION['ROLE'] != "Admin 4" && $_SESSION['ROLE'] != "Admin 7"): ?>
                            <a href='index.php?action=account'>Add Account</a>
                            <?php endif; ?>
                            <?php if($_SESSION['ROLE'] == "Manager" || $_SESSION['ROLE'] == "Admin 6"): ?>
                            <a href="index.php?action=export">Export</a>
                            <?php endif ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $result = $account -> getAccount();
                        $i = 0;
                        while($set = $result -> fetch()):
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $set['ID_ACCOUNT'] ?></td>
                        <td><?php echo $set['NAME'] ?></td>
                        <td><?php echo $set['USER'] ?></td>
                        <td><?php echo $set['PHONE'] ?></td>
                        <td><?php echo $set['EMAIL'] ?></td>
                        <td><?php echo $set['ADDRESS'] ?></td>
                        <td><?php echo $set['ROLE'] ?></td>
                        <td>
                            <?php if($_SESSION['ROLE'] != "Admin 1" && $_SESSION['ROLE'] != "Admin 2" && $_SESSION['ROLE'] != "Admin 2" && $_SESSION['ROLE'] != "Admin 3" && $_SESSION['ROLE'] != "Admin 4"): ?>
                            <?php if($_SESSION['ROLE'] != "Admin 7"): ?>
                            <a href="index.php?action=account&id=<?php echo $set['ID_ACCOUNT'] ?>">Update</a>
                            <?php endif ?>
                            <a href="index.php?action=admin&act=account&id=<?php echo $set['ID_ACCOUNT']  ?>">Remove</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php
                        endwhile;
                    ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>

        <?php if($_SESSION['ROLE'] != 'Admin 1' && $_SESSION['ROLE'] != 'Admin 5'): ?>
        <div class="product-manager">
            <h1 id="product-manager">Product</h1>
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>PRICE</th>
                        <th>DESC SHORT</th>
                        <th>PRICE SALE</th>
                        <th>BRAND</th>
                        <th>RATE</th>
                        <th>
                            <?php if($_SESSION['ROLE'] != "Admin 2" && $_SESSION['ROLE'] != "Admin 3" && $_SESSION['ROLE'] != "Admin 4" && $_SESSION['ROLE'] != "Admin 7"): ?>
                            <a href="index.php?action=products">Add product</a>
                            <?php endif; ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $result = $product -> getProduct();
                        $i = 0;
                        while($set = $result -> fetch()):
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $set['ID_PRODUCT'] ?></td>
                        <td><?php echo $set['NAME_PRODUCT'] ?></td>
                        <td><?php echo number_format($set['PRICE_PRODUCT']).'đ' ?></td>
                        <td><?php echo $set['DESC_SHORT'] ?></td>
                        <td><?php echo $set['PRICE_SALE'] > 0 ? $set['PRICE_SALE'] : "Không giảm giá" ?></td>
                        <td><?php echo $set['BRAND'] ?></td>
                        <td><?php echo $set['RATE'] ?></td>
                        <td>
                            <?php if($_SESSION['ROLE'] != "Admin 2" && $_SESSION['ROLE'] != "Admin 7"): ?>
                            <?php if($_SESSION['ROLE'] != "Admin 3"): ?>
                            <a href="index.php?action=products&id=<?php echo $set['ID_PRODUCT'] ?>">Update</a>
                            <?php endif ?>
                            <?php if($_SESSION['ROLE'] != "Admin 4"): ?>
                            <a href="index.php?action=admin&act=product&id=<?php echo $set['ID_PRODUCT'] ?>">Remove</a>
                            <?php endif ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php
                        endwhile;
                    ?>
                </tbody>
            </table>
            <h1 id="product-manager-detail">Product Detail</h1>
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>SIZE 1</th>
                        <th>SIZE 2</th>
                        <th>SIZE 3</th>
                        <th>COLOR 1</th>
                        <th>COLOR 2</th>
                        <th>IMG 1</th>
                        <th>IMG 2</th>
                        <th>SELL NUMBER</th>
                        <th>INVENTORY</th>
                        <th>
                            <?php if($_SESSION['ROLE'] != "Admin 2" && $_SESSION['ROLE'] != "Admin 3" && $_SESSION['ROLE'] != "Admin 4" && $_SESSION['ROLE'] != "Admin 7"): ?>
                            <a href="index.php?action=products">Add product</a>
                            <?php endif; ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $result = $product -> getProduct();
                        $i = 0;
                        while($set = $result -> fetch()):
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $set['ID_PRODUCT'] ?></td>
                        <td><?php echo $set['SIZE_1'] == "" ? "Không có" : $set['SIZE_1'] ?></td>
                        <td><?php echo $set['SIZE_2'] == "" ? "Không có" : $set['SIZE_2'] ?></td>
                        <td><?php echo $set['SIZE_3'] == "" ? "Không có" : $set['SIZE_3'] ?></td>
                        <td><?php echo $set['COLOR_1']?></td>
                        <td><?php echo $set['COLOR_2'] ?></td>
                        <td><?php echo $set['IMG_1'] ?></td>
                        <td><?php echo $set['IMG_2'] ?></td>
                        <td><?php echo $set['SELL_NUMBER'] ?></td>
                        <td><?php echo $set['INVENTORY'] ?></td>
                        <td>
                            <?php if($_SESSION['ROLE'] != "Admin 2" && $_SESSION['ROLE'] != "Admin 7"): ?>
                            <?php if($_SESSION['ROLE'] != "Admin 3"): ?>
                            <a href="index.php?action=products&id=<?php echo $set['ID_PRODUCT'] ?>">Update</a>
                            <?php endif ?>
                            <?php if($_SESSION['ROLE'] != "Admin 4"): ?>
                            <a href="index.php?action=admin&act=product&id=<?php echo $set['ID_PRODUCT'] ?>">Remove</a>
                            <?php endif ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php
                        endwhile;
                    ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>

        <?php if($_SESSION['ROLE'] != 'Admin 1'): ?>
        <div class="product-manager">
            <h1 id="history-purchase">History Purchase</h1>
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>ID_CART</th>
                        <th>ID_ACCOUNT</th>
                        <th>NAME PURCHASE</th>
                        <th>PHONE PURCHASE</th>
                        <th>ADDRESS PURCHASE</th>
                        <th>TOTAL</th>
                        <th>DATE</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $result = $cart -> getHistoryAll();
                        $i = 0;
                        while($set = $result -> fetch()):
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $set['ID_HISTORY'] ?></td>
                        <td><?php echo $set['ID_CART'] ?></td>
                        <td><?php echo $set['ID_ACCOUNT'] ?></td>
                        <td><?php echo $set['NAME_PURCHASE'] ?></td>
                        <td><?php echo '0'.$set['PHONE_PURCHASE'] ?></td>
                        <td><?php echo $set['ADDRESS_PURCHASE'] ?></td>
                        <td><?php echo number_format($set['TOTAL']).'đ' ?></td>
                        <td><?php echo $set['DATE'] ?></td>
                        <td>
                            <?php if($_SESSION['ROLE'] != "Admin 2" && $_SESSION['ROLE'] != "Admin 3" && $_SESSION['ROLE'] != "Admin 4" && $_SESSION['ROLE'] != "Admin 5" && $_SESSION['ROLE'] != "Admin 7"): ?>
                            <a href="index.php?action=admin&act=purchase&id=<?php echo $set["ID_HISTORY"] ?>">Remove</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php
                        endwhile;
                    ?>
                </tbody>
            </table>

            <h1 id="history-cart">Cart History</h1>

            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>ID_ACCOUNT</th>
                        <th>ID_PRODUCT</th>
                        <th>NAME PRODUCT</th>
                        <th>PRICE</th>
                        <th>QUANTITY</th>
                        <th>SIZE</th>
                        <th>TOTAL</th>
                        <th>DATE</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $result = $cart -> getAllCart();
                        $i = 0;
                        while($set = $result -> fetch()):
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo $set['ID_CART'] ?></td>
                        <td><?php echo $set['ID_ACCOUNT'] ?></td>
                        <td><?php echo $set['ID_PRODUCT'] ?></td>
                        <td><?php echo $set['NAME_PRODUCT'] ?></td>
                        <td><?php echo number_format($set['PRICE']).'đ' ?></td>
                        <td><?php echo $set['QUANTITY'] ?></td>
                        <td><?php echo $set['SIZE'] ?></td>
                        <td><?php echo number_format($set['TOTAL']).'đ' ?></td>
                        <td><?php echo $set['DATE'] ?></td>
                        <td>
                            <?php if($_SESSION['ROLE'] != "Admin 2" && $_SESSION['ROLE'] != "Admin 3" && $_SESSION['ROLE'] != "Admin 4" && $_SESSION['ROLE'] != "Admin 5" && $_SESSION['ROLE'] != "Admin 7"): ?>
                            <a href="index.php?action=admin&act=cart&id=<?php echo $set["ID_CART"] ?>">Remove</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php
                        endwhile;
                    ?>
                </tbody>
            </table>
        </div>
        <?php endif ?>

    </div>
    <div class="right">
        <div class="menu-manager">
            <ul>
                <li><a href="#account-manager">Account</a></li>
                <li><a href="#product-manager">Product</a></li>
                <li><a href="#product-manager-detail">Product Detail</a></li>
                <li><a href="#history-purchase">History Purchase</a></li>
                <li><a href="#history-cart">Cart History</a></li>
            </ul>
        </div>
    </div>
</div>

<?php
    endif;
?>