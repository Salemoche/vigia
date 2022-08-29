@props([ 'url' => get_permalink( wc_get_page_id( 'checkout' ) ) ])

<div class="w-full border-black border-b-3 //order-1 //lg:order-2">
  <a
    href="{{ $url }}"
    {{ $attributes->merge(['class' =>
      'vigia-simple-header
      group
      flex
      items-center
      justify-center
      border-black
      max-w-screen-3xl
      //bs-todo3xl:border-x-3
      mx-auto
      text-base
      lg:text-lg
      p-2.5
      text-center
      relative
      block
      transition-color
      duration-medium
      hover:bg-black
      hover:text-white
      3xl:border-x-3
      bg-white'
    ])}}
  >
    {{ $slot }}
  </a>

</div>
