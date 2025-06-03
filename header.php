<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-gray-900 antialiased'); ?>>

	<div id="page" class="">

		<div class="fixed top-0 bottom-0 left-0 right-0 z-20 w-full h-full transition-all duration-500 ease-out bg-white opacity-0 pointer-events-none overlay"></div>

		<?php get_template_part('template-parts/offcanvas', 'menu') ?>

		<header class="fixed z-30 w-full py-4 transition-all duration-300 header">
			<div class="container flex items-center justify-end m-auto  min-h-[100px] px-[5vw] bg-white">
				<a href="<?php echo home_url(); ?>" class="mr-auto">
					<?php
					if (get_field('logo', 'option')) {

						$attachment = get_field('logo', 'option');
						$attachment_attributes = ['class' => 'w-[clamp(200px,25vw,30vw)]'];
						echo get_img_element($attachment, 'large', $attachment_attributes);
					} else {
						get_template_part('template-parts/logo', null);
					}
					?>
				</a>

				<?php wp_nav_menu(
					array(
						'container_id'    => 'primary',
						'container_class' => 'hidden lg:block px-48 ',
						'menu_class'      => 'menu dropdown flex flex-wrap justify-end gap-x-48  gap-y-12 font-title',
						'theme_location'  => 'primary',
						'li_class'        => 'hover:text-primary',
						'fallback_cb'     => false,
					)
				); ?>

				<div class="burger-menu lg:hidden">
					<span class="bg-primary "></span>
					<span class="bg-primary"></span>
					<span class="bg-primary"></span>
				</div>
				<div class="reservation-link-container">
					<?
					if (get_field('reservation_link', 'option')) {
						$reservation_link = get_field('reservation_link', 'option'); ?>
						<a title="Réserver" target="_blank" href=<?= $reservation_link ?> class="reserver leading-normal transition-colors text-white bg-primary border-primary border-[2px] hover:bg-white hover:text-primary text-nowrap uppercase rounded-full py-8 px-16 mt-24 self-baseline"><?= __('Réserver', 'theme') ?><i class="fa-solid fa-chevron-right ml-8"></i></a>
					<? } ?>
				</div>
			</div>
		</header>

		<div id="content" class="site-content">
			<main>