<?php
/*
    Title: Hero slider
    Description: A carousel with multiple images and text
    Category: section
    Icon: layout
    Keywords: gallery carousel slider
*/

$hero_data = get_field("hero");

if ($hero_data) {

?>
    <div class="section">
        <div class="swiper w-screen h-[90vh] hero-swiper" data-config="hero-swiper">
            <div class="swiper-wrapper">
                <?
                foreach ($hero_data as $slide) {

                    $image = $slide['image_diaporama'];
                    $text = $slide['texte_diaporama']; ?>
                    <div class="swiper-slide">
                        <span class="swiper-text leading-normal font-title text-balance text-80 text-white absolute left-[105px] bottom-[132px]"><?= $text ?></span>
                        <img class="object-cover h-full w-full" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" />
                    </div>

                <? }  ?>

            </div>
            <div class="swiper-pagination absolute !right-48 !bottom-32 !left-[unset]"></div>
        </div>
    </div>
<? }  ?>