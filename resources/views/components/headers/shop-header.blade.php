@php
  $cart = WC()->cart;
  $totals = $cart->get_totals()['total']
@endphp

<x-headers.simple-header>
  <span class="cart-customlocation after:content-['→'] after:relative after:ml-1" ><span class="vigia-totals">{!! WC()->cart->get_cart_total(); !!}{{ __( ' CHF, Kasse', 'vigia' ) }}</span>
</x-headers.simple-header>
