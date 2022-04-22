@props(['article'])

<div class="border-b-3 first:border-t-3 border-black block w-full">
  <div class="vigia-article-placeholder group relative mx-auto max-w-screen-3xl //bs-todo3xl:border-x-3 border-black transition-all duration-medium text-gray-dark text-center">
    <div class="p-5 transition-opacity duration-medium group-hover:opacity-0 mx-auto sm:max-w-md lg:max-w-none">
      <div class="text-base lg:text-lg">{{ $article['id'] }}. {{ $article['placeholder_title'] }} </div>
      <div class="text-sm lg:text-base">{{ $article['placeholder_author'] }}</div>
    </div>
    <a
      {{-- href="{{ wc_get_product( get_field( 'main_product' ) )->add_to_cart_url() }}" --}}
      href="{{ get_permalink( wc_get_page_id( 'shop' ) ) }}"
      target="_blank"
      class="p-5 absolute left-0 opacity-0 top-0 w-full z-50 pointer-events-none transition-opacity duration-medium group-hover:opacity-100 group-hover:pointer-events-auto group-hover:text-gray-dark left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 sm:max-w-md lg:max-w-none">
      <div class="text-base lg:text-lg">{{ __('Beitrag nicht online verfügbar', 'vigia') }} </div>
      <div {{-- class="after:bg-arrow-up-right-gray after:w-3 after:h-3 after:inline-block" --}} >
        {{ __('zum Shop', 'vigia') }}
      </div>
    </a>
</div>
</div>

