<main>
    <div class="grid-page-product">
        <div class="item">
            <div class="title-page-product" onclick="window.location='index.php?action=Originals'">Running</div>
            <div class="content-page-product">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non in tenetur
                quisquam molestias voluptate perferendis dicta reprehenderit odio voluptatibus accusamus!</div>
            <div class="product" id="listOriginals">
                <?php
                $limit = 8;
                $countProduct = $product -> countRunning();
                while($set = $countProduct -> fetch()){
                    $totalProduct =  $set['TOTAL'];
                }
                $numberPage =  $totalProduct/$limit;
                $d = 0;
                while($d < $numberPage){
                    if(isset($_POST['runningPage'.$d.''])){
                        $index = $limit*$d;
                        break;
                    }
                    else{
                        $index = 0;
                    }
                    $d++;
                }
                $pdNew = $product->getRunning($limit ,$index);
                while ($set = $pdNew->fetch()) :
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
        <div class="navigation">
                <form method="post">
                <?php
                if($totalProduct > $limit):
                    $c = 0;
                    while($c < $numberPage):
                ?>
                    <button name='runningPage<?php echo $c ?>'><?php ++$c; echo $c ?></button>
                <?php
                    endwhile;
                endif;
                ?>
                </form>
        </div>
    </div>
</main>