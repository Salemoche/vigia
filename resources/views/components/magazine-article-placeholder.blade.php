@props(['article'])

<div class="group relative border-b-3 border-black transition-all duration-medium text-gray-dark text-center">
  <div class="p-5 transition-opacity duration-medium group-hover:opacity-0">
    <div class="text-base lg:text-lg">{{ $article['id'] }}. {{ $article['placeholder_title'] }} </div>
    <div class="text-sm lg:text-base">{{ $article['placeholder_author'] }}</div>
  </div>
  <a
    href="{{ wc_get_product( get_field( 'main_product' ) )->add_to_cart_url() }}"
    target="_blank"
    class="p-5 absolute left-0 opacity-0 top-0 w-full z-100 pointer-events-none transition-opacity duration-medium group-hover:opacity-100 group-hover:pointer-events-auto">
    <div class="text-base lg:text-lg">{{ __('Beitrag nicht online verfügbar', 'vigia') }} </div>
    <div class="after:content-['↑'] after:rotate-45 after:inline-block" >
      {{ sprintf( __( 'Nr. %1$s «%2$s» bestellen', 'vigia' ), get_field( 'number' ) ?: '', get_field( 'title_clean', get_field( 'main_product' )->ID) ?: '' ) }}
    </div>
  </a>
</div>
