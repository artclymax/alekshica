<?php
$page = get_page_by_path('home', OBJECT, 'page');

$label = get_field('custom_label', $page) ?? '';
$title = get_field('custom_title', $page) ?? '';
$descr = get_field('custom_descr', $page) ?? '';
$terms = get_field('custom_terms', $page) ?? [];
$options = get_field('custom_options', $page) ?? [];
$image_1 = get_field('image_1', $page) ?? null;
$image_2 = get_field('image_2', $page) ?? null;
?>

<section class="section custom" id="custom">
	<div class="container custom__container">
		<?php get_template_part('partials/section-header', null, [
			'label' => $label,
			'title' => $title,
			'descr' => $descr
		]); ?>

		<?php if (!empty($terms)): ?>
			<ul class="custom__terms custom-terms visible-tablet">
				<?php foreach ($terms as $term): ?>
					<li class="custom-terms__item">
						<?php echo wp_kses_post($term['term']); ?>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>

		<div class="custom__content">
			<?php if (!empty($options)): ?>
				<ul class="custom__options custom-options">
					<?php foreach ($options as $item):
						$icon = $item['icon'] ?? null;
						$item_title = $item['title'] ?? '';
						$item_descr = $item['descr'] ?? '';
						?>
						<li class="custom-options__item custom-options-item card-box">
							<div class="custom-options-item__header">
								<?php if ($icon && is_array($icon) && !empty($icon['ID'])): ?>
									<div class="custom-options-item__icon">
										<?php echo wp_get_attachment_image(
											$icon['ID'],
											'full',
											false,
											['alt' => $icon['alt'] ?: '', 'loading' => 'lazy']
										); ?>
									</div>
								<?php endif; ?>
								<?php if ($item_title): ?>
									<h3 class="custom-options-item__title descr">
										<?php echo esc_html($item_title); ?>
									</h3>
								<?php endif; ?>
							</div>
							<?php if ($item_descr): ?>
								<div class="custom-options-item__descr descr">
									<?php echo wp_kses_post($item_descr); ?>
								</div>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<div class="custom__overview">
				<?php if (!empty($terms)): ?>
					<ul class="custom__terms custom-terms hidden-tablet">
						<?php foreach ($terms as $term): ?>
							<li class="custom-terms__item">
								<?php echo wp_kses_post($term['term']); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>

				<div class="custom__visual">
					<?php if ($image_1 && is_array($image_1) && !empty($image_1['ID'])): ?>
						<div class="custom__image custom__image--first image-box">
							<?php echo wp_get_attachment_image(
								$image_1['ID'],
								'large',
								false,
								['alt' => $image_1['alt'] ?: '', 'loading' => 'lazy']
							); ?>
						</div>
					<?php endif; ?>
					<?php if ($image_2 && is_array($image_2) && !empty($image_2['ID'])): ?>
						<div class="custom__image custom__image--second image-box">
							<?php echo wp_get_attachment_image(
								$image_2['ID'],
								'large',
								false,
								['alt' => $image_2['alt'] ?: '', 'loading' => 'lazy']
							); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>