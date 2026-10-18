<?php
$page = get_page_by_path('home', OBJECT, 'page');
$label = get_field('portfolio_label', $page) ?? '';
$title = get_field('portfolio_title', $page) ?? '';
$descr = get_field('portfolio_descr', $page) ?? '';

$cabins = new WP_Query([
	'post_type' => 'portfolio',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'post_status' => 'publish'
]);
?>
<section class="section portfolio" id="portfolio">
	<div class="container portfolio__container">
		<?php get_template_part('partials/section-header', null, [
			'label' => $label,
			'title' => $title,
			'descr' => $descr
		]); ?>
	</div>
	<div class="container portfolio__slider">
		<div class="swiper portfolio-swiper"
			data-swiper='{ "slidesPerView": 1, "spaceBetween": 20, "rewind": true, "breakpoints": { "768": { "slidesPerView": 2 }, "1024": { "slidesPerView": 3 } } }'>
			<div class="swiper-wrapper portfolio-swiper__wrapper">
				<?php while ($cabins->have_posts()):
					$cabins->the_post();
					$image_id = get_post_thumbnail_id();
					?>
					<div class="swiper-slide portfolio-slide">
						<div class="portfolio-slide__wrapper card-box">
							<?php if ($image_id): ?>
								<a class="portfolio-slide__image image-box"
									href="<?php echo esc_url(wp_get_attachment_image_url($image_id, 'full')); ?>"
									data-fancybox="portfolio-gallery">
									<?php echo wp_get_attachment_image($image_id, 'medium_large', false, ['alt' => get_the_title(), 'class' => 'img']); ?>
								</a>
							<?php endif; ?>
							<h3 class="portfolio-slide__title visually-hidden">
								<?php the_title(); ?>
							</h3>
						</div>
					</div>
				<?php endwhile;
				wp_reset_postdata(); ?>
			</div>
		</div>

		<div class="portfolio-swiper__btn-box swiper-btn-box">
			<button class="swiper-btn swiper-btn__prev portfolio-swiper__btn portfolio-swiper__btn-prev" type="button"
				aria-label="Назад" data-swiper-btn-prev=".portfolio-swiper"></button>
			<button class="swiper-btn swiper-btn__next portfolio-swiper__btn portfolio-swiper__btn-next" type="button"
				aria-label="Вперёд" data-swiper-btn-next=".portfolio-swiper"></button>
		</div>
	</div>
</section>