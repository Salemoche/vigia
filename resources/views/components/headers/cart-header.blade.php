@php
  $cart = WC()->cart;
  $totals = $cart->get_totals()['total']
@endphp

<x-headers.simple-header :url="get_permalink( wc_get_page_id( 'shop' ) )">
  <span class="vigia-before-arrow vigia-before-arrow-left vigia-before-arrow-hover before:mr-1 before:translate-y-0.5" > {{ __( 'Shop', 'woocommerce' ) }}</span>
</x-headers.simple-header>
