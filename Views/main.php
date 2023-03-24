<main>
    <div class="grid">
        <div class="item">
            <div class="title">Transport</div>
            <div class="content">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur maiores repellat illum iste est
                minus aut! Reprehenderit nihil perferendis inventore.
            </div>
            <div class="icon">
                <i class="fa-solid fa-motorcycle"></i>
                <i class="fa-solid fa-helicopter"></i>
                <i class="fa-solid fa-house-user"></i>
                <i class="fa-solid fa-ship"></i>
                <i class="fa-solid fa-truck"></i>
                <i class="fa-solid fa-plane"></i>
                <i class="fa-solid fa-person-walking"></i>
            </div>
        </div>
        <div class="item">
            <div class="title">Checkin</div>
            <div class="content">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur maiores repellat illum iste est
                minus aut! Reprehenderit nihil perferendis inventore.
            </div>
            <div class="grid-checkin">
                <div class="item">
                    <img src="./img/grid1.jpg" alt="">
                </div>
                <div class="item">
                    <img src="./img/grid2.jpg" alt="">
                </div>
                <div class="item">
                    <img src="./img/grid3.jpg" alt="">
                </div>
                <div class="item">
                    <img src="./img/grid4.jpg" alt="">
                </div>
                <div class="item">
                    <img src="./img/grid5.jpg" alt="">
                </div>
                <div class="item">
                    <img src="./img/grid6.jpg" alt="">
                </div>
            </div>
        </div>
        <div class="item">
            <div class="title" onclick="window.location='index.php?action=product'">Latest Product</div>
            <div class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non in tenetur quisquam
                molestias voluptate perferendis dicta reprehenderit odio voluptatibus accusamus!</div>
            <div class="product card-new">
                <?php
                    $pdNew = $product -> getProductNew();
                    while($set = $pdNew -> fetch()):
                ?>
                <div class="card">
                    <div class="content-product">
                        <div class="brand"><?php echo $set['BRAND']?></div>
                        <div class="name-product"><?php echo $set['NAME_PRODUCT']?></div>
                        <div class="desc-short-product"><?php echo $set['DESC_SHORT']?></div>
                        <div class="rating">
                            <?php 
                            $rating = $set['RATE'];
                            $i = 0;
                            $o = 0;
                            $rateStart = (int) substr($rating,0,1);
                            $rateEnd = (double) substr($rating,2,1);

                            while($i < $rateStart){
                                $i++;
                                echo "<i class='fa-solid fa-star'></i>";
                            }
                            echo $rateEnd > 0 ? "<i class='fa-solid fa-star-half'></i>" : "";
                        ?>
                        </div>
                        <img src="img/<?php echo $set['IMG_1']?>" alt="">
                        <div class="price">
                            <strike><?php echo $set['PRICE_SALE'] > 0 ? number_format($set['PRICE_PRODUCT']).'đ' : ""?></strike>
                            <?php echo $set['PRICE_SALE'] > 0 ? number_format($set['PRICE_SALE']).'đ' : number_format($set['PRICE_PRODUCT']).'đ'?>
                        </div>
                        <div class="add">
                            <i class="fa-solid fa-shop"
                                onclick="window.location='index.php?action=detail&id=<?php echo $set['ID_PRODUCT']?>'"></i>
                        </div>
                    </div>
                </div>
                <?php
                    endWhile;
                ?>
            </div>
        </div>
        <div class="item">
            <div class="title" onclick="window.location='index.php?action=product'">Best Seller</div>
            <div class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non in tenetur quisquam
                molestias voluptate perferendis dicta reprehenderit odio voluptatibus accusamus!</div>
            <div class="product">
                <?php
                    $pdNew = $product -> getProductBest();
                    while($set = $pdNew -> fetch()):
                ?>
                <div class="card">
                    <div class="content-product">
                        <div class="brand"><?php echo $set['BRAND']?></div>
                        <div class="name-product"><?php echo $set['NAME_PRODUCT']?></div>
                        <div class="desc-short-product"><?php echo $set['DESC_SHORT']?></div>
                        <div class="rating">
                            <?php 
                            $rating = $set['RATE'];
                            $i = 0;
                            $o = 0;
                            $rateStart = (int) substr($rating,0,1);
                            $rateEnd = (double) substr($rating,2,1);

                            while($i < $rateStart){
                                $i++;
                                echo "<i class='fa-solid fa-star'></i>";
                            }
                            echo $rateEnd > 0 ? "<i class='fa-solid fa-star-half'></i>" : "";
                        ?>
                        </div>
                        <img src="img/<?php echo $set['IMG_1']?>" alt="">
                        <div class="price">
                            <strike><?php echo $set['PRICE_SALE'] > 0 ? number_format($set['PRICE_PRODUCT']).'đ' : ""?></strike>
                            <?php echo $set['PRICE_SALE'] > 0 ? number_format($set['PRICE_SALE']).'đ' : number_format($set['PRICE_PRODUCT']).'đ'?>
                        </div>
                        <div class="add">
                            <i class="fa-solid fa-shop"
                                onclick="window.location='index.php?action=detail&id=<?php echo $set['ID_PRODUCT']?>'"></i>
                        </div>
                    </div>
                </div>
                <?php
                    endWhile;
                ?>
            </div>
        </div>
    </div>
</main>