<?php

$categories = get_terms([
    'taxonomy'   => 'categorie',
    'hide_empty' => false,
]);

get_header();

if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <main class="pt-[100px] px-[5vw]">
            <div class="rounded-xl shadow-lg overflow-hidden flex flex-col md:flex-row">
                <?php if ($img = get_field('image_projet')) : ?>
                    <div class="md:w-2/3">
                        <img src="<?= esc_url($img); ?>" alt="" class="w-full h-full object-cover md:rounded-l-xl">
                    </div>
                <?php endif; ?>

                <div class="px-8 w-full flex flex-col items-center">

                    <a href="<?= esc_url(get_field('lien_projet')); ?>" target="_blank">
                        <p class="text-[30px] font-bold mb-4 text-primary hover:underline"><?= get_the_title(); ?></p>
                    </a>

                    <div class="flex min:gap-[25px] w-full justify-around items-center mb-8">
                        <?php foreach ($categories as $category) : ?>
                            <?php if ($category->term_id === get_field('categorie_du_projet')) : ?>
                                <p>Catégorie : <span><?= $category->name ?></span></p>
                                <?php break; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <p>Date : <?= get_field('date_de_realisation'); ?></p>
                    </div>
                    
                    <p><?= get_field('description_du_projet'); ?></p>

                </div>
            </div>
        </main>
    <?php endwhile;
else : ?>
    <p class="text-center text-gray-500 mt-16">Aucun projet trouvé.</p>
<?php endif;
get_footer();