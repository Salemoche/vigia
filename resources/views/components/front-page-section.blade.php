@props(['magazine'])

<div class="section vigia-section h-screen lg:h-auto">
  <a href="{{ get_the_permalink($magazine->ID )}}">
    <x-image-slider :images="get_field( 'images', $magazine->ID )" />
  </a>
</div>
