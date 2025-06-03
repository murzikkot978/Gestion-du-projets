<?php
get_header()
$projets = new WP_Query([
    'post_type'      => 'projets',
    'posts_per_page' => -1,
    'meta_key'       => 'date_de_realisation',
    'orderby'        => 'meta_value',
    'order'          => 'ASC',
]);
?>

<div>
    <h1>Nos Projets</h1>

    <?php if ($projets->have_posts()) : ?>
        <div>
            <?php while ($projets->have_posts()) : $projets->the_post(); ?>
                <div class="flex">
                    <?php if ($img = get_field('image_projet')) : ?>
                        <img src="<?= esc_url($img); ?>" alt="">
                    <?php endif; ?>

                    <p>Date : <?= get_field('date_de_realisation'); ?></p>

                    <?php if ($lien = get_field('lien_projet')) : ?>
                        <p><a href="<?= esc_url($lien); ?>" target="_blank">Voir le projet</a></p>
                    <?php endif; ?>

                    <?php if ($cat = get_field('categorie_du_projet')) : ?>
                        <p>Catégorie : <?= esc_html($cat); ?></p>
                    <?php endif; ?>

                    <p><?= get_field('description_du_projet'); ?></p>
                    
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>Aucun projet trouvé.</p>
    <?php endif; ?>
</div>
<?php
get_footer();?>