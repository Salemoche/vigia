<?php

/** =============================================
*
*   Footnotes block
*
*   @package UZHxUNIGE
*
* ============================================= */

// $repeaterArray = $block['data'];
$footnotes = $block['data'];
$index = 1;

// echo '<hr><pre class="sm-debug">';
// print_r($block['data']);
// echo '</pre><hr>';
// wp_die();
?>

<div class="vigia-footnotes">
    Footnotes
    <!-- < ?php foreach ($footnotes as $key => $footnote) :
        if ( intval($index) % 2 == 0) : ?>
        <div class="vigia-footnote">
            < ?php echo $index;?>
            < ?php echo $footnote; ?>
        </div>
    < ?php $index++; endif; endforeach; ?> -->
</div>
