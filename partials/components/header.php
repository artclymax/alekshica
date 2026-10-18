<?php
$page = 'option';

$time = get_field('contacts_time', $page) ?? '';
$phone = get_field('header_phone', $page) ?: get_field('contacts_phones', $page)[0]['phone'] ?? '';
$socials = get_field('header_socials', $page) ?: get_field('contacts_phones', $page)[0]['socials'] ?? '';
?>

<header class="header" data-auto-calc="header, height">
	<div class="container header__container">
		<!-- LOGO -->
		<div class="header__logo logo">
			<?php mx_logo(); ?>
		</div>
		<!-- MENU -->
		<nav class="header__menu header-menu">
			<button class="header-menu__close-btn menu-close-btn visible-tablet" type="button" aria-label="Закрыть меню">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd"
						d="M6.21967 6.21967C6.51256 5.92678 6.98744 5.92678 7.28033 6.21967L17.7803 16.7197C18.0732 17.0126 18.0732 17.4874 17.7803 17.7803C17.4874 18.0732 17.0126 18.0732 16.7197 17.7803L6.21967 7.28033C5.92678 6.98744 5.92678 6.51256 6.21967 6.21967Z"
						fill="currentColor" />
					<path fill-rule="evenodd" clip-rule="evenodd"
						d="M17.7803 6.21967C18.0732 6.51256 18.0732 6.98744 17.7803 7.28033L7.28033 17.7803C6.98744 18.0732 6.51256 18.0732 6.21967 17.7803C5.92678 17.4874 5.92678 17.0126 6.21967 16.7197L16.7197 6.21967C17.0126 5.92678 17.4874 5.92678 17.7803 6.21967Z"
						fill="currentColor" />
				</svg>
			</button>
			<div class="header-menu__item">
				<h3 class="header-menu__title title-3 visible-tablet">
					Навигация
				</h3>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'header-menu',
					'container' => false,
					'menu_class' => 'header-menu__list',
					'depth' => 1,
					'fallback_cb' => false
				));
				?>
			</div>
			<div class="header-menu__item header-menu__contacts-box visible-tablet">
				<h3 class="header-menu__title title-3">
					Контакты
				</h3>
				<?php get_template_part('partials/contacts-box'); ?>
			</div>
		</nav>

		<div class="header__contacts-box">
			<?php if (!empty($time)): ?>
				<div class="header__contacts-time icon icon--time descr hidden-tablet">
					<?php echo wp_kses_post($time) ?>
				</div>
			<?php endif; ?>
			<?php if (!empty($phone) || !empty($socials)): ?>
				<div class="header__phone phones-box__item">
					<?php if (!empty($phone)): ?>
						<a class="phones-box__number icon icon--phone" href="tel:+<?php echo esc_attr(correct_phone($phone)); ?>">
							<span class="link hidden-tablet">
								<?php echo esc_html($phone); ?>
							</span>
						</a>
					<?php endif; ?>
					<?php if (!empty($socials)): ?>
						<div class="phones-box__socials">
							<?php foreach ($socials as $social):
								$icon = $social['image'] ?? null;
								?>
								<a class="phones-box__socials-link link-icon" href="<?php echo esc_attr($social['link']); ?>"
									target="_blank">
									<?php if ($icon && is_array($icon) && !empty($icon['ID'])): ?>
										<?php echo wp_get_attachment_image(
											$icon['ID'],
											'full',
											false,
											['alt' => $icon['alt'] ?: '', 'loading' => 'lazy']
										); ?>
									<?php endif; ?>
								</a>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>

		<!-- BURGER -->
		<button class="header__burger-btn burger-btn-icon header-mobile-btn visible-tablet" type="button"
			aria-label="Открыть/закрыть меню">
			<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path
					d="M27 21C27.5523 21 28 21.4477 28 22C28 22.5523 27.5523 23 27 23H5C4.44772 23 4 22.5523 4 22C4 21.4477 4.44772 21 5 21H27ZM27 15C27.5523 15 28 15.4477 28 16C28 16.5523 27.5523 17 27 17H5C4.44772 17 4 16.5523 4 16C4 15.4477 4.44772 15 5 15H27ZM27 9C27.5523 9 28 9.44772 28 10C28 10.5523 27.5523 11 27 11H5C4.44772 11 4 10.5523 4 10C4 9.44772 4.44772 9 5 9H27Z"
					fill="currentColor" />
			</svg>
		</button>
	</div>
</header>