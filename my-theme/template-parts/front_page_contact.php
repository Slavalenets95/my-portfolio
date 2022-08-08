<?php
$title = get_sub_field('title');
$content = get_sub_field('content');
$items = get_sub_field('items');
?>

<div class="contact">
    <div class="container">
        <h2 class="contact__title title" id="contact"><?= $title ?></h2>
        <div class="contact__content sd">
            <?= $content ?>
        </div>
        <?php if($items) : ?>
            <div class="contact-items">
                <?php foreach($items as $item) : ?>
                    <div class="contact-item">
                        <a href="<?= $item['link'] ?>" class="contact-item__link">
                            <?= $item['icon'] ?>
                            <?= $item['txt'] ?>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif ?>
        <div class="contact-form">
            <h3 class="contact-form__title">Либо вы можете отправить мне письмо заполнив форму ниже</h3>
            <?= do_shortcode('[contact-form-7 id="125" title="Связаться со мной"]') ?>
        </div>
    </div>
</div>
