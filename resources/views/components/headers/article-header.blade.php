<header class="flex flex-col items-center justify-center flex-wrap">
  <h1 class="basis-full text-lg lg:text-xl">{{ the_title() }}</h1>
  <div class="text-center basis-full">{{ the_field('subtitle') }}</div>
  <div class="text-center basis-full mb-5">
    {{-- <time>{{ get_the_date() }},</time> --}}
    <span>{{ __( 'von', 'vigia' ) }} </span><a href="#author" class="scroll-to-author text-black no-underline vigia-after-arrow vigia-after-arrow-down after:ml-1">{{ the_field('author') }}</a>
  </div>
  @if ( !empty( get_field('order_buttons') ) )
    @foreach ( get_field('order_buttons') as $button )
      <x-button-order :product="$button['produkt']"/>
    @endforeach
  @endif
</header>
