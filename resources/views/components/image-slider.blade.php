@props(['images'])
  <div {{ $attributes->merge(['class' => 'vigia-slider swiper h-full ']) }}>
  <div class="swiper-wrapper">
    @foreach ( $images as $image )
      <div class="swiper-slide">
        {!! wp_get_attachment_image( $image['ID'], 'full', '', [ 'class' => 'w-full h-full object-cover' ] ) !!}
      </div>
    @endforeach
  </div>
</div>
