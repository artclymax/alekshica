<?php
$page = 'option';
$modals = get_field('modals', $page) ?? [];
?>

<?php if ($modals): ?>
	<?php foreach ($modals as $item):
		// Санитизация ID: только латиница, цифры, дефис, нижнее подчёркивание
		$raw_id = $item['id'] ?? '';
		$id = preg_replace('/[^a-z0-9\-_]/i', '', sanitize_title($raw_id));

		// Пропускаем итерацию, если после очистки ID пустой
		if (empty($id))
			continue;

		$title = $item['title'] ?? '';
		$descr = $item['descr'] ?? '';
		$shortcode = $item['shortcode'] ?? '';
		$image = $item['image'] ?? '';
		?>

		<!-- OVERLAY -->
		<div class="modal modal-<?= esc_attr($id) ?>" id="<?= esc_attr($id) ?>" data-modal
			style="--bg-modal: url('<?= esc_url($item['image']['url'] ?? '') ?>');">
			<!-- MODAL -->
			<div class="modal__box modal-call__box" data-modal-box>
				<!-- CLOSE-BTN -->
				<button class="modal__close-btn modal-close-btn" data-modal-close aria-label="Закрыть модальное окно"
					type="button">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path
							d="M18.75 6.81984L17.1802 5.25L12 10.4302L6.81984 5.25L5.25 6.81984L10.4302 12L5.25 17.1802L6.81984 18.75L12 13.5698L17.1802 18.75L18.75 17.1802L13.5698 12L18.75 6.81984Z"
							fill="currentColor" />
					</svg>


				</button>
				<!-- BODY -->
				<div class="modal__body">
					<div class="contacts-form-box card-box modal__wrapper">
						<?php if ($title): ?>
							<h3 class="contacts-form-box__title title-2" id="<?= esc_attr($id) ?>-title">
								<?php echo esc_html($title) ?>
							</h3>
						<?php endif; ?>
						<?php if ($descr): ?>
							<div class="contacts-form-box__descr modal__descr descr" id="<?= esc_attr($id) ?>-desc">
								<?php echo wp_kses_post($descr) ?>
							</div>
						<?php endif; ?>
						<?php if ($shortcode): ?>
							<div class="contacts-form-box__form modal__form">
								<?php echo do_shortcode($shortcode) ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
<?php endif; ?>