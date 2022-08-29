@props(['images'])
  <div {{ $attributes->merge(['class' => 'vigia-slider swiper h-full ']) }}>
  <div class="swiper-wrapper">
    @foreach ( $images as $image )
      <div class="swiper-slide bg-black">
        {!! wp_get_attachment_image( $image['ID'], 'full', '', [ 'class' => 'w-full h-full object-cover lg:object-contain 2xl:object-cover' ] ) !!}
      </div>
    @endforeach
  </div>
</div>
