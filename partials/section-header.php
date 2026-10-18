<?php 
$label = $args['label'] ?? '';
$title = $args['title'] ?? '';
$descr = $args['descr'] ?? '';
?>
<?php if (!empty($label) || !empty($descr) || !empty($title)): ?>
	<div class="section-header">
		<?php if (!empty($label)): ?>
			<p class="section-header__label">
				<?php echo esc_html($label) ?>
			</p>
		<?php endif; ?>
		<?php if (!empty($title)): ?>
			<h2 class="section-header__title title-2">
				<?php echo esc_html($title) ?>
			</h2>
		<?php endif; ?>
		<?php if (!empty($descr)): ?>
			<div class="section-header__descr descr">
				<?php echo wp_kses_post($descr) ?>
			</div>
		<?php endif; ?>
	</div>
<?php endif; ?>