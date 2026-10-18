<?php
$page = 'options';
$phones = get_field('contacts_phones', $page) ?? [];
?>

<?php if (!empty($phones) || !empty($socials)): ?>
	<ul class="phones-box">
		<?php foreach ($phones as $phone):
			$clean_phone = '+' . correct_phone($phone['phone']);
			?>
			<li class="phones-box__item">
				<a class="phones-box__number icon icon--phone" href="tel:<?php echo esc_attr($clean_phone); ?>">
					<span class="link">
						<?php echo esc_html($phone['phone']); ?>
					</span>
				</a>
				<?php if (!empty($socials = $phone['socials'])): ?>
					<div class="phones-box__socials">
						<?php foreach ($socials as $social):
							$icon = $social['image'] ?? null;
							?>
							<a class="phones-box__socials-link link-icon" href="<?php echo esc_attr($social['link']); ?>" target="_blank">
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
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>