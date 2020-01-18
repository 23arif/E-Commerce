<?php
if (@$total_count > 0) {
?>
<header>
    <title>Checkout - AlikExpress</title>
</header>
<section id="cart_items">
    <div class="container">
        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-6 clearfix">
                    <div class="bill-to">
                        <p>Bill To</p>
                        <div class="form-one">
                            <form id="customerInfo">
                                <input class="order-messageForm" type="text" id="customerFirstName"
                                       name="customerFirstName" placeholder="First Name *">
                                <input class="order-messageForm" type="text" name="customerLastName"
                                       placeholder="Last Name *">
                                <input class="order-messageForm" type="text" name="customerEmail" placeholder="Email*">
                                <input class="order-messageForm" type="text" name="customerAddress1"
                                       placeholder="Address 1 *">
                                <input class="order-messageForm" type="text" name="customerAddress2"
                                       placeholder="Address 2">

                            </form>
                        </div>
                        <div class="form-two">
                            <form id="customerInfo2">
                                <input class="order-messageForm" type="text" name="customerZip"
                                       placeholder="Zip / Postal Code *">
                                <select class="order-messageForm" name="customerCountry">
                                    <option value="">-- Country --</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="United States">United States</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="UK">UK</option>
                                    <option value="India">India</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Ucrane">Ucrane</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Dubai">Dubai</option>
                                </select>
                                <select class="order-messageForm" name="customerState">
                                    <option value="">-- State / Province / Region --</option>
                                    <option value="Baku">Baku</option>
                                    <option value="Moscow">Moscow</option>
                                    <option value="Tbilisi">Tbilisi</option>
                                    <option value="United States">United States</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="UK">UK</option>
                                    <option value="India">India</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Ucrane">Ucrane</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Dubai">Dubai</option>
                                </select>
                                <input class="order-messageForm" type="text" name="customerPhone" placeholder="Phone *">
                                <input class="order-messageForm" type="text" name="customerMobile"
                                       placeholder="Mobile Phone">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="order-message">
                        <p>Shipping Order</p>
                        <textarea class="order-messageForm" name="customerNotes"
                                  placeholder="Notes about your order, Special Notes for Delivery"
                                  rows="16"></textarea>
                    </div>
                </div>
                </form>

            </div>
        </div>

        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

        <div class="table-responsive cart_info" id="pMovingCtrl">
            <!--#pMovingCtrl - Control page moving when clicking on inc/decCount buttons and delete item button-->
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Product</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?php
                global $shopping_products;
                foreach ($shopping_products as $product) {
                    ?>
                    <tr>
                        <td class="cart_product">
                            <a href=""><img height="100" src="<?php echo $product->urun_resim ?>" alt=""></a>
                        </td>
                        <td class="cart_description" style="padding-left: 20px!important;">
                            <h4><a href=""><?php echo $product->urun_title ?></a></h4>
                        </td>
                        <td class="cart_price">
                            <p><?php echo parayaz($product->urun_fiyat) ?></p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up"
                                   href="index.php?p=incCountCheckOut&product_id=<?php echo $product->urun_id ?>">
                                    + </a>

                                <input class="cart_quantity_input" type="text" name="quantity"
                                       value="<?php echo $product->count ?>"
                                       autocomplete="off"
                                       size="2">

                                <a class="cart_quantity_down"
                                   href="index.php?p=decCountCheckOut&product_id=<?php echo $product->urun_id ?>">
                                    - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price"><?php echo parayaz($product->total_price) ?></p>
                        </td>
                        <td class="cart_delete">
                            <button product-id='<?php echo $product->urun_id ?>' class="cart_quantity_delete"><i
                                        class="fa fa-times"></i></button>
                        </td>
                    </tr>

                    <?php
                }
                ?>
                <tr>
                    <td colspan="4">&nbsp;</td>
                    <td colspan="2">
                        <table class="table table-condensed total-result">
                            <tr class="shipping-cost">
                                <td>Shipping Cost</td>
                                <td>Free</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td><span><?php
                                        global $total_price;
                                        echo parayaz($total_price) ?></span></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="payment-options">
            <form id="customerInfo3">
                <span>
						<label><input checked="checked" type="radio" name="paymentType" value="Direct Bank Transfer"> Direct Bank Transfer</label>
					</span>
                <span>
						<label><input type="radio" name="paymentType" value="Check Payment"> Check Payment</label>
					</span>
                <span>
						<label><input type="radio" name="paymentType" value="Paypal"> Paypal</label>
					</span>
            </form>
            <div class="btn btn-lg pull-right" id="checkoutBtn"><i class="fa fa-credit-card"></i>&nbsp;&nbsp;Checkout
            </div>
        </div>

    </div>
</section> <!--/#cart_items-->
<?php }else{
    header("location:?islem=cart");

} ?>