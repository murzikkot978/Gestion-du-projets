<?php

if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <div>
            <?php if ($img = get_field('image_projet')) : ?>
                <img src="<?= esc_url($img); ?>" alt="">
            <?php endif; ?>

            <p><?= get_field('description_du_projet'); ?></p>
            <p>Date : <?= get_field('date_de_realisation'); ?></p>

            <?php if ($lien = get_field('lien_projet')) : ?>
                <p><a href="<?= esc_url($lien); ?>" target="_blank">Voir le projet</a></p>
            <?php endif; ?>

            <?php if ($cat = get_field('categorie_du_projet')) : ?>
                <p>Catégorie : <?= esc_html($cat); ?></p>
            <?php endif; ?>
        </div>
    <?php endwhile;
else : ?>
    <p>Aucun projet trouvé.</p>
<?php endif;
