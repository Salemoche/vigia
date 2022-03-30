@props(['article'])

<a href="{{ the_permalink( $article['article']->ID ) }}" class="vigia-magazine-article p-5 border-b-3 border-black transition-all duration-medium hover:bg-black hover:text-white block">
  <div class="text-base text-center lg:text-lg">{{ $article['id'] }}. {{ $article['article']->post_title }} </div>
  <div class="text-sm text-center lg:text-base">{{ the_field( 'author', $article['article']->ID ) }}</div>
</a>
