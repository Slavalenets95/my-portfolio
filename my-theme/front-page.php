<?php get_header() ?>

<main class="main">
    <?php if(have_rows('constructor')) : ?>
        <?php while(have_rows('constructor')) { the_row();
            $templateName = get_row_layout();
            get_template_part('template-parts/' . $templateName);
        }
        ?>
    <?php endif ?>
</main>

<?php get_footer() ?>
