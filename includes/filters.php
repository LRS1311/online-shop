<!--FILTERS-->
	<div class="filters section section-color">
		<p class="filters-section">Product categories</p>
        <ul>
            <!--href="javascript:void(0);" - ???-->
            <li><a href="javascript:void(0);" id="mobile-index-1"><img src="img/mobile.png" alt="" class="cat-image">Mobile</a>
                <ul class="category-section">
                    <li><a href="view-cat.php?type=mobile#bc"><b>All models</b></a></li>
                    <?php
                    $product = mysqli_query ($connection, "SELECT * FROM categories WHERE type = 'mobile'");
                    while ($prod = mysqli_fetch_assoc ($product)) { ?>
                    <!--strtolower - function makes the first letter in lowercase--> 
                    <li><a href=view-cat.php?cat=<?php echo strtolower($prod['brand']);?>&type=<?php echo $prod['type'];?>#bc><?php echo $prod['brand'];?></a></li>
                    <?php } ?>
                </ul>
            </li>
            <li><a href="javascript:void(0);" id="tablet-index-2"><img src="img/tablet.png" alt="" class="cat-image">Tablet</a>
                <ul class="category-section">
                    <li><a href="view-cat.php?type=tablet#bc"><b>All models</b></a></li>
                    <?php
                    $product = mysqli_query ($connection, "SELECT * FROM categories WHERE type = 'tablet'");
                    while ($prod = mysqli_fetch_assoc ($product)) { ?>
                    <li><a href=view-cat.php?cat=<?php echo strtolower($prod['brand']);?>&type=<?php echo $prod['type'];?>#bc><?php echo $prod['brand'];?></a></li>
                    <?php } ?>
                </ul>
            </li>
            <li><a href="javascript:void(0);" id="laptop-index-3"><img src="img/laptop.png" alt="" class="cat-image">Laptop</a>
                <ul class="category-section">
                    <li><a href="view-cat.php?type=laptop#bc"><b>All models</b></a></li>
                    <?php
                    $product = mysqli_query ($connection, "SELECT * FROM categories WHERE type = 'laptop'");
                    while ($prod = mysqli_fetch_assoc ($product)) { ?>
                    <li><a href=view-cat.php?cat=<?php echo strtolower($prod['brand']);?>&type=<?php echo $prod['type'];?>#bc><?php echo $prod['brand'];?></a></li>
                    <?php } ?>
                </ul>
            </li>
        </ul>


       <!-- 
        <script type="text/javascript">
            $(document).ready (function() {

                $("#block-trackbar").trackbar ({
                    onMove: function() {
                        document.getElementById("start_price").value = this.leftValue;
                        document.getElementById("end_price").value = this.rightValue;
                    },
                    width: 160,
                    leftLimit: 1000,
                    leftValue: 
                        <?php
                            if ((int)$_GET['start_price'] >= 1000 && (int)$_GET['end_price'] <= 60000) {
                                echo (int)$_GET['start_price'];
                            } else {
                                echo "1000";
                            }
                        ?>
                    ,
                    rightLimit: 60000, 
                    rightValue: 
                        <?php
                            if ((int)$_GET['start_price'] >= 1000 && (int)$_GET['end_price'] <= 60000) {
                                echo (int)$_GET['end_price'];
                            } else {
                                echo "30000";
                            }
                        ?>
                    ,
                    roundUp: 1000
                });

            });
        </script>

        <p class="filters-section">Parameters</p>
        <p class="title-filter">Price</p>
        <form action="search-filter.php" method="GET">
            <div id="input-price">
                <ul>
                    <li><p>from</p></li>
                    <li><input type="text" id="start-price" name="start_price" value="1000"></li>
                    <li><p>to</p></li>
                    <li><input type="text" id="end-price" name="end_price" value="60000"></li>
                    <li><p>rub</p></li>
                </ul>
            </div>
            <div id="block-trackbar"></div>
            <p class="title-filter">Manufacturers</p>
            <ul class="checkbox-brand">
                <?php
                    $product = mysqli_query ($connection, "SELECT * FROM categories WHERE type = 'mobile'");
                    while ($prod = mysqli_fetch_assoc ($product)) { 
                        $checked_brand = "";
                        if ($_GET['brand']) {
                            if (in_array($prod['id'], $_GET['brand'])) {
                                $checked_brand = "checked";
                            }
                        }
                    ?>
                <li><input <?php echo $checked_brand;?> type="checkbox" name="brand[]" value=<?php echo $prod['id'];?> id=check-brand<?php echo $prod['id'];?>><label for=check-brand<?php echo $prod['id'];?>><?php echo $prod['brand'];?></label></li>
                <?php } ?>
            </ul>
            <input type="submit" name="submit" id="button-param-search" value="Search">
        </form>
        -->
	</div>
<!--FILTERS-->