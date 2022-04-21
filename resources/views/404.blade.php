@extends('layouts.app')

@section('header')
  @include('sections.navigation.main-navigation')
@endsection

@section('content')
  @if (! have_posts())
    @include('partials.content-404')
  @endif
@endsection
