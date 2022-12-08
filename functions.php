<?php

add_filter( 'woocommerce_coupon_is_valid', 'ms_disable_coupons_for_subscription_products', 10, 3 );
function ms_disable_coupons_for_subscription_products( $is_valid, $coupon, $discount ){
    foreach ( WC()->cart->get_cart() as $cart_item ) {
        if( in_array( $cart_item['data']->get_type(), array('subscription', 'subscription_variation') ) ) {
            $is_valid = false;
            break;
        }
    }
    return $is_valid;
}

?>
