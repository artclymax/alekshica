<?php
$page = get_query_var('pagename') ?: get_query_var('post_type') ?? '';

if (is_tax()) {
	$page = get_taxonomy(get_query_var('taxonomy'))->object_type[0] ?: get_query_var('post_type') ?? '';
}
$page_id = get_page_by_path($page)->ID;


$title = get_field('hero_title', $page_id) ?: get_field('hero_title') ?: get_the_title($page_id) ?? '';
$descr = get_field('hero_descr', $page_id) ?: get_field('hero_descr') ?: '';
$bg = get_field('hero_image', $page_id) ?: get_field('hero_image') ?: get_the_post_thumbnail_url($page_id);
$btn = get_field('hero_btn', $page_id) ?: get_field('hero_btn') ?: '';
$media_first = get_field('hero_media_first', $page_id) ?: '';
$media_second = get_field('hero_media_second', $page_id) ?: '';
$media_third = get_field('hero_media_third', $page_id) ?: '';

?>
<section class="hero-page hero-page-services" id="hero-page">
	<div class="container hero-page__container">
		<div class="hero-page__wrapper">
			<div class="hero-page__breadcrumbs breadcrumbs">
				<?php if (function_exists('bcn_display')) {
					bcn_display();
				} ?>
			</div>
			<div class="hero-page__content-wrapper">

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

				<?php if ($media_first || $media_second || $media_third): ?>
					<div class="hero-page__media hero-page-media">
						<?php if ($media_first): ?>
							<div class="hero-page-media__item hero-page-media__first">
								<?php if ($image = $media_first['image']): ?>
									<div class="hero-page-media__image image-box">
										<?php echo wp_get_attachment_image(
											$image['ID'],
											'large',
											false,
											array(
												'class' => 'img',
												'alt' => $image['alt'] ?: ''
											)
										); ?>
									</div>
								<?php endif; ?>
								<h3 class="hero-page-media__title">
									<?php echo esc_html($media_first['title']) ?>
								</h3>
							</div>
						<?php endif; ?>
						<?php if ($media_second): ?>
							<div class="hero-page-media__item hero-page-media__second">
								<?php if ($image = $media_second['image']): ?>
									<div class="hero-page-media__image image-box">
										<?php echo wp_get_attachment_image(
											$image['ID'],
											'large',
											false,
											array(
												'class' => 'img',
												'alt' => $image['alt'] ?: ''
											)
										); ?>
									</div>
								<?php endif; ?>
								<h3 class="hero-page-media__title">
									<?php echo esc_html($media_second['title']) ?>
								</h3>
							</div>
						<?php endif; ?>
						<?php if ($media_third): ?>
							<div class="hero-page-media__item hero-page-media__third">
								<?php if ($image = $media_third['image']): ?>
									<div class="hero-page-media__image image-box">
										<?php echo wp_get_attachment_image(
											$image['ID'],
											'large',
											false,
											array(
												'class' => 'img',
												'alt' => $image['alt'] ?: ''
											)
										); ?>
									</div>
								<?php endif; ?>
								<h3 class="hero-page-media__title">
									<?php echo esc_html($media_third['title']) ?>
								</h3>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php if ($bg): ?>
			<div class="hero-page__image image-box" aria-hidden="true">
				<?php if (!empty($bg['url'])): ?>
					<img src="<?= esc_attr($bg['url']) ?>" alt="<?= esc_attr($title) ?>">
				<?php else: ?>
					<img src="<?= esc_attr($bg) ?>" alt="<?= esc_attr($title) ?>">
				<?php endif; ?>
			</div>
		<?php endif; ?>

	</div>



</section>