@extends('layouts.app')

@section('header')
  @include('sections.navigation.front-navigation')
@endsection

@section('content')
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-front-page', 'partials.content-page', 'partials.content'])
  @endwhile
  <x-footer :fixed="true" />
@endsection
