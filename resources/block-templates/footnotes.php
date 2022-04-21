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
    if ( preg_match( '/^[^_]\w+_\d_\w+$/' , $key) ) {
        array_push( $footnotes, $repeaterValue );
    }
}
?>

<div class="vigia-footnotes mb-5 lg:mb-10 sm:max-w-md lg:max-w-3xl">
    <?php foreach ($footnotes as $footnote) : ?>
        <div id="<?php echo $index ?>"class="vigia-footnote">
            <a href="#link-<?php echo $index ?>" class="inlne-block mr-5"><?php echo $index;?></a>
            <?php echo $footnote; ?>
        </div>
    <?php $index++; endforeach; ?>
</div>
