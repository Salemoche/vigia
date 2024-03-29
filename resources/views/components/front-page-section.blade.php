@props(['magazine'])

<div
  class="section vigia-section vigia-front-page-section h-screen //bs-todolg:h-auto only:h-screen lg:only:h-screen-minus-nav first:pt-15 first:lg:pt-0"
  style="
    background: {{ get_field('color', $magazine->ID) }};
    background: radial-gradient(circle, {{ get_field('color', $magazine->ID) }} 0%, {{ get_field('color', $magazine->ID) }} 20%, rgba(255,255,255,1) 100%);
    transition: background 600ms;
  "
>
  <a class="vigia-magazine-link flex items-center justify-center w-full h-full" href="{{ get_the_permalink($magazine->ID )}}">
    {{-- <x-image-slider :images="get_field( 'images', $magazine->ID )" /> --}}
      <h2 class="text-center text-2xl 3xl:text-3xl text-white">{{ get_field( 'home_title', $magazine->ID) }}</h2>
  </a>
</div>
