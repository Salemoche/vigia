@extends('layouts.app')

@section('header')
  @include('sections.navigation.main-navigation')
@endsection

@section('content')
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-archive-' . get_post_type(), 'partials.content-archive'])
  @endwhile
@endsection
