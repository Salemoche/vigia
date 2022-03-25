@props(['product'])

<a
  href="{{ get_permalink( wc_get_page_id( 'shop' ) ) }}"
  {{-- href="/vigia/?add-to-cart={{  $product->ID }}" --}}
  {{-- target="_blank" --}}
  {{ $attributes->merge(['class' => 'vigia-button mx-auto mb-5 lg:mb-10 ']) }}
>
  {{ __( 'bestellen', 'vigia' )}}
</a>
