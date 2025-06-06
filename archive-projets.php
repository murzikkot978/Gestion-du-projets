<?php

get_header();

$categorie_filter = isset($_GET['categorie_du_projet']) && $_GET['categorie_du_projet'] ? (int)$_GET['categorie_du_projet'] : null;

$args = [
    'post_type'      => 'projets',
    'posts_per_page' => -1,
    'meta_key'       => 'date_de_realisation',
    'orderby'        => 'meta_value',
    'order'          => 'ASC',
];

if ($categorie_filter) {
    $args['meta_query'] = [
        [
            'key'   => 'categorie_du_projet',
            'value' => $categorie_filter,
        ]
    ];
}

$projets = new WP_Query($args);

$categories = get_terms([
    'taxonomy'   => 'categorie',
    'hide_empty' => false,
]);
?>

<main class="pt-[100px]">
    <div class="container px-[20px]">
        <p class="w-full text-center text-[20px] md:text-[40px] font-bold mb-8">
            Nos Projets
        </p>

        <form method="GET" class="mb-8 flex items-center justify-center">
            <label for="categorie_du_projet">Filtrer par catégorie :</label>
            <select name="categorie_du_projet" id="categorie_du_projet" class="border rounded-l-md px-4 py-2 h-[24px]">
                <option value="">Toutes les catégories</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category->term_id ?>" <?= selected($categorie_filter, $category->term_id); ?>>
                        <?= esc_html($category->name); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit" class="bg-primary hover:bg-primary-700 text-white px-8 rounded-r-md h-[24px]">Filtrer</button>
        </form>

        <?php if ($projets->have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while ($projets->have_posts()) : $projets->the_post(); ?>
                    <a href="<?= esc_url(get_permalink()) ?>" class="flex flex-col items-center border rounded-xl">
                        <div class="relative">

                            <?php foreach ($categories as $category) : ?>
                                <?php if ($category->term_id === get_field('categorie_du_projet')) : ?>
                                     <p class="absolute text-white bg-primary rounded-xl px-8"><span><?= $category->name ?></span></p>
                                    <?php break; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <?php if ($img = get_field('image_projet')) : ?>
                                <img src="<?= esc_url($img); ?>" alt="" class="mb-4 rounded-t-lg object-cover">
                            <?php endif; ?>

                            <p class="text-sm text-gray-500 px-8">
                                Title : <?= get_the_title(); ?>
                            </p>

                            <p class="text-sm text-gray-500 mb-2 px-8">
                                Date : <?= get_field('date_de_realisation'); ?>
                            </p>

                        </div>
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