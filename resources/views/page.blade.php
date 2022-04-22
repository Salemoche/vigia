@extends('layouts.app')

@section('header')
  @if (is_cart())
    {{-- <x-headers.cart-header/> --}}
    @include('sections.navigation.cart-navigation')
  @elseif (is_checkout())
    {{-- <x-headers.checkout-header/> --}}
    @include('sections.navigation.checkout-navigation')
  @else
    @include('sections.navigation.main-navigation')
  @endif
@endsection

@section('content')
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-page', 'partials.content'])
  @endwhile
  <x-footer/>
@endsection
