<main>
    <div class="grid-page-product">
        <div class="item">
            <div class="title-page-product" onclick="window.location='index.php?action=originals'">Originals</div>
            <div class="content-page-product">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non in tenetur
                quisquam molestias voluptate perferendis dicta reprehenderit odio voluptatibus accusamus!</div>
            <div class="product" id="listOriginals">
                <?php
                $product = new product();
                $limit = 4;
                $index = 0;
                $product0ri = $product->getOriginals($limit, $index);
                while ($set = $product0ri->fetch()) :
                ?>
                <div class="card" id="productOriginals">
                    <div class="content-product">
                        <div class="brand"><?php echo $set['BRAND'] ?></div>
                        <div class="name-product"><?php echo $set['NAME_PRODUCT'] ?></div>
                        <div class="desc-short-product"><?php echo $set['DESC_SHORT'] ?></div>
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
                        <img src="img/<?php echo $set['IMG_1'] ?>" alt="">
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
                endwhile;
                ?>
            </div>
        </div>
        <div class="item">
            <div class="title-page-product" onclick="window.location='index.php?action=sportswear'">Sportswear</div>
            <div class="content-page-product">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non in tenetur
                quisquam molestias voluptate perferendis dicta reprehenderit odio voluptatibus accusamus!</div>
            <div class="product">
                <?php
                $product = new product();
                $productSpo = $product->getSportswear($limit, $index);
                while ($set = $productSpo->fetch()) :
                ?>
                <div class="card">
                    <div class="content-product">
                        <div class="brand"><?php echo $set['BRAND'] ?></div>
                        <div class="name-product"><?php echo $set['NAME_PRODUCT'] ?></div>
                        <div class="desc-short-product"><?php echo $set['DESC_SHORT'] ?></div>
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
                        <img src="img/<?php echo $set['IMG_1'] ?>" alt="">
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
                endwhile;
                ?>
            </div>
        </div>
        <div class="item">
            <div class="title-page-product" onclick="window.location='index.php?action=running'">Running</div>
            <div class="content-page-product">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non in tenetur
                quisquam molestias voluptate perferendis dicta reprehenderit odio voluptatibus accusamus!</div>
            <div class="product">
                <?php
                $product = new product();
                $productRun = $product->getRunning($limit, $index);
                while ($set = $productRun->fetch()) :
                ?>
                <div class="card">
                    <div class="content-product">
                        <div class="brand"><?php echo $set['BRAND'] ?></div>
                        <div class="name-product"><?php echo $set['NAME_PRODUCT'] ?></div>
                        <div class="desc-short-product"><?php echo $set['DESC_SHORT'] ?></div>
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
                        <img src="img/<?php echo $set['IMG_1'] ?>" alt="">
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
                endwhile;
                ?>
            </div>
        </div>
        <div class="item">
            <div class="title-page-product" onclick="window.location='index.php?action=tennis'">Tennis</div>
            <div class="content-page-product">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non in tenetur
                quisquam molestias voluptate perferendis dicta reprehenderit odio voluptatibus accusamus!</div>
            <div class="product">
                <?php
                $productTen = $product->getTennis($limit, $index);
                while ($set = $productTen->fetch()) :
                ?>
                <div class="card">
                    <div class="content-product">
                        <div class="brand"><?php echo $set['BRAND'] ?></div>
                        <div class="name-product"><?php echo $set['NAME_PRODUCT'] ?></div>
                        <div class="desc-short-product"><?php echo $set['DESC_SHORT'] ?></div>
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
                        <img src="img/<?php echo $set['IMG_1'] ?>" alt="">
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
                endwhile;
                ?>
            </div>
        </div>
    </div>
</main>