@php
  $cart = WC()->cart;
  $totals = $cart->get_totals()['total']
@endphp

<x-headers.simple-header :url="get_permalink( wc_get_page_id( 'shop' ) )">
  <span class="before:content-['←'] before:relative before:mr-1" > {{ __( 'Products', 'woocommerce' ) }}</span>
</x-headers.simple-header>
