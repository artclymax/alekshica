<?php
$page = get_page_by_path('home', OBJECT, 'page');

$label = get_field('contacts_label', $page) ?? '';
$title = get_field('contacts_title', $page) ?? '';
$descr = get_field('contacts_descr', $page) ?? '';
$image = get_field('contacts_image', $page) ?? null;
?>
<section class="section contacts" id="contacts">
	<div class="container contacts__container">
		<div class="contacts__wrapper">
			<?php get_template_part('partials/section-header', null, [
				'label' => $label,
				'title' => $title,
				'descr' => $descr
			]); ?>
			<?php get_template_part('partials/contacts-box'); ?>
		</div>
	</div>
	<?php if (!empty($image)): ?>
		<div class="contacts__image image-box">
			<?php echo wp_get_attachment_image(
				$image['ID'],
				'large',
				false,
				array(
					'class' => 'img',
					'alt' => $image['alt'] ?: '',
					'loading' => 'lazy'
				)
			); ?>
		</div>
	<?php endif; ?>
</section>