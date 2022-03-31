

{{-- @foreach ( get_the_terms( $post, 'category' ) as $term )
  @if ( $term->parent === 26 )
    @php ( $magazine_name = $term->name )
  @endif
@endforeach --}}
@if ( !empty( get_field( 'linked_magazine' ) ) )
  <a href="{{ get_field( 'linked_magazine' )->url }}" class="inline-block after:hidden text-center px-5 py-2.5 border-b-3 border-black w-full text-base lg:text-lg transition-colors duration-medium hover:text-white hover:bg-black" >
    {{ get_field( 'linked_magazine' )->post_title }}
  </a>
@endif
