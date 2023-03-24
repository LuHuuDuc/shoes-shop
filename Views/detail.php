<main>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $product->getProductID($id);
        $brand = $result['BRAND'];
        $price = number_format($result['PRICE_PRODUCT']);
        $price_sale = number_format($result['PRICE_SALE']);
        $name = $result['NAME_PRODUCT'];
        $desc = $result['DESC_SHORT'];
        $color1 = $result['COLOR_1'];
        $color2 = $result['COLOR_2'];
        $inventory = $result['INVENTORY'];
        $sell_number = $result['SELL_NUMBER'];
        $rating = $result['RATE'];
        isset($result['SIZE_1']) ? $size1 = $result['SIZE_1'] : "";
        isset($result['SIZE_2']) ? $size2 = $result['SIZE_2'] : "";
        isset($result['SIZE_3']) ? $size3 = $result['SIZE_3'] : "";
        $img1 = $result['IMG_1'];
        $img2 = $result['IMG_2'];

        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key => $item){
                if($_SESSION['cart'][$key]['ID_PRODUCT'] == $id){
                    $inventory -= $_SESSION['cart'][$key]['QUANTITY'];
                }
            }
        }
    }
    
    ?>
    <div class="grid-page-detail">
        <div class="detail-product-left">
            <div class="img-product">
                <input type="radio" name="checkproduct" id="<?php echo $color1 ?>" value="1" checked>
                <div class="img">
                    <img src="<?php echo "img/" . $img1 ?>">
                </div>
            </div>
            <div class="img-product">
                <input type="radio" name="checkproduct" id="<?php echo $color2 ?>" value="2">
                <div class="img">
                    <img src="<?php echo "img/" . $img2 ?>">
                </div>
            </div>
        </div>
        <form method="POST">
            <div class="detail-product-right">
                <div class="content-detail">
                    <input type="hidden" value="0" class="colorHidden" name="color">
                    <div class="brand-detail"><?php echo $brand; ?></div>
                    <div class="name-product-detail"><?php echo $name; ?></div>
                    <div class="desc-short-detail"><?php echo $desc; ?></div>
                    <div class="rating">
                        <?php 
                        $i = 0;
                        $o = 0;
                        $rateStart = (int) substr($rating,0,1);
                        $rateEnd = (double) substr($rating,2,1);

                        echo $rateStart == 0 ? "Chưa đánh giá " : "";
                        while($i < $rateStart){
                            $i++;
                            echo "<i class='fa-solid fa-star'></i>";
                        }
                        echo $rateEnd > 0 ? "<i class='fa-solid fa-star-half'></i>" : "";
                        echo "( ".round($rating,1)." ) - Đã bán: ".$sell_number;
                    ?>
                    </div>
                    <div class="price-product-detail">
                        <strike><?php echo $price_sale > 0 ? $price.'đ' : "" ?></strike>
                        <span><?php echo $price_sale > 0 ? $price_sale.'đ' : $price.'đ' ?></span>
                    </div>
                    <div class="change-detail">
                        <p>Số Lượng:</p>
                        <i class="fa-solid fa-minus" @click="minusNumber()"></i>
                        <input type="number" class="number-product-detail" value="1" name="quantity" min="1"
                            max="<?php echo $inventory ?>">
                        <i class="fa-solid fa-plus" @click="addNumber()"></i>
                    </div>
                    <div class="size">
                        <p>Kích thước:</p>
                        <select name="size">
                            <?php
                            echo isset($size1) ? "<option value='".$size1."'>".$size1."</option>" : "";
                            echo isset($size2) ? "<option value='".$size2."'>".$size2."</option>" : "";
                            echo isset($size3) ? "<option value='".$size3."'>".$size3."</option>" : "";
                        ?>
                        </select>
                    </div>
                    <div class="color-product-detail">
                        <p>Màu Sắc:</p>
                        <div class="btn-change-color-product">
                            <label class="label-color1" for="<?php echo $color1 ?>">
                                <div onclick="document.querySelector('.colorHidden').value = 0"
                                    class="color <?php echo $color1 ?>"></div>
                            </label>
                            <label class="label-color1" for="<?php echo $color2 ?>">
                                <div onclick="document.querySelector('.colorHidden').value = 1"
                                    class="color <?php echo $color2 != '' ? $color2 : "none" ?>"></div>
                            </label>
                        </div>
                    </div>
                    <div class="inventory">
                        <p>Kho: <?php echo $inventory > 0 ? $inventory : "Out of stock" ?></p>
                    </div>
                    <div class="button-detail">
                        <button <?php echo $inventory <= 0 ? "disabled" : "" ?> name="buyNow"
                            style="<?php echo $inventory <= 0 ? "cursor: not-allowed" : "" ?>">Buy Now</button>
                        <button <?php echo $inventory <= 0 ? "disabled" : "" ?> type="submit" name="addCart"
                            style="<?php echo $inventory <= 0 ? "cursor: not-allowed" : "" ?>">Add to cart</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="detail-product">
            <div class="desc-detail">
                <div class="title-desc-detail" @click="showDecs()">Description <i class="fa-solid fa-chevron-left"></i>
                </div>
                <div class="content-desc-detail">
                    <p class="">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam aliquam quae
                        incidunt, consectetur et pariatur aut ex nihil id magni ipsam amet porro labore! Animi error,
                        deleniti facere saepe ad nisi quod exercitationem accusamus consequuntur maxime</p>
                </div>
            </div>
            <div class="comment-detail">
                <div class="title-comment-detail">Comments</div>
                <div class="list-comment">
                    <div class="item-comment">
                        <?php
                        $result = $cmt->getComment($_GET['id']);
                        while ($set = $result->fetch()) :
                        ?>
                        <form action="" method="POST" class="form-show-comment">
                            <input type="radio" name="checkShow" id="<?php echo $set['ID_COMMENT'] ?>"
                                class="checkShow">
                            <input type="radio" name="checkShow" id="hidden<?php echo $set['ID_COMMENT'] ?>"
                                class="checkShow">
                            <input type="radio" name="checkShow" id="reply<?php echo $set['ID_COMMENT'] ?>"
                                class="checkShow">
                            <div class="comment">
                                <input type="hidden" name="idCMT" value="<?php echo $set['ID_COMMENT'] ?>">
                                <div class="email-comment">
                                    <div class="img">
                                        <img src="img/img-comment.png">
                                    </div>
                                    <div class="email"><?php echo $set['EMAIL'] ?></div>
                                    <?php
                                        if(isset($_SESSION['ID_ACCOUNT'])):
                                    ?>
                                    <label for="reply<?php echo $set['ID_COMMENT'] ?>">
                                        <div class="btnReply">Reply</div>
                                    </label>
                                    <?php
                                    endif;
                                        if(isset($_SESSION['ID_ACCOUNT']) && $_SESSION['ID_ACCOUNT'] == $set['ID_ACCOUNT']):
                                    ?>
                                    <a href="index.php?<?php echo strlen($_SERVER['QUERY_STRING']) == 21 ? $_SERVER['QUERY_STRING'].'&idcmt='.$set['ID_COMMENT'] : substr($_SERVER['QUERY_STRING'], 0, 21).'&idcmt='.$set['ID_COMMENT'] ?>"
                                        class="btnDelete">Delete</a>
                                    <label for="<?php echo $set['ID_COMMENT'] ?>">
                                        <div class="btnEdit">Edit</div>
                                    </label>
                                    <?php
                                        endif;
                                    ?>
                                    <label for="hidden<?php echo $set['ID_COMMENT'] ?>">
                                        <div class="btnHidden">Hidden</div>
                                    </label>
                                </div>
                                <div class="edit-comment">
                                    <div class="content-comment"><?php echo $set['CONTENT'] ?></div>
                                    <textarea rows="3" class="textareaUpdate" name="contentUD"></textarea>
                                    <button type="submit" name="btnUpdate" class="btnUpdate">Update</button>
                                    <button type="submit" name="btnReply" class="btnFormReply">Comment</button>
                                </div>
                                <?php
                                $result = $cmt->getReply($set['ID_COMMENT']);
                                while ($set1 = $result->fetch()) :
                                ?>
                                <div class="form-reply">
                                    <div class="email">
                                        <img src="img/img-comment.png">
                                        <div><?php echo $set1['EMAIL'] ?></div>
                                    </div>
                                    <div class="content_Reply"><?php echo $set1['CONTENT'] ?></div>
                                </div>
                                <?php
                                endwhile;
                                ?>
                            </div>
                        </form>
                        <?php
                        endwhile;
                        ?>
                    </div>
                    <form method="post">
                        <div class="form-comment">
                            <?php
                                if(!isset($_SESSION['ID_ACCOUNT'])):
                            ?>
                            <input type="email" placeholder="Enter your email" value="" name="emailCMT" require>
                            <?php
                                endif;
                            ?>
                            <textarea rows="2" placeholder="Enter your comment" name="contentCMT" require></textarea>
                            <input type="submit" name="buttonCMT" value="Comment now">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="ad">
        <div class="title-ad">Maybe You Like</div>
        <div class="product">
            <?php
            $getNew = $product->getProduct();
            $rand1 = mt_rand(0, 22);
            $rand2 = $rand1+1;
            $rand3 = $rand2+1;
            foreach($getNew as $key => $set):
                if($key == $rand1 ||$key == $rand2 || $key == $rand3):
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
                            onclick="window.location='index.php?action=detail&id=<?php echo $set['ID_PRODUCT'] ?>'"></i>
                    </div>
                </div>
            </div>
            <?php
                endif;
            endforeach;
            ?>
        </div>
    </div>
</main>