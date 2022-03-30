@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @if (is_cart())
      <x-headers.cart-header/>
    @elseif (is_checkout())
      <x-headers.checkout-header/>
    @endif
    @includeFirst(['partials.content-page', 'partials.content'])
  @endwhile
@endsection
