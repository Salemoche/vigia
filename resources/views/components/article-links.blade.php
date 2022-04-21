@php
  // $nextPost = get_next_post();
  $nextPost = get_posts(array('posts_per_page' => 1, 'orderby' => 'rand', 'order' => 'ASC', 'post_type' => 'post'));
  // $prevPost = get_previous_post();
  $prevPost = get_posts(array('posts_per_page' => 1, 'orderby' => 'rand', 'order' => 'ASC', 'post_type' => 'post'));

@endphp

@if ( !null !== $prevPost[0] && !empty($prevPost[0]) )
<x-magazine-article-real :article='$prevPost[0]'/>
@endif
@if ( !null !== $nextPost[0] && !empty($nextPost[0] ) )
<x-magazine-article-real :article='$nextPost[0]' class="last:border-b-0"/>
@endif
