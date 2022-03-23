

@foreach ( get_the_terms( $post, 'category' ) as $term )
  @if ( $term->parent === 26 )
    @php ( $magazine_name = $term->name )
  @endif
@endforeach
@if ( $magazine_name )
  <div class="text-center p-5 border-b-3 border-black w-full text-base lg:text-lg">
    {{ $magazine_name }}
  </div>
@endif
