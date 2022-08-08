<?php
$title = get_sub_field('title');
$content = get_sub_field('content');
$items = get_sub_field('items');
?>

<section class="skills">
    <div class="container">
        <h2 class="skills__title title" id="my-skills"><?= $title ?></h2>
        <div class="skills__content sd">
            <?= $content ?>
        </div>
        <div class="skills-items wow slideInRight" data-wow-offset="300" >
            <?php if($items && count($items)) : ?>
                <?php foreach($items as $item) : ?>
                    <div class="skills-item">
                        <img src="<?= $item['img']['url'] ?>" alt="<?= get_img_alt($item['img']) ?>" class="skills-item__img">
                        <h3 class="skills-item__title"><?= $item['title'] ?></h3>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</section>