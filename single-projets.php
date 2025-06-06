<?php

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

                <div class="p-8 w-full flex flex-col justify-center">
                    <p class="text-3xl font-bold"><?= get_the_title(); ?></p>
                    <p>Date : <?= get_field('date_de_realisation'); ?></p>
                    
                    <?php if ($cat = get_field('categorie_du_projet')) : ?>
                        <p>Catégorie : <span><?= esc_html($cat); ?></span></p>
                    <?php endif; ?>

                    <p><?= get_field('description_du_projet'); ?></p>

                    <?php if ($lien = get_field('lien_projet')) : ?>
                        <a href="<?= esc_url($lien); ?>" target="_blank" class=" bg-primary text-white rounded-full">
                            Voir le projet
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    <?php endwhile;
else : ?>
    <p class="text-center text-gray-500 mt-16">Aucun projet trouvé.</p>
<?php endif;
get_footer();