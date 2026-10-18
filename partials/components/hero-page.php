<?php
$title = '';
$descr = '';
$bg = '';
$btn = '';

if (is_archive() || is_tax()) {

	$page = get_query_var('pagename') ?: get_query_var('post_type') ?? '';

	if (is_tax()) {
		$page = get_taxonomy(get_query_var('taxonomy'))->object_type[0] ?: get_query_var('post_type') ?? '';
	}
	$page_id = get_page_by_path($page)->ID;

	$title = get_field('hero_title', $page_id) ?: get_field('hero_title') ?: get_the_title($page_id) ?? '';
	$descr = get_field('hero_descr', $page_id) ?: get_field('hero_descr') ?: '';
	$bg = get_field('hero_image', $page_id) ?: get_field('hero_image') ?: get_the_post_thumbnail_url($page_id);
	$btn = get_field('hero_btn', $page_id) ?: get_field('hero_btn') ?: '';

} else {
	$title = get_field('hero_title') ?: get_the_title();
	$descr = get_field('hero_descr') ?: '';
	$bg = get_field('hero_image') ?: get_the_post_thumbnail_url() ?? '';
	$btn = get_field('hero_btn') ?: '';
}
?>
<section class="hero-page jarallax" id="hero-page">
	<div class="container hero-page__container">
		<div class="hero-page__wrapper">
			<div class="hero-page__breadcrumbs breadcrumbs">
				<?php if (function_exists('bcn_display')) {
					bcn_display();
				} ?>
			</div>
			<div class="hero-page__content">
				<h1 class="hero-page__title title-1">
					<?php echo esc_html($title) ?>
				</h1>
				<?php if ($descr): ?>
					<div class="hero-page__descr descr">
						<?php echo wp_kses_post($descr) ?>
					</div>
				<?php endif; ?>
				<?php if ($btn): ?>
					<a class="hero-page__btn btn" href="<?php echo esc_attr($btn['url']) ?>">
						<?php echo esc_html($btn['title']) ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
		<?php if ($bg): ?>
			<div class="hero-page__image image-box jarallax-img" aria-hidden="true">
				<?php if (!empty($bg['url'])): ?>
					<img src="<?= esc_attr($bg['url']) ?>" alt="<?= esc_attr($title) ?>">
				<?php else: ?>
					<img src="<?= esc_attr($bg) ?>" alt="<?= esc_attr($title) ?>">
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>