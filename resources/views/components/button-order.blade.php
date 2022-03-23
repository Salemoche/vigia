@props(['product'])

<a
  href="{{ wc_get_product( $product->ID )->add_to_cart_url() }}"
  target="_blank"
  {{ $attributes->merge(['class' => 'vigia-button mx-auto mb-5 lg:mb-10 ']) }}
>
  {{ __( 'bestellen', 'vigia' )}}
</a>
