@php
  // $cart = WC()->cart;
  // $totals = $cart->get_totals()['total']
@endphp

<x-headers.simple-header :url="wc_get_cart_url()">
  <span class="vigia-before-arrow vigia-before-arrow-left vigia-before-arrow-hover before:mr-1 before:translate-y-0.5" > {{ __( 'Cart', 'woocommerce' ) }}</span>
</x-headers.simple-header>
