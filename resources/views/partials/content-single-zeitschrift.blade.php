<div class=""  @php(post_class())>
  <x-headers.magazine-header/>
  <div class="w-full">
    @foreach ( get_field( 'articles' ) as $article)
      @if ( $article['article'] )
        <x-magazine-article-real :article='$article' />
      @else
        <x-magazine-article-placeholder :article='$article' />
      @endif
    @endforeach
  </div>
</div>
