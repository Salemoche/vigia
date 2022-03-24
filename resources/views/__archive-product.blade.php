@extends('layouts.app')

@section('content')
  <h1>hello, world</h1>
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-archive-' . get_post_type(), 'partials.content-archive'])
  @endwhile
@endsection
