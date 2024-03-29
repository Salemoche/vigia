<header class="banner vigia-header top-0 lg:top-unset //bs-todo3xl:border-y-3 border-t-3 border-black">
  {{-- <a class="brand" href="{{ home_url('/') }}">
    {!! $siteName !!}
  </a> --}}

  @if (has_nav_menu('primary_navigation'))
    <nav class="nav-primary vigia-navigation mx-auto lg:border-b-3 lg:border-t-0 w-full //order-2 //lg:order-1 //bs-todo3xl:border-x-33xl:border-b-0 border-black" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
      {!! wp_nav_menu([
        'theme_location'  => 'primary_navigation',
        'menu_class'      => 'nav flex flex-row lg:flex-column flex-wrap lg:flex-nowrap max-w-screen-3xl mx-auto 3xl:border-l-3 border-black',
        'echo'            => false,
        'add_li_class'    => 'vigia-menu-item border-black overflow-hidden'
      ]) !!}
    </nav>
  @endif
  @yield('subheader')
</header>
