<article @php(post_class())>
  <header>
    <h1 class="entry-title">
      {{ __('Seite nicht gefunden', 'vigia')}}
    </h1>

    @includeWhen(get_post_type() === 'post', 'partials.entry-meta')
  </header>

  <div class="entry-summary">
    @php(the_excerpt())
  </div>
</article>
