<a class="sr-only focus:not-sr-only" href="#main">
  {{ __('Skip to content') }}
</a>

@yield('header')

@include('sections.loading')

<main id="main" class="main">
  <div class="vigia-content vigia-content-{{ get_post_type() }}">
    @yield('content')
  </div>
</main>

@hasSection('sidebar')
  <aside class="sidebar">
    @yield('sidebar')
  </aside>
@endif

{{-- @include('sections.footer') --}}
