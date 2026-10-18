<?php
$page = get_page_by_path('home', OBJECT, 'page');
$label = get_field('catalog_label', $page) ?? '';
$title = get_field('catalog_title', $page) ?? '';
$descr = get_field('catalog_descr', $page) ?? '';

$cabins = new WP_Query([
	'post_type' => 'cabin',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'post_status' => 'publish'
]);
?>

<?php if ($cabins->have_posts()): ?>
	<section class="section catalog" id="catalog">
		<div class="container catalog__container">
			<?php get_template_part('partials/section-header', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr
			]); ?>
		</div>

		<div class="container catalog__slider">
			<div class="swiper catalog-swiper"
				data-swiper='{ "slidesPerView": 1, "spaceBetween": 20, "rewind": true, "breakpoints": { "768": { "slidesPerView": 2 }, "1024": { "slidesPerView": 3 } } }'>
				<div class="swiper-wrapper catalog-swiper__wrapper">
					<?php while ($cabins->have_posts()):
						$cabins->the_post();
						$image_id = get_post_thumbnail_id();
						$price = get_field('price');
						$params = get_field('params') ?? [];
						?>
						<div class="swiper-slide catalog-slide">
							<div class="catalog-slide__wrapper card-box">
								<?php if ($image_id): ?>
									<a class="catalog-slide__image image-box"
										href="<?php echo esc_url(wp_get_attachment_image_url($image_id, 'full')); ?>"
										data-fancybox="catalog-gallery">
										<?php echo wp_get_attachment_image($image_id, 'medium_large', false, ['alt' => get_the_title(), 'class' => 'img']); ?>
									</a>
								<?php endif; ?>

								<h3 class="catalog-slide__title title-4">
									<?php the_title(); ?>
								</h3>

								<?php $item_descr = get_field('descr'); ?>
								<?php
								$content = apply_filters('the_content', get_the_content());
								if ($content): ?>
									<div class="catalog-slide__descr descr">
										<?php echo wp_kses_post($content); ?>
									</div>
								<?php endif; ?>

								<?php if (!empty($params)): ?>
									<ul class="catalog-slide__params">
										<?php foreach ($params as $param): ?>
											<li class="catalog-slide__param">
												<span class="catalog-slide__param-name">
													<?php echo esc_html($param['name']); ?>:
												</span>
												<span class="catalog-slide__param-value">
													<?php echo esc_html($param['value']); ?>
												</span>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>

								<?php if ($price): ?>
									<div class="catalog-slide__price title-3">
										<?php echo esc_html($price); ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endwhile;
					wp_reset_postdata(); ?>
				</div>
			</div>

			<div class="catalog-swiper__btn-box swiper-btn-box">
				<button class="swiper-btn swiper-btn__prev catalog-swiper__btn catalog-swiper__btn-prev" type="button"
					aria-label="Назад" data-swiper-btn-prev=".catalog-swiper"></button>
				<button class="swiper-btn swiper-btn__next catalog-swiper__btn catalog-swiper__btn-next" type="button"
					aria-label="Вперёд" data-swiper-btn-next=".catalog-swiper"></button>
			</div>
		</div>
	</section>
<?php endif; ?>