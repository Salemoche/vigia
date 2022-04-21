

{{-- @foreach ( get_the_terms( $post, 'category' ) as $term )
  @if ( $term->parent === 26 )
    @php ( $magazine_name = $term->name )
  @endif
@endforeach --}}
<header class="banner vigia-header top-0 lg:top-unset 3xl:border-y-3 border-black">
  {{-- <a class="brand" href="{{ home_url('/') }}">
    {!! $siteName !!}
  </a> --}}

  @if (has_nav_menu('primary_navigation'))
    <nav class="nav-primary vigia-navigation mx-auto max-w-screen-3xl lg:border-b-3 lg:border-t-0 w-full  //bs-todo3xl:border-x-3 3xl:border-b-0 border-black" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
      {!! wp_nav_menu([
        'theme_location'  => 'primary_navigation',
        'menu_class'      => 'nav flex flex-row lg:flex-column flex-wrap lg:flex-nowrap max-w-screen-3xl mx-auto',
        'echo'            => false,
        'add_li_class'    => 'vigia-menu-item border-black'
      ]) !!}
    </nav>
  @endif

  @if ( !empty( get_field( 'linked_magazine' ) ) )
    <div class="inline-block w-full border-b-3 border-black">
      <a href="{{ get_field( 'linked_magazine' )->url }}" class="block after:hidden text-center mx-auto w-full px-5 py-2.5 border-black max-w-screen-3xl //bs-todo3xl:border-x-3 text-base lg:text-lg transition-colors duration-medium hover:text-white hover:bg-black" >
        {{ get_field( 'linked_magazine' )->post_title }}
      </a>
    </div>
  @endif
</header>
