
@php
$post = get_post( wc_get_page_id( 'shop' ) );
@endphp

<div class="vigia-inner">
  {!! $post->post_content !!}
</div>
