<?php
    $title = get_sub_field('title');
    $sub_title = get_sub_field('sub_title');
    $link = get_sub_field('link');
?>

<div class="intro">
    <div class="container">
        <h1 class="intro__title wow slideInLeft"><?= $title ?></h1>
        <span class="intro__sub-title"><?= $sub_title ?></span>
        <a href="<?= $link['url'] ?>" class="intro__link bordered"><?= $link['title'] ?></a>
    </div>
</div>
