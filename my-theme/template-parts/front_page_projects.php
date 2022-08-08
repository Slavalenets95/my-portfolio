<?php
    $title = get_sub_field('title');
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 5,
        'orderby'        => 'date',
        'order'          => 'ASC',
    );
    $query = new WP_Query($args);
    $max_pages = $query->max_num_pages;
    ?>

<div class="projects">
    <div class="container">
        <h2 class="projects__title title" id="my-projects"><span class="bordered"><?= $title ?></span></h2>
        <?php if($query->have_posts()) : ?>
            <div class="projects-items wow slideInLeft" data-wow-offset="300">
            <?php while($query->have_posts()) : $query->the_post(); ?>
                <div class="project-item">
                    <div class="project-item__img-block">
                        <div class="project-item__slider">
                            <?php if(get_field('img_repeater')) : ?>
                                <?php foreach(get_field('img_repeater') as $item) : ?>
                                    <div class="project-item__slide">
                                        <img data-lazy="<?= $item['img']['url'] ?>" alt="<?= get_img_alt($item['img']) ?>" class="project-item__slide-img">
                                    </div>
                                <?php endforeach ?>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="project-item__content-block">
                        <h3 class="project-item__title"><?php the_title() ?></h3>
                        <div class="project-item__content">
                            <?php the_content() ?>
                        </div>
                        <?php if(get_field('link')) : ?>
                            <div><a href="<?= get_field('link') ?>" class="project-item__link bordered">Посмотреть</a></div>
                        <?php endif ?>
                        <?php if(get_field('github')) : ?>
                            <div>
                                <a href="<?= get_field('github') ?>" class="project-item__github-link bordered">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 0v24h24v-24h-24zm14.534 19.59c-.406.078-.534-.171-.534-.384v-2.195c0-.747-.262-1.233-.55-1.481 1.782-.198 3.654-.875 3.654-3.947 0-.874-.311-1.588-.824-2.147.083-.202.357-1.016-.079-2.117 0 0-.671-.215-2.198.82-.639-.18-1.323-.267-2.003-.271-.68.003-1.364.091-2.003.269-1.528-1.035-2.2-.82-2.2-.82-.434 1.102-.16 1.915-.077 2.118-.512.56-.824 1.273-.824 2.147 0 3.064 1.867 3.751 3.645 3.954-.229.2-.436.552-.508 1.07-.457.204-1.614.557-2.328-.666 0 0-.423-.768-1.227-.825 0 0-.78-.01-.055.487 0 0 .525.246.889 1.17 0 0 .463 1.428 2.688.944v1.489c0 .211-.129.459-.528.385-3.18-1.057-5.472-4.056-5.472-7.59 0-4.419 3.582-8 8-8s8 3.581 8 8c0 3.533-2.289 6.531-5.466 7.59z"/></svg>
                                    Посмотреть на github
                                </a>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            <?php endwhile ?>
            </div>
            <?php if($max_pages > 1) : ?>
                <button class="projects__show-more bordered" type="button" data-max-page="<?= $max_pages ?>" data-current-page="1">Показать больше</button>
            <?php endif ?>
            <?php wp_reset_postdata() ?>
        <?php endif ?>
    </div>
</div>
