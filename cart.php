<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <?php
        if ($total_count > 0) {
            ?>
            <div class="cartAlert alert alert-info text-center">You have <strong
                        class="cartSpecialText"><?php echo $total_count ?></strong> products in the cart
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($shopping_products as $product) {
                        ?>
                        <tr>
                            <td class="cart_product">
                                <a href=""><img src="<?php echo $product->urun_resim ?>" width="120" height="130" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4 style="padding-left: 60px"><a href=""><?php echo $product->urun_title ?></a></h4>
                            </td>
                            <td class="cart_price">
                                <p><?php echo parayaz($product->urun_fiyat) ?></p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a class="cart_quantity_up" href=""> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $product->count ?>"
                                           autocomplete="off"
                                           size="2">
                                    <a class="cart_quantity_down" href=""> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"><?php echo parayaz($product->total_price) ?></p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <div class="alert infoContainer">
                    <div>Total Products: <strong class="cartSpecialText"> <?php echo $total_count ?></strong></div>
                    <div>Total Price: <strong class="cartSpecialText"> <?php echo parayaz($total_price) ?> </strong>
                    </div>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="cartAlert alert alert-warning text-center">You have not any product in the cart
            </div>

            <?php
        }
        ?>

    </div>
</section> <!--/#cart_items-->