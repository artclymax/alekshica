<?php
$page = 'options';

$title = get_field('page_404_title', $page) ?? get_the_title();
$descr = get_field('page_404_descr', $page) ?? '';
$btn = get_field('page_404_btn', $page) ?? '';
$image = get_field('page_404_image', $page) ?? '';
$image_404 = get_field('page_404_image_404', $page) ?? '';

?>
<section class="hero-404 jarallax" id="hero-404">
	<div class="container hero-404__container">
		<div class="hero-404__wrapper hero__content">
			<?php if ($image_404): ?>
				<div class="hero-404__404">
					<?php echo wp_get_attachment_image(
						$image_404['ID'],
						'large',
						false,
						array(
							'class' => 'img',
							'alt' => $image_404['alt'] ?: ''
						)
					); ?>
				</div>
			<?php endif; ?>
			<h1 class="hero-404__title title-2">
				<?php echo esc_html($title) ?>
			</h1>
			<div class="hero-404__descr descr">
				<?php echo wp_kses_post($descr) ?>
			</div>
			<a class="btn hero-404__btn" href="<?php echo esc_html($btn['url'] ?? '') ?>">
				<?php echo esc_html($btn['title'] ?? '') ?>
			</a>
		</div>
	</div>
	<?php if ($image): ?>
		<div class="hero-404__image image-box jarallax-img">
			<?php echo wp_get_attachment_image(
				$image['ID'],
				'large',
				false,
				array(
					'class' => 'img',
					'alt' => $image['alt'] ?: esc_html($title)
				)
			); ?>
		</div>
	<?php endif; ?>
</section>