<?php
$page = 'option';

$time = get_field('contacts_time', $page) ?? '';
$address = get_field('contacts_address', $page) ?? '';
?>
<div class="contacts-box">
	<?php get_template_part('partials/phones-box'); ?>
	<?php if (!empty($time)): ?>
		<div class="contacts-box__descr descr icon icon--time">
			<?php echo wp_kses_post($time) ?>
		</div>
	<?php endif; ?>
	<?php if (!empty($address)): ?>
		<address class="contacts-box__descr descr icon icon--address">
			<?php echo wp_kses_post($address) ?>
		</address>
	<?php endif; ?>
</div>
