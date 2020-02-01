<?php
$urun_id = g('urun_id');
$query = $db->prepare("SELECT *FROM urunler where urun_id = $urun_id ");
$query->execute(array());
$k = $query->fetch(PDO::FETCH_ASSOC);
$firm_name = $k['urun_firma'];

//-------------

$review = $db->prepare("SELECT *FROM reviews WHERE reviewed_product=?");
$review->execute(array($urun_id));
$r = $review->fetchALL(PDO::FETCH_ASSOC);
$rCount = $review->rowCount();

?>
<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#sRecommendations" data-toggle="tab">Seller Recommendations</a></li>
<!--            <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>-->
<!--            <li><a href="#tag" data-toggle="tab">Tag</a></li>-->
            <li><a href="#reviews" data-toggle="tab">CUSTOMER REVIEWS <span
                            id="reviewCounter">(<?php echo $rCount ?>)</span></a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="sRecommendations">
            <?php
            $sellerProduct = $db->prepare("SELECT *FROM urunler where urun_firma='$firm_name' and urun_id NOT IN ('$urun_id')");
            $sellerProduct->execute(array());
            $pr = $sellerProduct->fetchALL(PDO::FETCH_ASSOC);
            $count = $sellerProduct->rowCount();
            if ($count > 0) {
                foreach ($pr as $sellerProducts) {
                    ?>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="<?php echo $sellerProducts['urun_resim'] ?>"
                                         alt="<?php echo $sellerProducts['urun_title'] ?>"/>
                                    <h2><?php echo parayaz($sellerProducts['urun_fiyat']) ?></h2>
                                    <p><?php echo $sellerProducts['urun_title'] ?></p>
                                    <?php if (@$_SESSION) {
                                        ?>
                                        <button product-id="<?php echo $sellerProducts['urun_id'] ?>"
                                                class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>
                                            Add
                                            to cart
                                        </button>
                                        <?php
                                    } ?>
                                    <a href="?islem=pDetails&urun_id=<?php echo $sellerProducts['urun_id'] ?>"
                                       class="btn btn-default read-more"><i class="fa fa-external-link"></i> Read
                                        More</a>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php }
            } else {
                ?>
                <div class="alert alert-warning text-center" style="margin-top: 10px">Seller has not other products
                    yet.
                </div>
                <?php
            } ?>
        </div>

<!--        <div class="tab-pane fade" id="companyprofile">-->
<!--            <div class="col-sm-3">-->
<!--                <div class="product-image-wrapper">-->
<!--                    <div class="single-products">-->
<!--                        <div class="productinfo text-center">-->
<!--                            <img src="images/home/gallery3.jpg" alt=""/>-->
<!--                            <h2>$56</h2>-->
<!--                            <p>Easy Polo Black Edition</p>-->
<!--                            <button type="button" class="btn btn-default add-to-cart"><i-->
<!--                                        class="fa fa-shopping-cart"></i>Add to cart-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-3">-->
<!--                <div class="product-image-wrapper">-->
<!--                    <div class="single-products">-->
<!--                        <div class="productinfo text-center">-->
<!--                            <img src="images/home/gallery2.jpg" alt=""/>-->
<!--                            <h2>$56</h2>-->
<!--                            <p>Easy Polo Black Edition</p>-->
<!--                            <button type="button" class="btn btn-default add-to-cart"><i-->
<!--                                        class="fa fa-shopping-cart"></i>Add to cart-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-3">-->
<!--                <div class="product-image-wrapper">-->
<!--                    <div class="single-products">-->
<!--                        <div class="productinfo text-center">-->
<!--                            <img src="images/home/gallery4.jpg" alt=""/>-->
<!--                            <h2>$56</h2>-->
<!--                            <p>Easy Polo Black Edition</p>-->
<!--                            <button type="button" class="btn btn-default add-to-cart"><i-->
<!--                                        class="fa fa-shopping-cart"></i>Add to cart-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

<!--        <div class="tab-pane fade" id="tag">-->
<!--            <div class="col-sm-3">-->
<!--                <div class="product-image-wrapper">-->
<!--                    <div class="single-products">-->
<!--                        <div class="productinfo text-center">-->
<!--                            <img src="images/home/gallery1.jpg" alt=""/>-->
<!--                            <h2>$56</h2>-->
<!--                            <p>Easy Polo Black Edition</p>-->
<!--                            <button type="button" class="btn btn-default add-to-cart"><i-->
<!--                                        class="fa fa-shopping-cart"></i>Add to cart-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-3">-->
<!--                <div class="product-image-wrapper">-->
<!--                    <div class="single-products">-->
<!--                        <div class="productinfo text-center">-->
<!--                            <img src="images/home/gallery2.jpg" alt=""/>-->
<!--                            <h2>$56</h2>-->
<!--                            <p>Easy Polo Black Edition</p>-->
<!--                            <button type="button" class="btn btn-default add-to-cart"><i-->
<!--                                        class="fa fa-shopping-cart"></i>Add to cart-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-3">-->
<!--                <div class="product-image-wrapper">-->
<!--                    <div class="single-products">-->
<!--                        <div class="productinfo text-center">-->
<!--                            <img src="images/home/gallery3.jpg" alt=""/>-->
<!--                            <h2>$56</h2>-->
<!--                            <p>Easy Polo Black Edition</p>-->
<!--                            <button type="button" class="btn btn-default add-to-cart"><i-->
<!--                                        class="fa fa-shopping-cart"></i>Add to cart-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-sm-3">-->
<!--                <div class="product-image-wrapper">-->
<!--                    <div class="single-products">-->
<!--                        <div class="productinfo text-center">-->
<!--                            <img src="images/home/gallery4.jpg" alt=""/>-->
<!--                            <h2>$56</h2>-->
<!--                            <p>Easy Polo Black Edition</p>-->
<!--                            <button type="button" class="btn btn-default add-to-cart"><i-->
<!--                                        class="fa fa-shopping-cart"></i>Add to cart-->
<!--                            </button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <div class="tab-pane fade " id="reviews">
            <div class="col-sm-12 rForm">
                <?php
                if ($rCount) {
                    foreach ($r as $reviews) {
                        ?>
                        <ul>
                            <li><a><i class="fa fa-user"></i><?php echo $reviews['review_author'] ?></a></li>
                            <li><a><i
                                            class="fa fa-clock-o"></i><?php echo substr($reviews['review_time'], 11) ?>
                                </a></li>
                            <li><a><i
                                            class="fa fa-calendar-o"></i><?php echo substr($reviews['review_time'], 0, 10) ?>
                                    &nbsp;|</a></li>
                            <!--                            Rating Stars-->
                            <li>
                                <a>
                                    <?php for ($i = 0; $i < $reviews['review_rate']; $i++) { ?>
                                        <i style="margin: -5px!important;" class="fa fa-star"></i>
                                    <?php }
                                    $totalStar = 5;
                                    $emptyStar = $totalStar - $i;
                                    for ($k= 0;$k<$emptyStar;$k++){
                                    ?>
                                    <i style="margin: -5px!important;" class="fa fa-star-o"></i>
                                    <?php } ?>
                                </a>
                            </li>
                            <!--                            /Rating Starts-->
                        </ul>
                        <p><?php echo $reviews['review_content'] ?></p>
                        <?php
                    }
                } else {
                    ?>
                    <div class="alert alert-warning">There is not review yet.</div>
                    <?php
                } ?>
                <hr class="separator"/>
                <br>
                <p><b>Write Your Review</b></p>
                <div id="reviewAlert"></div>
                <form id="reviewForm">
                    <span>
                        <input type="text" placeholder="Your Name" name="review_author" autocomplete="off"/>
                        <input type="email" placeholder="Email Address" name="review_email" autocomplete="off"/>
                    </span>
                    <textarea placeholder="Your Review" name="review_content"></textarea>
                    <!--                    Rating stars-->
                    <div class="rate">
                        <input type="radio" id="star5" name="review_rate" value="5"/>
                        <label for="star5" title="5 stars">5 stars</label>
                        <input type="radio" id="star4" name="review_rate" value="4"/>
                        <label for="star4" title="4 stars">4 stars</label>
                        <input type="radio" id="star3" name="review_rate" value="3"/>
                        <label for="star3" title="3 stars">3 stars</label>
                        <input type="radio" id="star2" name="review_rate" value="2"/>
                        <label for="star2" title="2 stars">2 stars</label>
                        <input type="radio" id="star1" name="review_rate" value="1" checked/>
                        <label for="star1" title="1 star">1 star</label>
                    </div>
                    <!--                    /Rating stars-->
                    <input type="hidden" name="reviewed_product" value="<?php echo $urun_id ?>">
                    <button type="button" class="btn btn-default pull-right" id="reviewBtn">
                        Submit
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>