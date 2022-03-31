@props(['magazine'])

<div class="section vigia-section h-screen lg:h-auto only:h-screen lg:only:h-screen-minus-nav first:pt-15 first:lg:pt-0">
  <a class="vigia-magazine-link" href="{{ get_the_permalink($magazine->ID )}}">
    <x-image-slider :images="get_field( 'images', $magazine->ID )" />
  </a>
</div>
