
@php
$post = get_post( wc_get_page_id( 'shop' ) );
@endphp

<div class="vigia-inner p-5 lg:p-10 mt-10 lg:mb-5">
  {!! $post->post_content !!}
</div>
