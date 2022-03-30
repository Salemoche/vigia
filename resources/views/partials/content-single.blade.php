<x-article-edition/>
<article class="vigia-inner" @php(post_class())>
  <x-headers.article-header/>
  @php(the_content())
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  {{-- @php(comments_template()) --}}
<article>
