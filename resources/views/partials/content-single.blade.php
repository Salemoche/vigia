<x-article-edition/>
<article class="vigia-inner p-5 lg:p-10 mt-10 lg:mt-10 mb-5" @php(post_class())>
  <x-article-header/>
  @php(the_content())
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  {{-- @php(comments_template()) --}}
<article>
