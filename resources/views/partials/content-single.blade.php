<x-article-edition/>
<article class="vigia-inner border-b-3 mb-0 border-black" @php(post_class())>
  <x-headers.article-header/>
  @php(the_content())
  {{-- <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer> --}}
  {{-- @php(comments_template()) --}}
</article>
<x-article-links/>
