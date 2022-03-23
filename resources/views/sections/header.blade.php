<header class="banner vigia-header">
  {{-- <a class="brand" href="{{ home_url('/') }}">
    {!! $siteName !!}
  </a> --}}

  @if (has_nav_menu('primary_navigation'))
    <nav class="nav-primary vigia-navigation lg:border-b-3 lg:border-t-0 w-full border-black" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
      {!! wp_nav_menu([
        'theme_location'  => 'primary_navigation',
        'menu_class'      => 'nav flex flex-row lg:flex-column flex-wrap lg:flex-nowrap max-w-screen-3xl mx-auto',
        'echo'            => false,
        'add_li_class'    => 'vigia-menu-item'
      ]) !!}
    </nav>
  @endif
</header>
