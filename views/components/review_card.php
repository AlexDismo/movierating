<?php
/**
 * @var \App\Models\Review $review
 */
?>

<div class="">
    <div class="">
        User: <?php echo $review->user()->name() ?>
    </div>
    <div class="">
        <blockquote class="">
            <p><?php echo $review->comment() ?></p>
            <footer class="">Rate <span class=""><?php echo $review->rating() ?></span></footer>
        </blockquote>
    </div>
</div>