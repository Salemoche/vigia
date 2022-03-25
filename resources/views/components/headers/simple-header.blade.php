@props([ 'url' => get_permalink( wc_get_page_id( 'checkout' ) ) ])

<a href="{{ $url }}" {{ $attributes->merge(['class' => 'flex items-center justify-center border-b-3 border-black text-base lg:text-lg p-2.5 text-center relative block transition-color duration-medium hover:bg-black hover:text-white']) }} >
  {{ $slot }}
</a>
