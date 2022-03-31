@props(['article'])

<a href="{{ the_permalink( $article->ID ) }}" {{ $attributes->merge(['class' => 'vigia-magazine-article p-5 border-b-3 border-black transition-all duration-medium hover:bg-black hover:text-white block ']) }}>
  <div class="text-base text-center lg:text-lg mx-auto sm:max-w-md lg:max-w-none">{{ the_field( 'number', $article->ID ) }}. {{ $article->post_title }} </div>
  <div class="text-sm text-center lg:text-base mx-auto sm:max-w-md lg:max-w-none">{{ the_field( 'author', $article->ID ) }}</div>
</a>
