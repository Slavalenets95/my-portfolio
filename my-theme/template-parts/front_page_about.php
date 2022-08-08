<?php
    $title = get_sub_field('title');
    $content = get_sub_field('content');
?>

<section class="about">
    <div class="container">
        <h2 class="about__title title" id="about-me"><?= $title ?></h2>
        <div class="about__content sd bordered">
            <?= $content ?>
        </div>
    </div>
</section>
