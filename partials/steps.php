<?php
$page = get_page_by_path('home', OBJECT, 'page');
$label = get_field('steps_label', $page) ?? '';
$title = get_field('steps_title', $page) ?? '';
$descr = get_field('steps_descr', $page) ?? '';
$terms = get_field('steps_terms', $page) ?? [];
$steps = get_field('steps_list', $page) ?? [];
?>

<?php if (!empty($steps)): ?>
	<section class="section steps" id="steps">
		<div class="container steps__container">
			<div class="steps__intro">
				<?php if (!empty($terms)): ?>
					<ul class="steps__terms terms">
						<?php foreach ($terms as $term): ?>
							<li class="terms__item descr"><?php echo wp_kses_post($term['term']); ?></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>

				<?php get_template_part('partials/section-header', null, [
					'label' => $label,
					'title' => $title,
					'descr' => $descr
				]); ?>
			</div>

			<div class="swiper steps-swiper" data-swiper='{ "slidesPerView": "auto", "spaceBetween": 25, "rewind": true }'>
				<div class="swiper-wrapper steps-swiper__wrapper">
					<?php $i = 0;
					foreach ($steps as $step):
						$i++;
						$icon = $step['icon'] ?? null;
						$item_title = $step['title'] ?? '';
						$item_descr = $step['descr'] ?? '';
						$number = $i < 10 ? '0' . $i : $i;
						?>
						<div class="swiper-slide steps-slide">
							<div class="steps-slide__wrapper card-box">
								<div class="steps-slide__badge">
									<span class="steps-slide__number title-1"><?php echo $number; ?></span>
									<?php if ($icon && is_array($icon) && !empty($icon['ID'])): ?>
										<div class="steps-slide__icon">
											<?php echo wp_get_attachment_image(
												$icon['ID'],
												'full',
												false,
												['alt' => $icon['alt'] ?: '', 'loading' => 'lazy']
											); ?>
										</div>
									<?php endif; ?>
								</div>
								<?php if ($item_title): ?>
									<h3 class="steps-slide__title">
										<?php echo esc_html($item_title); ?>
									</h3>
								<?php endif; ?>
								<?php if ($item_descr): ?>
									<div class="steps-slide__descr descr">
										<?php echo wp_kses_post($item_descr); ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<div class="steps-swiper__btn-box swiper-btn-box visible-tablet">
				<button class="swiper-btn swiper-btn__prev steps-swiper__btn steps-swiper__btn-prev" type="button"
					aria-label="Назад" data-swiper-btn-prev=".steps-swiper"></button>
				<button class="swiper-btn swiper-btn__next steps-swiper__btn steps-swiper__btn-next" type="button"
					aria-label="Вперёд" data-swiper-btn-next=".steps-swiper"></button>
			</div>
		</div>
	</section>
<?php endif; ?>
