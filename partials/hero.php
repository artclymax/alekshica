<?php
$page = get_page_by_path('home', OBJECT, 'page');

$label = get_field('hero_catalog_label', $page) ?? '';
$title = get_field('hero_catalog_title', $page) ?? '';
$descr = get_field('hero_catalog_descr', $page) ?? '';
$items = get_field('hero_catalog_items', $page) ?? [];
$btn = get_field('hero_catalog_btn', $page) ?? [];
$bg_big = get_field('hero_catalog_bg_big', $page) ?? null;
$bg_small = get_field('hero_catalog_bg_small', $page) ?? null;
?>

<section class="hero" id="hero">
	<div class="container hero__container">
		<div class="hero__content">
			<h1 class="hero__title title-2">
				<?php echo esc_html($title) ?>
			</h1>
			<?php if (!empty($descr)): ?>
				<div class="hero__descr descr">
					<?php echo wp_kses_post($descr) ?>
				</div>
			<?php endif; ?>
			<?php if ($btn): ?>
				<a class="hero__btn btn" href="<?php echo esc_url($btn['url']); ?>">
					<?php echo esc_html($btn['title']); ?>
				</a>
			<?php endif; ?>
		</div>

		<?php if (!empty($items)): ?>
			<ul class="hero__list">
				<?php foreach ($items as $item):
					$image = $item['image'] ?? null;
					$text = $item['text'] ?? '';
					?>
					<li class="hero__item hero-item">
						<?php if ($image && is_array($image) && !empty($image['ID'])): ?>
							<a class="hero-item__image image-box" data-fancybox="hero-gallery" href="<?php echo esc_url($image['url']); ?>">
								<?php echo wp_get_attachment_image(
									$image['ID'],
									'large',
									false,
									[
										'class' => 'img',
										'alt' => $image['alt'] ?: $text,
										'loading' => 'lazy'
									]
								); ?>
							</a>
						<?php endif; ?>
						<?php if ($text): ?>
							<p class="hero-item__text">
								<?php echo esc_html($text); ?>
							</p>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>

	<?php if ($bg_big && is_array($bg_big) && !empty($bg_big['ID'])): ?>
		<div class="hero__bg-box image-box">
			<?php echo wp_get_attachment_image(
				$bg_big['ID'],
				'full',
				false,
				[
					'class' => 'hero__bg-big hidden-tablet',
					'alt' => $bg_big['alt'] ?: '',
				]
			); ?>
			<?php if ($bg_small && is_array($bg_small) && !empty($bg_small['ID'])): ?>
				<?php echo wp_get_attachment_image(
					$bg_small['ID'],
					'medium',
					false,
					[
						'class' => 'hero__bg-small visible-tablet',
						'alt' => $bg_small['alt'] ?: '',
						'loading' => 'lazy'
					]
				); ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</section>