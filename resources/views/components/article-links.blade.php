@php
  $nextPost = get_next_post();
  $prevPost = get_previous_post();
@endphp

@if ( !null !== $prevPost && !empty($prevPost) )
<x-magazine-article-real :article='$prevPost'/>
@endif
@if ( !null !== $nextPost && !empty($nextPost ) )
<x-magazine-article-real :article='$nextPost' class="last:border-b-0"/>
@endif
