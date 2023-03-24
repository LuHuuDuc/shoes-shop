<?php
    if(isset($_GET['id'])){
        $id1 = $_GET['id'];
        $result = $product -> getProductID($id1);
    
        $name = $result['NAME_PRODUCT'];
        $price = $result['PRICE_PRODUCT'];
        $size1 = $result['SIZE_1'];
        $size2 = $result['SIZE_2'];
        $size3 = $result['SIZE_3'];
        $color1 = $result['COLOR_1'];
        $color2 = $result['COLOR_2'];
        $desc = $result['DESC_SHORT'];
        $sell_number = $result['SELL_NUMBER'];
        $inventory = $result['INVENTORY'];
        $price_sale = $result['PRICE_SALE'];
        $brand = $result['BRAND'];
        $rate = $result['RATE'];
    }
?>
<div class="container-manager-account">
    <h1 class="title-manager-account">Add Product</h1>
    <form method="post" enctype="multipart/form-data">

        <label for="">Name:</label>
        <input required minlength="5" maxlength="100" type="text" name="name_Product"
            value="<?php echo isset($name) ? $name : "" ?>">

        <label for="">Price:</label>
        <input required min="1" type="number" name="price_Product" value="<?php echo isset($price) ? $price : "" ?>">

        <label for="">Size 1:</label>
        <select required name="size1_Product">
            <option <?php echo isset($size1) && $size1=="" ? "selected" : "" ?> value="">Chọn Size</option>
            <option <?php echo isset($size1) && $size1=="7 UK" ? "selected" : "" ?> value="7 UK">7 UK</option>
            <option <?php echo isset($size1) && $size1=="7.5 UK" ? "selected" : "" ?> value="7.5 UK">7.5 UK</option>
            <option <?php echo isset($size1) && $size1=="8 UK" ? "selected" : "" ?> value="8 UK">8 UK</option>
            <option <?php echo isset($size1) && $size1=="8.5 UK" ? "selected" : "" ?> value="8.5 UK">8.5 UK</option>
            <option <?php echo isset($size1) && $size1=="9 UK" ? "selected" : "" ?> value="9 UK">9 UK</option>
            <option <?php echo isset($size1) && $size1=="9.5 UK" ? "selected" : "" ?> value="9.5 UK">9.5 UK</option>
            <option <?php echo isset($size1) && $size1=="10 UK" ? "selected" : "" ?> value="10. UK">10. UK</option>
            <option <?php echo isset($size1) && $size1=="10.5 UK" ? "selected" : "" ?> value="10.5 UK">10.5 UK</option>
            <option <?php echo isset($size1) && $size1=="11 UK" ? "selected" : "" ?> value="11 UK">11 UK</option>
            <option <?php echo isset($size1) && $size1=="11.5 UK" ? "selected" : "" ?> value="11.5 UK">11.5 UK</option>
            <option <?php echo isset($size1) && $size1=="12 UK" ? "selected" : "" ?> value="12 UK">12 UK</option>
            <option <?php echo isset($size1) && $size1=="12.5 UK" ? "selected" : "" ?> value="12.5 UK">12.5 UK</option>
        </select>

        <label for="">Size 2:</label>
        <select name="size2_Product">
            <option <?php echo isset($size2) && $size2=="" ? "selected" : "" ?> value="">Chọn Size</option>
            <option <?php echo isset($size2) && $size2=="7 UK" ? "selected" : "" ?> value="7 UK">7 UK</option>
            <option <?php echo isset($size2) && $size2=="7.5 UK" ? "selected" : "" ?> value="7.5 UK">7.5 UK</option>
            <option <?php echo isset($size2) && $size2=="8 UK" ? "selected" : "" ?> value="8 UK">8 UK</option>
            <option <?php echo isset($size2) && $size2=="8.5 UK" ? "selected" : "" ?> value="8.5 UK">8.5 UK</option>
            <option <?php echo isset($size2) && $size2=="9 UK" ? "selected" : "" ?> value="9 UK">9 UK</option>
            <option <?php echo isset($size2) && $size2=="9.5 UK" ? "selected" : "" ?> value="9.5 UK">9.5 UK</option>
            <option <?php echo isset($size2) && $size2=="10 UK" ? "selected" : "" ?> value="10. UK">10. UK</option>
            <option <?php echo isset($size2) && $size2=="10.5 UK" ? "selected" : "" ?> value="10.5 UK">10.5 UK</option>
            <option <?php echo isset($size2) && $size2=="11 UK" ? "selected" : "" ?> value="11 UK">11 UK</option>
            <option <?php echo isset($size2) && $size2=="11.5 UK" ? "selected" : "" ?> value="11.5 UK">11.5 UK</option>
            <option <?php echo isset($size2) && $size2=="12 UK" ? "selected" : "" ?> value="12 UK">12 UK</option>
            <option <?php echo isset($size2) && $size2=="12.5 UK" ? "selected" : "" ?> value="12.5 UK">12.5 UK</option>
        </select>

        <label for="">Size 3:</label>
        <select name="size3_Product">
            <option <?php echo isset($size3) && $size3=="" ? "selected" : "" ?> value="">Chọn Size</option>
            <option <?php echo isset($size3) && $size3=="7 UK" ? "selected" : "" ?> value="7 UK">7 UK</option>
            <option <?php echo isset($size3) && $size3=="7.5 UK" ? "selected" : "" ?> value="7.5 UK">7.5 UK</option>
            <option <?php echo isset($size3) && $size3=="8 UK" ? "selected" : "" ?> value="8 UK">8 UK</option>
            <option <?php echo isset($size3) && $size3=="8.5 UK" ? "selected" : "" ?> value="8.5 UK">8.5 UK</option>
            <option <?php echo isset($size3) && $size3=="9 UK" ? "selected" : "" ?> value="9 UK">9 UK</option>
            <option <?php echo isset($size3) && $size3=="9.5 UK" ? "selected" : "" ?> value="9.5 UK">9.5 UK</option>
            <option <?php echo isset($size3) && $size3=="10 UK" ? "selected" : "" ?> value="10. UK">10. UK</option>
            <option <?php echo isset($size3) && $size3=="10.5 UK" ? "selected" : "" ?> value="10.5 UK">10.5 UK</option>
            <option <?php echo isset($size3) && $size3=="11 UK" ? "selected" : "" ?> value="11 UK">11 UK</option>
            <option <?php echo isset($size3) && $size3=="11.5 UK" ? "selected" : "" ?> value="11.5 UK">11.5 UK</option>
            <option <?php echo isset($size3) && $size3=="12 UK" ? "selected" : "" ?> value="12 UK">12 UK</option>
            <option <?php echo isset($size3) && $size3=="12.5 UK" ? "selected" : "" ?> value="12.5 UK">12.5 UK</option>
        </select>

        <label for="">Color 1:</label>
        <select required name="color1_Product">
            <option <?php echo isset($color1) && $color1=="" ? "selected" : "" ?> value="">Chọn Size</option>
            <option <?php echo isset($color1) && $color1=="WHITE" ? "selected" : "" ?> value="WHITE">White</option>
            <option <?php echo isset($color1) && $color1=="BLACK" ? "selected" : "" ?> value="BLACK">Black</option>
            <option <?php echo isset($color1) && $color1=="BLUE" ? "selected" : "" ?> value="BLUE">Blue</option>
            <option <?php echo isset($color1) && $color1=="GREEN" ? "selected" : "" ?> value="GREEN">Green</option>
            <option <?php echo isset($color1) && $color1=="GRAY" ? "selected" : "" ?> value="GRAY">Gray</option>
            <option <?php echo isset($color1) && $color1=="PINK" ? "selected" : "" ?> value="PINK">Pink</option>
            <option <?php echo isset($color1) && $color1=="CREAM" ? "selected" : "" ?> value="CREAM">Cream</option>
            <option <?php echo isset($color1) && $color1=="BROWN" ? "selected" : "" ?> value="BROWN">Brown</option>
        </select>

        <label for="">Color 2:</label>
        <select name="color2_Product">
            <option <?php echo isset($color2) && $color2=="" ? "selected" : "" ?> value="">Chọn Size</option>
            <option <?php echo isset($color2) && $color2=="WHITE" ? "selected" : "" ?> value="WHITE">White</option>
            <option <?php echo isset($color2) && $color2=="BLACK" ? "selected" : "" ?> value="BLACK">Black</option>
            <option <?php echo isset($color2) && $color2=="BLUE" ? "selected" : "" ?> value="BLUE">Blue</option>
            <option <?php echo isset($color2) && $color2=="GREEN" ? "selected" : "" ?> value="GREEN">Green</option>
            <option <?php echo isset($color2) && $color2=="GRAY" ? "selected" : "" ?> value="GRAY">Gray</option>
            <option <?php echo isset($color2) && $color2=="PINK" ? "selected" : "" ?> value="PINK">Pink</option>
            <option <?php echo isset($color2) && $color2=="CREAM" ? "selected" : "" ?> value="CREAM">Cream</option>
            <option <?php echo isset($color2) && $color2=="BROWN" ? "selected" : "" ?> value="BROWN">Brown</option>
        </select>

        <label for="">Img 1:</label>
        <input <?php echo isset($_GET['id']) ? "" : "required" ?> type="file" name="img1_Product">

        <label for="">Img 2:</label>
        <input type="file" name="img2_Product">

        <label for="">Desc:</label>
        <input required type="text" name="desc_Product" value="<?php echo isset($desc) ? $desc : "" ?>">

        <label for="">Inventory:</label>
        <input required type="number" name="inventory_Product"
            value="<?php echo isset($inventory) ? $inventory : "" ?>">

        <label for="">Price Sale:</label>
        <input required type="number" name="price_sale_Product" value="<?php echo isset($price_sale) ? $price_sale : "" ?>">

        <label for="">Brand:</label>
        <select name="brand_Product">
            <option <?php echo isset($brand) && $brand=="" ? "selected" : "" ?> disabled selected value="Chọn Brand">
                Chọn Brand</option>
            <option <?php echo isset($brand) && $brand=="Adidas" ? "selected" : "" ?> value="Adidas">Adidas</option>
            <option <?php echo isset($brand) && $brand=="Khác" ? "selected" : "" ?> value="Khác">Khác</option>
        </select>

        <?php
            if(isset($_GET['id'])){
                echo "<button name='managerUpdateProduct'>Update Now</button> <br>";
            }
            else{
                echo "<button name='managerAddProduct'>Add Now</button> <br>";
            }
        ?>
    </form>
</div>