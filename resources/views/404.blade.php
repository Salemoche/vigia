@extends('layouts.app')

@section('content')
  @if (! have_posts())
    @include('partials.content-404')
  @endif
@endsection
