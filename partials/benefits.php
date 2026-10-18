<?php
$page = get_page_by_path('home', OBJECT, 'page');

$label = get_field('benefits_catalog_label', $page) ?? '';
$title = get_field('benefits_catalog_title', $page) ?? '';
$descr = get_field('benefits_catalog_descr', $page) ?? '';
$bg_big = get_field('benefits_catalog_bg_big', $page) ?? null;
$items = get_field('benefits_catalog_items', $page) ?? [];
$contacts_title = get_field('benefits_catalog_contacts_title', $page) ?? '';
?>

<section class="section benefits" id="benefits">
	<div class="un-container benefits__container">
		<?php if ($bg_big && is_array($bg_big) && !empty($bg_big['ID'])): ?>
			<div class="un-container__full benefits__image image-box">
				<?php echo wp_get_attachment_image(
					$bg_big['ID'],
					'full',
					false,
					['alt' => $bg_big['alt'] ?: '', 'loading' => 'lazy']
				); ?>
			</div>
		<?php endif; ?>

		<div class="un-container__content benefits__content">
			<?php get_template_part('partials/section-header', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr
			]); ?>

			<?php if ($bg_big && is_array($bg_big) && !empty($bg_big['ID'])): ?>
				<div class="benefits__image-small image-box visible-tablet">
					<?php echo wp_get_attachment_image(
						$bg_big['ID'],
						'medium',
						false,
						['alt' => $bg_big['alt'] ?: '', 'loading' => 'lazy']
					); ?>
				</div>
			<?php endif; ?>

			<?php if (!empty($items)): ?>
				<ul class="benefits__list grid">
					<?php foreach ($items as $item):
						$icon = $item['icon'] ?? null;
						$item_title = $item['title'] ?? '';
						$item_descr = $item['descr'] ?? '';
						?>
						<li class="benefits__item benefits-item card-box">
							<?php if ($icon && is_array($icon) && !empty($icon['ID'])): ?>
								<div class="benefits-item__icon">
									<?php echo wp_get_attachment_image(
										$icon['ID'],
										'full',
										false,
										['alt' => $icon['alt'] ?: '', 'loading' => 'lazy']
									); ?>
								</div>
							<?php endif; ?>
							<div class="benefits-item__content">
								<?php if ($item_title): ?>
									<h3 class="benefits-item__title title-3">
										<?php echo esc_html($item_title); ?>
									</h3>
								<?php endif; ?>
								<?php if ($item_descr): ?>
									<div class="benefits-item__descr descr">
										<?php echo wp_kses_post($item_descr); ?>
									</div>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if ($contacts_title): ?>
				<div class="benefits__contacts benefits-contacts">
					<h3 class="benefits-contacts__title title-3 descr">
						<?php echo wp_kses_post($contacts_title); ?>
					</h3>
					<?php get_template_part('partials/phones-box'); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>