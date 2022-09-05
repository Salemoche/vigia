@php
  $cart = WC()->cart;
  $totals = $cart->get_totals()['total']
@endphp

<x-headers.simple-header>
  <span class="cart-customlocation vigia-after-arrow vigia-after-arrow-right vigia-after-arrow-hover after:ml-1 lg:after:translate-y-0.5" ><span class="vigia-totals">{!! WC()->cart->get_cart_total(); !!}{{ __( ', Kasse', 'vigia' ) }}</span>
</x-headers.simple-header>
