

{{-- @foreach ( get_the_terms( $post, 'category' ) as $term )
  @if ( $term->parent === 26 )
    @php ( $magazine_name = $term->name )
  @endif
@endforeach --}}

@extends('sections.navigation.main-navigation')

@section('subheader')
  @if ( !empty( get_field( 'linked_magazine' ) ) )
  <div class="vigia-simple-header inline-block w-full border-b-3 border-black order-1">
    <a href="{{ get_permalink(get_field( 'linked_magazine' )->ID) }}" class="block after:hidden text-center mx-auto w-full px-5 py-2.5 border-black max-w-screen-3xl 3xl:border-x-3 text-base2 lg:text-lg transition-colors duration-medium hover:text-white hover:bg-black pointer-events-auto no-underline bg-white" >
      {{ get_field( 'linked_magazine' )->post_title }}
    </a>
  </div>
  @endif
@endsection
