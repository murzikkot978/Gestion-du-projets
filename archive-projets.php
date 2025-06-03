<?php

get_header();

$projets = new WP_Query([
    'post_type'      => 'projets',
    'posts_per_page' => -1,
    'meta_key'       => 'date_de_realisation',
    'orderby'        => 'meta_value',
    'order'          => 'ASC',
]);
?>

<main class="pt-[140px]">
    <div class="container px-[20px]">
        <p class="w-full text-center text-[20px] md:text-[40px] font-bold mb-8">
            Nos Projets
        </p>
        <?php if ($projets->have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while ($projets->have_posts()) : $projets->the_post(); ?>
                    <a href="<?= esc_url(get_permalink()) ?>" class="flex flex-col justify-center items-center border rounded-xl">
                        <?php if ($img = get_field('image_projet')) : ?>
                            <img src="<?= esc_url($img); ?>" alt="" class="mb-4 rounded-t-lg object-cover">
                        <?php endif; ?>
                        <p class="text-sm text-gray-500 mb-2">
                            Date : <?= get_field('date_de_realisation'); ?>
                        </p>
                        <p class="text-gray-700 text-base">
                            <?= get_field('description_du_projet'); ?>
                        </p>
                    </a>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p class="text-center text-gray-500 mt-16">
                Aucun projet trouvé.
            </p>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
?>