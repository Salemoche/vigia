<?php

/** =============================================
*
*   Footnotes block
*
*   @package UZHxUNIGE
*
* ============================================= */

$repeaterArray = $block['data'];
$footnotes = [];
$index = 1;

foreach ($repeaterArray as $key => $repeaterValue) {
    // if ( !str_contains($key, '_footnotes') && str_contains($key, '_')) {
    if ( preg_match( '/^footnotes_\d_footnote/' , $key) ) {
        array_push( $footnotes, $repeaterValue );
    }
}
?>

<div class="vigia-footnotes mb-5 lg:mb-10 max-w-3xl">
    <?php foreach ($footnotes as $footnote) : ?>
        <div id="<?php echo $index ?>"class="vigia-footnote">
            <span><?php echo $index;?></span>
            <?php echo $footnote; ?>
        </div>
    <?php $index++; endforeach; ?>
</div>
