<?php
$page = get_page_by_path('home', OBJECT, 'page');
$label = get_field('services_label', $page) ?? '';
$title = get_field('services_title', $page) ?? '';
$descr = get_field('services_descr', $page) ?? '';
$add_title = get_field('services_additional_title', $page) ?? 'Также доступно';
$add_list = get_field('services_additional_list', $page) ?? [];

$services = new WP_Query([
	'post_type' => 'additional_service',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'post_status' => 'publish'
]);
?>

<?php if ($services->have_posts() || !empty($add_list)): ?>
	<section class="section services" id="services">
		<div class="container services__container">
			<?php get_template_part('partials/section-header', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr
			]); ?>
		</div>

		<?php if ($services->have_posts()): ?>
			<div class="container services__slider">
				<div class="swiper services-swiper"
					data-swiper='{ "slidesPerView": 1, "spaceBetween": 20, "rewind": true, "breakpoints": { "768": { "slidesPerView": 2 }, "1024": { "slidesPerView": 3 } } }'>
					<div class="swiper-wrapper services-swiper__wrapper">
						<?php while ($services->have_posts()):
							$services->the_post();
							$image_id = get_post_thumbnail_id();
							$price = get_field('price');
							$item_descr = apply_filters('the_content', get_the_content()) ?? '';
							?>
							<div class="swiper-slide catalog-slide services-slide">
								<div class="catalog-slide__wrapper card-box">
									<?php if ($image_id): ?>
										<a class="catalog-slide__image image-box"
											href="<?php echo esc_url(wp_get_attachment_image_url($image_id, 'full')); ?>"
											data-fancybox="services">
											<?php echo wp_get_attachment_image($image_id, 'medium_large', false, ['alt' => get_the_title(), 'class' => 'img']); ?>
										</a>
									<?php endif; ?>

									<h3 class="catalog-slide__title title-4">
										<?php the_title(); ?>
									</h3>

									<?php if ($item_descr): ?>
										<div class="catalog-slide__descr descr">
											<?php echo wp_kses_post($item_descr); ?>
										</div>
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
				<div class="services-swiper__btn-box swiper-btn-box">
					<button class="swiper-btn swiper-btn__prev services-swiper__btn services-swiper__btn-prev" type="button"
						aria-label="Назад" data-swiper-btn-prev=".services-swiper"></button>
					<button class="swiper-btn swiper-btn__next services-swiper__btn services-swiper__btn-next" type="button"
						aria-label="Вперёд" data-swiper-btn-next=".services-swiper"></button>
				</div>
			</div>
		<?php endif; ?>

		<?php if (!empty($add_list)): ?>
			<div class="container services__additional-container">
				<div class="services__additional services-additional card-box">
					<?php if ($add_title): ?>
						<h3 class="services-additional__title title-3">
							<?php echo esc_html($add_title); ?>
						</h3>
					<?php endif; ?>
					<ul class="services-additional__list grid">
						<?php foreach ($add_list as $item):
							$icon = $item['image'] ?? null;
							$item_title = $item['title'] ?? '';
							$item_descr = $item['descr'] ?? '';
							?>
							<li class="services-additional__item services-additional-item">
								<?php if ($icon && is_array($icon) && !empty($icon['ID'])): ?>
									<div class="services-additional-item__image">
										<?php echo wp_get_attachment_image(
											$icon['ID'],
											'full',
											false,
											['alt' => $icon['alt'] ?: '', 'loading' => 'lazy']
										); ?>
									</div>
								<?php endif; ?>
								<div class="services-additional-item__content">
									<?php if ($item_title): ?>
										<h3 class="services-additional-item__title">
											<?php echo esc_html($item_title); ?>
										</h3>
									<?php endif; ?>
									<?php if ($item_descr): ?>
										<div class="services-additional-item__descr descr">
											<?php echo wp_kses_post($item_descr); ?>
										</div>
									<?php endif; ?>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
					<?php get_template_part('partials/phones-box'); ?>
				</div>
			</div>
		<?php endif; ?>
	</section>
<?php endif; ?>