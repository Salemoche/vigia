{{--
  Template Name: Custom Template
--}}

@extends('layouts.app')

@section('header')
  @include('sections.navigation.main-navigation')
@endsection

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @include('partials.content-page')
  @endwhile
@endsection
