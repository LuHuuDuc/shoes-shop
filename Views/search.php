<main>
    <?php
    $_SESSION['sortSearch'] = isset($_SESSION['sortSearch']) ? $_SESSION['sortSearch'] : "DESC";
    $_SESSION['minSearch'] = 0;
    $_SESSION['maxSearch'] = 999999999;
    if(isset($_POST['sortAndFilter'])){
        $_SESSION['sortSearch'] = $_POST['order'];
        $_SESSION['minSearch'] = $_POST['minValue'];
        $_SESSION['maxSearch'] = $_POST['maxValue'];
    }
    ?>
    <div class="grid-page-product">
        <div class="item">
            <div class="title-page-product">Searching</div>
            <div class="content-page-product">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non in tenetur
                quisquam molestias voluptate perferendis dicta reprehenderit odio voluptatibus accusamus!</div>
            <div class="menu-search">
                <form method="post">
                    <div class="sort">
                        <select name="order">
                            <option <?php echo $_SESSION['sortSearch'] == "DESC" ? "SELECTED" : "" ?> value="DESC">Sort
                                by price descending</option>
                            <option <?php echo $_SESSION['sortSearch'] == "ASC" ? "SELECTED" : "" ?> value="ASC">Sort by
                                price ascending</option>
                        </select>
                    </div>
                    <div class="filter-price">
                        <select name="minValue">
                            <option value="0">Choose lowest price</option>
                            <option <?php echo $_SESSION['minSearch'] == 500000? "SELECTED" : "" ?> value="500000">
                                500.000 đ</option>
                            <option <?php echo $_SESSION['minSearch'] == 1000000? "SELECTED" : "" ?> value="1000000">
                                1.000.000 đ</option>
                            <option <?php echo $_SESSION['minSearch'] == 1500000? "SELECTED" : "" ?> value="1500000">
                                1.500.000 đ</option>
                        </select>
                        <select name="maxValue">
                            <option value="999999999">Choose highest price</option>
                            <option <?php echo $_SESSION['maxSearch'] == 2000000? "SELECTED" : "" ?> value="2000000">
                                2.000.000 đ</option>
                            <option <?php echo $_SESSION['maxSearch'] == 2500000? "SELECTED" : "" ?> value="2500000">
                                2.500.000 đ</option>
                            <option <?php echo $_SESSION['maxSearch'] == 3000000? "SELECTED" : "" ?> value="3000000">
                                3.000.000 đ</option>
                        </select>
                    </div>
                    <button name="sortAndFilter">Submit</button>
                </form>
            </div>
            <div class="product">
                <?php
                $limit = 8;
                $countProduct = $product -> countProduct();
                while($set = $countProduct -> fetch()){
                    $totalProduct =  $set['TOTAL'];
                }
                $numberPage =  $totalProduct/$limit;
                $valueSearch = isset($_POST['valueSearch']) ? $_POST['valueSearch'] : "";
                $d = 0;
                while($d < $numberPage){
                    if(isset($_POST['pageSearch'.$d.''])){
                        $_SESSION['pageSearch'] = $limit*$d;
                        break;
                    }
                    $d++;
                }
                if(isset($_POST['PreSearch'])){
                    $_SESSION['pageSearch'] -= $limit;
                }
                if(isset($_POST['NextSearch'])){
                    if(!isset($_SESSION['pageSearch'])){
                        $_SESSION['pageSearch'] = 0;
                    }
                    $_SESSION['pageSearch'] += $limit;
                }
                $page = isset($_SESSION['pageSearch']) ? $_SESSION['pageSearch']/$limit : 0;
                $search = $product -> getSearch($valueSearch, isset($_SESSION['pageSearch']) ? $_SESSION['pageSearch'] : 0, $_SESSION['sortSearch'], $_SESSION['minSearch'], $_SESSION['maxSearch']);
                $a = 0;
                while ($set = $search->fetch()):
                    $a++;
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
                            <?php echo $set['PRICE_SALE'] > 0 ? number_format($set['PRICE_SALE']).'đ' : number_format($set['PRICE_PRODUCT']).'đ' ?>
                        </div>
                        <div class="add">
                            <i class="fa-solid fa-shop"
                                onclick="window.location='index.php?action=detail&id=<?php echo $set['ID_PRODUCT']?>'"></i>
                        </div>
                    </div>
                </div>
                <?php
                endwhile;
                if($a == 0):
                    echo "
                        <script>
                        window.addEventListener('load', (event) => {
                            document.querySelector('.alert-error-search').classList.add('active')
                            document.querySelector('.line-error-search').classList.add('active')
                            setTimeout(function(){
                                document.querySelector('.alert-error-search').classList.remove('active')
                                document.querySelector('.line-error-search').classList.remove('active')
                            }, 2800)
                        });
                        </script>
                    ";
                    $b = 0;
                    $search = $product -> getSearch("", isset($_SESSION['pageSearch']) ? $_SESSION['pageSearch'] : 0, $_SESSION['sortSearch'], $_SESSION['minSearch'], $_SESSION['maxSearch']);
                    while ($set = $search->fetch()):
                        $b++;
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
                endif;
                ?>
            </div>
            <div class="navigation">
                <form method="post">
                    <?php
                    if($page >= 1 ):
                ?>
                    <button name="PreSearch">Pre</button>
                    <?php
                endif;
                if($totalProduct > $limit):
                    $c = 0;
                    while($c < $numberPage):
                ?>
                    <button class="<?php if($c != $page && $c != $page+1 && $c != $page-1) echo 'none' ?>"
                        name='pageSearch<?php echo $c ?>'><?php ++$c; echo $c ?></button>
                    <?php
                    endwhile;
                endif;
                if($page < $numberPage-1):
                ?>
                    <button name="NextSearch">Next</button>
                    <?php
                endif;
                ?>
                </form>
            </div>
        </div>
    </div>
</main>